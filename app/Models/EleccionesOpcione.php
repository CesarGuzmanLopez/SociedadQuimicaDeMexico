<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EleccionesOpcione
 * 
 * @property int $id
 * @property int $ID_opcion
 * @property int $ID_lista
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property EleccionesListaCandOpc $elecciones_lista_cand_opc
 * @property EleccionesOpcion $elecciones_opcion
 * @property Collection|EleccionesVotosEnUrna[] $elecciones_votos_en_urnas
 *
 * @package App\Models
 */
class EleccionesOpcione extends Model
{
	protected $table = 'elecciones_opciones';

	protected $casts = [
		'ID_opcion' => 'int',
		'ID_lista' => 'int'
	];

	protected $fillable = [
		'ID_opcion',
		'ID_lista'
	];

	public function elecciones_lista_cand_opc()
	{
		return $this->belongsTo(EleccionesListaCandOpc::class, 'ID_lista');
	}

	public function elecciones_opcion()
	{
		return $this->belongsTo(EleccionesOpcion::class, 'ID_opcion');
	}

	public function elecciones_votos_en_urnas()
	{
		return $this->hasMany(EleccionesVotosEnUrna::class, 'ID_opciones');
	}
}
