<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EleccionesVotosEnUrna
 * 
 * @property int $id
 * @property int $id_urna
 * @property string $Voto_Encriptado
 * @property int $ID_opciones
 * @property int $ID_candidatos
 * 
 * @property EleccionesCandidato $elecciones_candidato
 * @property EleccionesOpcione $elecciones_opcione
 * @property EleccionesUrna $elecciones_urna
 * @property EleccionesObservadore $elecciones_observadore
 *
 * @package App\Models
 */
class EleccionesVotosEnUrna extends Model
{
	protected $table = 'elecciones_votos_en_urna';
	public $timestamps = false;

	protected $casts = [
		'id_urna' => 'int',
		'ID_opciones' => 'int',
		'ID_candidatos' => 'int'
	];

	protected $fillable = [
		'id_urna',
		'Voto_Encriptado',
		'ID_opciones',
		'ID_candidatos'
	];

	public function elecciones_candidato()
	{
		return $this->belongsTo(EleccionesCandidato::class, 'ID_candidatos');
	}

	public function elecciones_opcione()
	{
		return $this->belongsTo(EleccionesOpcione::class, 'ID_opciones');
	}

	public function elecciones_urna()
	{
		return $this->belongsTo(EleccionesUrna::class, 'id_urna');
	}

	public function elecciones_observadore()
	{
		return $this->hasOne(EleccionesObservadore::class, 'id_urna');
	}
}
