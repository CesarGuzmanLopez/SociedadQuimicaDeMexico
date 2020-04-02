<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Respuesta
 * 
 * @property int $id
 * @property int $ID_user
 * @property int $ID_Pregunta
 * @property string $Respuesta_Pregunta
 * @property string $fuente
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Pregunta $pregunta
 * @property User $user
 * @property Collection|CalificacionRespuestum[] $calificacion_respuesta
 *
 * @package App\Models
 */
class Respuesta extends Model
{
	protected $table = 'respuestas';

	protected $casts = [
		'ID_user' => 'int',
		'ID_Pregunta' => 'int'
	];

	protected $fillable = [
		'ID_user',
		'ID_Pregunta',
		'Respuesta_Pregunta',
		'fuente'
	];

	public function pregunta()
	{
		return $this->belongsTo(Pregunta::class, 'ID_Pregunta');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_user');
	}

	public function calificacion_respuesta()
	{
		return $this->hasMany(CalificacionRespuestum::class, 'ID_Respuesta');
	}
}
