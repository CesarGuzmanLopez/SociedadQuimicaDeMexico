<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EleccionesVotante
 * 
 * @property int $ID_Lista_votantes
 * @property int $ID_User
 * @property string $Voto_Encriptado
 * @property string $password
 * @property Carbon $Tiempo_Voto
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property bool $Aceptado
 * 
 * @property EleccionesListaVotante $elecciones_lista_votante
 * @property User $user
 *
 * @package App\Models
 */
class EleccionesVotante extends Model
{
	protected $table = 'elecciones_votantes';
	public $incrementing = false;

	protected $casts = [
		'ID_Lista_votantes' => 'int',
		'ID_User' => 'int',
		'Aceptado' => 'bool'
	];

	protected $dates = [
		'Tiempo_Voto'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'Voto_Encriptado',
		'password',
		'Tiempo_Voto',
		'Aceptado'
	];

	public function elecciones_lista_votante()
	{
		return $this->belongsTo(EleccionesListaVotante::class, 'ID_Lista_votantes');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
