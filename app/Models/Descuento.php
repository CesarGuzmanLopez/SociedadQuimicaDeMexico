<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Descuento
 * 
 * @property int $id
 * @property int $ID_Rol_Descuento
 * @property int $ID_Usuario_Aplica
 * @property string $Clasificacion
 * @property int $Paquetes_No_Aplica
 * @property int $Paquetes_Aplica
 * @property float $Cantidad_Maxima_descuento
 * @property float $Cantidad_Minima_Descuento
 * @property Carbon $Inicia_del_descuento
 * @property Carbon $fin_del descuento
 * @property string $tipoDescuento
 * @property float $Cantidad
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property bool $Acumulable
 * 
 * @property Role $role
 * @property User $user
 * @property Paquete $paquete
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class Descuento extends Model
{
	protected $table = 'descuentos';

	protected $casts = [
		'ID_Rol_Descuento' => 'int',
		'ID_Usuario_Aplica' => 'int',
		'Paquetes_No_Aplica' => 'int',
		'Paquetes_Aplica' => 'int',
		'Cantidad_Maxima_descuento' => 'float',
		'Cantidad_Minima_Descuento' => 'float',
		'Cantidad' => 'float',
		'Acumulable' => 'bool'
	];

	protected $dates = [
		'Inicia_del_descuento',
		'fin_del descuento'
	];

	protected $fillable = [
		'ID_Rol_Descuento',
		'ID_Usuario_Aplica',
		'Clasificacion',
		'Paquetes_No_Aplica',
		'Paquetes_Aplica',
		'Cantidad_Maxima_descuento',
		'Cantidad_Minima_Descuento',
		'Inicia_del_descuento',
		'fin_del descuento',
		'tipoDescuento',
		'Cantidad',
		'Acumulable'
	];

	public function role()
	{
		return $this->belongsTo(Role::class, 'ID_Rol_Descuento');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_Usuario_Aplica');
	}

	public function paquete()
	{
		return $this->belongsTo(Paquete::class, 'Paquetes_No_Aplica');
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class, 'ID_Descuento');
	}
}
