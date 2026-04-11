<?php

namespace App\Http\Controllers\Admin\Informes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformeEnteController extends Controller
{
    public function index()
    {
        $anios = [2024, 2025, 2026];

        $meses = [
            '01' => 'Enero',
            '02' => 'Febrero',
            '03' => 'Marzo',
            '04' => 'Abril',
            '05' => 'Mayo',
            '06' => 'Junio',
            '07' => 'Julio',
            '08' => 'Agosto',
            '09' => 'Septiembre',
            '10' => 'Octubre',
            '11' => 'Noviembre',
            '12' => 'Diciembre',
        ];

        $proveedores = [
            ['id' => 1, 'nombre' => 'Secretaria Ejecutiva del Sistema Anticorrupción del Estado de Quintana Roo'],
            ['id' => 2, 'nombre' => 'Tribunal Electoral de Quintana Roo'],
        ];

        $cards = [
            ['label' => 'Efectividad de cumplimiento', 'valor' => '50%', 'color' => 'danger'],
            ['label' => 'Informes reportados en tiempo', 'valor' => '1', 'color' => 'info'],
            ['label' => 'Informes reportados en extemporáneo', 'valor' => '1', 'color' => 'primary'],
        ];

        $informes = [
            [
                'periodo' => 'Enero 01 al 15 2026',
                'registros' => 3,
                'fecha' => '2026-01-18',
                'estatus' => 'Normal'
            ],
            [
                'periodo' => 'Enero 16 al 31 2026',
                'registros' => 3,
                'fecha' => '2026-02-03',
                'estatus' => 'Extemporáneo'
            ]
        ];

        return view('admin.informeQuincenal.entepublico', compact(
            'anios',
            'meses',
            'proveedores',
            'cards',
            'informes'
        ));
    }
}