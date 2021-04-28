<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MonograficoController;


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
})->name('index');

Route::get('/search', [SearchController::class, 'search'])->name('result_search');

Route::get('/monografico/show/{id}', [MonograficoController::class, 'show'])->name('monografico_show');

Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login_post');

Route::get('/test', function () {
    return hola;
});
