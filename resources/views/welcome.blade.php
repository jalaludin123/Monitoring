@extends('layouts.app')
@section('content')
    <div style="padding: 0 100px 0 100px;">
        <img src="{{ asset('image/background/' . $appSetting->background) }}" alt="" class="d-block w-100"
            height="300px">
    </div>
    <div class="h-50 bg-white second-navbar" style="padding: 20px 100px 20px 100px">
        <div class="row">
            <div class="col-md-4">
                <a href="https://oss.go.id/informasi/kbli-berbasis-risiko">
                    <div class="card card-box">
                        <div class="card-body d-flex align-items-center justify-content-between pt-1 pb-1">
                            <p class="mt-3"> Panduan KBLI 2020</p>
                            <img src="{{ asset('image/logo/371c89ef-a459-4351-83d9-6303e339c18c.svg') }}" alt=""
                                width="100" height="70" class="text-center">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ url('login') }}">
                    <div class="card card-box">
                        <div class="card-body d-flex align-items-center justify-content-between pt-1 pb-1">
                            <p class="mt-3">Pengawasan Usaha Menengah & Besar</p>
                            <img src="{{ asset('image/logo/d33ad47d-4946-48e3-892c-f316cb9d97de.svg') }}" alt=""
                                width="100" height="70" class="text-center">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="{{ url('informasi') }}">
                    <div class="card card-box">
                        <div class="card-body d-flex align-items-center justify-content-between pt-1 pb-1">
                            <p class="mt-3">Informasi</p>
                            <img src="{{ asset('image/logo/audio.png') }}" alt="" width="100" height="70"
                                class="text-center">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div style="height: 100vh">
    </div>
@endsection
