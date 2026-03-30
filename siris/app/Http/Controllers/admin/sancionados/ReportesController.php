<?php

namespace App\Http\Controllers\admin\sancionados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportesController extends Controller
{
    public function index(Request $request)
    {
        $sancionados = self::getSancionados();
        
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
            $sancionados = $sancionados->where('periodo', $request->periodo);
            
        }

        return view('admin.sancionados.sancionados', [
            'periodos' => $periodos,
            'entes' => $entes,
            'tipos' => $tipos, 
            'sancionados' => $sancionados->values()
        ]);
    }

    public static function getSancionados()
{
    return collect([
        [
            'id' => 1,
            'expediente' => 'SP-01/2026',
            'nombre' => 'ARMANDO PADILLA SANCHEZ',
            'ente' => 'SABGOB',
            'falta' => 'PECULADO',
            'sancion' => 'INHABILITACIÓN, ECONÓMICA',
            'tipo' => 'PERSONA FÍSICA',
            'periodo' => 'Enero 01 - 15 2026'
        ],
        [
            'id' => 2,
            'expediente' => 'SP-02/2026',
            'nombre' => 'LAURA SANSORES PEÑA',
            'ente' => 'SEDETUR',
            'falta' => 'NEPOTISMO',
            'sancion' => 'ECONÓMICA',
            'tipo' => 'PERSONA MORAL',
            'periodo' => 'Enero 01 - 15 2026'
        ],
        [
            'id' => 3,
            'expediente' => 'SP-03/2026',
            'nombre' => 'HERNAN PEREZ AGUILAR',
            'ente' => 'SESAEQROO',
            'falta' => 'COHECHO',
            'sancion' => 'INHABILITACIÓN',
            'tipo' => 'SERVIDOR PÚBLICO',
            'periodo' => 'Enero 16 - 31 2026'
        ]
    ]);
}
}
