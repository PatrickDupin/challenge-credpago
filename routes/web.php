<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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
    Route::get('', [RegistroController::class, 'create'])->name('registrar');
    Route::post('', [RegistroController::class, 'store']);
});

Route::prefix('entrar')->group(function(){
    Route::get('', [LoginController::class, 'index'])->name('entrar');
    Route::post('', [LoginController::class, 'entrar']);
});
Route::get('sair',[LoginController::class, 'sair']);

Route::get('inicio', [HomeController::class, 'index'])->name('inicio');

Route::middleware('xpto_auth')->group(function (){
    Route::prefix('url')->group(function () {
        Route::get('', [UrlsController::class, 'index'])->name('url.index');
        Route::get('/cadastrar', [UrlsController::class, 'create'])->name('url.create');
        Route::post('/cadastrar', [UrlsController::class, 'store'])->name('url.store');
        Route::get('/{idUrl}', [UrlsController::class, 'show'])->name('url.show');
        Route::get('/editar/{idUrl}', [UrlsController::class, 'edit'])->name('url.edit');
        Route::put('/{idUrl}', [UrlsController::class, 'update'])->name('url.update');
        Route::delete('/{idUrl}', [UrlsController::class, 'destroy'])->name('url.destroy');
    });
});
