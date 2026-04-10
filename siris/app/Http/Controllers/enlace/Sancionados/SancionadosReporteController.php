<?php

namespace App\Http\Controllers\enlace\Sancionados;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SancionadosReporteController extends Controller
{
    public function index()
    {
        return view('enlace.sancionadosReporte.index');
    }
}