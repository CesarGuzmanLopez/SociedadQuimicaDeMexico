<?php

/**
 * 
 * Creado Usando  Reliese Model.
 * @author Cesar Gerardo Guzman López
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * @property string $Valor  Valor jerarquico que tiene este rol
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Descuento[] $descuentos
 * @property Collection|Group[] $groups
 * @property Collection|Membresia[] $membresias
 * @property Collection|Permission[] $permissions
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'roles';

	protected $fillable = [
		'name',
		'slug',
	    'Valor',
	];
/**
 * Regresa los descuento que podria tener este rol
 * @return Descuento
 */
	
	public function descuentos()
	{
		return $this->hasMany(Descuento::class, 'ID_Rol_Descuento');
	}
    /**
     * 
     * @return Group
     */
	public function groups()
	{
		return $this->hasMany(Group::class, 'ID_Rol');
	}
    /**
     * El rol que recibiria al escojer una membresia
     * @return Membresia
     */
	public function membresias()
	{
		return $this->hasMany(Membresia::class, 'ID_Rol_A_Recibir');
	}
    	
    /**
     * Que permisos tiene este rol
     * @return Permission
     */
	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'roles_permissions')->withPivot('Verificado');
	} 
	/**
	 * Los usuarios que tienen este rol
	 * @return User
	 */
	public function users()
	{
		return $this->belongsToMany(User::class, 'users_roles');
	}
}
