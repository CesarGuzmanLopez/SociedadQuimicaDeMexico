<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pregunta
 * 
 * @property int $id
 * @property int $ID_User
 * @property string $Estado_Mensaje
 * @property string $Pregunta
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property Collection|Respuesta[] $respuestas
 *
 * @package App\Models
 */
class Pregunta extends Model
{
	protected $table = 'preguntas';

	protected $casts = [
		'ID_User' => 'int'
	];

	protected $fillable = [
		'ID_User',
		'Estado_Mensaje',
		'Pregunta'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function respuestas()
	{
		return $this->hasMany(Respuesta::class, 'ID_Pregunta');
	}
}
