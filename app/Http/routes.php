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

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/tags', 'HomeController@index');
Route::get('/clientes', 'HomeController@index');

//JOBS//////////////////////////////////////////////////
//Views
Route::get('/jobs', 'JobController@index');
Route::get('/job/{id}', 'JobController@detalhar');
//Ajax
Route::get('/listar-jobs', 'JobController@listar');
Route::post('/inserir-job', 'JobController@inserir');
Route::post('/alterar-job/{id}', 'JobController@alterar');
Route::get('/excluir-job/{id}', 'JobController@excluir');
///////////////////////////////////////////////////////////