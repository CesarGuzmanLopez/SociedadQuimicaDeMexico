<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EleccionesListaVotante
 * 
 * @property int $id
 * @property int $ID_User
 * @property int $Id_Votacion
 * @property string $Descripcion
 * @property bool $Activa
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property EleccionesEleccion $elecciones_eleccion
 * @property Collection|EleccionesVotante[] $elecciones_votantes
 *
 * @package App\Models
 */
class EleccionesListaVotante extends Model
{
	protected $table = 'elecciones_lista_votantes';

	protected $casts = [
		'ID_User' => 'int',
		'Id_Votacion' => 'int',
		'Activa' => 'bool'
	];

	protected $fillable = [
		'ID_User',
		'Id_Votacion',
		'Descripcion',
		'Activa'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function elecciones_eleccion()
	{
		return $this->belongsTo(EleccionesEleccion::class, 'Id_Votacion');
	}

	public function elecciones_votantes()
	{
		return $this->hasMany(EleccionesVotante::class, 'ID_Lista_votantes');
	}
}
