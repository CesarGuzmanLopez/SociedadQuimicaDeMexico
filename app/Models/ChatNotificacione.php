<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ChatNotificacione
 * 
 * @property int $id
 * @property int $ID_Mensaje
 * @property string $Tipo_Mensaje
 * @property int $ID_Conversacion
 * @property int $ID_Participante
 * @property bool $visto
 * @property bool $enviado
 * @property bool $recibido
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property ChatConversacione $chat_conversacione
 * @property ChatMensaje $chat_mensaje
 * @property ChatParticipante $chat_participante
 *
 * @package App\Models
 */
class ChatNotificacione extends Model
{
	use SoftDeletes;
	protected $table = 'chat_notificaciones';

	protected $casts = [
		'ID_Mensaje' => 'int',
		'ID_Conversacion' => 'int',
		'ID_Participante' => 'int',
		'visto' => 'bool',
		'enviado' => 'bool',
		'recibido' => 'bool'
	];

	protected $fillable = [
		'ID_Mensaje',
		'Tipo_Mensaje',
		'ID_Conversacion',
		'ID_Participante',
		'visto',
		'enviado',
		'recibido'
	];

	public function chat_conversacione()
	{
		return $this->belongsTo(ChatConversacione::class, 'ID_Conversacion');
	}

	public function chat_mensaje()
	{
		return $this->belongsTo(ChatMensaje::class, 'ID_Mensaje');
	}

	public function chat_participante()
	{
		return $this->belongsTo(ChatParticipante::class, 'ID_Participante');
	}
}
