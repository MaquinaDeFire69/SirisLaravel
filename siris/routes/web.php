<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//Controlador de las vistas de cambio de contraseña 
// (la función index redirecciona a administrador y la función index_e redirecciona a enlace;
// esto para evitar la duplicidad de controlador para cada uno)
use App\Http\Controllers\CambiarContrasenaController;

//Controladores de admin
use App\Http\Controllers\Admin\PanelInformativo\PanelInformativoController;
use App\Http\Controllers\Admin\Informes\PeriodoInformadoController;
use App\Http\Controllers\Admin\Sancionados\ExpedienteSancionadosController;
use App\Http\Controllers\Admin\Sancionados\ReportesController;
use App\Http\Controllers\Admin\Conf\PeriodoInformeController;
use App\Http\Controllers\Admin\Conf\PlazoInformeController;
use App\Http\Controllers\Admin\Conf\EntesPublicosController;
use App\Http\Controllers\Admin\Conf\RegistroUsuariosController;

//Controladores de enlace
use App\Http\Controllers\Enlace\PanelInformativo\PanelInformativoEnlaceController;
use App\Http\Controllers\Enlace\InformeQuincenal\InformeQuincenalController;
use App\Http\Controllers\Enlace\ConsultarInformes\ConsultarInformesController;
use App\Http\Controllers\Enlace\Sancionados\SancionadosReporteController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// RUTAS DE ADMINISTRADOR
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/cambiar-contrasena', [CambiarContrasenaController::class, 'index'])
        ->name('admin.cambiarcontra');

    // Panel_informativo
    Route::get('/panel-informativo', [PanelInformativoController::class, 'index'])
        ->name('panel-informativo');

    // informes
    Route::get('/informe/ente-publico', function () {
        return view('admin.informeQuincenal.entepublico');
    })->name('informe.ente-publico');

    Route::get('/informe/periodo', [PeriodoInformadoController::class, 'index'])
        ->name('informe.periodo');

    // sancionados
    Route::get('/sancionados/expediente/{id}', [ExpedienteSancionadosController::class, 'mostrar'])
        ->name('sancionados.info_expediente');

    Route::get('/sancionados/reportes', [ReportesController::class, 'index'])
        ->name('sancionados.sancionados');

    // conf
    Route::get('/configuracion/periodo-informe', [PeriodoInformeController::class, 'index'])
        ->name('conf.periodo_informe');

    Route::get('/configuracion/plazo-informe', [PlazoInformeController::class, 'index'])
        ->name('conf.plazo_informe');

    Route::get('/configuracion/entes-publicos', [EntesPublicosController::class, 'index'])
        ->name('conf.entes_publicos');
    
    Route::get('/configuracion/registro-usuarios', [RegistroUsuariosController::class, 'index'])
        ->name('conf.registro_usuarios');
});


// RUTAS DE ENLACE 
// Ingresan a través de enlace/panel-informativo, y desde ahí pueden acceder a las demás vistas
Route::prefix('enlace')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/cambiar-contrasena', [CambiarContrasenaController::class, 'index_e'])
        ->name('enlace.cambiarcontra');
    
    Route::get('/dashboard', function () {
        return view('enlace.dashboard');
    })->name('enlace.dashboard');

    // Panel_informativo
    Route::get('/panel-informativo', [PanelInformativoEnlaceController::class, 'index'])
        ->name('enlace.panel_informativo');

    // informeQuincenal
    Route::get('/informe-quincenal', [InformeQuincenalController::class, 'index'])
            ->name('enlace.informeQuincenal.index');

    // consultarInformes
    Route::get('/informes/consultar', [ConsultarInformesController::class, 'index'])
        ->name('informes.consultar');
    
    // Sancionados
    Route::get('/sancionados', [SancionadosReporteController::class, 'index'])
        ->name('enlace.sancionadosEnlaceReporte');
});

require __DIR__.'/auth.php';