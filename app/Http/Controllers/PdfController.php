<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Visitor;
use Illuminate\Support\Facades\App;

class PdfController extends Controller
{
    public function print()
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }
    public function generatePdf()
    {
        $visitor = Visitor::all();
        $pdf = Pdf::loadView('pengunjung.viewPDF', ['visitor' => $visitor])
        ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
