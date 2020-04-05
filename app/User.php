<?php

namespace App; 
use App\Traits\HasRolesAndPermissions;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable; 
/**
 * class User
 * @author Cesar Gerardo Guzman Lopez mail 88-8@live.com.mx
 * 
 * The attributes that are mass assignable
 * @property string $name  nombre del usuario
 * dd
 * @property string Apellido
 * @property string $email correo electronico del usuario
 * @property string $Telefono
 * @property date $Fecha_De_Nacimiento
 * @property string $url_Pagina_Personal
 * @property boolean $Visble_perfil
 * @property boolean $recibir_Correos
 * @property float $puntos
 * @property string $Nombre_de_usuario
 * @property string $remember_token
 * @property string $password
 * @property string $Codigo_Confirmacion
 * @method  User where()  where(fixed $param, fixed $param2)
 * @method  User first() first(void)
 */
class User extends Authenticatable
{
    /**
     */ 
    use Notifiable, HasRolesAndPermissions;    
    
    protected $fillable = [
        'name', 'Apellido', 'Telefono', 'Fecha_De_Nacimiento','url_Pagina_Personal',
        'Visble_perfil',  'recibir_Correos', 'puntos', 'email', 'password', 'Nombre_de_usuario',"remember_token",
        'Codigo_Confirmacion',        
    ];

    /**
     * The attributes that should be hidden for arrays. 
     * @var array
     */
    protected $hidden = [
        'id','password', 'remember_token','Codigo_Confirmacion',
        'created_at','updated_at',
        
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     *  @return password_resets
     */
    public function password_reset()
    {
        return $this->hasOne('App\password_resets',"email","email");
    }
}