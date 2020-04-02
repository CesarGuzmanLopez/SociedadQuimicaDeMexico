<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Congreso
 * 
 * @property int $id
 * @property string $Nombre_Congreso
 * @property string $Hubicacion
 * @property float $Cordenada_X
 * @property float $Cordenada_Y
 * @property int $ID_Publicacion
 * @property int $ID_User
 * @property Carbon $Fecha_inicio
 * @property Carbon $Fecha_fin
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Publicacione $publicacione
 * @property User $user
 * @property Collection|InscritosCongreso[] $inscritos__congresos
 *
 * @package App\Models
 */
class Congreso extends Model
{
	protected $table = 'congresos';

	protected $casts = [
		'Cordenada_X' => 'float',
		'Cordenada_Y' => 'float',
		'ID_Publicacion' => 'int',
		'ID_User' => 'int'
	];

	protected $dates = [
		'Fecha_inicio',
		'Fecha_fin'
	];

	protected $fillable = [
		'Nombre_Congreso',
		'Hubicacion',
		'Cordenada_X',
		'Cordenada_Y',
		'ID_Publicacion',
		'ID_User',
		'Fecha_inicio',
		'Fecha_fin'
	];

	public function publicacione()
	{
		return $this->belongsTo(Publicacione::class, 'ID_Publicacion');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function inscritos__congresos()
	{
		return $this->hasMany(InscritosCongreso::class, 'ID_Congreso');
	}
}
