<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Kota;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function getKecamatan($kota)
    {
        $kecamatan = Kecamatan::where('city_id', $kota)->get();
        return response()->json($kecamatan);
    }

    public function getKelurahan($kecamatan)
    {
        $kelurahan = Kelurahan::where('dis_id', $kecamatan)->get();
        return response()->json($kelurahan);
    }
}