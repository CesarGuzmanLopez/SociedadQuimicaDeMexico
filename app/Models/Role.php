<?php

/**
 * Created by Reliese Model.
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
		'slug'
	];

	public function descuentos()
	{
		return $this->hasMany(Descuento::class, 'ID_Rol_Descuento');
	}

	public function groups()
	{
		return $this->hasMany(Group::class, 'ID_Rol');
	}

	public function membresias()
	{
		return $this->hasMany(Membresia::class, 'ID_Rol_Incopatible');
	}

	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'roles_permissions')
					->withPivot('Verificado');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'users_roles');
	}
}
