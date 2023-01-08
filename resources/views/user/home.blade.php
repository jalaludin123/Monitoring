@extends('layouts.user')
@section('contents')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            @if (Auth::user()->role == 1)
                @include('user.admin.adminHome')
            @elseif (Auth::user()->role == 2)
                @include('user.staf.stafHome')
            @elseif (Auth::user()->role == 0)
                @include('user.kabid.kabidHome')
            @endif

            <!-- Reports -->
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Reports Perkecamatan</h5>

                        <!-- Line Chart -->
                        <canvas id="myChart" height="100px"></canvas>


                        <!-- End Line Chart -->

                    </div>

                </div>
            </div><!-- End Reports -->
            <div class="col-12">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Reports Perbulan</h5>

                        <!-- Line Chart -->
                        <canvas id="chartBulan" height="100px"></canvas>


                        <!-- End Line Chart -->

                    </div>

                </div>
            </div><!-- End Reports -->

        </div>
    </section>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">
        // Kecamatan
        var labels = {{ Js::from($labels) }};
        var kecamatan = {{ Js::from($data) }};

        const data = {
            labels: labels,
            datasets: [{
                label: 'Total Perusahaan',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: kecamatan,
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

        // Perbulan
        var labelPerbulan = {{ Js::from($labelBulan) }};
        var Bulan = {{ Js::from($jumlah_perbulan) }};

        const datas = {
            labels: labelPerbulan,
            datasets: [{
                label: 'Terverifikasi',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(27, 0, 150)',
                data: Bulan,
            }]
        };

        const configs = {
            type: 'line',
            data: datas,
            options: {}
        };

        const chartBulan = new Chart(
            document.getElementById('chartBulan'),
            configs
        );
    </script>
@endpush
