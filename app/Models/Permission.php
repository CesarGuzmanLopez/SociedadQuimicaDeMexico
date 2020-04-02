<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Permission
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Categoria[] $categorias
 * @property Collection|Role[] $roles
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Permission extends Model
{
	protected $table = 'permissions';

	protected $fillable = [
		'name',
		'slug'
	];

	public function categorias()
	{
		return $this->hasMany(Categoria::class, 'ID_Permiso');
	}

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'roles_permissions')
					->withPivot('Verificado');
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'users_permissions');
	}
}
