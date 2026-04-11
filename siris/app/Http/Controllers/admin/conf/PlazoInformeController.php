<?php

namespace App\Http\Controllers\admin\conf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PlazoInformeController extends Controller
{
    public function index()
    {
        $plazos = [
            ["anio" => 2024, "dias" => 15, "estatus" => "ACTIVO"],
            ["anio" => 2025, "dias" => 10, "estatus" => "INACTIVO"],
            ["anio" => 2026, "dias" => 20, "estatus" => "ACTIVO"],
        ];

        return view('admin.conf.plazo_informe', compact('plazos'));
    }
}