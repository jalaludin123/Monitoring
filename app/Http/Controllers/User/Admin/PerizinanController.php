<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kota;
use App\Models\Perizinan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

class PerizinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Perizinan::latest()->paginate(5);
        return view('user.admin.perizinan.index')->with([
            'title' => 'Data Kegiatan Perizinan',
            'perizinans' => $data,
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
        $dataUser = User::all();
        $kota = Kota::where('prov_id', 16)->get();
        return view('user.admin.perizinan.create')->with([
            'title' => 'Add Data Kegiatan Perizinan',
            'pengawass' => $dataUser,
            'kotas' => $kota,
            'perizinan' => new Perizinan()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_perusahaan' => 'required',
            'name' => 'required',
            'pengawas' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'skala_usaha' => 'required',
            'badan_usaha' => 'required',
            'nib' => 'required',
            'kbli' => 'required',
            'file_perizinan' => 'required|file|mimes:pdf|max:4000',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'alamat' => 'required'
        ]);

        $file = $request->file('file_perizinan');
        $fileName = time() . $file->hashName();
        $file->move('file/perizinan', $fileName);

        $perizinan =  Perizinan::create([
            'name_perusahan' => $request->name_perusahaan,
            'user_id' => $request->pengawas,
            'name_penangungJawab' => $request->name,
            'phone_perusahan' => $request->phone,
            'email_perusahan' => $request->email,
            'nib' => $request->nib,
            'sektor' => $request->sektor,
            'badan_usaha' => $request->badan_usaha,
            'skala_usaha' => $request->skala_usaha,
            'file_perizinan' => $fileName,
            'status_perizinan' => $request->status == true ? '1' : '0',
            'kbli' => $request->kbli,
            'alamat_perusahan' => $request->alamat,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan
        ]);

        $data['mail'] = $request->email;
        $data['subject'] = 'Sertifikat Perizinan';
        Mail::send('user.admin.mail', $data, function ($message) use ($data) {
            $message->to($data['mail'], $data['mail'])
                ->subject($data['subject']);
        });

        $dataUser = User::where('id', $request->pengawas)->first();
        function getRomawi($bln)
        {
            switch ($bln) {
                case 1:
                    return "I";
                    break;
                case 2:
                    return "II";
                    break;
                case 3:
                    return "III";
                    break;
                case 4:
                    return "IV";
                    break;
                case 5:
                    return "V";
                    break;
                case 6:
                    return "VI";
                    break;
                case 7;
                    return "VII";
                    break;
                case 8:
                    return "VIII";
                    break;
                case 9:
                    return "IX";
                    break;
                case 10:
                    return "X";
                    break;
                case 11:
                    return "XI";
                    break;
                case 12:
                    return "XII";
                    break;
            }
        }
        $bulan = date('n');
        $romawi = getRomawi($bulan);
        $date = now();
        $noSurat = rand(10021, 00) . '/PERINDAG' . '/' . $romawi . '/' . date('Y');
        $date = now();
        $pengawas['email'] = $dataUser->email;
        $pengawas['subject'] = 'Verifikasi Data Permohonan';
        $pengawas['pendaftaran'] = $perizinan;
        $pdf = Pdf::loadView('user.pdf.suratPengantar', ['perizinan' => $perizinan, 'date' => $date, 'no' => $noSurat]);
        Mail::send('user.admin.emailPengawas', $pengawas, function ($message) use ($pengawas, $pdf) {
            $message->to($pengawas['email'], $pengawas['email'])
                ->subject($pengawas['subject'])
                ->attachData($pdf->output(), time() . '-' . 'sertifikat.pdf');
        });


        return redirect('perindag/perizinan')->with('message', 'Data Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Perizinan $perizinan)
    {
        return view('user.admin.perizinan.detail')->with([
            'title' => "Detail Data Kegiatan",
            'perizinan' => $perizinan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Perizinan $perizinan)
    {
        $dataUser = User::all();
        $kota = Kota::where('prov_id', 16)->get();
        return view('user.admin.perizinan.create')->with([
            'title' => 'Update Data Kegiatan Perizinan',
            'pengawass' => $dataUser,
            'kotas' => $kota,
            'perizinan' => $perizinan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perizinan $perizinan)
    {
        $request->validate([
            'name_perusahaan' => 'required',
            'name' => 'required',
            'pengawas' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'skala_usaha' => 'required',
            'badan_usaha' => 'required',
            'nib' => 'required',
            'kbli' => 'required',
            'file_perizinan' => 'file|mimes:pdf|max:4000',
            'kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan' => 'required',
            'alamat' => 'required'
        ]);

        if ($request->hasFile('file_perizinan')) {
            File::delete('file/perizinan/' . $perizinan->file_perizinan);
            $file = $request->file('file_perizinan');
            $fileName = time() . $file->hashName();
            $file->move('file/perizinan', $fileName);

            $perizinan->update([
                'name_perusahan' => $request->name_perusahaan,
                'user_id' => $request->pengawas,
                'name_penangungJawab' => $request->name,
                'phone_perusahan' => $request->phone,
                'email_perusahan' => $request->email,
                'nib' => $request->nib,
                'sektor' => $request->sektor,
                'badan_usaha' => $request->badan_usaha,
                'skala_usaha' => $request->skala_usaha,
                'file_perizinan' => $fileName,
                'status_perizinan' => $request->status == true ? '1' : '0',
                'kbli' => $request->kbli,
                'alamat_perusahan' => $request->alamat,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan
            ]);
        } else {
            $perizinan->update([
                'name_perusahan' => $request->name_perusahaan,
                'user_id' => $request->pengawas,
                'name_penangungJawab' => $request->name,
                'phone_perusahan' => $request->phone,
                'email_perusahan' => $request->email,
                'nib' => $request->nib,
                'sektor' => $request->sektor,
                'badan_usaha' => $request->badan_usaha,
                'skala_usaha' => $request->skala_usaha,
                'status_perizinan' => $request->status == true ? '1' : '0',
                'kbli' => $request->kbli,
                'alamat_perusahan' => $request->alamat,
                'kecamatan' => $request->kecamatan,
                'kelurahan' => $request->kelurahan
            ]);
        }
        return redirect('perindag/perizinan')->with('message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perizinan $perizinan)
    {
        if ($perizinan) {
            File::delete('file/perizinan/' . $perizinan->file_perizinan);
            $perizinan->delete();
        }
        return redirect()->route('perizinan.index')->with('message', 'Data Deleted Successfully');
    }

    public function showPdf(Perizinan $perizinan)
    {
        return view('user.admin.perizinan.Pdf', compact('perizinan'));
    }

    // public function coba(Perizinan $perizinan)
    // {
    //     function getRomawi($bln)
    //     {
    //         switch ($bln) {
    //             case 1:
    //                 return "I";
    //                 break;
    //             case 2:
    //                 return "II";
    //                 break;
    //             case 3:
    //                 return "III";
    //                 break;
    //             case 4:
    //                 return "IV";
    //                 break;
    //             case 5:
    //                 return "V";
    //                 break;
    //             case 6:
    //                 return "VI";
    //                 break;
    //             case 7;
    //                 return "VII";
    //                 break;
    //             case 8:
    //                 return "VIII";
    //                 break;
    //             case 9:
    //                 return "IX";
    //                 break;
    //             case 10:
    //                 return "X";
    //                 break;
    //             case 11:
    //                 return "XI";
    //                 break;
    //             case 12:
    //                 return "XII";
    //                 break;
    //         }
    //     }
    //     $bulan = date('n');
    //     $romawi = getRomawi($bulan);
    //     $date = now();
    //     $noSurat = rand(10021, 00) . '/PERINDAG' . '/' . $romawi . '/' . date('Y');
    //     $pengawas['subject'] = 'Sertifikat Perizinan';
    //     $pengawas['pendaftaran'] = $perizinan;
    //     $pdf = Pdf::loadView('user.pdf.suratPengantar', ['perizinan' => $perizinan, 'date' => $date, 'no' => $noSurat]);
    //     return $pdf->download($perizinan->name_perusahan . '.pdf');
    // }
}