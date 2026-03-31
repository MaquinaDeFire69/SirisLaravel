<?php

namespace App\Http\Controllers\Enlace\PanelInformativo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelInformativoEnlaceController extends Controller
{
    /**
     * Despliega la vista del formulario de informe quincenal.
     */
    public function index()
    {
        return view('enlace.panel_informativo.panel_informativo');
    }
}