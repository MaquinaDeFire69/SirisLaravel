<?php

namespace App\Http\Controllers\admin\sancionados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class expediente_sancionados extends Controller
{
    public function mostrar($id)
    {
        // Simulamos la consulta a la base de datos para este expediente en particular
        $datosExpediente = [
            'numero' => 'SP-0'.$id.'/2026',
            'nombre' => 'ARMANDO PADILLA SANCHEZ',
            'curp' => 'SAPA890514HQRCMR99',
            'rfc' => 'SAPA890514MR9',
            'sexo' => 'MASCULINO',
            'institucion' => 'SABGOB – Secretaría Anticorrupción y Buen Gobierno',
            'falta_cometida' => 'Abuso de Funciones',
            'normatividad' => 'Normatividad vigente en la ley',
            'articulo' => 'Artículo 143 y 144',
            'fraccion' => 'Fracción 3era. Y 5ta.',
            'falta' => 'Grave',
            'fecha_resolucion' => '2025-12-01',
            'fecha_notificacion' => '2025-12-20',
            'fecha_inicio_inhab' => '2026-01-15',
            'fecha_fin_inhab' => '2027-01-15',
            'anios' => 1,
            'sanciones' => ['Inhabilitación', 'Económica']
        ];

        // Redirige a tu vista asignada
        return view('admin.sancionados.info_expediente', compact('datosExpediente', 'id'));
    }
}