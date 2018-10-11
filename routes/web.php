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

Route::post('/storeItem', 'MainController@storeItem');
Route::get('/getItems', 'MainController@getItems');
Route::post('/deletItem/{id}', 'MainController@deleteItem');
Route::post('/editItem/{id}', 'MainController@editItem');
