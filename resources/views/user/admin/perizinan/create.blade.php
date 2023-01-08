@extends('layouts.user')
@section('contents')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('perindag/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('perindag/perizinan') }}">Perizinan</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="card">
            @include('user.admin.perizinan.form')
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#kota').on('change', function() {
                let kota = $('#kota').val()
                $('#kecamatan').children().remove()
                $('#kecamatan').append('<option value="">--Pilih Kecamatan--</option>')
                $.ajax({
                    url: `{{ url('kecamatan/${kota}') }}`,
                    success: function(res) {
                        $.each(res, function(index, data) {
                            $('#kecamatan').append(
                                `<option value="${data.dis_id}">${data.dis_name}</option>`
                            )
                        })
                    }
                })
            })
            $('#kecamatan').on('change', function() {
                let kecamatan = $('#kecamatan').val()
                $('#kelurahan').children().remove()
                $('#kelurahan').append('<option value="">--Pilih Kelurahan--</option>')
                $.ajax({
                    url: `{{ url('kelurahan/${kecamatan}') }}`,
                    success: function(res) {
                        $.each(res, function(index, data) {
                            $('#kelurahan').append(
                                `<option value="${data.subdis_id}">${data.subdis_name}</option>`
                            )
                        })
                    }
                })
            })
        })
    </script>
@endpush
