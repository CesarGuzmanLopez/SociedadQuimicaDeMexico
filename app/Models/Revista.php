<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Revista
 * 
 * @property int $id
 * @property string $Nombre_Revista
 * @property string $Descripcion
 * @property Carbon $Fecha_Expedida
 * @property string $Autores
 * @property int $ID_User
 * @property int $ID_Categoria
 * @property int $Numero_de_descargas
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Categoria $categoria
 * @property User $user
 *
 * @package App\Models
 */
class Revista extends Model
{
	protected $table = 'revistas';

	protected $casts = [
		'ID_User' => 'int',
		'ID_Categoria' => 'int',
		'Numero_de_descargas' => 'int'
	];

	protected $dates = [
		'Fecha_Expedida'
	];

	protected $fillable = [
		'Nombre_Revista',
		'Descripcion',
		'Fecha_Expedida',
		'Autores',
		'ID_User',
		'ID_Categoria',
		'Numero_de_descargas'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'ID_Categoria');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
