<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Group
 * 
 * @property int $id
 * @property string $name
 * @property int $ID_User
 * @property int $ID_Rol
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Role $role
 * @property User $user
 * @property Collection|Group[] $groups
 *
 * @package App\Models
 */
class Group extends Model
{
	protected $table = 'groups';

	protected $casts = [
		'ID_User' => 'int',
		'ID_Rol' => 'int'
	];

	protected $fillable = [
		'name',
		'ID_User',
		'ID_Rol'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'ID_Rol');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function groups()
	{
		return $this->hasMany(Group::class, 'ID_group');
	}
}
