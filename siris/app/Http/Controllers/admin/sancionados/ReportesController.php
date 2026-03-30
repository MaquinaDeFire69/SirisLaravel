<?php

namespace App\Http\Controllers\admin\sancionados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index(Request $request)
    {
        // PERIODOS
        $periodos = [
            'Enero 01 - 15 2026',
            'Enero 16 - 31 2026',
        ];

        // ENTES
        $entes = [
            'SABGOB',
            'SESAEQROO',
            'SEDE',
            'SEDETUR'
        ];

        
        $tipos = [
            'PERSONA FÍSICA',
            'PERSONA MORAL',
            'SERVIDOR PÚBLICO'
        ];

        // SANCIONADOS
        $sancionados = collect([
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
        ]);

        // FILTRO POR TIPO (SANCIONADO)
        if ($request->filled('sancionado')) {
            $sancionados = $sancionados->where('tipo', $request->sancionado);
        }

        // FILTRO POR ENTE
        if ($request->filled('ente')) {
            $sancionados = $sancionados->where('ente', $request->ente);
        }

        // FILTRO PERIODO
        if ($request->filled('periodo')) {
            $sancionados = $sancionados->where('periodo', $request->ente);
            
        }

        return view('admin.sancionados.sancionados', [
            'periodos' => $periodos,
            'entes' => $entes,
            'tipos' => $tipos, 
            'sancionados' => $sancionados->values()
        ]);
    }
}
