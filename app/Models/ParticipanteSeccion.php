<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ParticipanteSeccion
 * 
 * @property int $id
 * @property int $ID_User_alta
 * @property int $ID_tipo_Participante
 * @property int $ID_User
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property TipoParticipanteSeccion $tipo_participante_seccion
 * @property User $user
 *
 * @package App\Models
 */
class ParticipanteSeccion extends Model
{
	protected $table = 'participante_seccion';

	protected $casts = [
		'ID_User_alta' => 'int',
		'ID_tipo_Participante' => 'int',
		'ID_User' => 'int'
	];

	protected $fillable = [
		'ID_User_alta',
		'ID_tipo_Participante',
		'ID_User'
	];

	public function tipo_participante_seccion()
	{
		return $this->belongsTo(TipoParticipanteSeccion::class, 'ID_tipo_Participante');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
