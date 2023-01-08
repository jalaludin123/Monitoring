<?php

namespace App\Http\Controllers\User\Admin;

use App\Http\Controllers\Controller;
use App\Models\KategoriInformasi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KategoriInfirmasiController extends Controller
{
    public function index()
    {
        return view('user.admin.kategori.index')->with([
            'title' => 'Data Kategori Informasi'
        ]);
    }

    public function read()
    {
        $datas = KategoriInformasi::latest()->paginate(5);

        return view('user.admin.kategori.read')->with([
            'datas' => $datas,
            'i' => (request()->input('page', 1) - 1) * 5
        ]);
    }

    public function create()
    {
        return view('user.admin.kategori.create')->with([
            'title' => 'Add Data Kategori'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_informasi' => 'required|unique:kategori_informasis,kategori_informasi'
        ]);

        KategoriInformasi::create([
            'kategori_informasi' => $request->kategori_informasi
        ]);
    }

    public function edit($id)
    {
        $data = KategoriInformasi::find($id);
        return view('user.admin.kategori.edit')->with([
            'title' => 'Update Data Kategori',
            'kategori' => $data
        ]);
    }

    public function ubah(Request $request, $id)
    {
        $data = KategoriInformasi::find($id);
        $request->validate([
            'kategori_informasi' => ['required', Rule::unique('kategori_informasis', 'kategori_informasi')->ignore($data)]
        ]);

        $data->update([
            'kategori_informasi' => $request->kategori_informasi
        ]);
    }

    public function hapus($id)
    {
        $data = KategoriInformasi::find($id);
        $data->delete();
    }
}