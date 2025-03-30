<?php

use app\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Modules\Register\RegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('register')->group(function () {
    Route::get('/', [ RegisterController::class, 'showForm'])->name('register');
    Route::post('/', [RegisterController::class, 'cria'])->name('register.submit');
});
