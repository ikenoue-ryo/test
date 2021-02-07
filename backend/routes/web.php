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
// Route::get('/','TodosController@index'); 
// Route::resource('todos','TodosController');

Route::get('/','TodosController@index');
Route::resource('todos','TodosController');
Route::patch('/todos/{todo}/done','TodosController@done');
Route::delete('/todos/{todo}/cancel','TodosController@cancel');