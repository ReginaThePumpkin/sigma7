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

            $aColumns = array('c.id_to','c.concepto_to', $precio_nor, $precio_ur, 'c.costo_maquila_to','c.costo_maquila_u_to', 'c.precio1_to','c.precio_urgencia1_to','c.id_to');
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
                    $col = explode(".",$aColumns[$i]);
                    $col = isset($col[1])? $col[1]:$col[0];
                    $row[] = $aRow[$col];
                }
            }
            $row1 = array();
            for ( $j=0 ; $j<count($aColumns) ; $j++ )
            {
                if ( $aColumns[$j] == "version" ) {
                    $row1[] = ($aRow[ $aColumns[$j] ]=="0") ? '-' : $aRow[ $aColumns[$j] ];
                }else if ( $aColumns[$j] != ' ' ) {
                    $col = explode(".",$aColumns[$j]);
                    $col = isset($col[1])? $col[1]:$col[0];
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

    public function getSucursales(Request $request){
        //Checamos el nivel de acceso del usuario, para ver si es multisucursal
        $resultNu = DB::select( DB::raw("SELECT multisucursal_u, idSucursal_u from usuarios where id_u = '$_GET[idU]' ") )[0];

        if($resultNu->multisucursal_u==1){
            $consulta1 = "SELECT DISTINCT id_su, nombre_su from sucursales order by nombre_su asc";
            $query1 = DB::select( DB::raw($consulta1) );
            $query1 = json_decode(json_encode($query1), true);
            foreach ($query1 as $key => $fila1) {
                echo '<option value="'.$fila1['id_su'].'">'.$fila1['nombre_su'].'</option>';
            }
        }
        else{
            $consulta1 = "SELECT DISTINCT id_su, nombre_su from sucursales where id_su = ".$resultNu->idSucursal_u." order by nombre_su asc";
            $query1 = DB::select( DB::raw($consulta1) );
            $query1 = json_decode(json_encode($query1), true);
            foreach ($query1 as $key => $fila1) {
                echo '<option selected value="'.$fila1['id_su'].'">'.$fila1['nombre_su'].'</option>';
            }
        }

    }

    public function datosSucursal(Request $request){
        //Generales
        $idU = $request->get("idU");

        $resultR = DB::select( DB::raw("SELECT idSucursal_u from usuarios where id_u = $idU ") )[0];

        echo $resultR->idSucursal_u;

    }

    public function getFichaServicio(){
        return view('htmls.servicios.ficha_servicio_m');
    }

    public function inserciones(){
        echo '<option value="" selected>'.'-INSERTAR TEXTO O IMAGEN DINÁMICA-'.'</option>';
        echo '<option value="{et_cedulap}">CÉDULA PROFESIONAL DEL PERSONAL MÉDICO</option>';
        echo '<option value="{et_cedulaesp}">CÉDULA DE ESPECIALIDAD DEL PERSONAL MÉDICO</option>';
        echo '<option value="{et_edad}">EDAD DEL PACIENTE (en años)</option>';
        echo '<option value="{et_especialidadm}">ESPECIALIDAD DEL PERSONAL MÉDICO</option>';
        echo '<option value="{et_fecha_dia}">DÍA DE ELEBORACIÓN</option>';
        echo '<option value="{et_fecha_mes_numero}">MES DE ELEBORACIÓN(número)</option>';
        echo '<option value="{et_fecha_mes_letra}">MES DE ELEBORACIÓN(letra)</option>';
        echo '<option value="{et_fecha_anio}">AÑO DE ELEBORACIÓN</option>';
        echo '<option value="{et_fecha_hora}">HORA DE ELEBORACIÓN</option>';
        echo '<option value="{et_nombre_establecimiento}">NOMBRE DE LA CLÍNICA O CONSULTORIO</option>';
        echo '<option value="{et_nombre_a_establecimiento}">NOMBRE ABREVIADO DE LA CLÍNICA O CONSULTORIO</option>';
        echo '<option value="{et_nombre_medico_atiende}">NOMBRE DEL PERSONAL MÉDICO QUE ATIENDE</option>';
        echo '<option value="{et_nombre_procedimiento}">NOMBRE DEL PROCEDIMIENTO O SERVICIO</option>';
        echo '<option value="{et_numero_est_ov}">NÚMERO DE CONCEPTO DE LA ORDEN</option>';
        echo '<option value="{et_total_cntos_ov}">TOTAL DE CONCEPTOS DE LA ORDEN</option>';
        echo '<option value="{et_firma_medico_atiende}">FIRMA DEL PERSONAL MÉDICO QUE ATIENDE</option>';
        echo '<option value="{et_nombre_medico_refiere}">NOMBRE DEL MÉDICO QUE REFIERE</option>';
        echo '<option value="{et_nombre_universidad}">NOMBRE DE LA UNIVERSIDAD DEL PERSONAL MÉDICO</option>';
        echo '<option value="{et_nombre_paciente}">NOMBRE DEL PACIENTE</option>';
        echo '<option value="{et_referencia}">NÚMERO DE REFERENCIA</option>';
        echo '<option value="{et_muestra}">MUESTRA(S) DEL ESTUDIO</option>';
        echo '<option value="{et_metodo}">MÉTODO(S) DEL ESTUDIO</option>';
        echo '<option value="{et_peso_g}">PESO DEL PACIENTE</option>';
        echo '<option value="{et_talla_g}">TALLA DEL PACIENTE</option>';
        echo '<option value="{et_sex}">SEXO DEL PACIENTE</option>';
        echo '<option value="{et_sv}">SIGNOS VITALES DEL PACIENTE</option>';
        echo '<option value="{et_t}">SIGNO VITAL T DEL PACIENTE</option>';
        echo '<option value="{et_a}">SIGNO VITAL A DEL PACIENTE</option>';
        echo '<option value="{et_fc}">SIGNO VITAL FC DEL PACIENTE</option>';
        echo '<option value="{et_fr}">SIGNO VITAL FR DEL PACIENTE</option>';
        echo '<option value="{et_temp}">SIGNO VITAL TEMP DEL PACIENTE</option>';
        echo '<option value="{et_tiposan}">TIPO SANGUÍNEO DEL PACIENTE</option>';
        echo '<option value="{et_titulom}">TÍTULO DEL PERSONAL MÉDICO</option>';
        echo '<option value="{et_logo_suc}">LOGO DE LA SUCURSAL</option>';
        echo '<option value="{et_logoe}">LOGO ESCUELA DEL MÉDICO</option>';
        echo '<option value="{et_logoee}">LOGO ESCUELA ESPECIALIDAD DEL MÉDICO</option>';
        echo '<option value="{et_logogm}">LOGO GENERAL MEDICINA</option>';
    }

    public function check_formato(Request $request){
        $idUsuario = $request->get("idU");
        $idSucursal = $request->get("idSucursal");

        $resultR = DB::select( DB::raw("SELECT formato_sm_su from sucursales where id_su = $idSucursal") )[0];

        if($resultR->formato_sm_su == ''){
            //Entonces checamos si hay un formato desde la configuración principal
            $resultR1 = DB::select( DB::raw("SELECT formato_sm_cf from configuracion order by id_cf desc limit 1") )[0];

            if($resultR->formato_sm_su == ''){
                echo '';
            }else{
                echo $resultR1->formato_sm_cf;
            }
        }else{
            echo $resultR->formato_sm_su;
        }
    }

    public function check_formato_Individual(){
        $idUsuario = $_POST["idU"];
        $idSucursal = $_POST["idSucursal"];
        $idE = $_POST["idE"];

        $resultR2 = DB::select( DB::raw("SELECT formato from conceptos where id_to = $idE") )[0];

        if($resultR2->formato == ''){

            $resultR = DB::select( DB::raw("SELECT formato_sm_su from sucursales where id_su = $idSucursal") )[0];

            if($resultR->formato_sm_su ==''){
                //Entonces checamos si hay un formato desde la configuración principal
                $resultR1 = DB::select( DB::raw("SELECT formato_sm_cf from configuracion order by id_cf desc limit 1") )[0];

                if($resultR->formato_sm_su ==''){
                    echo '';
                }else{
                    echo $resultR1->formato_sm_cf;
                }
            }else{
                echo $resultR->formato_sm_su;
            }
        }else{
            echo $resultR2->formato;
        }
    }
    
    public function addServicio_m(){
        $idUsuario = $_POST["idUsuarioE"];
        $nombre = strtoupper($_POST["nombreE"]);
        $precio = $_POST["precioE"];
        $precioU = $_POST["precioUrgenciaE"];
        $precioM = $_POST["precioME"];
        $precioMU = $_POST["precioUrgenciaME"];
        $precioH = $_POST["precioHO"];
        $precioS = $_POST["precioES"];
        $precioSU = $_POST["precioUrgenciaS"];
        $precioMa = $_POST["precioEM"];
        $precioMaU = $_POST["precioUrgenciaM"];
        $formato = $_POST["input"];
        $now = date('Y-m-d H:i:s');
        $noTemp = date('Y-m-d-H-i-s');

        //primero tenemos que saber si existe su tabulador, sino entnces escogemos el tabulador base
        $tabu = $_POST['miSucursalNS'].'_precio';
        $resultT = DB::select( DB::raw("SHOW COLUMNS FROM conceptos LIKE '$tabu'") );
        $existsT = (count($resultT))?TRUE:FALSE;
        if($existsT) {
            $precio_nor = $_POST['miSucursalNS'].'_precio';
            $precio_ur = $_POST['miSucursalNS'].'_precio_u';

            $sql = "INSERT INTO conceptos (usuario_to, concepto_to, $precio_nor, $precio_ur, formato, fecha_to, id_departamento_to, id_tipo_concepto_to, precio_to, precio_urgencia_to, precio1_to, precio_urgencia1_to, aleatorio_c, id_area_to, precio_m, precio_mu, precio_h, costo_maquila_to, costo_maquila_u_to)";
            $sql.= "VALUES ($idUsuario, '$nombre', $precio, $precioU, '$formato', '$now', 4, 2, $precio, $precioU, $precioS, $precioSU, '$noTemp', 21, $precioM, $precioMU, $precioH, $precioMa, $precioMaU)";
        }else{

            $sql = "INSERT INTO conceptos (usuario_to, concepto_to, precio_to, precio_urgencia_to, formato, fecha_to, id_departamento_to, id_tipo_concepto_to, precio1_to, precio_urgencia1_to, aleatorio_c, id_area_to, precio_m, precio_mu, precio_h, costo_maquila_to, costo_maquila_u_to)";
            $sql.= "VALUES ($idUsuario, '$nombre', $precio, $precioU, '$formato', '$now', 4, 2, $precioS, $precioSU, '$noTemp', 21, $precioM, $precioMU, $precioH, $precioMa, $precioMaU)";
        }

        $update = DB::select( DB::raw($sql) );

        echo 1;
    }

    public function fichaEstudio(){
        $idE = $_POST["idE"];

        //primero tenemos que saber si existe su tabulador, sino entnces escogemos el tabulador base
        $tabu = $_POST['idSucursal'].'_precio';
        $resultT = DB::select( DB::raw("SHOW COLUMNS FROM conceptos LIKE '$tabu'") );
        $existsT = (count($resultT))?TRUE:FALSE;
        if($existsT) {
            $precio_nor = $_POST['idSucursal'].'_precio';
            $precio_ur = $_POST['idSucursal'].'_precio_u';
        }else{
            $precio_nor = 'precio_to';
            $precio_ur = 'precio_urgencia_to';
        }

        $sql = "SELECT concepto_to, id_area_to, precio_to, precio_urgencia_to, formato, precio_to, precio_urgencia_to, ".$precio_nor.", ".$precio_ur.", 
                dicom, precio_m, precio_mu, precio_h, costo_maquila_to, costo_maquila_u_to from conceptos where id_to = $idE ";

        $row = DB::select( DB::raw($sql) )[0];
        $datos = "";
        $conta = 0;
        foreach ($row as $item) {
            if($conta != 0){
                if($conta == 4){
                    $datos .= "*}".$item;
                    $datos .= "*}".$row->precio_to;
                    $datos .= "*}".$row->precio_urgencia_to;
                }else{
                    $datos .= "*}".$item;
                }
            }else{
                $datos .= $item;
            }
            $conta = $conta+1;
        }

        return $datos;
    }

    public function updateServicio_m(){
        $idEstudio = $_POST["idEstudioE"];
        $idUsuario = $_POST["idUsuarioE"];
        $nombre = strtoupper($_POST["nombreE"]);
        $precio = $_POST["precioE"];
        $precioU = $_POST["precioUrgenciaE"];

        $precioM = $_POST["precioME"];
        $precioMU = $_POST["precioUrgenciaME"];
        $precioH = $_POST["precioHO"];

        $formato = $_POST["input"];
        $now = date('Y-m-d H:i:s');
        $noTemp = date('Y-m-d-H-i-s');
        $precioMa = $_POST["precioEM"];
        $precioMau = $_POST["precioUrgenciaM"];
        $precioSu = $_POST["precioES"];
        $precioSuu = $_POST["precioUrgenciaS"];

        //primero tenemos que saber si existe su tabulador, sino entnces escogemos el tabulador base
        $tabu = $_POST['miSucursalNS'].'_precio';
        $resultT = DB::select( DB::raw("SHOW COLUMNS FROM conceptos LIKE '$tabu'") );
        $existsT = (count($resultT))?TRUE:FALSE;
        if($existsT) {
            $precio_nor = $_POST['miSucursalNS'].'_precio';
            $precio_ur = $_POST['miSucursalNS'].'_precio_u';

            $sql = "UPDATE conceptos set concepto_to = '".$nombre."', $precio_nor = $precio, $precio_ur = $precioU, precio_to = $precio, precio_urgencia_to = $precioU, precio1_to = $precioSu, precio_urgencia1_to = $precioSuu, formato = '$formato', precio_m = $precioM, precio_mu = $precioMU, precio_h = $precioH, costo_maquila_to = $precioMa, costo_maquila_u_to = $precioMau where id_to = $idEstudio";
        }else{
            $sql = "UPDATE conceptos set concepto_to = '".$nombre."', precio_to = $precioMa, precio_urgencia_to = $precioMau, precio1_to = $precioSu, precio_urgencia1_to = $precioSuu, formato = '$formato', precio_m = $precioM, precio_mu = $precioMU, precio_h = $precioH, costo_maquila_to = $precioMa, costo_maquila_u_to = $precioMau where id_to = $idEstudio";
        }

        $row = DB::select( DB::raw($sql) );

        return 1;
    }

}