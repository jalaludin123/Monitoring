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
                <a href="{{ url('perindag/print') }}" class="btn btn-outline-primary float-end"><i
                        class="bi bi-printer-fill me-2"></i>Print</a>
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
                                <th>Nama Perusahaan</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Pengawas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $perizinan)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $perizinan->name_penangungJawab }}</td>
                                    <td>{{ $perizinan->phone_perusahan }}</td>
                                    <td>{{ $perizinan->email_perusahan }}</td>
                                    <td class="text-center">
                                        @if ($perizinan->status_perizinan == 0)
                                            <i class="bi bi-exclamation-square-fill fs-3" style="color:brown"></i>
                                        @else
                                            <i class="bi bi-check-square-fill fs-3" style="color:lawngreen"></i>
                                        @endif
                                    </td>
                                    <td>{{ $perizinan->user->name }}</td>
                                    <td>
                                        <a href="{{ url('perindag/printPdf/' . $perizinan->id) }}"
                                            class="btn btn-outline-primary"><i class="bi bi-printer"></i></a>
                                        <a href="{{ url('perindag/reports/' . $perizinan->id) }}"
                                            class="btn btn-outline-success"><i class="bi bi-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($reports->links())
                        <div>
                            {{ $reports->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
