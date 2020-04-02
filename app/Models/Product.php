<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $details
 * @property int $price
 * @property string $description
 * @property string $images
 * @property int $Cantidad_Productos
 * @property bool $featured
 * @property int $ID_User
 * @property int $ID_Tipo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property TiposProducto $tipos_producto
 * @property User $user
 * @property Collection|CategoriasRelProducto[] $categorias_rel_productos
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';

	protected $casts = [
		'price' => 'int',
		'Cantidad_Productos' => 'int',
		'featured' => 'bool',
		'ID_User' => 'int',
		'ID_Tipo' => 'int'
	];

	protected $fillable = [
		'name',
		'slug',
		'details',
		'price',
		'description',
		'images',
		'Cantidad_Productos',
		'featured',
		'ID_User',
		'ID_Tipo'
	];

	public function tipos_producto()
	{
		return $this->belongsTo(TiposProducto::class, 'ID_Tipo');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function categorias_rel_productos()
	{
		return $this->hasMany(CategoriasRelProducto::class, 'ID_Producto');
	}
}
