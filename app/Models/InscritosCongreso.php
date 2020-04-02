<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class InscritosCongreso
 * 
 * @property int $id
 * @property int $ID_User
 * @property int $ID_Ticket
 * @property int $ID_Congreso
 * @property bool $Verificado
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Congreso $congreso
 * @property Ticket $ticket
 * @property User $user
 *
 * @package App\Models
 */
class InscritosCongreso extends Model
{
	protected $table = 'inscritos__congresos';

	protected $casts = [
		'ID_User' => 'int',
		'ID_Ticket' => 'int',
		'ID_Congreso' => 'int',
		'Verificado' => 'bool'
	];

	protected $fillable = [
		'ID_User',
		'ID_Ticket',
		'ID_Congreso',
		'Verificado'
	];

	public function congreso()
	{
		return $this->belongsTo(Congreso::class, 'ID_Congreso');
	}

	public function ticket()
	{
		return $this->belongsTo(Ticket::class, 'ID_Ticket');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
