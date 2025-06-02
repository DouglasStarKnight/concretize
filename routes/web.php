<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Modules\Admin\AdminController;
use App\Modules\Login\LoginController;
use App\Modules\Inicio\InicioController;
use App\Modules\Produtos\ProdutosController;
use App\Modules\Register\RegisterController;
use App\Modules\Profile\ProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('register')->as('register.')->controller(RegisterController::class)->group(function () {
    Route::get('/index', 'showForm')->name('index');
    Route::post('/cria', 'cria')->name('cria');
});

route::prefix('login')->as('login.')->controller(LoginController::class)->group(function(){
    Route::get('/index', 'showForm')->name('index');
    Route::post('/logando', 'login')->name('submit');
});

route::prefix('inicio')->as('inicio.')->controller(InicioController::class)->group(function(){
    Route::get('/index', 'showForm')->name('index');
    Route::get('/findall', 'findAll')->name('buscatudo');
    Route::get('/index', 'showForm')->name('index');
    Route::get('/index', 'showForm')->name('index');
});

route::prefix('admin')->as('admin.')->controller(AdminController::class)->group(function(){
    route::post('/cria', 'cria')->name('cria');
    route::get('/findAll', 'findAll')->name('findAll');
    route::patch('/slides/{id?}', 'slides')->name('slides');
    route::patch('/edita/{id?}', 'edita')->name('edita');
    route::delete('/delete/{id?}', 'delete')->name('delete');
    route::get('/index', 'index')->name('index');
});

route::prefix('produtos')->as('produtos.')->controller(ProdutosController::class)->group(function(){
    route::get('/index', 'index')->name('index');
    route::get('/listagem',  'listagem')->name('listagem');
    route::get('/findAll',  'findAll')->name('findAll');
});

route::prefix('profile')->as('profile.')->controller(ProfileController::class)->group(function(){
    route::get('/index', 'index')->name('index');
    route::post('/atualiza',  'atualiza')->name('atualiza');
});


