<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChatConversacione
 * 
 * @property int $id
 * @property bool $private
 * @property bool $direct_message
 * @property string $data
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|ChatMensaje[] $chat_mensajes
 * @property Collection|ChatNotificacione[] $chat_notificaciones
 * @property Collection|ChatParticipante[] $chat_participantes
 *
 * @package App\Models
 */
class ChatConversacione extends Model
{
	protected $table = 'chat_conversaciones';

	protected $casts = [
		'private' => 'bool',
		'direct_message' => 'bool'
	];

	protected $fillable = [
		'private',
		'direct_message',
		'data'
	];

	public function chat_mensajes()
	{
		return $this->hasMany(ChatMensaje::class, 'Conversacion_id');
	}

	public function chat_notificaciones()
	{
		return $this->hasMany(ChatNotificacione::class, 'ID_Conversacion');
	}

	public function chat_participantes()
	{
		return $this->hasMany(ChatParticipante::class, 'Conversacion_id');
	}
}
