<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/informe/entepublico', function () {
    return view('informe.entepublico');
})->middleware(['auth', 'verified'])->name('informe.entepublico');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Panel Informativo Jose Chavez
Route::get('/panel_informativo', function() {
    return view('panel_informativo.panelInformativo');
})->middleware(['auth', 'verified'])->name('panel_informativo.panelInformativo');

//Informe quincenal 
Route::get('/informeQuincenal/periodo', function() {
    return view('informeQuincenal.periodoInformado');
});

Route::get('/informeQuincenal/enlace', function() {
    return view('informeQuincenal.informeEnlace');
});

require __DIR__.'/auth.php';
