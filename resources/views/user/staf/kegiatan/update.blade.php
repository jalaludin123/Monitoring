@extends('layouts.user')
@section('contents')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('perindag/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('perindag/pengawasan-kegiatan') }}">Data Kegiatan</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="card">
            <form action="{{ url('perindag/pengawasan-kegiatan/updateData/' . $kegiatan->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body p-3">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Pengawasan</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false">Fasilitas
                                Perusahaan</button>
                        </li>
                    </ul>
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                            {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="tab-content m-3" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="">Jasa Produk</label>
                                    <input type="text" name="jasa"
                                        class="form-control @error('jasa') is-invalid @enderror"
                                        placeholder="Jasa Produk Apa" value="{{ old('jasa', $kegiatan->produk_jasa) }}">
                                    @error('jasa')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">No Domisili Perusahaan</label>
                                    <input type="text" name="noSurat"
                                        class="form-control @error('noSurat') is-invalid @enderror"
                                        placeholder="No Surat Keterangan Domisili"
                                        value="{{ old('noSurat', $kegiatan->no_surat_keterangan_domisili) }}">
                                    @error('noSurat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="">Jumlah Bangunan</label>
                                    <input type="number" name="bangunan"
                                        class="form-control @error('bangunan') is-invalid @enderror"
                                        placeholder="Jumlah Bangunan"
                                        value="{{ old('bangunan', $kegiatan->jumlah_bangunan) }}">
                                    @error('bangunan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Luas Lahan</label>
                                    <input type="text" name="lahan"
                                        class="form-control @error('lahan') is-invalid @enderror" placeholder="Luas Lahan"
                                        value="{{ old('lahan', $kegiatan->luas_lahan) }}">
                                    @error('lahan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="">Tenaga Kerja</label>
                                    <input type="number" name="tenaga"
                                        class="form-control @error('tenaga') is-invalid @enderror"
                                        placeholder="Tenaga Kerja" value="{{ old('tenaga', $kegiatan->tenaga_kerja) }}">
                                    @error('tenaga')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Foto Perusahaan</label>
                                    <input type="file" name="foto"
                                        class="form-control @error('foto') is-invalid @enderror" id="uploadFoto"
                                        onchange="upload()">
                                    @error('foto')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <img src="{{ $kegiatan ? asset('image/perusahaan/' . $kegiatan->foto_perusahaan) : asset('image/default-img.png') }}"
                                        alt="" width="100%" class="me-2" height="500px" id="preview"
                                        style="background-size: cover">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">
                            <div class="mb-2">
                                <button class="btn btn-outline-primary w-100" type="button" id="addRow"><i
                                        class="bi bi-plus-circle"></i></button>
                            </div>
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Nama Fasilitas</th>
                                        <th>Kondisi</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table1">
                                    @foreach ($kegiatan->fasilitas as $fasilitas)
                                        <tr>
                                            <td><input type="text" class="form-control" readonly
                                                    value="{{ $fasilitas->nama_fasilitas }}">
                                            </td>
                                            <td><input type="text" class="form-control"
                                                    value="{{ $fasilitas->kondisi_fasilitas }}" readonly>
                                            </td>
                                            <td>
                                                <img src="{{ asset('image/perusahaan/' . $fasilitas->gambar_fasilitas) }}"
                                                    alt="" height="80px">
                                            </td>
                                            <td>
                                                <a class='btn btn-outline-danger'
                                                    href="{{ url('perindag/pengawasan-kegiatan/deleteData/' . $kegiatan->id) }}"><i
                                                        class='bi bi-trash'></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-outline-info" type="submit"><i class="bi bi-save me-2"></i>Save</button>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('script')
    <script>
        function upload() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("uploadFoto").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("preview").src = oFREvent.target.result;
            };
        };

        $(document).ready(function() {
            let baris = 1
            $('#addRow').on('click', function(e) {
                e.preventDefault()
                baris = baris + 1
                var form = "<tr id='baris'" + baris + ">"
                form += "<td><input type='text' name='fasilitas[]' class='form-control' required></td>"
                form += "<td><input type='text' name='kondisi[]' class='form-control' required></td>"
                form += "<td><input type='file' name='gambar[]' class='form-control' required></td>"
                form +=
                    "<td><button class='btn btn-outline-danger' type='button' data-row='baris'" + baris +
                    " id='hapus'><i class='bi bi-trash'></i></button></td>"
                form += "</tr>"

                $('#table1').append(form)
            })
        })
        $(document).on('click', '#hapus', function() {
            let hapus = $(this).data('row')
            $('#' + hapus).remove()
        })
    </script>
@endpush
