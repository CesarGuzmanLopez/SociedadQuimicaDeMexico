<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Stock
 * 
 * @property int $id
 * @property int $ID_Abastecedor
 * @property int $ID_Variacion_Producto
 * @property int $Numero_De_Piezas
 * @property float $Precio_Producto_Abastecido
 * @property float $Precio_Producto_A_Venta
 * @property float $Precio_Minimo
 * @property float $Precio_Maximo
 * @property int $Piezas_minimas
 * @property int $Piezas_Maximas
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Abastecedore $abastecedore
 * @property VariacionesProducto $variaciones_producto
 *
 * @package App\Models
 */
class Stock extends Model
{
	protected $table = 'stocks';

	protected $casts = [
		'ID_Abastecedor' => 'int',
		'ID_Variacion_Producto' => 'int',
		'Numero_De_Piezas' => 'int',
		'Precio_Producto_Abastecido' => 'float',
		'Precio_Producto_A_Venta' => 'float',
		'Precio_Minimo' => 'float',
		'Precio_Maximo' => 'float',
		'Piezas_minimas' => 'int',
		'Piezas_Maximas' => 'int'
	];

	protected $fillable = [
		'ID_Abastecedor',
		'ID_Variacion_Producto',
		'Numero_De_Piezas',
		'Precio_Producto_Abastecido',
		'Precio_Producto_A_Venta',
		'Precio_Minimo',
		'Precio_Maximo',
		'Piezas_minimas',
		'Piezas_Maximas'
	];

	public function abastecedore()
	{
		return $this->belongsTo(Abastecedore::class, 'ID_Abastecedor');
	}

	public function variaciones_producto()
	{
		return $this->belongsTo(VariacionesProducto::class, 'ID_Variacion_Producto');
	}
}
