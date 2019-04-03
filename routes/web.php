<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('index', 'indexController@show');
Route::get('/', 'indexController@show');

Route::get('curador', 'CuradorController@create');
Route::post('curador', 'CuradorController@insert');
Route::get('receta/{id}', 'RecetasController@show');
//creo la ruta para los comentarios
Route::post('receta/{id}', 'CommentsController@store');

Route::get('receta/edicion/{id}', 'CuradorController@edit');
Route::put('receta/edicion/{id}', 'CuradorController@update');
Route::delete('receta/edicion/{id}', 'CuradorController@destroy');

//ruta para mostrar todas las recetas
Route::get('recetasTodas', 'CuradorController@show');

//nosotros quienes somos
Route::get('nosotros', 'StaticController@show');

//contacto
Route::get('contacto', 'StaticController@showContacto');
Route::post('contacto', 'StaticController@insertContacto');

//todas las recetas, pagina del header
Route::get('recetas', 'StaticController@showReceta');
Route::post('recetas', 'StaticController@insertReceta');

Auth::routes();

Route::get('/miperfil', 'StaticController@showPerfil');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
