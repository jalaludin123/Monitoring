<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengawasan;
use App\Models\Perizinan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $data = Perizinan::where('status_perizinan', 1)->latest()->paginate(5);

        return view('user.admin.report.index')->with([
            'title' => 'Data Report',
            'reports' => $data,
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }

    public function printOne(Perizinan $perizinan)
    {
        $data = [
            'title' => 'Dinas Perindustrian Dan Perdagangan',
            'date' => date('H, M, Y'),
            'perizinan' => $perizinan
        ];

        $pdf = Pdf::loadView('user.pdf.pdf', $data);

        return $pdf->download($perizinan->name_perusahan . '.pdf');
    }

    public function printAll()
    {
        $perizinan = Pengawasan::all();
        $data = [
            'title' => 'Dinas Perindustrian Dan Perdagangan',
            'date' => date('m/d/Y'),
            'perizinans' => $perizinan,
            'i' => (request()->input('page', 1) - 1) * $perizinan->count()
        ];

        $pdf = Pdf::loadView('user.pdf.pdfAll', $data)
            ->setPaper('legal', 'landscape');

        return $pdf->download(date('m/d/y') . '.pdf');
    }
}