<?php

namespace App\Http\Controllers\User\Kabid;

use App\Http\Controllers\Controller;
use App\Models\Pengawasan;
use App\Models\Perizinan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportKabidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Perizinan::where('status_perizinan', 1)->latest()->paginate(5);
        return view('user.kabid.report.index')->with([
            'title' => 'Report',
            'reports' => $data,
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perizinan = Perizinan::findOrFail($id);
        return view('user.kabid.report.detail')->with([
            'title' => "Detail Data Perizinan",
            'perizinan' => $perizinan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

    public function printPdf($id)
    {
        $perizinan = Perizinan::where('id', $id)->first();
        $data = [
            'title' => 'Dinas Perindustrian Dan Perdagangan',
            'date' => date('H, M, Y'),
            'perizinan' => $perizinan
        ];

        $pdf = Pdf::loadView('user.pdf.pdf', $data);

        return $pdf->download($perizinan->name_perusahan . '.pdf');
    }
}