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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
});

Route::get('enviararquivo', function () {
    return view('enviararquivo');
})->name('enviararquivo');


Route::get('usuarios', function () {
    return view('usuarios');
})->name('usuarios');

Route::resource('arquivos', App\Http\Controllers\ArquivoController::class);

Route::resource('grupos', App\Http\Controllers\GrupoController::class);

Route::resource('usuarios', App\Http\Controllers\UserController::class);


