<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Patrocinadore
 * 
 * @property int $id
 * @property int $ID_User
 * @property int $ID_Usuario_Contacto
 * @property int $ID_Pagina_Interna
 * @property string $Pagina_Externa
 * @property string $path_Images
 * @property string $Nombre_Patrocinador
 * @property string $Tipo
 * @property string $Descripcion
 * @property string $Datos de contacto
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Pagina $pagina
 * @property User $user
 *
 * @package App\Models
 */
class Patrocinadore extends Model
{
	protected $table = 'patrocinadores';

	protected $casts = [
		'ID_User' => 'int',
		'ID_Usuario_Contacto' => 'int',
		'ID_Pagina_Interna' => 'int'
	];

	protected $fillable = [
		'ID_User',
		'ID_Usuario_Contacto',
		'ID_Pagina_Interna',
		'Pagina_Externa',
		'path_Images',
		'Nombre_Patrocinador',
		'Tipo',
		'Descripcion',
		'Datos de contacto'
	];

	public function pagina()
	{
		return $this->belongsTo(Pagina::class, 'ID_Pagina_Interna');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_Usuario_Contacto');
	}
}
