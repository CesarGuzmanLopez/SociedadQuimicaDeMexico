<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pagina
 * 
 * @property int $id
 * @property string $Descripcion
 * @property string $Tipo_Pagina
 * @property string $tipo_Texto
 * @property string $url_relativa
 * @property string $Data
 * @property string $Localizacion_Interna
 * @property bool $Activa
 * @property int $ID_User
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $meta_description
 * @property string $meta_keywords
 * 
 * @property User $user
 * @property Collection|Curso[] $cursos
 * @property Collection|Eleccione[] $elecciones
 * @property Collection|EleccionesEleccion[] $elecciones_eleccions
 * @property Collection|EleccionesListaCandOpc[] $elecciones_lista_cand_opcs
 * @property Collection|EleccionesOpcion[] $elecciones_opcions
 * @property Collection|Patrocinadore[] $patrocinadores
 * @property Collection|SeccionesSqm[] $secciones_sqms
 *
 * @package App\Models
 */
class Pagina extends Model
{
	protected $table = 'paginas';

	protected $casts = [
		'Activa' => 'bool',
		'ID_User' => 'int'
	];

	protected $fillable = [
		'Descripcion',
		'Tipo_Pagina',
		'tipo_Texto',
		'url_relativa',
		'Data',
		'Localizacion_Interna',
		'Activa',
		'ID_User',
		'meta_description',
		'meta_keywords'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function cursos()
	{
		return $this->hasMany(Curso::class, 'ID_pagina');
	}

	public function elecciones()
	{
		return $this->hasMany(Eleccione::class, 'Id_Pagina');
	}

	public function elecciones_eleccions()
	{
		return $this->hasMany(EleccionesEleccion::class, 'Id_Pagina');
	}

	public function elecciones_lista_cand_opcs()
	{
		return $this->hasMany(EleccionesListaCandOpc::class, 'Id_Pagina');
	}

	public function elecciones_opcions()
	{
		return $this->hasMany(EleccionesOpcion::class, 'Id_Pagina');
	}

	public function patrocinadores()
	{
		return $this->hasMany(Patrocinadore::class, 'ID_Pagina_Interna');
	}

	public function secciones_sqms()
	{
		return $this->hasMany(SeccionesSqm::class, 'ID_Pagina_Interna');
	}
}
