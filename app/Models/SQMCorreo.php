<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SQMCorreo
 * 
 * @property int $id
 * @property int $ID_User
 * @property string $Correo
 * @property string $Alias_Al_Correo
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class SQMCorreo extends Model
{
	protected $table = 's_q_m__correos';

	protected $casts = [
		'ID_User' => 'int'
	];

	protected $fillable = [
		'ID_User',
		'Correo',
		'Alias_Al_Correo'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
