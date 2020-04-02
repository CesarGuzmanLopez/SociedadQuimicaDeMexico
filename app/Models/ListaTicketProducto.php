<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ListaTicketProducto
 * 
 * @property int $ID_Ticket
 * @property int $ID_Var_Prod
 * @property string $Personalizacion
 * @property string $Comentarios
 * @property int $Numero_de_Productos
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property float $Costo
 * @property float $Descuento
 * 
 * @property Ticket $ticket
 * @property VariacionesProducto $variaciones_producto
 *
 * @package App\Models
 */
class ListaTicketProducto extends Model
{
	protected $table = 'lista_ticket_productos';
	public $incrementing = false;

	protected $casts = [
		'ID_Ticket' => 'int',
		'ID_Var_Prod' => 'int',
		'Numero_de_Productos' => 'int',
		'Costo' => 'float',
		'Descuento' => 'float'
	];

	protected $fillable = [
		'Personalizacion',
		'Comentarios',
		'Numero_de_Productos',
		'Costo',
		'Descuento'
	];

	public function ticket()
	{
		return $this->belongsTo(Ticket::class, 'ID_Ticket');
	}

	public function variaciones_producto()
	{
		return $this->belongsTo(VariacionesProducto::class, 'ID_Var_Prod');
	}
}
