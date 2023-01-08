@extends('layouts.user')
@section('contents')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('perindag/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('perindag/informasi') }}">Informasi</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-body" style="height: 100vh;">
                <embed type="application/pdf" src="{{ asset('file/' . $informasi->file_informasi) }}" width="100%"
                    height="100%"></embed>
            </div>
        </div>
    </section>
@endsection
