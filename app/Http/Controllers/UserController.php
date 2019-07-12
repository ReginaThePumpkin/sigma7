<?php

namespace sigma7\Http\Controllers;

use Illuminate\Http\Request;
use sigma7\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function dameUsuario($id){
    	$usuario=DB::table('usuarios')->where('id_u',$id)->first();
    	return array(
    		'user'=>$usuario
    	);
    }
    public function invalidar($id){
    	DB::table('usuarios')
    		->where('id_u',$id)
    		->update(array('validado_u'=>0));
    }

    public function validar($id){
    	DB::table('usuarios')
    		->where('id_u',$id)
    		->update(array('validado_u'=>1));
    }
    public function eliminar($id){
    	DB::table('usuarios')->where('id_u',$id)->delete();
    }
    public function parseLogin(Request $request){
    	
    }
}
