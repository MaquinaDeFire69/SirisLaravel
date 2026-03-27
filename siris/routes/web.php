<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CambiarContrasenaController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\admin\conf\EntesPublicosController;
use App\Http\Controllers\admin\conf\PeriodoInformeController;
use App\Http\Controllers\admin\conf\PlazoInformeController;
use App\Http\Controllers\Admin\Panel_informativo\PanelInformativoController;
use App\Http\Controllers\admin\sancionados\ReportesController;
use App\Http\Controllers\admin\informes\PeriodoInformadoController;
use App\Http\Controllers\enlace\informeQuincenal\InformeQuincenalController;
use App\Http\Controllers\enlace\Panel_informativo\PanelInformativoEnlaceController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Cambiar contraseña
Route::get('/cambiar-contrasena', [CambiarContrasenaController::class, 'index'])
    ->middleware(['auth','verified'])
    ->name('admin.cambiarcontra');

Route::get('/enlace/cambiar-contrasena', [CambiarContrasenaController::class, 'index_e'])
    ->middleware(['auth','verified'])
    ->name('enlace.cambiarcontra');


// RUTAS DE ADMINISTRADOR
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [PanelInformativoController::class, 'index'])
        ->name('dashboard');

    Route::get('/informe/ente-publico', function () {
        return view('admin.informeQuincenal.entepublico');
    })->name('informe.ente-publico');

    Route::get('/informe/periodo', [PeriodoInformadoController::class, 'index'])
        ->name('informe.periodo');

    Route::get('/sancionados/reportes', [ReportesController::class, 'index'])
        ->name('sancionados.sancionados');

    Route::get('/panel-informativo', [PanelInformativoController::class, 'index'])
        ->name('panelInformativo.index');

    Route::get('/configuracion/periodo-informe', [PeriodoInformeController::class, 'index'])
        ->name('conf.periodo_informe');

    Route::get('/configuracion/plazo-informe', [PlazoInformeController::class, 'index'])
        ->name('conf.plazo_informe');

    Route::get('/configuracion/entes-publicos', [EntesPublicosController::class, 'index'])
        ->name('conf.entes_publicos');

});


// RUTAS DE ENLACE
Route::prefix('enlace')->middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('enlace.dashboard');
    })->name('enlace.dashboard');

    Route::get('/panel-informativo', [PanelInformativoEnlaceController::class, 'index'])
        ->name('enlace.panel_informativo');

    Route::get('/informe-quincenal', [InformeQuincenalController::class, 'index'])
        ->name('enlace.informe.index');

});

require __DIR__.'/auth.php';