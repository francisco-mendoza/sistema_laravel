<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('prueba', function(){
	return "hola prueba";
});


Route::get('/','FrontController@index');
Route::get('/mercadopublico','FrontController@mercadopublico'); 
Route::get('/mailchimp','FrontController@mailchimp'); //ruta a controlador
//Route::get('/login','LogController@index');

Route::resource('movie','MovieController');
Route::resource('usuario','UsuarioController');

Route::get('cotizacionesList','ClienteController@cotizacionesList');
Route::get('emailsList','ClienteController@emailsList');
Route::get('reunionesList','ClienteController@reunionesList');
Route::get('llamadasList','ClienteController@llamadasList');
Route::get('cliente/detalle','ClienteController@detalle');



//storeRoute::get('contacto/creaContactoDetalle','ContactoController@creaContactoDetalle');
Route::resource('contacto','ContactoController');

Route::get('llamadasList2','ActividadController@llamadasLista');
Route::get('actividad/cotizacionesList','ActividadController@cotizacionesList');
Route::get('actividad/emailsList','ActividadController@emailsList');
Route::get('actividad/reunionesList','ActividadController@reunionesList');


Route::get('actividad/estados/{id}','ActividadController@getEstados');
Route::get('actividad/resultados/{id}','ActividadController@getResultados');
Route::get('actividad/detalle','ActividadController@detalle');
Route::resource('actividad','ActividadController');


Route::get('ministerioss','MinisterioController@listing');
Route::resource('ministerio','MinisterioController');


Route::resource('log','LogController');
Route::get('logout','LogController@logout');

Route::get('cliente/estados/{id}','ClienteController@getEstados');
Route::get('cliente/resultados/{id}','ClienteController@getResultados');
Route::get('cliente/editar','ClienteController@editar');
Route::resource('cliente','ClienteController');


Route::resource('cargo','CargoController');
Route::resource('area','AreaController');

/*Route::get('usuario/','UsuarioController@index');
Route::post('usuario/crear','UsuarioController@store');
Route::get('usuario/crear','UsuarioController@create');*/
