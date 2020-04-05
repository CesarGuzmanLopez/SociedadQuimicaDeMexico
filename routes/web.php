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
});
//Route::get('/home', 'HomeController@index')->name('home');//->middleware('role:web-developer');;
