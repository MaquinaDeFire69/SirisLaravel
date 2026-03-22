<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/informe/ente-publico', function () {
    return view('admin.informe.entepublico');
})->middleware(['auth', 'verified'])->name('informe.ente-publico');

Route::get('/informe/periodo', function () {
    return view('admin.informes.periodo');
})->middleware(['auth', 'verified'])->name('informe.periodo');

Route::get('/sancionados', function () {
    return view('admin.sancionados.sancionados');
})->middleware(['auth', 'verified'])->name('sancionados.sancionados');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/panel_informativo/panel_informativo', function () {
    return view('panel_informativo.panel_informativo');
})->middleware(['auth', 'verified'])->name('panel.informativo');

require __DIR__.'/auth.php';
