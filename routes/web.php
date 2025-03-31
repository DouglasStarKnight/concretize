<?php

use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Modules\Register\RegisterController;
use App\Modules\login\LoginController;
use App\Modules\Inicio\InicioController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('register')->group(function () {
    Route::get('/index', [ RegisterController::class, 'showForm'])->name('register');
    Route::post('/registrando', [RegisterController::class, 'cria'])->name('register.submit');
});

route::prefix('login')->group(function(){
    Route::get('/index', [ LoginController::class, 'showForm'])->name('login');
    Route::post('/logando', [LoginController::class, 'login'])->name('login.submit');
});

route::prefix('inicio')->group(function(){
    Route::get('/index', [ InicioController::class, 'showForm'])->name('inicio');
});
