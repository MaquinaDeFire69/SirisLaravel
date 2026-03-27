<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CambiarContrasenaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\informes\Controlador_periodo;
use App\Http\Controllers\admin\sancionados\Controlador_sancionados;
use App\Http\Controllers\Admin\Panel_informativo\PanelInformativoController;
use App\Http\Controllers\enlace\Panel_informativo\Panel_InformativoEController;
use App\Http\Controllers\enlace\InformeQuincenal\informeQuincenal;
use App\Http\Controllers\admin\conf\Controlador_plazo_informe;
use App\Http\Controllers\admin\conf\Controlador_periodo_conf;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Cambiar contraseña
Route::get('/cambiar-contrasena',[CambiarContrasenaController::class, 'index'])->middleware(['auth','verified'])->name('admin.cambiarcontra');
Route::get('/enlace/cambiar-contrasena',[CambiarContrasenaController::class, 'index_e'])->middleware(['auth','verified'])->name('enlace.cambiarcontra');


// RUTAS DE ADMINISTRADOR
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/informe/ente-publico', function () {
    return view('admin.informeQuincenal.entepublico');
})->middleware(['auth', 'verified'])->name('informe.ente-publico');

Route::get('/informe/periodo', [Controlador_periodo::class, 'index'])->middleware(['auth', 'verified'])->name('informe.periodo');
Route::get('/sancionados/reportes', [Controlador_sancionados::class, 'index'])->middleware(['auth', 'verified'])->name('sancionados.sancionados');
Route::get('/configuracion/plazo-informe', [Controlador_plazo_informe::class, 'index'])
->middleware(['auth', 'verified'])->name('conf.plazo_informe');

Route::get('/configuracion/periodo', [Controlador_periodo_conf::class, 'index'])
->middleware(['auth', 'verified'])->name('conf.periodo');

//RUTAS DE ENLACE
Route::get('/enlace/dashboard', function () {
    return view('enlace.dashboard');
})->middleware(['auth', 'verified'])->name('enlace_dashboard');
Route::get('/enlace/panel-informativo', [panel_InformativoEController::class, 'index'])->name('enlace_panel_informativo');
Route::get('/enlace/informe-quincenal', [informeQuincenal::class, 'index'])->name('enlace.informe.index');

require __DIR__.'/auth.php';
