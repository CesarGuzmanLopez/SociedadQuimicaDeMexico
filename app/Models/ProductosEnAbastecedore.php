<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductosEnAbastecedore
 * 
 * @property int $IDVarProd
 * @property int $ID_Abs
 * @property bool $Disponible
 * @property string $Comentarios
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Abastecedore $abastecedore
 * @property VariacionesProducto $variaciones_producto
 *
 * @package App\Models
 */
class ProductosEnAbastecedore extends Model
{
	protected $table = 'productos_en_abastecedores';
	public $incrementing = false;

	protected $casts = [
		'IDVarProd' => 'int',
		'ID_Abs' => 'int',
		'Disponible' => 'bool'
	];

	protected $fillable = [
		'Disponible',
		'Comentarios'
	];

	public function abastecedore()
	{
		return $this->belongsTo(Abastecedore::class, 'ID_Abs');
	}

	public function variaciones_producto()
	{
		return $this->belongsTo(VariacionesProducto::class, 'IDVarProd');
	}
}
