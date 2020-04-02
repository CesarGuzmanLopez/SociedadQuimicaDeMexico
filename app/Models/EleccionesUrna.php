<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EleccionesUrna
 * 
 * @property int $id
 * @property string $llave_Privada
 * @property int $Id_Votacion
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property EleccionesEleccion $elecciones_eleccion
 * @property Collection|EleccionesVotosEnUrna[] $elecciones_votos_en_urnas
 *
 * @package App\Models
 */
class EleccionesUrna extends Model
{
	protected $table = 'elecciones_urnas';

	protected $casts = [
		'Id_Votacion' => 'int'
	];

	protected $fillable = [
		'llave_Privada',
		'Id_Votacion'
	];

	public function elecciones_eleccion()
	{
		return $this->belongsTo(EleccionesEleccion::class, 'Id_Votacion');
	}

	public function elecciones_votos_en_urnas()
	{
		return $this->hasMany(EleccionesVotosEnUrna::class, 'id_urna');
	}
}
