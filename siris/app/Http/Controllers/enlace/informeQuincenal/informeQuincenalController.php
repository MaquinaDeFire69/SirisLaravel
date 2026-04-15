<?php

namespace App\Http\Controllers\enlace\informeQuincenal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class informeQuincenalController extends Controller
{
    public function index()
    {
        // Definimos datos de prueba para que la tabla no salga vacía
        $periodos = [
            [
                'expediente' => 'PME-01/2026',
                'nombre' => 'Juan Pérez López',
                'curp' => 'PELJ809858HRT',
                'falta' => 'Peculado',
                'sancion' => 'Inhabilitación'
            ],
            [
                'expediente' => 'PME-02/2026',
                'nombre' => 'María García Ruiz',
                'curp' => 'GARM901212HDF',
                'falta' => 'Cohecho',
                'sancion' => 'Suspensión'
            ]
        ];

        return view('enlace.informeQuincenal.informeQuincenal', compact('periodos'));
    }
}