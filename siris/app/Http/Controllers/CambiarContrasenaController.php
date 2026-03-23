<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CambiarContrasenaController extends Controller
{
    public function index (){
        return view ('admin.cambiarcontra');
    }
}
