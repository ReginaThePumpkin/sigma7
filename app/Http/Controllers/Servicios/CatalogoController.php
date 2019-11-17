<?php


namespace App\Http\Controllers\Servicios;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class CatalogoController extends Controller {

    public function index(){
        return view('servicios/catalogo');
    }

    public function getTableCatalogo(Request $request){
        if(isset($_GET['idSu'])){
            //primero tenemos que saber si existe su tabulador, sino entnces escogemos el tabulador base
            $tabu = $_GET['idSu'].'_precio';

            $resultT = DB::select( DB::raw("SHOW COLUMNS FROM conceptos LIKE '$tabu'") );
            $existsT = (count($resultT))?TRUE:FALSE;
            if($existsT){
                $precio_nor = $_GET['idSu'].'_precio';
                $precio_ur = $_GET['idSu'].'_precio_u';
            }else{
                $precio_nor = 'c.precio_to';
                $precio_ur = 'c.precio_urgencia_to';
            }

            $aColumns = array('c.id_to','c.concepto_to', $precio_nor,$precio_ur, 'c.costo_maquila_to','c.costo_maquila_u_to', 'c.precio1_to','c.precio_urgencia1_to','c.id_to');
        }else{
            $aColumns = array('c.id_to', 'c.concepto_to', 'c.precio_to','c.precio_urgencia_to', 'c.costo_maquila_to','c.costo_maquila_u_to', 'c.precio1_to','c.precio_urgencia1_to','c.id_to');
        }

        // DB tables to use
        $aTables = array( 'conceptos c');

        // Indexed column (used for fast and accurate table cardinality)
        $sIndexColumn = "c.id_to";

        // Joins hasta aqui
        $sJoin = 'left join areas a on a.id_a = c.id_area_to';

        // CONDITIONS
        $sWhere = "where c.id_tipo_concepto_to = 2 " ;



        /*  * Paging */
        $sLimit = "";
        if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
        {
            $sLimit = "LIMIT ".$_GET['iDisplayStart'].", ".$_GET['iDisplayLength'] ;
        }

        /* * Ordering */
        $sOrder = "";
        if ( isset( $_GET['iSortCol_0'] ) )
        {
            $sOrder = "ORDER BY  ";
            for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
            {
                if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
                {
                    $sOrder .= $aColumns[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".$_GET['sSortDir_'.$i].", ";
                }
            }

            $sOrder = substr_replace( $sOrder, "", -2 );
            if ( $sOrder == "ORDER BY" )
            {
                $sOrder = "";
            }
        }

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
        */

        if ( isset($_GET['sSearch']) && $_GET['sSearch'] != "" )
        {
            $sWhere .= "AND (";
            for ( $i=0 ; $i<count($aColumns) ; $i++ )
            {
                $sWhere .= $aColumns[$i]." LIKE '%".$_GET['sSearch']."%' OR ";
            }
            $sWhere = substr_replace( $sWhere, "", -3 );
            $sWhere .= ')';
        }

        /* Individual column filtering */
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( isset($_GET['bSearchable_'.$i]) && $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
            {
                if ( $sWhere == "" )
                {
                    $sWhere = "WHERE ";
                }
                else
                {
                    $sWhere .= " AND ";
                }
                $sWhere .= $aColumns[$i]." LIKE '%".$_GET['sSearch_'.$i]."%' ";
            }
        }

        /*
         * SQL queries
         * Get data to display
        */
        $sQuery = "
        SELECT SQL_CALC_FOUND_ROWS ".str_replace(" , ", " ", implode(", ", $aColumns))."
        FROM   ".str_replace(" , ", " ", implode(", ", $aTables))."
		$sJoin
        $sWhere
        $sOrder
        $sLimit";

        $rResult = DB::select( DB::raw($sQuery) );
        $rResult = json_decode(json_encode($rResult), true);

        /* Data set length after filtering */
        $iFilteredTotal = count($rResult);

        /* Total data set length */
        $sQuery = "
        SELECT COUNT(".$sIndexColumn.")
        FROM   ".$aTables[0];

        $rResultTotal = DB::select( DB::raw($sQuery) );
        $iTotal = count($rResultTotal);

        /* * Output */
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );
        $hh=0;


        foreach ($rResult as $aRow) {
            $hh++;
            $row = array();
            for ( $i=0 ; $i<count($aColumns) ; $i++ ){
                if ( $aColumns[$i] == "version" ) {
                    $row[] = ($aRow[ $aColumns[$i] ]=="0") ? '-' : $aRow[ $aColumns[$i] ];
                }else if ( $aColumns[$i] != ' ' ) {
                    $col = explode(".",$aColumns[$i])[1];
                    $row[] = $aRow[$col];
                }
            }
            $row1 = array();
            for ( $j=0 ; $j<count($aColumns) ; $j++ )
            {
                if ( $aColumns[$j] == "version" ) {
                    $row1[] = ($aRow[ $aColumns[$j] ]=="0") ? '-' : $aRow[ $aColumns[$j] ];
                }else if ( $aColumns[$j] != ' ' ) {
                    $col = explode(".",$aColumns[$j])[1];
                    $row1[] = $aRow[$col];
                }
            }

            $row[0]="<span>$hh</span>";

            if($_GET['accesoU']==1){
                $row[1]= "<span class='text-info' style='cursor:pointer; text-decoration:underline;' id='$row[8]' lang='$row[1]' onClick='fichaEstudio(this.id, this.lang);'>$row[1]</span>";
            }
            else{ $row[1]="<span id='$row[4]'>$row[1]</span>"; }

            $output['aaData'][] = $row;
        }
        return json_encode( $output );
    }

