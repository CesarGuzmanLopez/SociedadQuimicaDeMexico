<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tranduccione
 * 
 * @property string $table_name
 * @property string $column_name
 * @property int $foreign_key
 * @property string $locale
 * @property string $value
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Tranduccione extends Model
{
	protected $table = 'tranducciones';
	public $incrementing = false;

	protected $casts = [
		'foreign_key' => 'int'
	];

	protected $fillable = [
		'value'
	];
}
