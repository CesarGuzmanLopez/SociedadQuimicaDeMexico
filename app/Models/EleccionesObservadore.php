<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EleccionesObservadore
 * 
 * @property int $ID_User
 * @property int $id_urna
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property EleccionesVotosEnUrna $elecciones_votos_en_urna
 * @property User $user
 *
 * @package App\Models
 */
class EleccionesObservadore extends Model
{
	protected $table = 'elecciones_observadores';
	public $incrementing = false;

	protected $casts = [
		'ID_User' => 'int',
		'id_urna' => 'int'
	];

	protected $fillable = [
		'ID_User',
		'id_urna'
	];

	public function elecciones_votos_en_urna()
	{
		return $this->belongsTo(EleccionesVotosEnUrna::class, 'id_urna');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
