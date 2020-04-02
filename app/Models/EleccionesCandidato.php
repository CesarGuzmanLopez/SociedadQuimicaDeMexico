<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EleccionesCandidato
 * 
 * @property int $id
 * @property int $ID_Candidato
 * @property int $ID_lista
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property EleccionesListaCandOpc $elecciones_lista_cand_opc
 * @property Collection|EleccionesVotosEnUrna[] $elecciones_votos_en_urnas
 *
 * @package App\Models
 */
class EleccionesCandidato extends Model
{
	protected $table = 'elecciones_candidatos';

	protected $casts = [
		'ID_Candidato' => 'int',
		'ID_lista' => 'int'
	];

	protected $fillable = [
		'ID_Candidato',
		'ID_lista'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_Candidato');
	}

	public function elecciones_lista_cand_opc()
	{
		return $this->belongsTo(EleccionesListaCandOpc::class, 'ID_lista');
	}

	public function elecciones_votos_en_urnas()
	{
		return $this->hasMany(EleccionesVotosEnUrna::class, 'ID_candidatos');
	}
}
