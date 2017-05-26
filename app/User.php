<?php

namespace Ifiix;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    protected $fillable = ['name', 'email', 'password', 'perfil_id'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    public function setPasswordAttribute($valor){ //funcion para el encriptado de la contraseña del usuario al editar
        if(!empty($valor)){ //si el campo no esta vacio en la edicion se cambia y se encripta
         $this->attributes['password'] = \Hash::make($valor); 
        } 
    }


    public function perfil()
    {
        return $this->belongsTo('Ifiix\Perfil');
    }


        public function sucursal()
    {
        return $this->belongsTo('Ifiix\Sucursal');
    }


     public function user()
    {
        return $this->hasOne('Ifiix\User');
    }

        public function compras()//para poder identificar al mensajero asignado
    {
        return $this->hasOne('Ifiix\Compras');
    }
}
