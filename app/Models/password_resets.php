<?php

/**
 * Created by Reliese Model.
 * @author Cesar Gerardo Guzman Lopez
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
 /**
 * Class PasswordReset
 * 
 * @property string $email
 * @property string $token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * 
 * @package App\Models
 * 
 * @method  password_resets where()  where(fixed $param, fixed $param2)
 * @method  password_resets first()        first(void)
 */
class password_resets extends Model
{
	protected $table = 'password_resets';
	protected $primaryKey = 'email';
	public $incrementing = false;

	protected $hidden = [
		'token'
	];

	protected $fillable = [
		'token'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'email', 'email');
	}
}
