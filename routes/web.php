<?php

use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Modules\Register\RegisterController;
use App\Modules\login\LoginController;
use App\Modules\Inicio\InicioController;
use App\Modules\Admin\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('register')->name('register.')->group(function () {
    Route::get('/index', [ RegisterController::class, 'showForm'])->name('index');
    Route::post('/registrando', [RegisterController::class, 'cria'])->name('submit');
});

route::prefix('login')->name('login.')->group(function(){
    Route::get('/index', [ LoginController::class, 'showForm'])->name('index');
    Route::post('/logando', [LoginController::class, 'login'])->name('submit');
});

route::prefix('inicio')->name('inicio.')->group(function(){
    Route::get('/index', [ InicioController::class, 'showForm'])->name('index');
});

route::prefix('admin')->name('admin.')->group(function(){
    route::get('/index', [adminController::class, 'index'])->name('index');
    route::post('/cria', [AdminController::class, 'cria'])->name('cria');
});
