<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MonograficoController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\ManageController;


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

Route::get('/test', function () {

});

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/search', [SearchController::class, 'search'])->name('result_search');

Route::get('/monografico/show/{id}', [MonograficoController::class, 'show'])->name('monografico_show');

Route::get('/login', function () {
    
    return view('user.login');

})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login_post');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'loginuser', 'as'=>'manage.', 'prefix' => 'manage'], function () {

    Route::get('/index', ManageController::class)->name('index');
    
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

    Route::get('/universidad/index', [UniversidadController::class, 'index'])->name('universidades.index');
    Route::get('/universidad/create', [UniversidadController::class, 'create'])->name('universidades.create');
    Route::post('/universidad/store', [UniversidadController::class, 'store'])->name('universidades.store');
    Route::get('/universidad/edit/{id}', [UniversidadController::class, 'edit'])->name('universidades.edit');
    Route::post('/universidad/update/{id}', [UniversidadController::class, 'update'])->name('universidades.update');
    Route::get('/universidad/show/{id}', [UniversidadController::class, 'show'])->name('universidades.show');
    Route::post('/universidad/delete', [UniversidadController::class, 'destroy'])->name('universidades.delete');

    Route::group(['middleware' => 'loginadmin', 'as'=>'admin.', 'prefix' => '/admin'], function () {
        
        Route::get('/test', function () {
    
        });
        
        Route::get('/user/index', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::post('/user/delete', [UserController::class, 'destroy'])->name('user.delete');
    });
});

Route::fallback(function () {
    return redirect()->route('index');
});