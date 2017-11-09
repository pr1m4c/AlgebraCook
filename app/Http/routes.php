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

// Rute za autentifikaciju

Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');

// rute za regisraciju

Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');

//Route::get('/hello', 'testController@hello');

Route::get('/', function () 
{
    return redirect('/recipes');
});


Route::get('/home', function () 
{
    return redirect('/recipes');
});

Route::get('/recipes', 'RecipesController@index'); //prikaz svih recepata

Route::get('/recipes/add', 'RecipesController@add'); // prikaz obrazca za unos recepta
Route::post('/recipes/add', 'RecipesController@save'); //spremanje podataka u bazu

Route::get('/recipes/view/{id}', 'RecipesController@view'); //pregled pojedinog recepta

Route::get('/recipes/edit/{id}', 'RecipesController@edit'); //prikaz web obrasca za uređivanje recepta
Route::post('/recipes/edit', 'RecipesController@update'); //izmjena recepta u bazi

Route::get('/recipes/del/{id}', 'RecipesController@delete'); //brisanje određeno grecepta

Route::get('/sastojci', 'RecipesController@viewsastojak'); //svi sastojci iz baze