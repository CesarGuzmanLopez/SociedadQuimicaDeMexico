<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RecursosDigitale
 * 
 * @property int $id
 * @property string $emisor
 * @property string $Descripcion
 * @property Carbon $Fecha_Expedido
 * @property string $Autores
 * @property int $Numero_Descargas
 * @property string $Tipo
 * @property int $ID_Publicacion
 * @property int $ID_Categoria
 * @property int $ID_User
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Categoria $categoria
 * @property Publicacione $publicacione
 * @property User $user
 *
 * @package App\Models
 */
class RecursosDigitale extends Model
{
	protected $table = 'recursos__digitales';

	protected $casts = [
		'Numero_Descargas' => 'int',
		'ID_Publicacion' => 'int',
		'ID_Categoria' => 'int',
		'ID_User' => 'int'
	];

	protected $dates = [
		'Fecha_Expedido'
	];

	protected $fillable = [
		'emisor',
		'Descripcion',
		'Fecha_Expedido',
		'Autores',
		'Numero_Descargas',
		'Tipo',
		'ID_Publicacion',
		'ID_Categoria',
		'ID_User'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'ID_Categoria');
	}

	public function publicacione()
	{
		return $this->belongsTo(Publicacione::class, 'ID_Publicacion');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
