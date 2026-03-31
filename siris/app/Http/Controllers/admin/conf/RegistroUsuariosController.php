<?php

namespace App\Http\Controllers\admin\conf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistroUsuariosController extends Controller
{
    public function index()
    {
        return view('admin.conf.registro_usuarios');
    }
}