<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MenuItem
 * 
 * @property int $id
 * @property int $menu_id
 * @property string $title
 * @property string $url
 * @property string $target
 * @property string $icon_class
 * @property string $color
 * @property int $parent_id
 * @property int $order
 * @property string $route
 * @property string $parameters
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Menu $menu
 *
 * @package App\Models
 */
class MenuItem extends Model
{
	protected $table = 'menu_items';

	protected $casts = [
		'menu_id' => 'int',
		'parent_id' => 'int',
		'order' => 'int'
	];

	protected $fillable = [
		'menu_id',
		'title',
		'url',
		'target',
		'icon_class',
		'color',
		'parent_id',
		'order',
		'route',
		'parameters'
	];

	public function menu()
	{
		return $this->belongsTo(Menu::class);
	}
}
