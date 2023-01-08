<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Kecamatan;
use App\Models\Pengawasan;
use App\Models\Perizinan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // Chart Kecamatan
        $perizinan = DB::table('perizinans')
            ->select('kecamatan', DB::raw('COUNT(kecamatan) as count'))
            ->where('status_perizinan', 1)
            ->groupBy('kecamatan');

        $getData = DB::table('districts')
            ->joinSub($perizinan, 'perizinans', function ($join) {
                $join->on('districts.dis_id', '=', 'perizinans.kecamatan');
            })->get();
        $labels = $getData->flatten(1)->pluck('dis_name');
        $data = $getData->flatten(1)->pluck('count');
        //End

        // Chart Perbulan
        $labelBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        for ($bulan = 1; $bulan < 13; $bulan++) {
            $chartbulan  = collect(DB::SELECT("SELECT count(status_perizinan = 1) AS jumlah from perizinans where month(created_at)='$bulan'
            "))->first();
            $jumlah_perbulan[] = $chartbulan->jumlah;
        }

        // staf
        $pengawasan = Perizinan::where('user_id', Auth::user()->id)->where('status_perizinan', 0)->count();
        $kegiatanStaf = Pengawasan::where('user_id', Auth::user()->id)->count();

        // Admin
        $staf = User::where('role', 2)->count();
        $terverifikasi = Perizinan::where('status_perizinan', 1)->count();
        $kegiatan = Perizinan::count();
        $informasi = Informasi::count();

        // Kabid
        $user = User::count();
        $terverifikasiKabid = Perizinan::where('status_perizinan', 1)->count();
        $informasiKabid = Informasi::count();
        $perizinanKabid = Perizinan::count();

        return view('user.home', compact('staf', 'terverifikasi', 'kegiatan', 'informasi', 'labels', 'data', 'labelBulan', 'jumlah_perbulan', 'pengawasan', 'kegiatanStaf', 'user', 'terverifikasiKabid', 'informasiKabid', 'perizinanKabid'));
    }
}