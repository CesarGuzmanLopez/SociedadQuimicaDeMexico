<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoParticipanteSeccion
 * 
 * @property int $id
 * @property int $ID_User
 * @property string $Descripcion_Corta
 * @property string $Nombre_Rango
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property Collection|ParticipanteSeccion[] $participante_seccions
 *
 * @package App\Models
 */
class TipoParticipanteSeccion extends Model
{
	protected $table = 'tipo_participante_seccion';

	protected $casts = [
		'ID_User' => 'int'
	];

	protected $fillable = [
		'ID_User',
		'Descripcion_Corta',
		'Nombre_Rango'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function participante_seccions()
	{
		return $this->hasMany(ParticipanteSeccion::class, 'ID_tipo_Participante');
	}
}
