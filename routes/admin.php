<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FormularioController;

Route::get('RegistrarEvento', function () {
    return view('events.registerEventos');
})->middleware(['auth'])->name('Reventos');

// Route::get('VerEventos', function () {
//     return view('events.verEventos');
// })->middleware(['auth'])->name('VerEventos');


Route::get('VerEventos', [EventoController::class, 'index'])->middleware(['auth'])->name('VerEventos');


Route::get('verPersona', [EventoController::class, 'listarFormularios'])->middleware(['auth'])->name('verPersona');
Route::get('verExpo', [EventoController::class, 'listarFormulariosExpo'])->middleware(['auth'])->name('verExpo');


Route::get('VerEventoSolo/{id}', [EventoController::class, 'edit'])->middleware(['auth'])->name('VerEventoSolo');
Route::put('ActualizacionEvento', [EventoController::class, 'update'])->middleware(['auth'])->name('ActualizacionEvento');

Route::post('registrar-evento', [EventoController::class, 'store'])->middleware(['auth'])->name('eventos.store');
Route::delete('BorrarEvento/{id}', [EventoController::class, 'destroy'])->middleware(['auth'])->name('BorrarEvento');

Route::get('verExpositores', [EventoController::class, 'mostrarExpositores']);
Route::get('datos_del_exponente/{id}', [EventoController::class, 'datosDelExponente'])->middleware(['auth'])->name('exponente');
Route::put('actualizar-datos/{id}', [EventoController::class, 'actualizarDatosDelExponente'])->middleware(['auth'])->name('actualizarDatos');

