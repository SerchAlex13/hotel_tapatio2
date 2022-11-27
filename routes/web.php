<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
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

Route::get('/estado_cuenta', function () {
    return view('interfaces/estado_cuenta');
});

Route::get('/estado_cuenta_pagado', function () {
    return view('interfaces/estado_cuenta_pagado');
});

Route::get('/estado_cuenta/{user}', [ReservationController::class, 'notificarFactura'])->name('factura.correo');



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
