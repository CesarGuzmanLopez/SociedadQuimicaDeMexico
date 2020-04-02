<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriasDeProducto
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $ID_User
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|CategoriasRelProducto[] $categorias_rel_productos
 *
 * @package App\Models
 */
class CategoriasDeProducto extends Model
{
	protected $table = 'categorias_de_productos';

	protected $casts = [
		'ID_User' => 'int'
	];

	protected $fillable = [
		'name',
		'slug',
		'ID_User'
	];

	public function categorias_rel_productos()
	{
		return $this->hasMany(CategoriasRelProducto::class, 'ID_Categoria');
	}
}
