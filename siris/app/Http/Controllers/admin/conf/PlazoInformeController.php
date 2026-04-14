<?php

namespace App\Http\Controllers\Admin\Conf;

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

    public function actualizar(Request $request)
    {
        $errores = [];

        if(!$request->anio)
            $errores[] = "Año de aplicación";

        if(!$request->dias)
            $errores[] = "Plazo en días";

        if(!$request->estatus)
            $errores[] = "Estatus";

        if(count($errores) > 0){
            return back()
                ->withInput()
                ->with('error_campos', $errores);
        }

        return redirect()
            ->route('conf.plazo_informe')
            ->with('success', 'Plazo actualizado correctamente');
    }
}