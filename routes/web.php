<?php
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Modules\Admin\AdminController;
use App\Modules\Login\LoginController;
use App\Modules\Carrinho\CarrinhoController;
use App\Modules\Inicio\InicioController;
use App\Modules\Slides\SlidesController;
use App\Modules\Profile\ProfileController;
use App\Modules\Produtos\ProdutosController;
use App\Modules\Register\RegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/teste', function() {
    return 'ok';
});
Route::prefix('register')->as('register.')->controller(RegisterController::class)->group(function () {
    Route::get('/index', 'showForm')->name('index');
    Route::post('/cria', 'cria')->name('cria');
});

route::prefix('login')->as('login.')->controller(LoginController::class)->group(function(){
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/index', 'showForm')->name('index');
    Route::post('/logando', 'login')->name('submit');
});

route::prefix('inicio')->as('inicio.')->controller(InicioController::class)->group(function(){
    Route::get('/index', 'showForm')->name('index');
    Route::get('/findall', 'findAll')->name('buscatudo');
    Route::get('/index', 'showForm')->name('index');
    Route::get('/index', 'showForm')->name('index');
});

Route::prefix('admin')->as('admin.')->controller(AdminController::class)->group(function(){
    Route::post('/cria', 'cria')->name('cria');
    Route::get('/findAll', 'findAll')->name('findAll');
    Route::post('/edita/{id?}', 'edita')->name('edita');
    Route::delete('/delete/{id?}', 'delete')->name('delete');
    Route::get('/index', 'index')->name('index');
    Route::post('/destaque', 'destaque')->name('destaque');
    Route::post('/destaqueEdita/{id?}', 'destaqueEdita')->name('destaqueEdita');
    Route::delete('/exclui_destaque/{id?}', 'exclui_destaque')->name('exclui_destaque');
});
route::prefix('slides')->as('slides.')->controller(SlidesController::class)->group(function(){
    route::post('/cria', 'slidesCria')->name('cria');
    route::patch('/edita/{id?}', 'slidesEdita')->name('edita');
});

route::prefix('produtos')->as('produtos.')->controller(ProdutosController::class)->group(function(){
    route::get('/index', 'index')->name('index');
    route::get('/listagem',  'listagem')->name('listagem');
    route::get('/descricao/{id?}',  'descricao')->name('descricao');
    route::get('/findAll',  'findAll')->name('findAll');
});

route::prefix('profile')->as('profile.')->controller(ProfileController::class)->group(function(){
    route::get('/index/{id?}', 'index')->name('index');
    route::post('/edita/{id?}', 'edita')->name('edita');
});

route::prefix('carrinho')->as('carrinho.')->controller(CarrinhoController::class)->group(function(){
    route::get('/index', 'index')->name('index');
    route::get('/pagamento', 'pagamento')->name('pagamento');
    route::post('/cria', 'cria')->name('cria');
    route::DELETE('/delete/{id?}', 'delete')->name('delete');
});

