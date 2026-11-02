<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function clubs()
    {
        $before2000 = Club::where('founded_year', '<', 2000)->count();
        $after2000 = Club::where('founded_year', '>=', 2000)->count();

        $pdf = Pdf::loadView('reports.clubs', compact('before2000', 'after2000'));

        return $pdf->download('reporte-clubes.pdf'); // o ->stream() para verlo en el navegador
    }
}
