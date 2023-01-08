<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informasi;
use App\Models\KategoriInformasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class InformasiController extends Controller
{
    public function index()
    {
        return view('user.admin.informasi.index')->with([
            'title' => 'Data Informasi'
        ]);
    }

    public function read()
    {
        $data = Informasi::latest()->paginate(5);
        return view('user.admin.informasi.read')->with([
            'datas' => $data,
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }


    public function create()
    {
        $kategori = KategoriInformasi::all();
        return view('user.admin.informasi.create')->with([
            'title' => 'Add Data Kategori',
            'kategoris' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'name' => 'required',
            'tentang' => 'required',
            'file_informasi' => 'required|file|mimes:pdf|max:5000'
        ]);

        $file = $request->file('file_informasi');
        $fileName = time() . $file->hashName();
        $file->move('file', $fileName);

        Informasi::create([
            'kategori_informasis_id' => $request->kategori,
            'name_informasi' => $request->name,
            'tentang' => $request->tentang,
            'file_informasi' => $fileName
        ]);
    }

    public function edit($id)
    {
        $kategori = KategoriInformasi::all();
        $data = Informasi::find($id);
        return view('user.admin.informasi.edit')->with([
            'title' => 'Update Data Kategori',
            'informasi' => $data,
            'kategoris' => $kategori
        ]);
    }

    public function ubah(Request $request, $id)
    {
        $data = Informasi::find($id);
        $request->validate([
            'kategori' => 'required',
            'name' => 'required',
            'tentang' => 'required',
            'file_informasi' => 'file|mimes:pdf|max:5000'
        ]);

        if ($request->hasFile('file_informasi')) {
            File::delete('file/' . $data->file_informasi);
            $file = $request->file('file_informasi');
            $fileName = time() . $file->hashName();
            $file->move('file', $fileName);

            $data->update([
                'kategori_informasis_id' => $request->kategori,
                'name_informasi' => $request->name,
                'tentang' => $request->tentang,
                'file_informasi' => $fileName
            ]);
        } else {
            $data->update([
                'kategori_informasis_id' => $request->kategori,
                'name_informasi' => $request->name,
                'tentang' => $request->tentang,
            ]);
        }
    }

    public function hapus($id)
    {
        $data = Informasi::find($id);
        File::delete('file/' . $data->file_informasi);
        $data->delete();
    }

    public function viewPdf($id)
    {
        $data = Informasi::find($id);

        return view('user.admin.informasi.view')->with([
            'title' => 'View Pdf',
            'informasi' => $data
        ]);
    }
}