<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cupone
 * 
 * @property int $id
 * @property string $Codigo
 * @property bool $Acumulable
 * @property string $Tipo
 * @property string $Reglas
 * @property float $Cantidad
 * @property string $Condiciones
 * @property int $ID_User
 * @property bool $transferible
 * @property bool $usado
 * @property Carbon $Vigencia
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property Collection|Ticket[] $tickets
 *
 * @package App\Models
 */
class Cupone extends Model
{
	protected $table = 'cupones';

	protected $casts = [
		'Acumulable' => 'bool',
		'Cantidad' => 'float',
		'ID_User' => 'int',
		'transferible' => 'bool',
		'usado' => 'bool'
	];

	protected $dates = [
		'Vigencia'
	];

	protected $fillable = [
		'Codigo',
		'Acumulable',
		'Tipo',
		'Reglas',
		'Cantidad',
		'Condiciones',
		'ID_User',
		'transferible',
		'usado',
		'Vigencia'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class, 'ID_Cupon');
	}
}
