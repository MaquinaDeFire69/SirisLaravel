<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\informes\Controlador_periodo;
use App\Http\Controllers\sancionados\Controlador_sancionados;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/informe/ente-publico', function () {
    return view('informes.entepublico');
})->middleware(['auth', 'verified'])->name('informe.ente-publico');

Route::get('/informe/periodo', [Controlador_periodo::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('informe.periodo');

Route::get('/sancionados', [Controlador_sancionados::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('sancionados.sancionados');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
