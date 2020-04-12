<?php

use Illuminate\Support\Facades\Route;
 /*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$P_C = "Publico\PublicaController";
Route::get('/', "$P_C@index")->name("/");
Route::get("/login","$P_C@login")->name('Login'); 
Route::get("/Registro","$P_C@Registro")->name("Registro");
Route::post("/auth","$P_C@authenticate")->name('auth');
Route::post("/logout","$P_C@logout")->name('logout');
Route::post("/Registrar","$P_C@Registrar")->name('Registrar');
Route::get("/Verificar/{code}","$P_C@Verificar")->name("Verificar");
Route::get("/Recuperar/{code}","$P_C@Recuperar")->name("Recuperar"); 
Route::post("/RecuperarPost","$P_C@Recuperar_post" )->name("RecuperarPost");
Route::get("/Recuperar_pass","$P_C@Recuperar_pass" )->name("Recuperar_pass"); 
Route::post("/newpass","$P_C@newpass" )->name("newpass");

Route::group(['middleware' =>"auth", 'prefix' => 'Usuario', 'as' => 'Usuario'], function (){ 
    $S_C="Sesion\SesionController";
	Route::get  ('/', "$S_C@index")->name("/"); 
    Route::get  ("/Cambiar_Perfil", "$S_C@Cambiar_Perfil")->name("/Cambiar_Perfil");
    Route::post("/Cambiar_Perfil_post","$S_C@Cambiar_Perfil_post")->name("/Cambiar_Perfil_post");
   	Route::get  ("/Cambiar_Clave", "$S_C@Cambiar_Clave")->name("/Cambiar_Clave");
   	Route::post("/Cambiar_Clave", "$S_C@Cambiar_ClavePost")->name("/Cambiar_ClavePost");
	Route::get  ("/IngresarDireccion","$S_C@IngresarDireccion")->name("/IngresarDireccion");   
	Route::post ("/ingresarDireccionPost","$S_C@ingresarDireccionPost")->name("/ingresarDireccionPost");   	
});
Route::group(["middleware"=>['auth','can:mod-permisos'], 'prefix'=>'RolesPermisos', 'as'=>'RolesPermisos'],function(){
 	$R_P = "Roles_y_permisos\RolesPermisos";
	Route::get('/', "$R_P@index")->name('/');
    Route::get('/AgregarPermiso', "$R_P@AgregarPermiso")->name('/AgregarPermiso');
    Route::get('/AgregarRol', "$R_P@AgregarRol")->name('/AgregarRol');
    Route::get('/AgregarPermisoARol', "$R_P@AgregarPermisoARol")->name('/AgregarPermisoARol');
    Route::get('/AgregarPermisoARol/{id_rol}', "$R_P@AgregarPermisoARolID")->name('/AgregarPermisoARol/');
    Route::post('/AgregarPermisoARol_post', "$R_P@AgregarPermisoARol_post")->name('/AgregarPermisoARol_post');
    Route::get('/AgregarPermisoAUsuario', "$R_P@AgregarPermisoAUsuario")->name('/AgregarPermisoAUsuario');
    Route::get('/AgregarPermisoAUsuario/{id_rol}', "$R_P@AgregarPermisoAUsuarioID")->name('/AgregarPermisoAUsuario/');
    Route::post('/AgregarPermisoAUsuario_post', "$R_P@AgregarPermisoAUsuario_post")->name('/AgregarPermisoAUsuario_post');
    Route::get('/AgregarRolAUsuario', "$R_P@AgregarRolAUsuario")->name('/AgregarRolAUsuario');
    Route::get('/AgregarRolAUsuario/{id_rol}', "$R_P@AgregarRolAUsuarioID")->name('/AgregarRolAUsuario/');
    Route::post('/AgregarRolAUsuario_post', "$R_P@AgregarRolAUsuario_post")->name('/AgregarRolAUsuario_post');
    Route::get('/CrudRolesYUsuario', "$R_P@CrudRolesYUsuario")->name('/CrudRolesYUsuario');
    Route::post('/AgregarPermisoPost',"$R_P@AgregarPermisoPost")->name("/AgregarPermisoPost");
    Route::post('/ActualizarEliminarPermiso',"$R_P@ActualizarEliminarPermiso")->name("/ActualizarEliminarPermiso");
    Route::post('/AgregarRolPost',"$R_P@AgregarRolPost")->name("/AgregarRolPost");
    Route::post('/ActualizarRolrPermiso',"$R_P@ActualizarEliminarRol")->name("/ActualizarEliminarRol");
	Route::post("/CrudRolesYUsuarioPost","$R_P@CrudRolesYUsuarioPost")->name("/CrudRolesYUsuarioPost"); 
});
Route::group(["middleware"=>['auth','can:mod-usuarios'], 'prefix'=>'AdministrarUsuarios', 'as'=>'AdministrarUsuarios'],function(){
	$A_U ="Administrar_Usuarios\AdministrarUsuarios";
	Route::get('/', "$A_U@index")->name('/');
	Route::get('/modificar/{id_user}', "$A_U@modificar")->name('/modificar');
	Route::post('/modificar', "$A_U@modificarPost")->name("/modificarPost");
	Route::get("/agregarUsuario","$A_U@agregarUsuario")->name("/AgregarUsuario");
	Route::post("/agregarPost","$A_U@agregarPost")->name("/agregarPost");
}); 
Route::group(["middleware"=>['auth','can:mod-membresia'], 'prefix'=>'Membresia', 'as'=>'Membresia'], function () {
	$M ="Membresia\MembresiaController"; 
	Route::get('/', "$M@index")->name('/');
	
}); 


//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Publicaciones', 'as'=>'Publicaciones'], function () {
	$P ="Publicaciones\PublicacionesController";
	Route::get('/', "$P@index")->name('/');
});
//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Correo', 'as'=>'Correo'], function () {
	$CC ="Correo\CorreoController";
	Route::get('/', "$CC@index")->name('/');
});
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Paginas', 'as'=>'Paginas'], function () {
	$PG ="Paginas\PaginasController";
	Route::get('/', "$PG@index")->name('/');
}); 
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Sugerencias', 'as'=>'Sugerencias'], function () {
	$Sg ="Sugerencias\SugerenciasController";
	Route::get('/', "$Sg@index")->name('/');
});
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'RecursosDigitales', 'as'=>'RecursosDigitales'], function () {
	$RD ="Recursos\RecursosDigitalesController";
	Route::get('/', "$RD@index")->name('/');
});	
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Eventos', 'as'=>'Eventos'], function () {
	$Ev ="Eventos\EventosController";
	Route::get('/', "$Ev@index")->name('/');
});
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Revistas', 'as'=>'Revistas'], function () {
	$Rv ="Revistas\RevistasController";
	Route::get('/', "$Rv@index")->name('/');
});
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Congresos', 'as'=>'Congresos'], function () {
	$Cg="Congresos\CongresosController";
	Route::get('/', "$Cg@index")->name('/');
});	
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Menus', 'as'=>'Menus'], function () {
	$Me="Menus\MenusController";
	Route::get('/', "$Me@index")->name('/');
});
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Settings', 'as'=>'Settings'], function () {
	$Set="Settings\SettingsController";
	Route::get('/', "$Set@index")->name('/');
});	
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Traducciones', 'as'=>'Traducciones'], function () {
	$tra ="Traducciones\TraduccionesController";
	Route::get('/', "$tra@index")->name('/');
});	
//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Grupos', 'as'=>'Grupos'], function () {
	$Gr="Grupos\GruposController";
	Route::get('/', "$Gr@index")->name('/');
});
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'TiendaAdmin', 'as'=>'TiendaAdmin'], function () {
	$Tienda="Tienda\TiendaAdmin";
	Route::get('/', "$Tienda@index")->name('/');
}); 
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'TiendaUsuario', 'as'=>'TiendaUsuario'], function () {
	$TiendaU="Tienda\TiendaUsuario";
	Route::get('/', "$TiendaU@index")->name('/');
});
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Patrocinadores', 'as'=>'Patrocinadores'], function () {
	$Patro="Patrocinadores\PatrocinadoresController";
	Route::get('/', "$Patro@index")->name('/');
});
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'SeccionEstu', 'as'=>'SeccionEstu'], function () {
	$S_E="SeccionEstu\SeccionEstuController";
	Route::get('/', "$S_E@index")->name('/');
});
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'BolsaTrabajo', 'as'=>'BolsaTrabajo'], function () {
		$BT="BolsaTrabajo\BolsaTrabajoController";
		Route::get('/', "$BT@index")->name('/');
});
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Chat', 'as'=>'Chat'], function () {
	$chat="Chat\ChatController";
	Route::get('/', "$chat@index")->name('/');
});	
//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Cursos', 'as'=>'Cursos'], function () {
	$cursos="Cursos\CursosController";
	Route::get('/', "$cursos@index")->name('/');
});
	//can
Route::group(["middleware"=>['auth'], 'prefix'=>'Elecciones', 'as'=>'Elecciones'], function () {
	$Elecciones="Elecciones\EleccionesController";
	Route::get('/', "$Elecciones@index")->name('/');
}); 	