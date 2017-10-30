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

Route::get('/', function () 
{
    return redirect('/recipes');
});

Route::get('/recipes', 'RecipesController@index'); //prikaz svih recepata

Route::get('/recipes/add', 'RecipesController@add'); // prikaz obrazca za unos recepta
Route::post('/recipes/add', 'RecipesController@save'); //spremanje podataka u bazu

Route::get('/recipes/view/{id}', 'RecipesController@view'); //pregled pojedinog recepta

Route::get('/recipes/edit/{id}', 'RecipesController@edit'); //prikaz web obrasca za uređivanje recepta
Route::post('/recipes/edit', 'RecipesController@update'); //izmjena recepta u bazi

Route::delete('/recipes/del/{id}', 'RecipesController@delete'); //brisanje određeno grecepta

