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
            <div class="card-header">
                <a href="{{ url('perindag/user/create') }}" class="btn btn-outline-primary float-end"><i
                        class="bi bi-plus-circle me-2"></i>Add</a>
            </div>
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->role == 0)
                                            Kabid
                                        @elseif ($user->role == 1)
                                            Admin
                                        @else
                                            Staf
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{ url('perindag/user/' . $user->id) }}" method="post"
                                            onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini ?');">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ url('perindag/user/' . $user->id . '/edit') }}"
                                                class="btn btn-outline-warning"><i
                                                    class="bi bi-box-arrow-in-down-right"></i></a>
                                            <button class="btn btn-outline-danger" type="submit"><i
                                                    class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($users->links())
                        <div>
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
