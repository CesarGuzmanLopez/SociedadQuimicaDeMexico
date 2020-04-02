<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categoria
 * 
 * @property int $id
 * @property string $Categoria
 * @property string $Comentarios
 * @property int $ID_User
 * @property int $ID_Permiso
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Permission $permission
 * @property User $user
 * @property Collection|Publicacione[] $publicaciones
 * @property Collection|RecursosDigitale[] $recursos__digitales
 * @property Collection|Revista[] $revistas
 *
 * @package App\Models
 */
class Categoria extends Model
{
	protected $table = 'categorias';

	protected $casts = [
		'ID_User' => 'int',
		'ID_Permiso' => 'int'
	];

	protected $fillable = [
		'Categoria',
		'Comentarios',
		'ID_User',
		'ID_Permiso'
	];

	public function permission()
	{
		return $this->belongsTo(Permission::class, 'ID_Permiso');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function publicaciones()
	{
		return $this->hasMany(Publicacione::class, 'ID_Categoria');
	}

	public function recursos__digitales()
	{
		return $this->hasMany(RecursosDigitale::class, 'ID_Categoria');
	}

	public function revistas()
	{
		return $this->hasMany(Revista::class, 'ID_Categoria');
	}
}
