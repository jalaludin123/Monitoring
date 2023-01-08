@extends('layouts.user')
@section('contents')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('perindag/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('perindag/reports') }}">Reports</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5>Data Perizinan</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table border="0" width="100%" cellpadding="5" cellspacing="0">
                            <tr>
                                <td>Nama Perusahaan</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->name_perusahan }}" class="form-control"
                                        disabled></td>
                            </tr>
                            <tr>
                                <td>No. Telepon</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->phone_perusahan }}" class="form-control"
                                        disabled></td>
                            </tr>
                            <tr>
                                <td>Nama Pengawas</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->user->name }}" class="form-control"
                                        disabled></td>
                            </tr>
                            <tr>
                                <td>NIB</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->nib }}" class="form-control" disabled></td>
                            </tr>
                            <tr>
                                <td>Skala Usaha</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->skala_usaha }}" class="form-control"
                                        disabled></td>
                            </tr>
                            <tr>
                                <td>KBLI</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->kbli }}" class="form-control" disabled></td>
                            </tr>
                            <tr>
                                <td>Kecamatan</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->getKecamatan->dis_name }}"
                                        class="form-control" disabled></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td width='5%'>:</td>
                                <td>
                                    @if ($perizinan->status_perizinan == 0)
                                        <div class="badge bg-danger p-2">Tidak Terverifikasi</div>
                                    @else
                                        <div class="badge bg-success p-2">Terverifikasi</div>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table border="0" width="100%" cellpadding="5" cellspacing="0">
                            <tr>
                                <td>Nama Penanggung Jawab</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->name_penangungJawab }}"
                                        class="form-control" disabled></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->email_perusahan }}" class="form-control"
                                        disabled></td>
                            </tr>
                            <tr>
                                <td>Email pengawas</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->user->email }}" class="form-control"
                                        disabled></td>
                            </tr>
                            <tr>
                                <td>Sektor</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->sektor }}" class="form-control" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Badan Usaha</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->badan_usaha }}" class="form-control"
                                        disabled></td>
                            </tr>
                            <tr>
                                <td>Kota</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->getKecamatan->kota->city_name }}"
                                        class="form-control" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>Kelurahan</td>
                                <td width='5%'>:</td>
                                <td><input type="text" value="{{ $perizinan->getKelurahan->subdis_name }}"
                                        class="form-control" disabled></td>
                            </tr>
                            <tr>
                                <td>File Perizinan</td>
                                <td width='5%'>:</td>
                                <td>
                                    <a href="{{ url('perindag/perizinan/showPdf/' . $perizinan->id) }}"
                                        class="btn btn-outline-primary"><i class="bi bi-eye-fill me-2"></i>Show</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table border="0" width="100%" cellpadding="5" cellspacing="0">
                            <tr>
                                <td width="18.5%">Alamat Lengkap</td>
                                <td width="2.5%">:</td>
                                <td>
                                    <textarea rows="4" class="form-control" disabled>{{ $perizinan->alamat_perusahan }}</textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Data Pengawasan</h5>
            </div>
            <div class="card-body mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('image/perusahaan/' . $perizinan->verifikasi->foto_perusahaan) }}"
                            alt="" width="100%" height="400px">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-12">
                                <table border="0" width="100%" cellpadding="15" cellspacing="0">
                                    <tr>
                                        <td>Produk Jasa</td>
                                        <td width='5%'>:</td>
                                        <td><input type="text" value="{{ $perizinan->verifikasi->produk_jasa }}"
                                                class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Bangunan</td>
                                        <td width='5%'>:</td>
                                        <td><input type="text" value="{{ $perizinan->verifikasi->jumlah_bangunan }}"
                                                class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>No Keterangan Domisili</td>
                                        <td width='5%'>:</td>
                                        <td><input type="text"
                                                value="{{ $perizinan->verifikasi->no_surat_keterangan_domisili }}"
                                                class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Tenaga Kerja</td>
                                        <td width='5%'>:</td>
                                        <td><input type="text" value="{{ $perizinan->verifikasi->tenaga_kerja }}"
                                                class="form-control" disabled></td>
                                    </tr>
                                    <tr>
                                        <td>Luas Lahan</td>
                                        <td width='5%'>:</td>
                                        <td><input type="text" value="{{ $perizinan->verifikasi->luas_lahan }}"
                                                class="form-control" disabled></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="responsive-table mt-2">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Fasilitas</th>
                                <th>Kondisi</th>
                                <th>Dokumentasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perizinan->verifikasi->fasilitas as $fasilitas)
                                <tr>
                                    <td>{{ $fasilitas->nama_fasilitas }}</td>
                                    <td>{{ $fasilitas->kondisi_fasilitas }}</td>
                                    <td>
                                        <img src="{{ asset('image/perusahaan/' . $fasilitas->gambar_fasilitas) }}"
                                            alt="" height="100px">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
