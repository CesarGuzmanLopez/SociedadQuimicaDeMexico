<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CoreosAcademico
 * 
 * @property int $id
 * @property int $ID_user
 * @property string $Correo
 * @property string $Redireccion
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class CoreosAcademico extends Model
{
	protected $table = 'coreos_academicos';

	protected $casts = [
		'ID_user' => 'int'
	];

	protected $fillable = [
		'ID_user',
		'Correo',
		'Redireccion'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_user');
	}
}
