<?php

namespace App\Http\Controllers\informes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Controlador_periodo extends Controller
{
    public function index()
    {
        $periodos = [
            '01 AL 15 enero de 2026',
            '16 AL 31 enero de 2026',
        ];

        $stats = [
            ['color' => 'purple', 'icon' => 'iconly-boldSend', 'label' => 'Porcentaje de cumplimiento', 'value' => '50%'],
            ['color' => 'green', 'icon' => 'iconly-boldDocument', 'label' => 'Entes públicos que reportaron a tiempo', 'value' => '1'],
            ['color' => 'red', 'icon' => 'iconly-boldDocument', 'label' => 'Entes públicos que reportaron a extemporáneo', 'value' => '1'],
        ];

        $entes = [
            [
                'nombre' => 'SEGOB',
                'registros' => 3,
                'fecha' => '2026-02-03',
                'estatus' => 'Normal'
            ],
            [
                'nombre' => 'SESAEQROO',
                'registros' => 3,
                'fecha' => '2026-02-03',
                'estatus' => 'Extemporanea'
            ]
        ];

        return view('informes.periodo', compact('periodos', 'stats', 'entes'));
    }
}