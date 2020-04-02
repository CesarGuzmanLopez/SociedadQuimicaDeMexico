<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Direccione
 * 
 * @property int $id
 * @property string $Pais
 * @property string $Direccion
 * @property string $Codigo_Postal
 * @property int $ID_User
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Direccione extends Model
{
	protected $table = 'direcciones';

	protected $casts = [
		'ID_User' => 'int'
	];

	protected $fillable = [
		'Pais',
		'Direccion',
		'Codigo_Postal',
		'ID_User'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
