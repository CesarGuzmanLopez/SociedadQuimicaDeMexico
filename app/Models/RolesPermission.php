<?php
/**
 *
 * Creado Usando  Reliese Model.
 * @author Cesar Gerardo Guzman López
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RolesPermission
 * 
 * @property int $role_id
 * @property int $permission_id
 * @property bool $Verificado
 * 
 * @property Permission $permission
 * @property Role $role
 *
 * @package App\Models
 */
class RolesPermission extends Model
{
	protected $table = 'roles_permissions';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'role_id' => 'int',
		'permission_id' => 'int',
		'Verificado' => 'bool'
	];

	protected $fillable = [
		'Verificado'
	];
/**
 *  Usuario tiene permiso
 * @return Permission
 */
	public function permission()
	{
		return $this->belongsTo(Permission::class);
	}
/**
 * Usuario tiene Role
 * @return  Role
 */
	public function role()
	{
		return $this->belongsTo(Role::class);
	}
}
