@extends('layouts.user')
@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
@endpush
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
                <button class="btn btn-outline-primary float-end"><i class="bi bi-plus-circle me-2"
                        onclick="addData()"></i>Add</button>
            </div>
            <div class="card-body">
                <div class="table-responsive" id="myTable">

                </div>
            </div>
        </div>
    </section>
    <div class="modal" tabindex="-1" id="modal">
        <div class="modal-dialog">

        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        const modal = new bootstrap.Modal('#modal')
        $(document).ready(function() {
            read()

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": true,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        });

        function read() {
            $.get("{{ url('perindag/kategori-informasi/read') }}", {}, function(data, status) {
                $("#myTable").html(data);
            });
        }

        function addData() {
            $.ajax({
                method: 'get',
                url: "{{ url('perindag/kategori-informasi/create') }}",
                success: function(res) {
                    $('#modal').find('.modal-dialog').html(res)
                    modal.show()
                }
            })
        }

        function save() {
            $('#formPost').on('submit', function(e) {
                e.preventDefault()
                const _form = this
                const formData = new FormData(_form)
                $.ajax({
                    method: 'post',
                    url: "{{ url('perindag/kategori-informasi/store') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        modal.hide()
                        read()
                        toastr.success('Data Created Successfully')
                    },
                    error: function(res) {
                        let errors = res.responseJSON?.errors
                        $(_form).find('.text-danger.text-small').remove()
                        if (errors) {
                            for (const [key, value] of Object.entries(errors)) {
                                $(`[name='${key}']`).parent().append(
                                    `<span class="text-danger text-small">${value}</span>`
                                )
                            }
                        }
                    }
                })
            })
        }

        function edit(id) {
            if (id) {
                if (confirm('Are you sure want to update this post') === true) {
                    $.ajax({
                        method: 'get',
                        url: `{{ url('perindag/kategori-informasi/edit/${id}') }}`,
                        success: function(res) {
                            $('#modal').find('.modal-dialog').html(res)
                            modal.show()
                        }
                    })
                }
            }
        }

        function ubah(id) {
            $('#formUpdate').on('submit', function(e) {
                e.preventDefault()
                const _form = this
                const formData = new FormData(_form)
                $.ajax({
                    method: 'post',
                    url: "{{ url('perindag/kategori-informasi/ubah') }}" + '/' + id,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        modal.hide()
                        toastr.success('Data Updated Successfully')
                        read()
                    },
                    error: function(res) {
                        let errors = res.responseJSON?.errors
                        $(_form).find('.text-danger.text-small').remove()
                        if (errors) {
                            for (const [key, value] of Object.entries(errors)) {
                                $(`[name='${key}']`).parent().append(
                                    `<span class="text-danger text-small">${value}</span>`
                                )
                            }
                        }
                    }
                })
            })
        }

        function hapus(id) {
            if (id) {
                if (confirm('Are you sure want to delete this post') === true) {
                    $.ajax({
                        method: 'get',
                        url: "{{ url('perindag/kategori-informasi/hapus') }}" + '/' + id,
                        success: function(res) {
                            read()
                            toastr.success('Data Deleted Successfully')
                        }
                    })
                }
            }

        }
    </script>
@endpush
