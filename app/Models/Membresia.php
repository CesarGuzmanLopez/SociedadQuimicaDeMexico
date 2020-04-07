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
 * Class Membresia
 * 
 * @property int $id
 * @property float $Costo
 * @property string $Duracion
 * @property Carbon $Inicio_Disponibilidad
 * @property Carbon $fin_disponibilidad
 * @property int $ID_Rol_A_Recibir
 * @property int $ID_Rol_A_Necesario
 * @property int $ID_Rol_Incopatible
 * @property bool $Activo
 * @property int $ID_User
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Role $role
 * @property User $user
 * @property Collection|UsuarioMembresium[] $usuario_membresia
 * @property Collection|UsuariosMembresia[] $usuarios__membresias
 *
 * @package App\Models
 */
class Membresia extends Model
{
	protected $table = 'membresias';

	protected $casts = [
		'Costo' => 'float',
		'ID_Rol_A_Recibir' => 'int',
		'ID_Rol_A_Necesario' => 'int',
		'ID_Rol_Incopatible' => 'int',
		'Activo' => 'bool',
		'ID_User' => 'int'
	];

	protected $dates = [
		'Inicio_Disponibilidad',
		'fin_disponibilidad'
	];

	protected $fillable = [
		'Costo',
		'Duracion',
		'Inicio_Disponibilidad',
		'fin_disponibilidad',
		'ID_Rol_A_Recibir',
		'ID_Rol_A_Necesario',
		'ID_Rol_Incopatible',
		'Activo',
		'ID_User'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'ID_Rol_A_Recibir');
	} 
	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function usuario_membresia()
	{
		return $this->hasMany(UsuarioMembresium::class, 'ID_Membresia');
	}

	public function usuarios__membresias()
	{
		return $this->hasMany(UsuariosMembresia::class, 'ID_Membresia');
	}
}
