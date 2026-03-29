<?php

namespace App\Http\Controllers\enlace\consultarInformes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class consulta_informes extends Controller
{
    // Agregamos Request para capturar lo que el usuario envía
    public function index(Request $request)
    {
        // 1. Tus datos simulados intactos
        $informes = [
            ['no' => 1, 'periodo' => '01-15-Ene-2026', 'fecha' => '5 de Enero del 2026', 'estatus' => 'Normal'],
            ['no' => 2, 'periodo' => '16-31-Ene-2026', 'fecha' => '16 de Enero del 2026', 'estatus' => 'Normal'],
            ['no' => 3, 'periodo' => '01-15-Feb-2026', 'fecha' => '1 de Febrero del 2026', 'estatus' => 'Normal'],
            ['no' => 4, 'periodo' => '16-28-Feb-2026', 'fecha' => '15 de Febrero del 2026', 'estatus' => 'Extemporaneo'],
        ];

        // 2. Capturamos los filtros de la vista
        $ejercicio_filtro = $request->input('ejercicio'); // ej: '2026'
        $periodo_filtro = $request->input('periodo');     // ej: 'ENERO'

        // Como tus datos tienen "Ene" y el select tiene "ENERO", hacemos un mapeo rápido
        $meses = [
            'ENERO' => 'Ene',
            'FEBRERO' => 'Feb'
        ];
        $mes_abreviado = $periodo_filtro ? $meses[$periodo_filtro] : null;

        // 3. Filtramos el arreglo
        $informes_filtrados = array_filter($informes, function($informe) use ($ejercicio_filtro, $mes_abreviado) {
            $pasa_ejercicio = true;
            $pasa_periodo = true;

            // Si el usuario seleccionó un año, checamos si el string del periodo lo contiene
            if ($ejercicio_filtro) {
                $pasa_ejercicio = str_contains($informe['periodo'], $ejercicio_filtro);
            }

            // Si el usuario seleccionó un mes, checamos si el string del periodo lo contiene
            if ($mes_abreviado) {
                $pasa_periodo = str_contains($informe['periodo'], $mes_abreviado);
            }

            return $pasa_ejercicio && $pasa_periodo;
        });

        // Retornamos los datos filtrados a la vista
        return view('enlace.consultarInformes.consultar_informes', [
            'informes' => $informes_filtrados
        ]);
    }
}