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
            border: 2px solid #111;
        }

        .table-header {
            margin-left: 250px;
        }

        .table-data tr td {
            border: 1px solid #111;
            padding: 10px;
        }
    </style>
</head>

<body>
    <table class="table-header">
        <tbody>
            <tr>
                <td><img src="{{ public_path('image/logo/' . $appSetting->logo) }}" alt="" width="100px"
                        height="100px"></td>
                <td>
                    <div class="text-center">
                        <h5 class="text-uppercase">Pemerintahan Daerah Kabupaten Tangerang</h5>
                        <h4 class="text-uppercase">Badan Perindustrian dan Perdaganagn</h4>
                        <p>{{ $appSetting->address_website }}</p>
                        <p>Phone {{ $appSetting->phone_website }} || Email {{ $appSetting->email_website }}</p>
                        <p class="text-uppercase">Kabupaten Tangerang</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <hr class="hr">
    <div>
        <p class="text-end mb-4">Kabupaten Tangerang, {{ $date }}</p>
        <p>Berdasarkan ketentuan Pasal 39 Peraturan Pemerintah Nomor 24 Tahun 2018 tentang PelayananPerizinan Berusaha
            Terintegrasi Secara Elektronik, untuk dan atas nama Menteri, PimpinanLembaga, Gubernur, Bupati/Walikota,
            Lembaga OSS menerbitkan Izin Komersial/Operasional. Berikut adalah data izin yang belum Terverifikasi:</p>
    </div>
    <table class="table table-bordered table-hover table-data">
        <thead>
            <tr>
                <th>No</th>
                <th>Perusahaan</th>
                <th>NIB</th>
                <th>Jasa Produk</th>
                <th>Nilai Investasi</th>
                <th>Tenaga Kerja</th>
                <th>Jumlah Bangunan</th>
                <th>Tujuan</th>
                <th>Luas Lahan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perizinans as $perizinan)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $perizinan->perizinan->name_perusahan }}</td>
                    <td>{{ $perizinan->perizinan->nib }}</td>
                    <td>{{ $perizinan->produk_jasa }}</td>
                    <td>{{ $perizinan->nilai_investasi }}</td>
                    <td>{{ $perizinan->tenaga_kerja }}</td>
                    <td>{{ $perizinan->jumlah_bangunan }}</td>
                    <td>{{ $perizinan->tujuan }}</td>
                    <td>{{ $perizinan->luas_lahan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="float-end mt-5">
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
