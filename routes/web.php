<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\TallaController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\PrendaController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ReservationController;

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
    return view('index');
});

Route::get('/iniciar_sesion', function () {
    return view('interfaces/iniciar_sesion');
});

Route::get('/perfil', function () {
    return view('interfaces/perfil');
});

Route::get('/registro_usuario', function () {
    return view('interfaces/registro_usuario');
});

Route::get('/prenda/correo/{user}/{prenda}', [PrendaController::class, 'notificarNuevaPrenda'])->name('prenda.correo');

Route::get('/descarga/{archivo}', [PrendaController::class, 'descargaArchivo'])->name('descarga');


Route::resource('user', UserController::class);
Route::resource('type', TypeController::class);
Route::resource('room', RoomController::class);
Route::patch('/room/{room}/actualizar', [RoomController::class, 'actualizarDisponibilidad'])->name('actualizar');
Route::get('/room/type/{type}', [RoomController::class, 'indexTipo'])->name('indexTipo');
Route::resource('reservation', ReservationController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');
});
