@extends('layouts.user')
@section('contents')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('perindag/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="card">
            <div class="card-header">
            </div>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Perusahaan</th>
                                <th>Produk</th>
                                <th>Gambar Perusahaan</th>
                                <th>Status</th>
                                <th>Pengawas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kegiatans as $kegiatan)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $kegiatan->perizinan->name_penangungJawab }}</td>
                                    <td>{{ $kegiatan->produk_jasa }}</td>
                                    <td><img src="{{ asset('image/perusahaan/' . $kegiatan->foto_perusahaan) }}"
                                            alt="" width="70px" height="70px"></td>
                                    <td class="text-center">
                                        @if ($kegiatan->perizinan->status_perizinan == 0)
                                            <i class="bi bi-exclamation-square-fill fs-3" style="color:brown"></i>
                                        @else
                                            <i class="bi bi-check-square-fill fs-3" style="color:lawngreen"></i>
                                        @endif
                                    </td>
                                    <td>{{ $kegiatan->perizinan->user->name }}</td>
                                    <td>
                                        <a href="{{ url('perindag/pengawasan-kegiatan/ubah/' . $kegiatan->id) }}"
                                            class="btn btn-outline-info m-1"><i class="bi bi-pencil-square"></i></a>
                                        <a href="{{ url('perindag/pengawasan-kegiatan/detail/' . $kegiatan->id) }}"
                                            class="btn btn-outline-success m-1"><i class="bi bi-eye-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($kegiatans->links())
                        <div>
                            {{ $kegiatans->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
