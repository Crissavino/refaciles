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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', 'indexController@show');

Route::get('curador', 'CuradorController@create');
Route::post('curador', 'CuradorController@insert');
// Route::put('curador', 'CuradorController@edit');

Route::get('curador/ingredientes', 'CuradorController@createIngredientes');
Route::post('curador/ingredientes', 'CuradorController@insertIngredientes');

Route::get('curador/instrucciones', 'CuradorController@createInstrucciones');
Route::post('curador/instrucciones', 'CuradorController@insertInstrucciones');

Route::get('receta/{id}', 'RecetasController@show');

//creo la ruta para los comentarios
Route::post('receta/{id}', 'CommentsController@store');

// Route::get('receta/{id}/comentario', 'CommentsController@store')->name('receta.show');
// Route::resource('comments', 'CommentsController');

//nosotros quienes somos
Route::get('nosotros', 'StaticController@show');

//contacto
Route::get('contacto', 'StaticController@showContacto');
Route::post('contacto', 'StaticController@insertContacto');

//todas las recetas, pagina del header
Route::get('recetas', 'StaticController@showReceta');
Route::post('recetas', 'StaticController@insertReceta');

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/home', 'HomeController@index')->name('home');
