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

//GET
Route::get('/', function () {
    return view('welcome');
});



Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/employees', 'EmployeController@index');
Route::get('/clients', 'ClientController@index');
Route::get('/vol', 'VolController@index');
Route::get('/billets', 'BilletController@index');


Route::post('/employe/add', 'EmployeController@store');
Route::get('/delete/{id}', ['as' => 'employe.delete', 'uses' => 'EmployeController@delete']);
Route::post('employe/update/{id}', 'EmployeController@update');
Route::get('/clients/delete/{id}', ['as' => 'client.delete', 'uses' => 'ClientController@delete']);
Route::post('/clients/add', 'ClientController@store');
Route::post('/clients/update/{id}', 'ClientController@update');
Route::post('billet/add', 'BilletController@store');
Route::post('billet/update/{id}', 'BilletController@update');
Route::get('billet/{id}', ['as' => 'billet.delete', 'uses' => 'BilletController@delete']);
Route::post('vol/update/{id}', 'VolController@update');
Route::post('vol/add', 'VolController@store');
Route::get('/vol/delete/{id}', ['as' => 'vol.delete', 'uses' => 'VolController@delete']);


