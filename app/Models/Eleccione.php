<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Eleccione
 * 
 * @property int $id
 * @property int $ID_User
 * @property string $Nombre_Eleccion
 * @property int $Id_Pagina
 * @property string $Descripcion
 * @property Carbon $Dia_De_Publicacion
 * @property Carbon $Dia_De_Inicio_Eleccion
 * @property Carbon $Dia_fin_Votacion_Eleccion
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Pagina $pagina
 * @property User $user
 *
 * @package App\Models
 */
class Eleccione extends Model
{
	protected $table = 'elecciones';

	protected $casts = [
		'ID_User' => 'int',
		'Id_Pagina' => 'int'
	];

	protected $dates = [
		'Dia_De_Publicacion',
		'Dia_De_Inicio_Eleccion',
		'Dia_fin_Votacion_Eleccion'
	];

	protected $fillable = [
		'ID_User',
		'Nombre_Eleccion',
		'Id_Pagina',
		'Descripcion',
		'Dia_De_Publicacion',
		'Dia_De_Inicio_Eleccion',
		'Dia_fin_Votacion_Eleccion'
	];

	public function pagina()
	{
		return $this->belongsTo(Pagina::class, 'Id_Pagina');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
