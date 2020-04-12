<?php

/**
 * @author Usuario tiene membresia
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuarioMembresium
 * 
 * @property int $ID_User
 * @property int $ID_Membresia
 * @property Carbon $Inicio
 * @property Carbon $Fin
 * 
 * @property Membresia $membresia
 * @property User $user
 *
 * @package App\Models
 */
class UsuarioMembresium extends Model
{
	protected $table = 'usuario_membresia';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID_User' => 'int',
		'ID_Membresia' => 'int'
	];

	protected $dates = [
		'Inicio',
		'Fin'
	];

	protected $fillable = [
		'Inicio',
		'Fin'
	];

	public function membresia()
	{
		return $this->belongsTo(Membresia::class, 'ID_Membresia');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
