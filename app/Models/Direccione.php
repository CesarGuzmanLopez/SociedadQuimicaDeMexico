<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

//use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Direccione
 * 
 * @property int $id
 * @property string $Pais
 * @property string $Slug
 * @property string $Codigo_Postal
 * @property int $ID_User
 * @property Carbon $created_at
 * @property Carbon $updated_at 
 * @property string	$Estado
 * @property string	$Colonia
 * @property  string  $Municipio
 * @property string	$Comunidad
 * @property  float	$latitud
 * @property float	$longitud
 * @property  int	$occuracy 
 * @property string	$Calle_O_Avenida
 * @property string	$Numero_exterior
 * @property string	$Numero_interior
 * @property string	$Referencias
 * @method Direccione   where()  where(fixed $param, fixed $param2)
 * @method Direccione first() first(void)
 * @method Direccione  get() get(void)
 * @method Direccione  find() find(string)
 * @property User $user
 * @package App\Models
 */
class Direccione extends Model
{
	protected $table = 'direcciones';

	protected $casts = [
		'ID_User' => 'int'
	];

	protected $fillable = [
		'Pais',
		'Estado',
		'Colonia',
		'Municipio',
		'Comunidad',
		'latitud',
		'longitud',
		'Slug',
		'Codigo_Postal',
		'ID_User',
		'Calle_O_Avenida',
		'Numero_exterior',
		'Numero_interior',
		'Referencias',
	]; 
	/**
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}
}
