<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Perizinan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .hr {
            border: 1px solid #111;
            margin: 10px 0 10px 0;
        }

        .table-header {
            margin-left: 0px;
        }

        .table-data tr td {
            border: 1px solid #111;
            padding: 7px;
        }

        .table-data tr th {
            border: 1px solid #111;
            padding: 7px;
        }
    </style>
</head>

<body>
    <table class="table-header">
        <tbody>
            <tr>
                <td><img src="{{ public_path('image/logo/' . $appSetting->logo) }}" alt="" width="130px"
                        height="130px"></td>
                <td>
                    <div class="text-center">
                        <h6 class="text-uppercase">Risalah Hasil Berita Acara Pemeriksaan</h6>
                        <h3 class="text-uppercase">Pemeriksaan Badan Usaha {{ $perizinan->verifikasi->produk_jasa }}
                            Dan
                            Verifikasi Lapangan Badan Usaha {{ $perizinan->verifikasi->produk_jasa }} </h3>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="hr"></div>
    <div>
        <p class="text-end mb-4">Kabupaten Tangerang, {{ $date }}</p>
        <p>Pada hari ini tanggal {{ $date }}, telah dilakukan pemeriksaan terhadap badan usaha
            {{ $perizinan->verifikasi->produk_jasa }} dan verifikasi lapangan kantor wilayah calon lembaga
            perusahaan
            {{ $perizinan->name_perusahan }} Kabupaten Tangerang yang mengajukan permohonan NIB sebagai berikut :
        </p>
    </div>
    <div>
        <h4>A. Alamat kantor</h4>
        <table class="table table-bordered table-hover table-data">
            <tbody>
                <tr>
                    <td width="30%">Surat Keterangan Domisili</td>
                    <td width="2%">:</td>
                    <td>{{ $perizinan->verifikasi->no_surat_keterangan_domisili }}</td>
                </tr>
                <tr>
                    <td width="30%">Keterangan Domisili</td>
                    <td width="2%">:</td>
                    <td>{{ $perizinan->alamat_perusahan }}</td>
                </tr>
                <tr>
                    <td width="30%">Luas Lahan</td>
                    <td width="2%">:</td>
                    <td>{{ $perizinan->verifikasi->luas_lahan }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <h4>B. Nomor Induk Bersuaha (NIB)</h4>
        <table class="table table-bordered table-hover table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Tanggal Terbit</th>
                    <th>KBLI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $perizinan->name_perusahan }}</td>
                    <td>{{ $perizinan->nib }}</td>
                    <td>{{ $perizinan->verifikasi->created_at->format('h M Y') }}</td>
                    <td>{{ $perizinan->kbli }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <h4>C. Skala Usaha, Jenis Usaha dan Bidang Usaha</h4>
        <table class="table table-bordered table-hover table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Skala Usaha</th>
                    <th>Jenis Usaha</th>
                    <th>Bidang</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $perizinan->skala_usaha }}</td>
                    <td>{{ $perizinan->badan_usaha }}</td>
                    <td>{{ $perizinan->verifikasi->produk_jasa }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <h4>D. Penanggung Jawab {{ $perizinan->name_perusahan }}</h4>
        <table class="table table-bordered table-hover table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Personal</th>
                    <th>Jabatan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $perizinan->name_penangungJawab }}</td>
                    <td>Manajer</td>
                    <td>Pegawai Tetap</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div>
        <h4>E. Fasilitas Perusahaan</h4>
        <table class="table table-bordered table-hover table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Uraian</th>
                    <th>Kondisi</th>
                    <th>Dokumentasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($perizinan->verifikasi->fasilitas as $fasilitas)
                    <tr>
                        <td>#</td>
                        <td>{{ $fasilitas->nama_fasilitas }}</td>
                        <td>{{ $fasilitas->kondisi_fasilitas }}</td>
                        <td><img src="{{ public_path('image/perusahaan/' . $fasilitas->gambar_fasilitas) }}"
                                alt="" height="40px"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="float-end">
        <p>Kepala Dinas</p>
        <br>
        <br>
        <p class="mx-3">(..............)</p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
