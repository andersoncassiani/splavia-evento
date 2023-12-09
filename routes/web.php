<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\HomeFormularioController;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/', [EventoController::class, 'showAllEvents'])->name('VerEventosAll');

Route::post('guardarFormulario', [FormularioController::class, 'guardarFormulario'])->name('GuardarFormulario');
Route::post('formularioExpo/{evento_id}', [FormularioController::class, 'guardarFormularioExpo'])->name('GuardarFormularioExpo');
Route::get('formulario/{id}', [HomeFormularioController::class, 'index'])->name('form');




require __DIR__.'/auth.php';
