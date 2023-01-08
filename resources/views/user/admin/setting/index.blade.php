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
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @include('user.admin.setting.form')
        </div>
    </section>
@endsection
@push('script')
    <script>
        function previewLogo() {
            let oFReader = new FileReader()
            oFReader.readAsDataURL(document.getElementById("loadLogo").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("loadImg").src = oFREvent.target.result;
            };

        }

        function previewBg() {
            let oFReader = new FileReader()
            oFReader.readAsDataURL(document.getElementById("loadBg").files[0]);
            oFReader.onload = function(oFREvent) {
                document.getElementById("loadImgBg").src = oFREvent.target.result;
            };

        }
    </script>
@endpush
