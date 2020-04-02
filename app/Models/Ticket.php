<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 * 
 * @property int $id
 * @property string $Json_Data
 * @property float $Precio_Final
 * @property float $Descuento
 * @property string $Descripcion
 * @property int $ID_Cupon
 * @property int $ID_Descuento
 * @property int $ID_User
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Cupone $cupone
 * @property Descuento $descuento
 * @property User $user
 * @property Collection|AsistentesCurso[] $asistentes_cursos
 * @property Collection|Compra[] $compras
 * @property Collection|InscritosCongreso[] $inscritos__congresos
 * @property Collection|ListaTicketProducto[] $lista_ticket_productos
 * @property Collection|ProductosDigitale[] $productos__digitales
 * @property Collection|UsuariosMembresia[] $usuarios__membresias
 *
 * @package App\Models
 */
class Ticket extends Model
{
	protected $table = 'tickets';

	protected $casts = [
		'Precio_Final' => 'float',
		'Descuento' => 'float',
		'ID_Cupon' => 'int',
		'ID_Descuento' => 'int',
		'ID_User' => 'int'
	];

	protected $fillable = [
		'Json_Data',
		'Precio_Final',
		'Descuento',
		'Descripcion',
		'ID_Cupon',
		'ID_Descuento',
		'ID_User'
	];

	public function cupone()
	{
		return $this->belongsTo(Cupone::class, 'ID_Cupon');
	}

	public function descuento()
	{
		return $this->belongsTo(Descuento::class, 'ID_Descuento');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function asistentes_cursos()
	{
		return $this->hasMany(AsistentesCurso::class, 'id_Toket');
	}

	public function compras()
	{
		return $this->hasMany(Compra::class, 'ID_Ticket');
	}

	public function inscritos__congresos()
	{
		return $this->hasMany(InscritosCongreso::class, 'ID_Ticket');
	}

	public function lista_ticket_productos()
	{
		return $this->hasMany(ListaTicketProducto::class, 'ID_Ticket');
	}

	public function productos__digitales()
	{
		return $this->hasMany(ProductosDigitale::class, 'ID_Ticket');
	}

	public function usuarios__membresias()
	{
		return $this->hasMany(UsuariosMembresia::class, 'ID_Ticket');
	}
}
