<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersPermission
 * 
 * @property int $user_id
 * @property int $permission_id
 * 
 * @property Permission $permission
 * @property User $user
 *
 * @package App\Models
 */
class UsersPermission extends Model
{
	protected $table = 'users_permissions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int',
		'permission_id' => 'int'
	];

	public function permission()
	{
		return $this->belongsTo(Permission::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
