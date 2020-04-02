<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 * 
 * @property int $id
 * @property int $ID_Ticket
 * @property string $Direccion
 * @property int $status
 * @property string $info_entrega
 * @property Carbon $Salida_Producto
 * @property Carbon $Entrega_Producto
 * @property bool $Entregado
 * @property string $Marca_Paqueteria
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Ticket $ticket
 *
 * @package App\Models
 */
class Compra extends Model
{
	protected $table = 'compra';

	protected $casts = [
		'ID_Ticket' => 'int',
		'status' => 'int',
		'Entregado' => 'bool'
	];

	protected $dates = [
		'Salida_Producto',
		'Entrega_Producto'
	];

	protected $fillable = [
		'ID_Ticket',
		'Direccion',
		'status',
		'info_entrega',
		'Salida_Producto',
		'Entrega_Producto',
		'Entregado',
		'Marca_Paqueteria'
	];

	public function ticket()
	{
		return $this->belongsTo(Ticket::class, 'ID_Ticket');
	}
}
