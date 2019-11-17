<?php


namespace App\Http\Controllers\Administracion;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class FormatosController extends Controller {

    public function index(){
        return view('administracion/formatos');
    }

    public function getTableFormatos(Request $request){

        $data = DB::table('formatos AS f')
        ->select('*')
        ->join('usuarios AS u', 'u.id_u', '=', 'f.usuario_fo')
        ->get();
        $iTotal = count($data);
        if($request->get('sSearch') != "" ){
            $buscar = "%".$request->get('sSearch')."%";
        }else{
            $buscar = "%%";
        }
        if($request->get('sSearch_1') != ""){
            $buscar = "%".$request->get('sSearch_1')."%";
        }

        $data = DB::table('formatos AS f')
        ->join('usuarios AS u', 'u.id_u', '=', 'f.usuario_fo')
        ->select('f.id_fo', 'f.nombre_fo',
            DB::raw('concat(u.nombre_u," ", u.apaterno_u) as nombre'),
            DB::raw('DATE_FORMAT(f.fecha_nm,"%d/%c/%Y") as fecha'))
        ->whereRaw("u.nombre_u like '".$buscar."' OR u.apaterno_u like '".$buscar."' OR nombre_fo like '".$buscar."'")
        ->get();
        $iFilteredTotal = count($data);
        $rows = array();
        foreach ($data as $key => $item) {
            $row[0] = "<span>".($key+1)."</span>";
            $row[1] = '<span lang="'.$item->nombre_fo.'" 
            onClick="ficha_formato(this.lang, '.$item->id_fo.')" style="cursor:pointer; text-decoration:underline;" class="text-info">
            '.$item->nombre_fo.'</span>';
            $row[2] = $item->nombre;
            $row[3] = $item->fecha;
            array_push($rows, $row);
        }
        $output = array(
            "sEcho" => intval($_GET['sEcho']),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => $rows
        );
        return json_encode($output);
    }

    public function getFichaFormato(){
        return view('htmls.administracion.ficha_formato');
    }

    public function addFormato(Request $request){
        $usuario = Auth::id();
        $now = date('Y-m-d H:i:s');
        $nombre = strtoupper($request->get("nombre"));
        $formato = $request->get("formato");
        $id = DB::table('formatos')->insertGetId([
            'nombre_fo' => $nombre,
            'formato_fo' => $formato,
            'usuario_fo' => $usuario,
            'fecha_nm' => $now
            ]
        );
        return $id > 0 ? 1:0;
    }

    public function getFicha(Request $request){
        $id_formato = $request->get('id_f');

        $contenido = DB::table('formatos')
        ->select('formato_fo')
        ->where(['id_fo' => $id_formato])
        ->first();

        return $contenido->formato_fo;
    }

    public function updateFormato(Request $request){
        $id_formato = $request->get('id_f');
        $formato = $request->get('formato');
        $nombre = $request->get('nombre');
        $usuario = Auth::id();
        DB::table('formatos')
        ->where('id_fo', $id_formato)
        ->update([
            'nombre_fo' => $nombre,
            'formato_fo' => $formato,
            'usuario_fo' => $usuario
        ]);
        return 1;
    }

}