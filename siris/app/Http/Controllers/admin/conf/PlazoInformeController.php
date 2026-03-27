<?php

namespace App\Http\Controllers\admin\conf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlazoInformeController extends Controller
{
    public function index()
    {
        $plazos = [
            [
                'anio' => 2025,
                'dias' => 3,
                'estatus' => 'INACTIVO'
            ],
            [
                'anio' => 2026,
                'dias' => 3,
                'estatus' => 'ACTIVO'
            ]
        ];

        return view('admin.conf.plazo_informe', compact('plazos'));
    }
}
