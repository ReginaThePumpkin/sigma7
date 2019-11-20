<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class EscuelasController extends Controller
{
    public function index(){
    	return view('administracion/escuelas');

    }

    public function getTableEscuelas(Request $request){
        
	    $aColumns = array('e.id_e', 'e.nombre_e', 't.nombre_te', 'e.control_e', 'e.entidad_e', 'e.id_e', 'e.id_e');
        $aTables = array( 'catalogo_escuelas e');// DB tables to use
        // Indexed column (used for fast and accurate table cardinality)
        $sIndexColumn = "e.id_e";
        $sJoin = 'left join tipo_escuelas t on t.id_te = e.nivel_e ';// Joins hasta aqui
        $sWhere = "where 1=1" ;// CONDITIONS
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
        /* Filtering */
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
            $nombre_u = '"'.$row[1].'"';
            //$row[0],$nombre_u
            $row[1] = "<button type='button' id='$row[5]' onClick='verEscuela(this.id, $nombre_u);' class='btn btn-link btn-xs'>$row[1]</button>";
            
            

            $sQuery2 =("SELECT id_do from documentos where nombre_do = 'LOGOTIPO' and tipo_quien_do = 5 and id_quien_do = $row[6]");

            $resultC= DB::select( DB::raw($sQuery2));
            $rowC = count($resultC);


            $sQuery3=("SELECT ext_do, nombre_do, id_do from documentos where nombre_do = 'LOGOTIPO' and tipo_quien_do = 5 and id_quien_do = $row[6]");
            $rowC1 = DB::select( DB::raw($sQuery3));


            if($rowC[0]<1){//no hay logo
                $row[5] = "<center><div align='center'><button type='button' class='btn btn-xs btn-default' onClick='subir_logo(this.name, $nombre_u)' name='$row[6]'><i class='fa fa-image'></i></div></center>";
            }
            else{//ya hay logo
                $row[5] = "<div align='center'><button name='$row[6]' type='button' class='btn btn-xs btn-default'><i class='fa fa-eye'></i></button></div>";
            }


            
            $output['aaData'][] = $row;
        }
        return json_encode( $output );
    }

    public function getEscuela(){
        return view('htmls.administracion.escuela');
    }


    public function getDatosEscuela(Request $request){
        $id = $request->get('id_e');

        $result = DB::table('catalogo_escuelas')
        ->select('nombre_e', 'nivel_e', 'control_e', 'entidad_e')
        ->where(['id_e' => $id])
        ->first();

        $row=array();
        $row[0]=$result->nombre_e;
        $row[1]=$result->nivel_e;
        $row[2]=$result->control_e;        
        $row[3]=$result->entidad_e;
           
        return ($row[0].'}[-]{'.$row[1].'}[-]{'.$row[2].'}[-]{'.$row[3]);
        
    }

    public function updateEscuela(Request $request){
        $idUsuario = $request->post();
        $idEscuela = $request->post('id_e');
        $nombre = $request->post('nombre_e');
        $nivel = $request->post('nivel_e');
        $sector = $request->post('control_e');
        $entidad = $request->post('entidad_e');
        
        /*
        //$idUsuario = sqlValue($_POST["idUser_esc"], "int");
        $idUsuario = $request->get("idUser_esc");
        //$idEscuela = sqlValue($_POST["idEscuela"], "int");
        $idEscuela = $request->get("idEscuela");
        //$nombre = sqlValue(mb_strtoupper($_POST["nombre_esc"]), "text");
        $nombre = $request->get("nombre_esc");
        //$nivel = sqlValue($_POST["nivel_esc"], "int");
        $nivel = $request->get("nivel_esc");
        //$sector = sqlValue($_POST["sector_esc"], "text");
        $sector = $request->get("sector_esc");
        //$estado = sqlValue($_POST["estado_esc"], "text");
        $estado = $request->get("estado_esc");
        $now = date('Y-m-d H:i:s');
        */
        DB::table('catalogo_escuelas')
        ->where('id_e', $idEscuela)
        ->update([
            'nombre_e' => $nombre,
            'control_e' => $sector,
            'nivel_e'=> $nivel,
            'entidad_e' => $entidad
        ]);
        return 1;
    }

}


