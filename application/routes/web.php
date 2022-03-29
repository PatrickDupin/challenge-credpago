<?php

use App\Http\Controllers\EntrarController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UrlsController;
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
    Route::get('', [RegistroController::class, 'index']);
    Route::post('', [RegistroController::class, 'registrar']);
});

Route::prefix('entrar')->group(function(){
    Route::get('', [EntrarController::class, 'index']);
    Route::post('', [EntrarController::class, 'entrar']);
});

Route::get('inicio', [InicioController::class, 'index']);

Route::prefix('url')->group(function () {
    Route::get('', [UrlsController::class, 'index'])->name('url.index');
    Route::post('', [UrlsController::class, 'store'])->name('url.store');
    Route::get('/cadastrar', [UrlsController::class, 'create'])->name('url.create');
    Route::get('/{idUrl}', [UrlsController::class, 'show'])->name('url.show');
    Route::get('/editar/{idUrl}', [UrlsController::class, 'edit'])->name('url.edit');
    Route::put('/{idUrl}', [UrlsController::class, 'update'])->name('url.update');
    Route::delete('/{idUrl}', [UrlsController::class, 'destroy'])->name('url.destroy');
});
