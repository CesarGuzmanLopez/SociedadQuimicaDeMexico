<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Abastecedore
 * 
 * @property int $id
 * @property string $Nombre_Abastecedor
 * @property string $Numero_Telefonico
 * @property string $email
 * @property string $Descripcion
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|ProductosEnAbastecedore[] $productos_en_abastecedores
 * @property Collection|Stock[] $stocks
 *
 * @package App\Models
 */
class Abastecedore extends Model
{
	protected $table = 'abastecedores';

	protected $fillable = [
		'Nombre_Abastecedor',
		'Numero_Telefonico',
		'email',
		'Descripcion'
	];

	public function productos_en_abastecedores()
	{
		return $this->hasMany(ProductosEnAbastecedore::class, 'ID_Abs');
	}

	public function stocks()
	{
		return $this->hasMany(Stock::class, 'ID_Abastecedor');
	}
}
