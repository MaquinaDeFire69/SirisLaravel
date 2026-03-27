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
            ],
            [
                'periodo' => 'FEBRERO 16 AL 28 DE 2026',
                'inicio' => '2026-03-01',
                'fin' => '2026-03-03',
                'estatus' => 'INACTIVO'
            ],
            [
                'periodo' => 'MARZO 01 AL 15 DE 2026',
                'inicio' => '2026-03-16',
                'fin' => '2026-03-18',
                'estatus' => 'INACTIVO'
            ],
        ];

        return view('admin.conf.periodo_conf', compact('periodos'));
    }
}