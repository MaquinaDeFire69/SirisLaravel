<?php

namespace App\Http\Controllers\admin\informes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeriodoInformadoController extends Controller
{
    public function index(Request $request)
    {
        $periodos = [
            '01 AL 15 enero de 2026',
            '16 AL 31 enero de 2026',
            '01 AL 15 febrero de 2026'
        ];

        // Último periodo por defecto
        $periodoSeleccionado = $request->get('periodo', end($periodos));

        // Convertir periodo a fechas
        [$fechaInicio, $fechaFin] = $this->obtenerRangoFechas($periodoSeleccionado);

        $stats = [
            [
                'color' => 'purple',
                'icon'  => 'bi bi-graph-up',
                'label' => 'Porcentaje de cumplimiento',
                'value' => '50%'
            ],
            [
                'color' => 'green',
                'icon'  => 'bi bi-check-circle',
                'label' => 'Entes públicos que reportaron a tiempo',
                'value' => '1'
            ],
            [
                'color' => 'red',
                'icon'  => 'bi bi-exclamation-triangle',
                'label' => 'Entes públicos que reportaron a extemporáneo',
                'value' => '1'
            ],
        ];

        $entes = collect([
            [
                'nombre'    => 'SEGOB',
                'registros' => 3,
                'fecha'     => '2026-01-10',
                'estatus'   => 'Normal',
            ],
            [
                'nombre'    => 'SESAEQROO',
                'registros' => 3,
                'fecha'     => '2026-01-20',
                'estatus'   => 'Extemporanea',
            ],
            [
                'nombre'    => 'SEDETUR',
                'registros' => 1,
                'fecha'     => '2026-02-02',
                'estatus'   => 'Extemporanea',
            ]
        ]);

        // FILTRO POR RANGO DE FECHAS
        $entes = $entes->filter(function ($ente) use ($fechaInicio, $fechaFin) {
            return $ente['fecha'] >= $fechaInicio && $ente['fecha'] <= $fechaFin;
        });

        return view('admin.informeQuincenal.periodo', [
            'periodos'            => $periodos,
            'periodoSeleccionado' => $periodoSeleccionado,
            'stats'               => $stats,
            'entes'               => $entes->values()
        ]);
    }

    private function obtenerRangoFechas($periodo)
    {
        $meses = [
            'enero'      => '01',
            'febrero'    => '02',
            'marzo'      => '03',
            'abril'      => '04',
            'mayo'       => '05',
            'junio'      => '06',
            'julio'      => '07',
            'agosto'     => '08',
            'septiembre' => '09',
            'octubre'    => '10',
            'noviembre'  => '11',
            'diciembre'  => '12',
        ];

        // Conversión de texto a fecha
        preg_match('/(\d{2}) AL (\d{2}) (\w+) de (\d{4})/', $periodo, $matches);

        $diaInicio = $matches[1];
        $diaFin    = $matches[2];
        $mes       = $meses[strtolower($matches[3])];
        $anio      = $matches[4];

        $fechaInicio = "$anio-$mes-$diaInicio";
        $fechaFin    = "$anio-$mes-$diaFin";

        return [$fechaInicio, $fechaFin];
    }
}