    public function getTableCatalogo1(Request $request){
        if($request->get('idSu') != ""){
            //primero tenemos que saber si existe su tabulador, sino entnces escogemos el tabulador base
            $tabu = $request->get('idSu').'_precio';
            $rowExist = DB::select( DB::raw("SHOW COLUMNS FROM conceptos LIKE '$tabu'") );
            if(count($rowExist)){
                $precio_nor = $request->get('idSu').'_precio';
                $precio_ur = $request->get('idSu').'_precio_u';
            }else{
                $precio_nor = 'c.precio_to';
                $precio_ur = 'c.precio_urgencia_to';
            }

            $aColumns = array('c.id_to','c.concepto_to', $precio_nor, $precio_ur, 'c.costo_maquila_to','c.costo_maquila_u_to', 'c.precio1_to','c.precio_urgencia1_to','c.id_to');
        }else{
            $aColumns = array('c.id_to', 'c.concepto_to', 'c.precio_to','c.precio_urgencia_to', 'c.costo_maquila_to','c.costo_maquila_u_to', 'c.precio1_to','c.precio_urgencia1_to','c.id_to');
        }

        $where = array();
        if ( $request->get('sSearch') != "" ){
            for ( $i=0 ; $i<count($aColumns) ; $i++ ){
                array_push($where, ['c.id_tipo_concepto_to', 'LIKE', '%'.$request->get('sSearch').'%']);
            }
        }
        if ( $request->get('sSearch_1') != "" ){
            array_push($where, ['concepto_to', 'LIKE', '%'.$request->get('sSearch_1').'%']);
        }
        $iTotal = DB::table('conceptos AS c')
            ->select('id_to')
            ->join('areas AS a', 'a.id_a', '=', 'c.id_area_to')
            ->where('c.id_tipo_concepto_to', 2);
        $iTotal = count($iTotal);

        $data = DB::table('conceptos AS c')
        ->select($aColumns)
        ->join('areas AS a', 'a.id_a', '=', 'c.id_area_to')
        ->where('c.id_tipo_concepto_to', 2)
        ->orWhere($where);

        $iFilteredTotal = count($data);
        foreach ($data as $key => $item) {
            $row = array();
            $row[0]="<span>".($key+1)."</span>";
            if($request->get('accesoU')==1){
                $row[1]= "<span class='text-info' style='cursor:pointer; text-decoration:underline;' id='".$item->id_to."' lang='$row[1]' onClick='fichaEstudio(this.id, this.lang);'>$row[1]</span>";
            }else{
                $row[1]="<span id='".$item->costo_maquila_to."'>$row[1]</span>";
            }
        }

        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        return json_encode($output);
    }

}