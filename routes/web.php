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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/fixtures','FixturesController@index');
Route::get('/fixtures/{id}', 'FixturesController@show');

Route::get('/matches', 'MatchesController@index');
Route::get('/matches/{id}', 'MatchesController@show');

Route::get('/live', 'LivesController@live');
