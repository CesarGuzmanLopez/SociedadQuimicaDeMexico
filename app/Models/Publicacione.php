<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Publicacione
 * 
 * @property int $id
 * @property string $Titulo_Publicacion
 * @property string $Ruta_Relativa
 * @property string $Tags
 * @property string $Funte_de_Publicacion
 * @property string $Data
 * @property Carbon $Publicacion
 * @property Carbon $Vigencia
 * @property bool $Activa
 * @property int $ID_User
 * @property int $ID_Categoria
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Categoria $categoria
 * @property User $user
 * @property Collection|Congreso[] $congresos
 * @property Collection|Evento[] $eventos
 * @property Collection|RecursosDigitale[] $recursos__digitales
 *
 * @package App\Models
 */
class Publicacione extends Model
{
	protected $table = 'publicaciones';

	protected $casts = [
		'Activa' => 'bool',
		'ID_User' => 'int',
		'ID_Categoria' => 'int'
	];

	protected $dates = [
		'Publicacion',
		'Vigencia'
	];

	protected $fillable = [
		'Titulo_Publicacion',
		'Ruta_Relativa',
		'Tags',
		'Funte_de_Publicacion',
		'Data',
		'Publicacion',
		'Vigencia',
		'Activa',
		'ID_User',
		'ID_Categoria'
	];

	public function categoria()
	{
		return $this->belongsTo(Categoria::class, 'ID_Categoria');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function congresos()
	{
		return $this->hasMany(Congreso::class, 'ID_Publicacion');
	}

	public function eventos()
	{
		return $this->hasMany(Evento::class, 'ID_Publicacion');
	}

	public function recursos__digitales()
	{
		return $this->hasMany(RecursosDigitale::class, 'ID_Publicacion');
	}
}
