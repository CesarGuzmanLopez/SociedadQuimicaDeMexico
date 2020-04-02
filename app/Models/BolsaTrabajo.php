<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BolsaTrabajo
 * 
 * @property int $id
 * @property int $ID_User
 * @property string $Empresa
 * @property string $Descripcion_del_Puesto
 * @property string $tags
 * @property string $Localizacion
 * @property string $sueldo
 * @property string $tipo
 * @property string $Horario
 * @property string $Puesto
 * @property string $Contacto
 * @property bool $Se_Aceptan_Postulaciones
 * @property string $Data_Json
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property Collection|Postulacione[] $postulaciones
 *
 * @package App\Models
 */
class BolsaTrabajo extends Model
{
	protected $table = 'bolsa__trabajo';

	protected $casts = [
		'ID_User' => 'int',
		'Se_Aceptan_Postulaciones' => 'bool'
	];

	protected $fillable = [
		'ID_User',
		'Empresa',
		'Descripcion_del_Puesto',
		'tags',
		'Localizacion',
		'sueldo',
		'tipo',
		'Horario',
		'Puesto',
		'Contacto',
		'Se_Aceptan_Postulaciones',
		'Data_Json'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function postulaciones()
	{
		return $this->hasMany(Postulacione::class, 'ID_Trabajo');
	}
}
