<?php

/**
 * 
 * Creado Usando  Reliese Model.
 * @author Cesar Gerardo Guzman López
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 * @property int $user_id
 * @property int $role_id
 * 
 * @property Role $role
 * @property User $user
 *
 * @package App\Models
 */
class UsersRole extends Model
{
	protected $table = 'users_roles';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'role_id' => 'int'
	];
/**
 * 
 * @return  Role
 */
	public function role()
	{
		return $this->belongsTo(Role::class);
	}
/**
 * 
 * @return User
 */
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
