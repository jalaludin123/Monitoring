@extends('layouts.user')
@section('contents')
    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('perindag/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ url('perindag/user') }}">User</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="card">
            <form action="{{ $user->id ? url('perindag/user/' . $user->id) : url('perindag/user') }}" method="post">
                @csrf
                @if ($user->id)
                    @method('PUT')
                @endif
                <div class="card-body p-4">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name', $user->id ? $user->name : '') }}" placeholder="Input name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email', $user->id ? $user->email : '') }}" placeholder="Input email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    @if ($user->id)
                        <div class="row">
                            <div class="col-md-12">
                                <label>Role</label>
                                <select name="role" class="form-select @error('role') is-invalid @enderror">
                                    <option value="{{ $user->role }}">{{ $user->role == 1 ? 'Admin' : 'Staf' }}</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Staf</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    @else
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" placeholder="Input Password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Konfirmasi Password</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" placeholder="Input Konfirmasi Password">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label>Role</label>
                                <select name="role" class="form-select @error('role') is-invalid @enderror">
                                    <option value="">--Pilih Role--</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Staf</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    @endif
                </div>
                <hr>
                <div class="text-center pb-3">
                    <button class="btn btn-outline-info" type="submit"><i class="bi bi-save me-2"></i>Save</button>
                </div>
            </form>
        </div>
    </section>
@endsection
