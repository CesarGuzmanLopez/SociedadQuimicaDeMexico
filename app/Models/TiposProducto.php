<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TiposProducto
 * 
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class TiposProducto extends Model
{
	protected $table = 'tipos_productos';

	protected $fillable = [
		'name',
		'slug'
	];

	public function products()
	{
		return $this->hasMany(Product::class, 'ID_Tipo');
	}
}
