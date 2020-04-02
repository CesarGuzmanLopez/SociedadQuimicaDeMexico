<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ChatParticipante
 * 
 * @property int $id
 * @property int $Conversacion_id
 * @property string $tipo_de_mensaje
 * @property string $configuracion
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $ID_User
 * 
 * @property ChatConversacione $chat_conversacione
 * @property User $user
 * @property Collection|ChatMensaje[] $chat_mensajes
 * @property Collection|ChatNotificacione[] $chat_notificaciones
 *
 * @package App\Models
 */
class ChatParticipante extends Model
{
	protected $table = 'chat_participantes';

	protected $casts = [
		'Conversacion_id' => 'int',
		'ID_User' => 'int'
	];

	protected $fillable = [
		'Conversacion_id',
		'tipo_de_mensaje',
		'configuracion',
		'ID_User'
	];

	public function chat_conversacione()
	{
		return $this->belongsTo(ChatConversacione::class, 'Conversacion_id');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'ID_User');
	}

	public function chat_mensajes()
	{
		return $this->hasMany(ChatMensaje::class, 'ID_chat_participantes');
	}

	public function chat_notificaciones()
	{
		return $this->hasMany(ChatNotificacione::class, 'ID_Participante');
	}
}
