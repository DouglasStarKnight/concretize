<?php

use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Modules\Admin\AdminController;
use App\Modules\login\LoginController;
use App\Modules\Inicio\InicioController;
use App\Modules\Produtos\produtosController;
use App\Modules\Register\RegisterController;

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
    Route::get('/findall', [ InicioController::class, 'findAll'])->name('buscatudo');
    Route::get('/index', [ InicioController::class, 'showForm'])->name('index');
    Route::get('/index', [ InicioController::class, 'showForm'])->name('index');
});

route::prefix('admin')->name('admin.')->group(function(){
    route::get('/index', [adminController::class, 'index'])->name('index');
    route::post('/cria', [AdminController::class, 'cria'])->name('cria');
    route::get('/findAll', [AdminController::class, 'findAll'])->name('findAll');
});

route::prefix('produtos')->name('produtos.')->group(function(){
    route::get('/index', [produtosController::class, 'index'])->name('index');
    // route::post('/cria', [AdminController::class, 'cria'])->name('cria');
    route::get('/findAll', [produtosController::class, 'findAll'])->name('findAll');
});
