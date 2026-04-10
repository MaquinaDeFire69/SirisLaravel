<?php

namespace App\Http\Controllers\enlace\informeQuincenal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class informeQuincenalController extends Controller
{
    /**
     * Despliega la vista del formulario de informe quincenal.
     */
    public function index()
    {
        return view('enlace.informeQuincenal.informeQuincenal');
    }
}