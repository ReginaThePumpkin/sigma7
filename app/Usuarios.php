<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuarios extends Authenticatable
{
    use Notifiable;

    //protected $table = 'usuarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_u','usuario_u', 'email_u', 'password','nombre_u','apaterno_u', 'amaterno_u','acceso_u', 'sexo_u', 'idSucursal_u', 'multisucursal_u','permisos_u'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'id_u';

    public function getNameAttribute(){
        return $this->usuario_u;
    }

    public function getDataAttribute(){
        $permisos = array();

        for($a = 0; $a < 47 && $a < strlen($this->permisos_u); $a++){
            $permisos[$a] = $this->permisos_u[$a];
        }

        return array(
            'id' => $this->id_u,
            'usuario' => $this->usuario_u,
            'fullname' => $this->nombre_u.' '.$this->apaterno_u,
            'lastname' => $this->amaterno_u,
            'acceso' => $this->acceso_u,
            'sexo' => $this->sexo_u,
            'sucursal' => $this->idSucursal_u,
            'multisucursal' => $this->multisucursal_u,
            'permisos' => $permisos
        );
    }

    /*public function username(){
        return 'email_u';
    }*/

    
/*
    public function credentials(Request $request)
{
    return $request->only($this->username()) + ['password' => $request->input('your_form_field')];
}*/
}
