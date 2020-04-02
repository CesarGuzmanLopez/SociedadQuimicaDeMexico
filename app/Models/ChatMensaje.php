<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChatMensaje
 * 
 * @property int $id
 * @property string $body
 * @property int $Conversacion_id
 * @property int $ID_chat_participantes
 * @property string $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $Enviado
 * 
 * @property ChatConversacione $chat_conversacione
 * @property ChatParticipante $chat_participante
 * @property Collection|ChatNotificacione[] $chat_notificaciones
 *
 * @package App\Models
 */
class ChatMensaje extends Model
{
	protected $table = 'chat_mensajes';

	protected $casts = [
		'Conversacion_id' => 'int',
		'ID_chat_participantes' => 'int'
	];

	protected $dates = [
		'Enviado'
	];

	protected $fillable = [
		'body',
		'Conversacion_id',
		'ID_chat_participantes',
		'type',
		'Enviado'
	];

	public function chat_conversacione()
	{
		return $this->belongsTo(ChatConversacione::class, 'Conversacion_id');
	}

	public function chat_participante()
	{
		return $this->belongsTo(ChatParticipante::class, 'ID_chat_participantes');
	}

	public function chat_notificaciones()
	{
		return $this->hasMany(ChatNotificacione::class, 'ID_Mensaje');
	}
}
