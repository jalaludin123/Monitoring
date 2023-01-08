@extends('layouts.user')
@section('contents')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>{{ $title }}</h4>
            <h4>
                @if (Auth::user()->role == 0)
                    Kepala Dinas
                @elseif (Auth::user()->role == 1)
                    Admin
                @else
                    Staf Lapangan
                @endif
            </h4>
        </div>
        <form action="{{ url('perindag/profile/' . Auth::user()->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row mt-3">
                    <div class="col-md-4">
                        <img src="{{ Auth::user()->userDetail ? asset('image/profile/' . Auth::user()->userDetail->foto) : asset('image/profile/1-min.png') }}"
                            alt="" class="rounded-2" width="400px" height="300px" id="preview">
                    </div>
                    <div class="col-md-8 mt-2">
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}"
                                    class="form-control @error('name') is-invalid @enderror">
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}"
                                    class="form-control @error('email') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="">Phone</label>
                                <input type="text" name="phone"
                                    value="{{ Auth::user()->userDetail ? Auth::user()->userDetail->phone : '' }}"
                                    class="form-control @error('phone') is-invalid @enderror">
                            </div>
                            <div class="col-md-6">
                                <label for="">NIP</label>
                                <input type="text" name="nip"
                                    value="{{ Auth::user()->userDetail ? Auth::user()->userDetail->nip : '' }}"
                                    class="form-control @error('nip') is-invalid @enderror">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <label for="">Password</label>
                                <input type="password" name="password"
                                    class="form-control  @error('password') is-invalid @enderror">
                            </div>
                            <div class="col-md-6">
                                <label for="">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <label for="">Foto</label>
                                <input type="file" class="form-control" id="uploadFoto" name="foto"
                                    onchange="upload()">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <button class="btn btn-outline-info" type="submit"><i class="bi bi-save me-2"></i>Update</button>
            </div>
        </form>
    </div>
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
    </script>
@endpush
