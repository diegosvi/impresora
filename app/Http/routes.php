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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('inven/area','AreaController');
Route::resource('inven/oficina','OficinaController');
Route::resource('inven/modeloimpresora','ModeloImpresoraController');
Route::resource('inven/modelocartucho','ModeloCartuchoController');
Route::resource('inven/impresora','ImpresoraController');
Route::resource('inven/cartucho','CartuchoController');
Route::resource('inven/recargacartucho','RecargaCartuchoController');
Route::resource('inven/impresion','ImpresionController');