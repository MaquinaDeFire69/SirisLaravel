<?php

namespace App\Http\Controllers\sancionados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Controlador_sancionados extends Controller
{
    public function index()
    {
        // PERIODOS
        $periodos = [
            'Enero 01 - 15 2026',
            'Enero 16 - 31 2026',
        ];

        // ENTES (para el select)
        $entes = [
            'SABGOB',
            'SESAEQROO',
            'SEDE',
            'SEDETUR'
        ];

        // SANCIONADOS (tabla)
        $sancionados = [
            [
                'expediente' => 'SP-01/2026',
                'nombre' => 'ARMANDO PADILLA SANCHEZ',
                'ente' => 'SABGOB',
                'falta' => 'PECULADO',
                'sancion' => 'INHABILITACIÓN, ECONÓMICA',
                'tipo' => 'PERSONA FÍSICA'
            ],
            [
                'expediente' => 'SP-02/2026',
                'nombre' => 'LAURA SANSORES PEÑA',
                'ente' => 'SABGOB',
                'falta' => 'NEPOTISMO',
                'sancion' => 'ECONÓMICA',
                'tipo' => 'PERSONA MORAL'
            ],
            [
                'expediente' => 'SP-03/2026',
                'nombre' => 'HERNAN PEREZ AGUILAR',
                'ente' => 'SESAEQROO',
                'falta' => 'COHECHO',
                'sancion' => 'INHABILITACIÓN',
                'tipo' => 'SERVIDOR PÚBLICO'
            ],
            [
                'expediente' => 'SP-04/2026',
                'nombre' => 'MANUEL BONILLA PADILLA',
                'ente' => 'SEDE',
                'falta' => 'NEPOTISMO',
                'sancion' => 'ECONÓMICA',
                'tipo' => 'PERSONA FÍSICA'
            ],
            [
                'expediente' => 'SP-05/2026',
                'nombre' => 'MIRNA ZAPATA BAÑOS',
                'ente' => 'SEDETUR',
                'falta' => 'COHECHO',
                'sancion' => 'INHABILITACIÓN',
                'tipo' => 'SERVIDOR PÚBLICO'
            ]
        ];

        return view('sancionados.sancionados', compact('periodos', 'entes', 'sancionados'));
    }
}