<?php

namespace App\Http\Controllers\enlace\Panel_informativo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelInformativoEnlaceController extends Controller
{
    /**
     * Despliega la vista del formulario de informe quincenal.
     */
    public function index()
    {
        // Asumiendo que tu vista está en resources/views/admin/informeQuincenal/index.blade.php
        return view('enlace.panel_informativo.panel_informativo');
    }
}