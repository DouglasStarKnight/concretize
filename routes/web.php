<?php
// dd("oi");
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Modules\Admin\AdminController;
use App\Modules\login\LoginController;
use App\Modules\Inicio\InicioController;
use App\Modules\Produtos\ProdutosController;
use App\Modules\Register\RegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('register')->as('register.')->group(function () {
    Route::get('/index', [ RegisterController::class, 'showForm'])->name('index');
    Route::post('/registrando', [RegisterController::class, 'cria'])->name('submit');

});

route::prefix('login')->as('login.')->group(function(){
    Route::get('/index', [ LoginController::class, 'showForm'])->name('index');
    Route::post('/logando', [LoginController::class, 'login'])->name('submit');
});

route::prefix('inicio')->as('inicio.')->group(function(){
    Route::get('/index', [ InicioController::class, 'showForm'])->name('index');
    Route::get('/findall', [ InicioController::class, 'findAll'])->name('buscatudo');
    Route::get('/index', [ InicioController::class, 'showForm'])->name('index');
    Route::get('/index', [ InicioController::class, 'showForm'])->name('index');
});

route::prefix('admin')->as('admin.')->group(function(){
    route::get('/index', [AdminController::class, 'index'])->name('index');
    route::post('/cria', [AdminController::class, 'cria'])->name('cria');
    route::get('/findAll', [AdminController::class, 'findAll'])->name('findAll');
    route::patch('/edita/{id?}', [AdminController::class, 'edita'])->name('edita');
    route::delete('/delete/{id?}', [AdminController::class, 'delete'])->name('delete');
});

route::prefix('produtos')->as('produtos.')->group(function(){
    route::get('/index', [ProdutosController::class, 'index'])->name('index');
    route::get('/listagem', [ProdutosController::class, 'listagem'])->name('listagem');
    route::get('/findAll', [ProdutosController::class, 'findAll'])->name('findAll');
});
