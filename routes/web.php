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

Auth::routes();

Route::middleware(['auth'])->group(function(){

    //Usuarios

    Route::get('usuarios','UserController@index')->name('usuarios.index')
          ->middleware('permission::usuarios.index');

    Route::put('usuarios/{id}','UserController@update')->name('usuarios.update')
          ->middleware('permission::usuarios.edit');

    Route::get('usuarios/{id}','UserController@show')->name('usuarios.show')
          ->middleware('permission::usuarios.show');

    Route::delete('usuarios/{id}','UserController@destroy')->name('usuarios.destroy')
          ->middleware('permission::usuarios.destroy');

    Route::get('usuarios/{id}/edit','UserController@edit')->name('usuarios.edit')
          ->middleware('permission::usuarios.edit');

    //Roles
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
          ->middleware('permission::roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
          ->middleware('permission::roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
          ->middleware('permission::roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
          ->middleware('permission::roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
          ->middleware('permission::roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
          ->middleware('permission::roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
          ->middleware('permission::roles.edit');

    //Sucursales INICIO
    Route::post('sucursales/store','FacilitiesController@store')->name('sucursales.store')
          ->middleware('permission::sucursales.create');

    Route::get('sucursales','FacilitiesController@index')->name('sucursales.index')
          ->middleware('permission::sucursales.index');

    Route::get('sucursales/create','FacilitiesController@create')->name('sucursales.create')
          ->middleware('permission::sucursales.create');

    Route::put('sucursales/{id}','FacilitiesController@update')->name('sucursales.update')
          ->middleware('permission::sucursales.edit');

    Route::get('sucursales/{id}','FacilitiesController@show')->name('sucursales.show')
          ->middleware('permission::sucursales.show');

    Route::delete('sucursales/{id}','FacilitiesController@destroy')->name('sucursales.destroy')
          ->middleware('permission::sucursales.destroy');

    Route::post('sucursales/{id}/edit','FacilitiesController@edit')->name('sucursales.edit')
          ->middleware('permission::sucursales.edit');
    //Sucursales FIN

    //Mesas INICIO
    Route::post('mesas/store','TablesController@store')->name('mesas.store')
          ->middleware('permission::mesas.create');

    Route::get('mesas','TablesController@index')->name('mesas.index')
          ->middleware('permission::mesas.index');

    Route::get('mesas/create','TablesController@create')->name('mesas.create')
          ->middleware('permission::mesas.create');

    Route::put('mesas/{id}','TablesController@update')->name('mesas.update')
          ->middleware('permission::mesas.edit');

    Route::get('mesas/{id}','TablesController@show')->name('mesas.show')
          ->middleware('permission::mesas.show');

    Route::delete('mesas/{id}','TablesController@destroy')->name('mesas.destroy')
          ->middleware('permission::mesas.destroy');

    Route::post('mesas/{id}/edit','TablesController@edit')->name('mesas.edit')
          ->middleware('permission::mesas.edit');
    //Mesas FIN

    //Meseros INICIO
    Route::post('meseros/store','WaitersController@store')->name('meseros.store')
          ->middleware('permission::meseros.create');

    Route::get('meseros','WaitersController@index')->name('meseros.index')
          ->middleware('permission::meseros.index');

    Route::get('meseros/create','WaitersController@create')->name('meseros.create')
          ->middleware('permission::meseros.create');

    Route::put('meseros/{id}','WaitersController@update')->name('meseros.update')
          ->middleware('permission::meseros.edit');

    Route::get('meseros/{id}','WaitersController@show')->name('meseros.show')
          ->middleware('permission::meseros.show');

    Route::delete('meseros/{id}','WaitersController@destroy')->name('meseros.destroy')
          ->middleware('permission::meseros.destroy');

    Route::post('meseros/{id}/edit','WaitersController@edit')->name('meseros.edit')
          ->middleware('permission::meseros.edit');
    //Meseros FIN

    //Encuestas INICIO
    Route::post('encuestas/store','PollsController@store')->name('encuestas.store')
          ->middleware('permission::encuestas.create');

    Route::get('encuestas','PollsController@index')->name('encuestas.index')
          ->middleware('permission::encuestas.index');

    Route::get('encuestas/create','PollsController@create')->name('encuestas.create')
          ->middleware('permission::encuestas.create');

    Route::put('encuestas/{id}','PollsController@update')->name('encuestas.update')
          ->middleware('permission::encuestas.edit');

    Route::get('encuestas/{id}','PollsController@show')->name('encuestas.show')
          ->middleware('permission::encuestas.show');

    Route::delete('encuestas/{id}','PollsController@destroy')->name('encuestas.destroy')
          ->middleware('permission::encuestas.destroy');

    Route::post('encuestas/{id}/edit','PollsController@edit')->name('encuestas.edit')
          ->middleware('permission::encuestas.edit');
    //Encuestas FIN

    //Preguntas INICIO
    Route::post('preguntas/store','QuestionsController@store')->name('preguntas.store')
          ->middleware('permission::preguntas.create');

    Route::get('preguntas','QuestionsController@index')->name('preguntas.index')
          ->middleware('permission::preguntas.index');

    Route::get('preguntas/create','QuestionsController@create')->name('preguntas.create')
          ->middleware('permission::preguntas.create');

    Route::put('preguntas/{id}','QuestionsController@update')->name('preguntas.update')
          ->middleware('permission::preguntas.edit');

    Route::get('preguntas/{id}','QuestionsController@show')->name('preguntas.show')
          ->middleware('permission::preguntas.show');

    Route::delete('preguntas/{id}','QuestionsController@destroy')->name('preguntas.destroy')
          ->middleware('permission::preguntas.destroy');

    Route::post('preguntas/{id}/edit','QuestionsController@edit')->name('preguntas.edit')
          ->middleware('permission::preguntas.edit');
    //Preguntas FIN

    //Exclusivos INICIO
    Route::post('exclusivos/store','ExclusivesController@store')->name('exclusivos.store')
          ->middleware('permission::exclusivos.create');

    Route::get('exclusivos','ExclusivesController@index')->name('exclusivos.index')
          ->middleware('permission::exclusivos.index');

    Route::get('exclusivos/create','ExclusivesController@create')->name('exclusivos.create')
          ->middleware('permission::exclusivos.create');

    Route::put('exclusivos/{id}','ExclusivesController@update')->name('exclusivos.update')
          ->middleware('permission::exclusivos.edit');

    Route::get('exclusivos/{id}','ExclusivesController@show')->name('exclusivos.show')
          ->middleware('permission::exclusivos.show');

    Route::delete('exclusivos/{id}','ExclusivesController@destroy')->name('exclusivos.destroy')
          ->middleware('permission::exclusivos.destroy');

    Route::post('exclusivos/{id}/edit','ExclusivesController@edit')->name('exclusivos.edit')
          ->middleware('permission::exclusivos.edit');
    //Exclusivos FIN
});
Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('sucursales','FacilitiesController');
//Route::resource('mesas','TablesController');
//Route::resource('meseros','WaitersController');
//Route::resource('encuestas','PollsController');
//Route::resource('preguntas','QuestionsController');
//Route::resource('exclusivos','ExclusivesController');
//Route::resource('encuesta','SurveysController');
//Route::get('/home', 'HomeController@index')->name('home');
