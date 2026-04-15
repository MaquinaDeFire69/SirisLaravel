<?php

namespace App\Http\Controllers\admin\conf;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeriodoInformeController extends Controller
{
    public function index()
    {
        $periodos = [
            [
                'periodo' => 'ENERO 01 AL 15 DE 2026',
                'inicio' => '2026-01-16',
                'fin' => '2026-01-18',
                'estatus' => 'ACTIVO'
            ],
            [
                'periodo' => 'ENERO 16 AL 31 DE 2026',
                'inicio' => '2026-02-01',
                'fin' => '2026-02-03',
                'estatus' => 'ACTIVO'
            ],
            [
                'periodo' => 'FEBRERO 01 AL 15 DE 2026',
                'inicio' => '2026-02-16',
                'fin' => '2026-02-18',
                'estatus' => 'ACTIVO'
            ]
        ];

        return view('admin.conf.periodo_conf', compact('periodos'));
    }


    public function actualizar(Request $request)
    {
        $errores = [];

        if(!$request->periodo)
            $errores[] = "Descripción del periodo";

        if(!$request->inicio_reportes)
            $errores[] = "Inicio reportes";

        if(!$request->fin_reportes)
            $errores[] = "Fin reportes";

        if(count($errores) > 0){
            return back()
                ->withInput()
                ->with('error_campos', $errores);
        }

        return redirect()
            ->route('conf.periodo_informe')
            ->with('success', 'Periodo actualizado correctamente');
    }
}