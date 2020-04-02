<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EleccionesOpcion
 * 
 * @property int $id
 * @property int $ID_User
 * @property int $Id_Pagina
 * @property string $Descripcion
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Pagina $pagina
 * @property User $user
 * @property Collection|EleccionesOpcione[] $elecciones_opciones
 *
 * @package App\Models
 */
class EleccionesOpcion extends Model
{
	protected $table = 'elecciones_opcion';

	protected $casts = [
		'ID_User' => 'int',
		'Id_Pagina' => 'int'
	];

	protected $fillable = [
		'ID_User',
		'Id_Pagina',
		'Descripcion'
	];

	public function pagina()
	{
		return $this->belongsTo(Pagina::class, 'Id_Pagina');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function elecciones_opciones()
	{
		return $this->hasMany(EleccionesOpcione::class, 'ID_opcion');
	}
}
