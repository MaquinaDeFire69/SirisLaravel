<?php

namespace App\Http\Controllers\admin\panel_informativo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelInformativoController extends Controller
{
    /**
     * Despliega la vista del panel informativo.
     */
    public function index()
    {
        // Asegúrate de que la ruta de la vista coincida con tus carpetas en resources/views
        return view('admin.panelInformativo.index'); 
    }
}