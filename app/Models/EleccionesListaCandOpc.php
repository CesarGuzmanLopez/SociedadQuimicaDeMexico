<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EleccionesListaCandOpc
 * 
 * @property int $id
 * @property int $ID_User
 * @property string $TipoCandidato
 * @property int $Id_Pagina
 * @property int $Id_Votacion
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Pagina $pagina
 * @property User $user
 * @property EleccionesEleccion $elecciones_eleccion
 * @property Collection|EleccionesCandidato[] $elecciones_candidatos
 * @property Collection|EleccionesOpcione[] $elecciones_opciones
 *
 * @package App\Models
 */
class EleccionesListaCandOpc extends Model
{
	protected $table = 'elecciones_lista_cand_opc';

	protected $casts = [
		'ID_User' => 'int',
		'Id_Pagina' => 'int',
		'Id_Votacion' => 'int'
	];

	protected $fillable = [
		'ID_User',
		'TipoCandidato',
		'Id_Pagina',
		'Id_Votacion'
	];

	public function pagina()
	{
		return $this->belongsTo(Pagina::class, 'Id_Pagina');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function elecciones_eleccion()
	{
		return $this->belongsTo(EleccionesEleccion::class, 'Id_Votacion');
	}

	public function elecciones_candidatos()
	{
		return $this->hasMany(EleccionesCandidato::class, 'ID_lista');
	}

	public function elecciones_opciones()
	{
		return $this->hasMany(EleccionesOpcione::class, 'ID_lista');
	}
}
