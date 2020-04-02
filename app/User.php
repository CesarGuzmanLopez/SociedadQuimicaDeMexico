<?php

namespace App; 
use App\Traits\HasRolesAndPermissions;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


/**
 * The attributes that are mass assignable
 * @property string $name
 * @property string $email
 * @property string $Telefono
 * @property date $Fecha_De_Nacimiento
 * @property string $url_Pagina_Personal
 * @property boolean $Visble_perfil
 * @property boolean $recibir_Correos
 * @property float $puntos
 */


class User extends Authenticatable
{
    use Notifiable, HasRolesAndPermissions;    
    
    protected $fillable = [
        'name', 'Apellido', 'Telefono', 'Fecha_De_Nacimiento','url_Pagina_Personal',
        'Visble_perfil',  'recibir_Correos', 'puntos', 'email', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays. 
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
