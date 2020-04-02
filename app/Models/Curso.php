<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Curso
 * 
 * @property int $id
 * @property int $ID_User
 * @property int $ID_Usuario_Responsable_Curso
 * @property int $ID_Prodcuto
 * @property string $Nombre_del_curso
 * @property string $Descripcion_Curso
 * @property int $ID_pagina
 * @property string $path_Pagina
 * @property string $linea_de_tendencia
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property bool $Pagado
 * @property string $tipo_Cuso
 * @property Carbon $dia_inicia
 * @property Carbon $Dia_Finaliza
 * @property string $Hubicacion
 * 
 * @property Pagina $pagina
 * @property VariacionesProducto $variaciones_producto
 * @property User $user
 * @property Collection|AsistentesCurso[] $asistentes_cursos
 *
 * @package App\Models
 */
class Curso extends Model
{
	protected $table = 'cursos';

	protected $casts = [
		'ID_User' => 'int',
		'ID_Usuario_Responsable_Curso' => 'int',
		'ID_Prodcuto' => 'int',
		'ID_pagina' => 'int',
		'Pagado' => 'bool'
	];

	protected $dates = [
		'dia_inicia',
		'Dia_Finaliza'
	];

	protected $fillable = [
		'ID_User',
		'ID_Usuario_Responsable_Curso',
		'ID_Prodcuto',
		'Nombre_del_curso',
		'Descripcion_Curso',
		'ID_pagina',
		'path_Pagina',
		'linea_de_tendencia',
		'Pagado',
		'tipo_Cuso',
		'dia_inicia',
		'Dia_Finaliza',
		'Hubicacion'
	];

	public function pagina()
	{
		return $this->belongsTo(Pagina::class, 'ID_pagina');
	}

	public function variaciones_producto()
	{
		return $this->belongsTo(VariacionesProducto::class, 'ID_Prodcuto');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_Usuario_Responsable_Curso');
	}

	public function asistentes_cursos()
	{
		return $this->hasMany(AsistentesCurso::class, 'ID_Curso');
	}
}
