<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriasRelProducto
 * 
 * @property int $id
 * @property int $ID_Producto
 * @property int $ID_Categoria
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property CategoriasDeProducto $categorias_de_producto
 * @property Product $product
 *
 * @package App\Models
 */
class CategoriasRelProducto extends Model
{
	protected $table = 'categorias_rel_producto';

	protected $casts = [
		'ID_Producto' => 'int',
		'ID_Categoria' => 'int'
	];

	protected $fillable = [
		'ID_Producto',
		'ID_Categoria'
	];

	public function categorias_de_producto()
	{
		return $this->belongsTo(CategoriasDeProducto::class, 'ID_Categoria');
	}

	public function product()
	{
		return $this->belongsTo(Product::class, 'ID_Producto');
	}
}
