<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MonograficoController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\RecintoController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\EscuelaController;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\SustentanteController;
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

Route::get('/monografico/show/{id}', [MonograficoController::class, 'detail'])->name('monografico_show');

Route::get('/login', function () {
    
    return view('user.login');

})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login_post');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'loginuser', 'as'=>'manage.', 'prefix' => 'manage'], function () {

    Route::get('/index', ManageController::class)->name('index');
    
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/user/update/profile/{id}', [UserController::class, 'updateProfile'])->name('user.updateProfile');

    Route::get('/universidad/index', [UniversidadController::class, 'index'])->name('universidades.index');
    Route::get('/universidad/create', [UniversidadController::class, 'create'])->name('universidades.create');
    Route::post('/universidad/store', [UniversidadController::class, 'store'])->name('universidades.store');
    Route::get('/universidad/edit/{id}', [UniversidadController::class, 'edit'])->name('universidades.edit');
    Route::post('/universidad/update/{id}', [UniversidadController::class, 'update'])->name('universidades.update');
    Route::get('/universidad/show/{id}', [UniversidadController::class, 'show'])->name('universidades.show');
    Route::post('/universidad/delete', [UniversidadController::class, 'destroy'])->name('universidades.delete');
    
    Route::get('/recinto/index', [RecintoController::class, 'index'])->name('recintos.index');
    Route::get('/recinto/create', [RecintoController::class, 'create'])->name('recintos.create');
    Route::post('/recinto/store', [RecintoController::class, 'store'])->name('recintos.store');
    Route::get('/recinto/edit/{id}', [RecintoController::class, 'edit'])->name('recintos.edit');
    Route::post('/recinto/update/{id}', [RecintoController::class, 'update'])->name('recintos.update');
    Route::get('/recinto/show/{id}', [RecintoController::class, 'show'])->name('recintos.show');
    Route::post('/recinto/delete', [RecintoController::class, 'destroy'])->name('recintos.delete');

    Route::get('/facultad/index', [FacultadController::class, 'index'])->name('facultades.index');
    Route::get('/facultad/create', [FacultadController::class, 'create'])->name('facultades.create');
    Route::post('/facultad/store', [FacultadController::class, 'store'])->name('facultades.store');
    Route::get('/facultad/edit/{id}', [FacultadController::class, 'edit'])->name('facultades.edit');
    Route::post('/facultad/update/{id}', [FacultadController::class, 'update'])->name('facultades.update');
    Route::get('/facultad/show/{id}', [FacultadController::class, 'show'])->name('facultades.show');
    Route::post('/facultad/delete', [FacultadController::class, 'destroy'])->name('facultades.delete');

    Route::get('/escuela/index', [EscuelaController::class, 'index'])->name('escuelas.index');
    Route::get('/escuela/create', [EscuelaController::class, 'create'])->name('escuelas.create');
    Route::post('/escuela/store', [EscuelaController::class, 'store'])->name('escuelas.store');
    Route::get('/escuela/edit/{id}', [EscuelaController::class, 'edit'])->name('escuelas.edit');
    Route::post('/escuela/update/{id}', [EscuelaController::class, 'update'])->name('escuelas.update');
    Route::get('/escuela/show/{id}', [EscuelaController::class, 'show'])->name('escuelas.show');
    Route::post('/escuela/delete', [EscuelaController::class, 'destroy'])->name('escuelas.delete');

    Route::get('/carrera/index', [CarreraController::class, 'index'])->name('carreras.index');
    Route::get('/carrera/create', [CarreraController::class, 'create'])->name('carreras.create');
    Route::post('/carrera/store', [CarreraController::class, 'store'])->name('carreras.store');
    Route::get('/carrera/edit/{id}', [CarreraController::class, 'edit'])->name('carreras.edit');
    Route::post('/carrera/update/{id}', [CarreraController::class, 'update'])->name('carreras.update');
    Route::get('/carrera/show/{id}', [CarreraController::class, 'show'])->name('carreras.show');
    Route::post('/carrera/delete', [CarreraController::class, 'destroy'])->name('carreras.delete');

    Route::get('/autor/index', [AutorController::class, 'index'])->name('autores.index');
    Route::get('/autor/create', [AutorController::class, 'create'])->name('autores.create');
    Route::post('/autor/store', [AutorController::class, 'store'])->name('autores.store');
    Route::get('/autor/edit/{id}', [AutorController::class, 'edit'])->name('autores.edit');
    Route::post('/autor/update/{id}', [AutorController::class, 'update'])->name('autores.update');
    Route::get('/autor/show/{id}', [AutorController::class, 'show'])->name('autores.show');
    Route::post('/autor/delete', [AutorController::class, 'destroy'])->name('autores.delete');

    Route::get('/sustentante/index', [SustentanteController::class, 'index'])->name('sustentantes.index');
    Route::get('/sustentante/create', [SustentanteController::class, 'create'])->name('sustentantes.create');
    Route::post('/sustentante/store', [SustentanteController::class, 'store'])->name('sustentantes.store');
    Route::get('/sustentante/edit/{id}', [SustentanteController::class, 'edit'])->name('sustentantes.edit');
    Route::post('/sustentante/update/{id}', [SustentanteController::class, 'update'])->name('sustentantes.update');
    Route::get('/sustentante/show/{id}', [SustentanteController::class, 'show'])->name('sustentantes.show');
    Route::post('/sustentante/delete', [SustentanteController::class, 'destroy'])->name('sustentantes.delete');

    Route::get('/monografico/index', [MonograficoController::class, 'index'])->name('monograficos.index');
    Route::get('/monografico/create', [MonograficoController::class, 'create'])->name('monograficos.create');
    Route::post('/monografico/store', [MonograficoController::class, 'store'])->name('monograficos.store');
    Route::get('/monografico/edit/{id}', [MonograficoController::class, 'edit'])->name('monograficos.edit');
    Route::post('/monografico/update/{id}', [MonograficoController::class, 'update'])->name('monograficos.update');
    Route::get('/monografico/show/{id}', [MonograficoController::class, 'show'])->name('monograficos.show');
    Route::post('/monografico/delete', [MonograficoController::class, 'destroy'])->name('monograficos.delete');

    Route::group(['middleware' => 'loginadmin', 'as'=>'admin.', 'prefix' => '/admin'], function () {
        
        Route::get('/test', function () {
    
        });

        Route::get('/usuario/index', [UserController::class, 'index'])->name('usuarios.index');
        Route::get('/usuario/create', [UserController::class, 'create'])->name('usuarios.create');
        Route::post('/usuario/store', [UserController::class, 'store'])->name('usuarios.store');
        Route::get('/usuario/edit/{id}', [UserController::class, 'edit'])->name('usuarios.edit');
        Route::post('/usuario/update/{id}', [UserController::class, 'update'])->name('usuarios.update');
        Route::get('/usuario/show/{id}', [UserController::class, 'show'])->name('usuarios.show');
        Route::post('/usuario/delete', [UserController::class, 'destroy'])->name('usuarios.delete');
    });
});

Route::fallback(function () {
    return redirect()->route('index');
});