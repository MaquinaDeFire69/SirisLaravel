<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\informes\Controlador_periodo;
use App\Http\Controllers\admin\sancionados\Controlador_sancionados;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// RUTAS DE ADMINISTRADOR
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/informe/ente-publico', function () {
    return view('admin.informeQuincenal.entepublico');
})->middleware(['auth', 'verified'])->name('informe.ente-publico');

Route::get('/informe/periodo', [Controlador_periodo::class, 'index'])->middleware(['auth', 'verified'])->name('informe.periodo');

Route::get('/sancionados/reportes', [Controlador_sancionados::class, 'index'])->middleware(['auth', 'verified'])->name('sancionados.sancionados');


//RUTAS DE ENLACE

Route::get('/enlace/dashboard', function () {
    return view('enlace.dashboard');
})->middleware(['auth', 'verified'])->name('enlace_dashboard');

Route::get('/enlace/panel_informativo', function () {
    return view('enlace.panel_informativo.panel_informativo');
})->middleware(['auth', 'verified'])->name('enlace_panel_informativo');

require __DIR__.'/auth.php';
