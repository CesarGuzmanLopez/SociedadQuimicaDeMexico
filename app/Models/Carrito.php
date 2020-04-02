<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrito
 * 
 * @property int $id
 * @property int $ID_User
 * @property string $Tipo
 * @property string $token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property ProductosEnCarrito $productos_en_carrito
 *
 * @package App\Models
 */
class Carrito extends Model
{
	protected $table = 'carritos';

	protected $casts = [
		'ID_User' => 'int'
	];

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'ID_User',
		'Tipo',
		'token'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function productos_en_carrito()
	{
		return $this->hasOne(ProductosEnCarrito::class, 'ID_Carrito');
	}
}
