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
        'usuario_u', 'email_u', 'password',
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

    
/*
    public function credentials(Request $request)
{
    return $request->only($this->username()) + ['password' => $request->input('your_form_field')];
}*/
}
