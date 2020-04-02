<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Setting
 * 
 * @property int $id
 * @property string $key
 * @property string $display_name
 * @property string $value
 * @property string $details
 * @property string $type
 * @property int $order
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Setting extends Model
{
	protected $table = 'settings';

	protected $casts = [
		'order' => 'int'
	];

	protected $fillable = [
		'key',
		'display_name',
		'value',
		'details',
		'type',
		'order'
	];
}
