<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EleccionesEleccion
 * 
 * @property int $id
 * @property int $ID_User
 * @property string $Votacion_Nombre
 * @property string $Descripcion
 * @property int $Id_Pagina
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Pagina $pagina
 * @property User $user
 * @property Collection|EleccionesListaCandOpc[] $elecciones_lista_cand_opcs
 * @property Collection|EleccionesListaVotante[] $elecciones_lista_votantes
 * @property Collection|EleccionesUrna[] $elecciones_urnas
 *
 * @package App\Models
 */
class EleccionesEleccion extends Model
{
	protected $table = 'elecciones_eleccion';

	protected $casts = [
		'ID_User' => 'int',
		'Id_Pagina' => 'int'
	];

	protected $fillable = [
		'ID_User',
		'Votacion_Nombre',
		'Descripcion',
		'Id_Pagina'
	];

	public function pagina()
	{
		return $this->belongsTo(Pagina::class, 'Id_Pagina');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function elecciones_lista_cand_opcs()
	{
		return $this->hasMany(EleccionesListaCandOpc::class, 'Id_Votacion');
	}

	public function elecciones_lista_votantes()
	{
		return $this->hasMany(EleccionesListaVotante::class, 'Id_Votacion');
	}

	public function elecciones_urnas()
	{
		return $this->hasMany(EleccionesUrna::class, 'Id_Votacion');
	}
}
