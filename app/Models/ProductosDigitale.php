<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductosDigitale
 * 
 * @property int $id
 * @property int $ID_User
 * @property int $ID_Ticket
 * @property int $ID_Var_Producto
 * @property string $path
 * @property bool $Verificado
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Ticket $ticket
 * @property User $user
 * @property VariacionesProducto $variaciones_producto
 *
 * @package App\Models
 */
class ProductosDigitale extends Model
{
	protected $table = 'productos__digitales';

	protected $casts = [
		'ID_User' => 'int',
		'ID_Ticket' => 'int',
		'ID_Var_Producto' => 'int',
		'Verificado' => 'bool'
	];

	protected $fillable = [
		'ID_User',
		'ID_Ticket',
		'ID_Var_Producto',
		'path',
		'Verificado'
	];

	public function ticket()
	{
		return $this->belongsTo(Ticket::class, 'ID_Ticket');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function variaciones_producto()
	{
		return $this->belongsTo(VariacionesProducto::class, 'ID_Var_Producto');
	}
}
