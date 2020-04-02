<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SeccionesSqm
 * 
 * @property int $id
 * @property int $ID_User
 * @property int $ID_Pagina_Interna
 * @property string $path_Images
 * @property string $tipo
 * @property string $Descripcion
 * @property Carbon $Inicio
 * @property Carbon $fin
 * @property string $Nombre_Seccion
 * @property int $Presidente
 * @property int $Vicepresidente
 * @property int $Secretario
 * @property int $Prosecretario
 * @property int $Tesorero
 * @property int $Protesorero
 * @property int $Vocal_1
 * @property int $Vocal_2
 * @property int $Vocal_3
 * @property int $Vocal_4
 * @property int $Vocal_5
 * @property int $Vocal_6
 * @property int $Profesor_Tutor_1
 * @property int $Profesor_Tutor_2
 * @property int $Profesor_Tutor_3
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Pagina $pagina
 * @property User $user
 *
 * @package App\Models
 */
class SeccionesSqm extends Model
{
	protected $table = 'secciones_sqm';

	protected $casts = [
		'ID_User' => 'int',
		'ID_Pagina_Interna' => 'int',
		'Presidente' => 'int',
		'Vicepresidente' => 'int',
		'Secretario' => 'int',
		'Prosecretario' => 'int',
		'Tesorero' => 'int',
		'Protesorero' => 'int',
		'Vocal_1' => 'int',
		'Vocal_2' => 'int',
		'Vocal_3' => 'int',
		'Vocal_4' => 'int',
		'Vocal_5' => 'int',
		'Vocal_6' => 'int',
		'Profesor_Tutor_1' => 'int',
		'Profesor_Tutor_2' => 'int',
		'Profesor_Tutor_3' => 'int'
	];

	protected $dates = [
		'Inicio',
		'fin'
	];

	protected $hidden = [
		'Prosecretario'
	];

	protected $fillable = [
		'ID_User',
		'ID_Pagina_Interna',
		'path_Images',
		'tipo',
		'Descripcion',
		'Inicio',
		'fin',
		'Nombre_Seccion',
		'Presidente',
		'Vicepresidente',
		'Secretario',
		'Prosecretario',
		'Tesorero',
		'Protesorero',
		'Vocal_1',
		'Vocal_2',
		'Vocal_3',
		'Vocal_4',
		'Vocal_5',
		'Vocal_6',
		'Profesor_Tutor_1',
		'Profesor_Tutor_2',
		'Profesor_Tutor_3'
	];

	public function pagina()
	{
		return $this->belongsTo(Pagina::class, 'ID_Pagina_Interna');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'Vocal_6');
	}
}
