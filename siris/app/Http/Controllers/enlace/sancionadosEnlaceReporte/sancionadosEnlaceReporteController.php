<?php

namespace App\Http\Controllers\enlace\sancionadosEnlaceReporte;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sancionadosEnlaceReporteController extends Controller
{
    public function index()
    {
        // Verifica que la carpeta en resources/views se llame exactamente así
        return view('enlace.sancionadosEnlaceReporte.index');
    }
}