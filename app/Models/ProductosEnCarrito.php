<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductosEnCarrito
 * 
 * @property int $ID_Carrito
 * @property int $ID_Var_Prod
 * @property string $Personalizacion
 * @property string $Comentarios
 * @property Carbon $Expira
 * @property int $Numero_de_Productos
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Carrito $carrito
 * @property VariacionesProducto $variaciones_producto
 *
 * @package App\Models
 */
class ProductosEnCarrito extends Model
{
	protected $table = 'productos_en_carrito';
	public $incrementing = false;

	protected $casts = [
		'ID_Carrito' => 'int',
		'ID_Var_Prod' => 'int',
		'Numero_de_Productos' => 'int'
	];

	protected $dates = [
		'Expira'
	];

	protected $fillable = [
		'ID_Carrito',
		'ID_Var_Prod',
		'Personalizacion',
		'Comentarios',
		'Expira',
		'Numero_de_Productos'
	];

	public function carrito()
	{
		return $this->belongsTo(Carrito::class, 'ID_Carrito');
	}

	public function variaciones_producto()
	{
		return $this->belongsTo(VariacionesProducto::class, 'ID_Var_Prod');
	}
}
