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
    </style>
</head>

<body>
    <table class="table-header">
        <tbody>
            <tr>
                <td><img src="{{ public_path('image/logo/' . $appSetting->logo) }}" alt="" width="100px"
                        height="90px" style="margin-bottom: 17px;"></td>
                <td>
                    <div class="text-center">
                        <h4 class="text-uppercase">pemerintahan kabupaten tangerang</h4>
                        <h4 class="text-uppercase">Dinas perindustrian dan perdagangan kabupaten tangerang</h4>
                        <p>{{ $appSetting->address_website }}, Telp. ({{ $appSetting->phone_website }}) e-mail:
                            ({{ $appSetting->email_website }})</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="hr"></div>
    <div>
        <p class="text-end mb-4">Tangerang, {{ $date->format('l-M-Y') }}</p>
        <table class="table table-bordered table-hover table-data">
            <tbody>
                <tr>
                    <td width="16%">No</td>
                    <td width="2%">:</td>
                    <td>{{ $no }}</td>
                    <td width="17%"></td>
                    <td>Kepada</td>
                </tr>
                <tr>
                    <td width="16%">Lampiran</td>
                    <td width="2%">:</td>
                    <td>-</td>
                    <td width="17%"></td>
                    <td>Yth. {{ $perizinan->name_penangungJawab }}</td>
                </tr>
                <tr>
                    <td width="16%">Perihal</td>
                    <td width="2%">:</td>
                    <td>Berita Acara Pemeriksaan</td>
                    <td width="17%"></td>
                    <td>{{ $perizinan->name_perusahan }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="mt-5">
        <table class="table table-bordered table-hover table-data">
            <tbody>
                <tr>
                    <td width="16%">Pertimbangan</td>
                    <td width="2%">:</td>
                    <td>
                        Bahwa berdasarkan Peraturan Badan Koordinasi Penanaman Modal Nomor 5 Tahun 2021 tentang
                        Pengawasan Perizinan Berusaha Berbasis Risiko, dalam rangka Pengawasan atau verifikasi Perizinan
                        Berusaha pada {{ $perizinan->name_perusahan }} di wilayah Kabupaten Tangerang, maka dipandang
                        perlu mengeluarkan surat perintah berita acara pengawasan perizinan.
                    </td>
                </tr>
                <tr>
                    <td width="16%">Dasar</td>
                    <td width="2%">:</td>
                    <td>
                        <ol>
                            <li>Undang-Undang Nomor 11 Tahun 2020 tentang Cipta Kerja</li>
                            <li>Peraturan Badan Koordinasi Penanaman Modal Nomor 5 Tahun 2021 tentang Pengawasan
                                Perizinan Berusaha Berbasis Risiko</li>
                        </ol>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="text-center text-uppercase">
        <h4>diperintahkan</h4>
    </div>
    <div class="mt-4">
        <table class="table table-bordered table-hover table-data">
            <tbody>
                <tr>
                    <td width="16%">Kepada</td>
                    <td width="2%">:</td>
                    <td>
                        {{ $perizinan->name_penangungJawab }}
                    </td>
                </tr>
                <tr>
                    <td width="16%">Untuk</td>
                    <td width="2%">:</td>
                    <td>
                        <ol>
                            <li>Selain melaksanakan tugas sehari - hari staf dinas yang ditunjuk sebagai pelaksanaan
                                pengawasan atau Verifikasi Perizinan Berusaha yang berlokasi di
                                {{ $perizinan->kecamatan }} yang akan dilaksanakan pada :
                                <table class="table table-bordered table-hover table-data">
                                    <tbody>
                                        <tr>
                                            <td width="16%">Hari</td>
                                            <td width="2%">:</td>
                                            <td>
                                                {{ $date->format('l') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="16%">Tanggal</td>
                                            <td width="2%">:</td>
                                            <td>
                                                {{ $date->format('d-m-y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="16%">Lokasi</td>
                                            <td width="2%">:</td>
                                            <td>
                                                {{ $perizinan->alamat_perusahan }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </li>
                            <li>Daftar Pertanyaan Bagi Pelaku Usaha Terkait Pemenuhan Standar Pelaksanaan Kegiatan Usaha
                                Dan Kewajiban</li>
                            <li>Perangkat Kerja Lainnya Yang Diperlukan Dalam Rangka Mendukung Pelaksanaan Pengawasan
                            </li>
                        </ol>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- <div>
        <h4>A. Alamat kantor</h4>
        <table class="table table-bordered table-hover table-data">
            <tbody>
                <tr>
                    <td width="30%">Surat Keterangan Domisili</td>
                    <td width="2%">:</td>
                    <td>No. 12/Sekrt-RT/III/2020</td>
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
                    <td>11762</td>
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
                <tr>
                    <td>1</td>
                    <td>Komputer</td>
                    <td>Ada</td>
                    <td>Foto</td>
                </tr>
            </tbody>
        </table>
    </div> --}}
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
