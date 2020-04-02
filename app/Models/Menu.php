<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|MenuItem[] $menu_items
 *
 * @package App\Models
 */
class Menu extends Model
{
	protected $table = 'menus';

	protected $fillable = [
		'name'
	];

	public function menu_items()
	{
		return $this->hasMany(MenuItem::class);
	}
}
