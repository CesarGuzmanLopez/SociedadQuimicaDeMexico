<?php

/**
 * Created by Ususario compra memebresia
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsuariosMembresia
 * 
 * @property int $ID_User
 * @property int $ID_Membresia
 * @property string $Numero_Membresia
 * @property Carbon $Inicio
 * @property Carbon $Fin
 * @property int $ID_Ticket
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Membresia $membresia
 * @property Ticket $ticket
 * @property User $user
 *
 * @package App\Models
 */
class UsuariosMembresia extends Model
{
	protected $table = 'usuarios__membresias';
	public $incrementing = false;

	protected $casts = [
		'ID_User' => 'int',
		'ID_Membresia' => 'int',
		'ID_Ticket' => 'int'
	];

	protected $dates = [
		'Inicio',
		'Fin'
	];

	protected $fillable = [
		'Numero_Membresia',
		'Inicio',
		'Fin',
		'ID_Ticket'
	];
/**
 * 
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
	public function membresia()
	{
		return $this->belongsTo(Membresia::class, 'ID_Membresia');
	}
/**
 * 
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
	public function ticket()
	{
		return $this->belongsTo(Ticket::class, 'ID_Ticket');
	}
/**
 * 
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
