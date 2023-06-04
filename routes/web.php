<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\JuegoPersonalizadoController;
use App\Http\Controllers\CalificacionesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/juego', function () {
        return view('juego');
    })->name('juego');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/juego', function () {
        return view('juego');
    })->name('juego');
    Route::post('/juego-subir', [JuegoController::class, 'subir'])->name('juego.subir');
    Route::get('/calificaciones', function () {
        return view('calificaciones');
    })->name('calificaciones');
    Route::get('/comunidad', function () {
        return view('comunidad');
    })->name('comunidad');


    Route::get('creadorPreguntas', [CreadorPreguntasController::class, 'index'])->name('creadorPreguntas.index');
    Route::get('creadorPreguntas-create', [CreadorPreguntasController::class, 'create'])->name('creadorPreguntas.create');
    Route::get('creadorPreguntas-edit/{id}', [CreadorPreguntasController::class, 'edit'])->name('creadorPreguntas.edit');
    Route::get('juegoPersonalizado', [JuegoPersonalizadoController::class, 'index'])->name('juegoPersonalizado.index');
    Route::get('juegoPersonalizado-subs', [JuegoPersonalizadoController::class, 'subs'])->name('juegoPersonalizado.subs');
    Route::get('juegoPersonalizado-play/{id}', [JuegoPersonalizadoController::class, 'play'])->name('juegoPersonalizado.play');

    Route::group(['middleware' => 'rol'], function () {
        Route::get('admin/crearPregunta', function () {
            return view('admin.crearPregunta');
        })->name('admin.crearPregunta');
    });

});