<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VariacionesProducto
 * 
 * @property int $id
 * @property int $ID_Producto
 * @property string $Nombre
 * @property string $categoria
 * @property string $Comentarios
 * @property string $imagenes
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Curso[] $cursos
 * @property Collection|ListaTicketProducto[] $lista_ticket_productos
 * @property Collection|ProductosDigitale[] $productos__digitales
 * @property Collection|ProductosEnAbastecedore[] $productos_en_abastecedores
 * @property ProductosEnCarrito $productos_en_carrito
 * @property Collection|Stock[] $stocks
 *
 * @package App\Models
 */
class VariacionesProducto extends Model
{
	protected $table = 'variaciones_producto';

	protected $casts = [
		'ID_Producto' => 'int'
	];

	protected $fillable = [
		'ID_Producto',
		'Nombre',
		'categoria',
		'Comentarios',
		'imagenes'
	];

	public function cursos()
	{
		return $this->hasMany(Curso::class, 'ID_Prodcuto');
	}

	public function lista_ticket_productos()
	{
		return $this->hasMany(ListaTicketProducto::class, 'ID_Var_Prod');
	}

	public function productos__digitales()
	{
		return $this->hasMany(ProductosDigitale::class, 'ID_Var_Producto');
	}

	public function productos_en_abastecedores()
	{
		return $this->hasMany(ProductosEnAbastecedore::class, 'IDVarProd');
	}

	public function productos_en_carrito()
	{
		return $this->hasOne(ProductosEnCarrito::class, 'ID_Var_Prod');
	}

	public function stocks()
	{
		return $this->hasMany(Stock::class, 'ID_Variacion_Producto');
	}
}
