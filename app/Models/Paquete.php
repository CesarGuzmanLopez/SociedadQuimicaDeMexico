<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Paquete
 * 
 * @property int $id
 * @property string $Nombre
 * @property string $imagenes
 * @property bool $Publico
 * @property int $ID_User
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property Collection|Descuento[] $descuentos
 *
 * @package App\Models
 */
class Paquete extends Model
{
	protected $table = 'paquetes';

	protected $casts = [
		'Publico' => 'bool',
		'ID_User' => 'int'
	];

	protected $fillable = [
		'Nombre',
		'imagenes',
		'Publico',
		'ID_User'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function descuentos()
	{
		return $this->hasMany(Descuento::class, 'Paquetes_No_Aplica');
	}
}
