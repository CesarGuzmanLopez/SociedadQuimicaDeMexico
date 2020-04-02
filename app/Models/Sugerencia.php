<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sugerencia
 * 
 * @property int $id
 * @property string $Sugerencia
 * @property string $Estado
 * @property int $ID_Autor
 * @property int $ID_Revisor
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Sugerencia extends Model
{
	protected $table = 'sugerencias';

	protected $casts = [
		'ID_Autor' => 'int',
		'ID_Revisor' => 'int'
	];

	protected $fillable = [
		'Sugerencia',
		'Estado',
		'ID_Autor',
		'ID_Revisor'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_Revisor');
	}
}
