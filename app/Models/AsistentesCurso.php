<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AsistentesCurso
 * 
 * @property int $ID_User
 * @property int $ID_Curso
 * @property string $dataJson
 * @property int $id_Toket
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Curso $curso
 * @property Ticket $ticket
 * @property User $user
 *
 * @package App\Models
 */
class AsistentesCurso extends Model
{
	protected $table = 'asistentes_cursos';
	public $incrementing = false;

	protected $casts = [
		'ID_User' => 'int',
		'ID_Curso' => 'int',
		'id_Toket' => 'int'
	];

	protected $fillable = [
		'dataJson',
		'id_Toket'
	];

	public function curso()
	{
		return $this->belongsTo(Curso::class, 'ID_Curso');
	}

	public function ticket()
	{
		return $this->belongsTo(Ticket::class, 'id_Toket');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
