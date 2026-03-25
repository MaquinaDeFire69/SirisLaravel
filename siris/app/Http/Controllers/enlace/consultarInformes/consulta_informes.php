<?php

namespace App\Http\Controllers\enlace\consultarInformes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class consulta_informes extends Controller
{
    public function index()
    {
        // Simulamos los datos de la tabla de informes
        $informes = [
            ['no' => 1, 'periodo' => '01-15-Ene-2026', 'fecha' => '5 de Enero del 2026', 'estatus' => 'Normal'],
            ['no' => 2, 'periodo' => '16-31-Ene-2026', 'fecha' => '16 de Enero del 2026', 'estatus' => 'Normal'],
            ['no' => 3, 'periodo' => '01-15-Feb-2026', 'fecha' => '1 de Febrero del 2026', 'estatus' => 'Normal'],
            ['no' => 4, 'periodo' => '16-28-Feb-2026', 'fecha' => '15 de Febrero del 2026', 'estatus' => 'Extemporaneo'],
        ];

        // Redirige a tu vista asignada
        return view('enlace.consultarInformes.consultar_informes', compact('informes'));
    }
}