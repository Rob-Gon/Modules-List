<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ModuloController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

Route::post('/login', [UsuarioController::class, 'login'])->name('login');

Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::get('/modulo', [ModuloController::class, 'mostrarModulos'])->name('modulo');
