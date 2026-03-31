<?php

namespace App\Http\Controllers\admin\conf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $registros_usuarios = [
            [
                'nombre' => 'Ana Martínez',
                'ente' => 'Secretaría de Zargoza',
                'correo' => 'ana.admin@gob.mx',
                'tipo' => 'ADMINISTRADOR',
                'estatus' => 'ACTIVO'
            ],
            [
                'nombre' => 'Carlos Ruiz',
                'ente' => 'Instituto de la Juventud',
                'correo' => 'carlos.enlace@gob.mx',
                'tipo' => 'ENLACE',
                'estatus' => 'ACTIVO'
            ]
        ];

        return view('admin.conf.registro_usuarios', compact('registros_usuarios'));
    }
}