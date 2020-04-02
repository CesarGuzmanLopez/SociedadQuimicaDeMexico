<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductosEnPaquete
 * 
 * @property int $ID_Variacion_Poducto
 * @property int $ID_Paquetes
 * @property string $Tipo_Variacion
 * @property string $Valor
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class ProductosEnPaquete extends Model
{
	protected $table = 'productos_en_paquetes';
	public $incrementing = false;

	protected $casts = [
		'ID_Variacion_Poducto' => 'int',
		'ID_Paquetes' => 'int'
	];

	protected $fillable = [
		'ID_Variacion_Poducto',
		'ID_Paquetes',
		'Tipo_Variacion',
		'Valor'
	];
}
