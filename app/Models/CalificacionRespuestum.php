<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CalificacionRespuestum
 * 
 * @property int $user_id
 * @property int $ID_Respuesta
 * @property int $Calificacion
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Respuesta $respuesta
 * @property User $user
 *
 * @package App\Models
 */
class CalificacionRespuestum extends Model
{
	protected $table = 'calificacion_respuesta';
	public $incrementing = false;

	protected $casts = [
		'user_id' => 'int',
		'ID_Respuesta' => 'int',
		'Calificacion' => 'int'
	];

	protected $fillable = [
		'Calificacion'
	];

	public function respuesta()
	{
		return $this->belongsTo(Respuesta::class, 'ID_Respuesta');
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
