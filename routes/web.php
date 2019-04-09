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

Route::get('index', 'IndexController@show');
Route::get('/', 'IndexController@show');

Route::get('curador', 'CuradorController@create')->middleware('admin');
Route::post('curador', 'CuradorController@insert')->middleware('admin');
Route::get('receta/{id}', 'RecetasController@show');
//creo la ruta para los comentarios
Route::post('receta/{id}', 'CommentsController@storeComment');
Route::put('receta/{id}/{idComment}', 'CommentsController@editComment');
Route::delete('receta/{id}/{idComment}', 'CommentsController@destroyComment');

Route::get('curador/edicion/{id}', 'CuradorController@edit')->middleware('admin');
Route::put('curador/edicion/{id}', 'CuradorController@update')->middleware('admin');
Route::delete('curador/edicion/{id}', 'CuradorController@destroy')->middleware('admin');

//ruta para mostrar todas las recetas
Route::get('recetasTodas', 'CuradorController@show')->middleware('admin');

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
