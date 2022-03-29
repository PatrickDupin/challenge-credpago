<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('registrar')->group(function(){
    Route::get('','RegistroController@index');
    Route::post('','RegistroController@registrar');
});

Route::prefix('entrar')->group(function(){
    Route::get('','EntrarController@index');
    Route::post('','EntrarController@entrar');
});

Route::prefix('url')->group(function () {
    Route::get('','UrlController@index');
    Route::get('','UrlController@create');
    Route::post('','UrlController@store');
    Route::get('{idUrl}','UrlController@show');
    Route::get('{idUrl}','UrlController@edit');
    Route::put('{idUrl}','UrlController@update');
    Route::delete('{idUrl}','UrlController@destroy');
});
