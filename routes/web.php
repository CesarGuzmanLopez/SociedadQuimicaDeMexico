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


Route::get('/', "Publico\PublicaController@index")->name("/");
Route::get("/login","Publico\PublicaController@login")->name('Login'); 
Route::get("/Registro","Publico\PublicaController@Registro")->name("Registro");
Route::post("/auth","Publico\PublicaController@authenticate")->name('auth');
Route::post("/logout","Publico\PublicaController@logout")->name('logout');
Route::post("/Registrar","Publico\PublicaController@Registrar")->name('Registrar');
Route::get("/Verificar/{code}","Publico\PublicaController@Verificar")->name("Verificar");
Route::get("/Recuperar/{code}","Publico\PublicaController@Recuperar")->name("Recuperar");

Route::post("/RecuperarPost","Publico\PublicaController@Recuperar_post" )->name("RecuperarPost");
Route::get("/Recuperar_pass","Publico\PublicaController@Recuperar_pass" )->name("Recuperar_pass");

Route::post("/newpass","Publico\PublicaController@newpass" )->name("newpass");

Route::group(['middleware' =>"auth", 'prefix' => 'Usuario', 'as' => 'Usuario'], function (){ 
    Route::get('/', "Sesion\SesionController@index")->name("/"); 
    Route::get("Cambiar_Perfil",            "Sesion\SesionController@Cambiar_Perfil")->name("/Cambiar_Perfil");
    Route::post("/Cambiar_Perfil_post","Sesion\SesionController@Cambiar_Perfil_post")->name("/Cambiar_Perfil_post");
});
Route::group(["middleware"=>['auth','can:mod-permisos'], 'prefix'=>'RolesPermisos', 'as'=>'RolesPermisos'],function(){
    Route::get('/', "Roles_y_permisos\RolesPermisos@index")->name('/');
    Route::get('/AgregarPermiso', "Roles_y_permisos\RolesPermisos@AgregarPermiso")->name('/AgregarPermiso');
    Route::get('/AgregarRol', "Roles_y_permisos\RolesPermisos@AgregarRol")->name('/AgregarRol');
    Route::get('/AgregarPermisoARol', "Roles_y_permisos\RolesPermisos@AgregarPermisoARol")->name('/AgregarPermisoARol');
    Route::get('/AgregarPermisoARol/{id_rol}', "Roles_y_permisos\RolesPermisos@AgregarPermisoARolID")->name('/AgregarPermisoARol/');
    Route::post('/AgregarPermisoARol_post', "Roles_y_permisos\RolesPermisos@AgregarPermisoARol_post")->name('/AgregarPermisoARol_post');
    Route::get('/AgregarPermisoAUsuario', "Roles_y_permisos\RolesPermisos@AgregarPermisoAUsuario")->name('/AgregarPermisoAUsuario');
    Route::get('/AgregarPermisoAUsuario/{id_rol}', "Roles_y_permisos\RolesPermisos@AgregarPermisoAUsuarioID")->name('/AgregarPermisoAUsuario/');
    Route::post('/AgregarPermisoAUsuario_post', "Roles_y_permisos\RolesPermisos@AgregarPermisoAUsuario_post")->name('/AgregarPermisoAUsuario_post');
    Route::get('/AgregarRolAUsuario', "Roles_y_permisos\RolesPermisos@AgregarRolAUsuario")->name('/AgregarRolAUsuario');
    Route::get('/AgregarRolAUsuario/{id_rol}', "Roles_y_permisos\RolesPermisos@AgregarRolAUsuarioID")->name('/AgregarRolAUsuario/');
    Route::post('/AgregarRolAUsuario_post', "Roles_y_permisos\RolesPermisos@AgregarRolAUsuario_post")->name('/AgregarRolAUsuario_post');
    Route::get('/CrudRolesYUsuario', "Roles_y_permisos\RolesPermisos@CrudRolesYUsuario")->name('/CrudRolesYUsuario');
    Route::post('/AgregarPermisoPost',"Roles_y_permisos\RolesPermisos@AgregarPermisoPost")->name("/AgregarPermisoPost");
    Route::post('/ActualizarEliminarPermiso',"Roles_y_permisos\RolesPermisos@ActualizarEliminarPermiso")->name("/ActualizarEliminarPermiso");
    Route::post('/AgregarRolPost',"Roles_y_permisos\RolesPermisos@AgregarRolPost")->name("/AgregarRolPost");
    Route::post('/ActualizarRolrPermiso',"Roles_y_permisos\RolesPermisos@ActualizarEliminarRol")->name("/ActualizarEliminarRol");
	Route::post("/CrudRolesYUsuarioPost",'Roles_y_permisos\RolesPermisos@CrudRolesYUsuarioPost')->name("/CrudRolesYUsuarioPost"); 
});
//Route::get('/home', 'HomeController@index')->name('home');//->middleware('role:web-developer');;
