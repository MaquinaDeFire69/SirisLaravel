<?php

namespace App\Http\Controllers\admin\conf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntesPublicosController extends Controller
{
    public function index()
    {
        $entes = [
            [
                'nombre' => 'SEGOB',
                'id_s3' => 23,
                'estatus' => 'Activo'
            ],
            [
                'nombre' => 'SESAEQROO',
                'id_s3' => 34,
                'estatus' => 'Inactivo'
            ]
        ];

        return view('admin.conf.entes_publicos', compact('entes'));
    }
}
