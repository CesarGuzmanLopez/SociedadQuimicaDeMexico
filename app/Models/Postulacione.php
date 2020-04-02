<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Postulacione
 * 
 * @property int $id
 * @property int $ID_User
 * @property string $path_curriculum
 * @property string $Comentarios
 * @property int $ID_Trabajo
 * @property bool $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property BolsaTrabajo $bolsa_trabajo
 * @property User $user
 *
 * @package App\Models
 */
class Postulacione extends Model
{
	protected $table = 'postulaciones';

	protected $casts = [
		'ID_User' => 'int',
		'ID_Trabajo' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'ID_User',
		'path_curriculum',
		'Comentarios',
		'ID_Trabajo',
		'status'
	];

	public function bolsa_trabajo()
	{
		return $this->belongsTo(BolsaTrabajo::class, 'ID_Trabajo');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
