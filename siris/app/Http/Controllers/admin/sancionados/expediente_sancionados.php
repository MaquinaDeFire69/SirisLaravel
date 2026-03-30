<?php

namespace App\Http\Controllers\admin\sancionados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\sancionados\ReportesController;

class expediente_sancionados extends Controller
{
    public function mostrar($id)
{
    $sancionados = ReportesController::getSancionados();

    //BUSCAR EL EXPEDIENTE REAL
    $expediente = $sancionados->firstWhere('id', $id);

    if (!$expediente) {
        abort(404);
    }

    $datosExpediente = [
        'numero' => $expediente['expediente'],
        'nombre' => $expediente['nombre'],
        'curp' => 'N/A',
        'rfc' => 'N/A',
        'sexo' => 'N/A',
        'institucion' => $expediente['ente'],
        'falta_cometida' => $expediente['falta'],
        'normatividad' => 'Normatividad vigente',
        'articulo' => 'Artículo X',
        'fraccion' => 'Fracción X',
        'falta' => 'Grave',
        'fecha_resolucion' => '2025-12-01',
        'fecha_notificacion' => '2025-12-20',
        'fecha_inicio_inhab' => '2026-01-15',
        'fecha_fin_inhab' => '2027-01-15',
        'anios' => 1,
        'sanciones' => explode(',', $expediente['sancion']) // 🔥 importante
    ];

    return view('admin.sancionados.info_expediente', compact('datosExpediente', 'id'));
}
}
