<?php

namespace App\Http\Controllers\User\Staf;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use App\Models\Pengawasan;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PengawasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Perizinan::where('user_id', Auth::user()->id)->where('status_perizinan', 0)->latest()->paginate(5);
        return view('user.staf.pengawasan.index')->with([
            'title' => 'Data Pengawasan',
            'perizinans' => $data,
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdate(Request $request, Perizinan $perizinan)
    {

        $request->validate([
            'jasa' => 'required',
            'foto' => 'required|image|mimes:png,jpg|max:5000',
            'tenaga' => 'required',
            'bangunan' => 'required',
            'lahan' => 'required',
            'noSurat' => 'required',
        ]);

        $status = $perizinan->status_perizinan;

        if ($status == 0) {
            $perizinan->update([
                'status_perizinan' => 1
            ]);
        }

        if ($request->hasFile('foto')) {
            $uploadPath = 'image/perusahaan';

            $imageFile =  $request->file('foto');
            $fileName = time() . $imageFile->hashName();
            $imageFile->move($uploadPath, $fileName);

            $data =  $perizinan->pengawasan()->create([
                'perizinan_id' => $perizinan->id,
                'user_id' => Auth::user()->id,
                'produk_jasa' => $request->jasa,
                'foto_perusahaan' => $fileName,
                'tenaga_kerja' => $request->tenaga,
                'jumlah_bangunan' => $request->bangunan,
                'luas_lahan' => $request->lahan,
                'no_surat_keterangan_domisili' => $request->noSurat,
            ]);
        }

        foreach ($request->fasilitas as $item => $value) {
            if ($request->hasFile('gambar')) {
                $uploadPath = 'image/perusahaan';

                $imageFile =  $request->file('gambar');
                $fileName = time() . $imageFile[$item]->hashName();
                $imageFile[$item]->move($uploadPath, $fileName);
                Fasilitas::create([
                    'pengawasan_id' => $data->id,
                    'nama_fasilitas' => $request->fasilitas[$item],
                    'kondisi_fasilitas' => $request->kondisi[$item],
                    'gambar_fasilitas' => $fileName
                ]);
            }
        }

        return redirect()->route('pengawasan.index')->with('message', 'Data Created Successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        return view('user.staf.pengawasan.show')->with([
            'title' => 'Show Data Perizinan',
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
        $perizinan = Perizinan::findOrFail($id);
        return view('user.staf.pengawasan.create')->with([
            'title' => 'Cerate Data Pengawasan',
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


    public function kegiatan()
    {
        $data = Pengawasan::latest()->paginate(5);
        return view('user.staf.kegiatan.index')->with([
            'title' => 'Data Kegiatan Terverifikasi',
            'kegiatans' => $data,
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }

    public function ubah(Pengawasan $pengawasan)
    {
        return view('user.staf.kegiatan.update')->with([
            'title' => 'Update Data Pengawasan',
            'kegiatan' => $pengawasan
        ]);
    }

    public function updateData(Request $request, Pengawasan $pengawasan)
    {
        $request->validate([
            'jasa' => 'required',
            'foto' => 'image|mimes:png,jpg|max:5000',
            'tenaga' => 'required',
            'bangunan' => 'required',
            'lahan' => 'required',
            'noSurat' => 'required'
        ]);

        if ($request->hasFile('foto')) {

            File::delete('image/perusahaan/' . $pengawasan->foto_perusahaan);
            $uploadPath = 'image/perusahaan';

            $imageFile =  $request->file('foto');
            $fileName = time() . $imageFile->hashName();
            $imageFile->move($uploadPath, $fileName);

            $pengawasan->update([
                'produk_jasa' => $request->jasa,
                'foto_perusahaan' => $fileName,
                'tenaga_kerja' => $request->tenaga,
                'jumlah_bangunan' => $request->bangunan,
                'luas_lahan' => $request->lahan,
                'no_surat_keterangan_domisili' => $request->noSurat,
            ]);
        } else {
            $pengawasan->update([
                'produk_jasa' => $request->jasa,
                'tenaga_kerja' => $request->tenaga,
                'jumlah_bangunan' => $request->bangunan,
                'luas_lahan' => $request->lahan,
                'no_surat_keterangan_domisili' => $request->noSurat,
            ]);
        }
        if ($request->fasilitas > 0) {
            foreach ($request->fasilitas as $item => $value) {
                if ($request->hasFile('gambar')) {
                    $uploadPath = 'image/perusahaan';

                    $imageFile =  $request->file('gambar');
                    $fileName = time() . $imageFile[$item]->hashName();
                    $imageFile[$item]->move($uploadPath, $fileName);
                    Fasilitas::create([
                        'pengawasan_id' => $pengawasan->id,
                        'nama_fasilitas' => $request->fasilitas[$item],
                        'kondisi_fasilitas' => $request->kondisi[$item],
                        'gambar_fasilitas' => $fileName
                    ]);
                }
            }
        }

        return redirect('perindag/pengawasan-kegiatan')->with('message', 'Data Updated Successfully');
    }

    public function detail(Pengawasan $pengawasan)
    {
        return view('user.staf.kegiatan.show')->with([
            'title' => 'Detail Data Pengawasan',
            'kegiatan' => $pengawasan
        ]);
    }

    public function deleteData(Pengawasan $pengawasan)
    {
        $fasilitas = Fasilitas::where('pengawasan_id', $pengawasan->id)->first();
        if ($fasilitas) {
            File::delete('image/perusahaan/' . $fasilitas->gambar_fasilitas);
            $fasilitas->delete();
        }

        return redirect('perindag/pengawasan-kegiatan/ubah/' . $pengawasan->id)->with('message', 'Data Deleted Successfully');
    }
}