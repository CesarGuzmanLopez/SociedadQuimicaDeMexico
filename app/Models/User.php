<?php

/**
  * @author Cesar Gerardo Guzman Lopez
  * 
  */

namespace App\Models;
/*
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Database\Eloquent\Collection;
*/
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $Nombre_de_usuario
 * @property string $Apellido
 * @property string $Telefono
 * @property string $path_Image
 * @property Carbon $Fecha_De_Nacimiento
 * @property string $url_Pagina_Personal
 * @property bool $Visble_perfil
 * @property bool $recibir_Correos
 * @property float $puntos
 * @property string $email
 * @property Carbon $email_verified_at
 * @property string $password
 * @property string $Codigo_Confirmacion
 * @property string $remember_token
 * @property string $Grado_Academico
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|AsistentesCurso[] $asistentes_cursos
 * @property Collection|BolsaTrabajo[] $bolsa__trabajos
 * @property Collection|CalificacionRespuestum[] $calificacion_respuesta
 * @property Collection|Carrito[] $carritos
 * @property Collection|Categoria[] $categorias
 * @property Collection|ChatParticipante[] $chat_participantes
 * @property Collection|Congreso[] $congresos
 * @property Collection|CoreosAcademico[] $coreos_academicos
 * @property Collection|Cupone[] $cupones
 * @property Collection|Curso[] $cursos
 * @property Collection|Descuento[] $descuentos
 * @property Collection|Direccione[] $direcciones
 * @property Collection|Eleccione[] $elecciones
 * @property Collection|EleccionesCandidato[] $elecciones_candidatos
 * @property Collection|EleccionesEleccion[] $elecciones_eleccions
 * @property Collection|EleccionesListaCandOpc[] $elecciones_lista_cand_opcs
 * @property Collection|EleccionesListaVotante[] $elecciones_lista_votantes
 * @property EleccionesObservadore $elecciones_observadore
 * @property Collection|EleccionesOpcion[] $elecciones_opcions
 * @property Collection|EleccionesVotante[] $elecciones_votantes
 * @property Collection|Evento[] $eventos
 * @property Collection|Group[] $groups
 * @property Collection|InscritosCongreso[] $inscritos__congresos
 * @property Collection|Membresia[] $membresias
 * @property Collection|Pagina[] $paginas
 * @property Collection|Paquete[] $paquetes
 * @property Collection|ParticipanteSeccion[] $participante_seccions
 * @property password_resets $password_reset
 * @property Collection|Patrocinadore[] $patrocinadores
 * @property Collection|Postulacione[] $postulaciones
 * @property Collection|Pregunta[] $preguntas
 * @property Collection|ProductosDigitale[] $productos__digitales
 * @property Collection|Product[] $products
 * @property Collection|Publicacione[] $publicaciones
 * @property Collection|RecursosDigitale[] $recursos__digitales
 * @property Collection|Respuesta[] $respuestas
 * @property Collection|Revista[] $revistas
 * @property Collection|SQMCorreo[] $s_q_m__correos
 * @property Collection|SeccionesSqm[] $secciones_sqms
 * @property Collection|Sugerencia[] $sugerencias
 * @property Collection|Ticket[] $tickets
 * @property Collection|TipoParticipanteSeccion[] $tipo_participante_seccions
 * @property Collection|Permission[] $permissions
 * @property Collection|Role[] $roles
 * @property Collection|UsuarioMembresium[] $usuario_membresia
 * @property Collection|UsuariosMembresia[] $usuarios__membresias
 * @method User   where()  where(fixed $param, fixed $param2)
 * @method  User first() first(void)
 * @method  User  get() get(void)
 * @method  User  find() find(string)
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $casts = [
		'Visble_perfil' => 'bool',
		'recibir_Correos' => 'bool',
		'puntos' => 'float'
	]; 
	protected $dates = [
		'Fecha_De_Nacimiento',
		'email_verified_at'
	]; 
	protected $hidden = [
	    'id','password', 'remember_token','Codigo_Confirmacion',
	    'created_at','updated_at',
	]; 
	protected $fillable = [
		'name',
		'Nombre_de_usuario',
		'Apellido',
		'Telefono',
		'Fecha_De_Nacimiento',
		'url_Pagina_Personal',
		'Visble_perfil',
		'recibir_Correos',
		'puntos',
		'email',
		'email_verified_at',
		'password',
		'Codigo_Confirmacion',
		'remember_token',
	    'path_Image',
	    'Grado_Academico',
	];

	public function asistentes_cursos()
	{
		return $this->hasMany(AsistentesCurso::class, 'ID_User');
	}

	public function bolsa__trabajos()
	{
		return $this->hasMany(BolsaTrabajo::class, 'ID_User');
	}

	public function calificacion_respuesta()
	{
		return $this->hasMany(CalificacionRespuestum::class);
	}

	public function carritos()
	{
		return $this->hasMany(Carrito::class, 'ID_User');
	}

	public function categorias()
	{
		return $this->hasMany(Categoria::class, 'ID_User');
	}

	public function chat_participantes()
	{
		return $this->hasMany(ChatParticipante::class, 'ID_User');
	}

	public function congresos()
	{
		return $this->hasMany(Congreso::class, 'ID_User');
	}

	public function coreos_academicos()
	{
		return $this->hasMany(CoreosAcademico::class, 'ID_user');
	}

	public function cupones()
	{
		return $this->hasMany(Cupone::class, 'ID_User');
	}

	public function cursos()
	{
		return $this->hasMany(Curso::class, 'ID_Usuario_Responsable_Curso');
	}

	public function descuentos()
	{
		return $this->hasMany(Descuento::class, 'ID_Usuario_Aplica');
	}

	public function direcciones()
	{
		return $this->hasMany(Direccione::class, 'ID_User');
	}

	public function elecciones()
	{
		return $this->hasMany(Eleccione::class, 'ID_User');
	}

	public function elecciones_candidatos()
	{
		return $this->hasMany(EleccionesCandidato::class, 'ID_Candidato');
	}

	public function elecciones_eleccions()
	{
		return $this->hasMany(EleccionesEleccion::class, 'ID_User');
	}

	public function elecciones_lista_cand_opcs()
	{
		return $this->hasMany(EleccionesListaCandOpc::class, 'ID_User');
	}

	public function elecciones_lista_votantes()
	{
		return $this->hasMany(EleccionesListaVotante::class, 'ID_User');
	}

	public function elecciones_observadore()
	{
		return $this->hasOne(EleccionesObservadore::class, 'ID_User');
	}

	public function elecciones_opcions()
	{
		return $this->hasMany(EleccionesOpcion::class, 'ID_User');
	}

	public function elecciones_votantes()
	{
		return $this->hasMany(EleccionesVotante::class, 'ID_User');
	}

	public function eventos()
	{
		return $this->hasMany(Evento::class, 'ID_User');
	}

	public function groups()
	{
		return $this->hasMany(Group::class, 'ID_User');
	}

	public function inscritos__congresos()
	{
		return $this->hasMany(InscritosCongreso::class, 'ID_User');
	}

	public function membresias()
	{
		return $this->hasMany(Membresia::class, 'ID_User');
	}

	public function paginas()
	{
		return $this->hasMany(Pagina::class, 'ID_User');
	}

	public function paquetes()
	{
		return $this->hasMany(Paquete::class, 'ID_User');
	}

	public function participante_seccions()
	{
		return $this->hasMany(ParticipanteSeccion::class, 'ID_User');
	}
    /**
     * @return;
     */
	public function password_reset()
	{
	    return $this->hasOne(password_resets::class, 'email', 'email');
	}

	public function patrocinadores()
	{
		return $this->hasMany(Patrocinadore::class, 'ID_Usuario_Contacto');
	}

	public function postulaciones()
	{
		return $this->hasMany(Postulacione::class, 'ID_User');
	}

	public function preguntas()
	{
		return $this->hasMany(Pregunta::class, 'ID_User');
	}

	public function productos__digitales()
	{
		return $this->hasMany(ProductosDigitale::class, 'ID_User');
	}

	public function products()
	{
		return $this->hasMany(Product::class, 'ID_User');
	}

	public function publicaciones()
	{
		return $this->hasMany(Publicacione::class, 'ID_User');
	}

	public function recursos__digitales()
	{
		return $this->hasMany(RecursosDigitale::class, 'ID_User');
	}

	public function respuestas()
	{
		return $this->hasMany(Respuesta::class, 'ID_user');
	}

	public function revistas()
	{
		return $this->hasMany(Revista::class, 'ID_User');
	}

	public function s_q_m__correos()
	{
		return $this->hasMany(SQMCorreo::class, 'ID_User');
	}

	public function secciones_sqms()
	{
		return $this->hasMany(SeccionesSqm::class, 'Vocal_6');
	}

	public function sugerencias()
	{
		return $this->hasMany(Sugerencia::class, 'ID_Revisor');
	}

	public function tickets()
	{
		return $this->hasMany(Ticket::class, 'ID_User');
	}

	public function tipo_participante_seccions()
	{
		return $this->hasMany(TipoParticipanteSeccion::class, 'ID_User');
	}
	/**
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'users_permissions');
	}

	/**
	 * 
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function roles()
	{
		return $this->belongsToMany(Role::class, 'users_roles');
	}

	public function usuario_membresia()
	{
		return $this->hasMany(UsuarioMembresium::class, 'ID_User');
	}

	public function usuarios__membresias()
	{
		return $this->hasMany(UsuariosMembresia::class, 'ID_User');
	}
}
