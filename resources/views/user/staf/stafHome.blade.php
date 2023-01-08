<div class="col-md-12">
    <div class="row">


        <!-- Revenue Card -->
        <div class="d-flex justify-content-center">
            <div class="col-xxl-3 col-md-6 me-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Pengawasan</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-calendar-x-fill"></i>
                            </div>
                            <div class="ps-3">
                                <a href="{{ url('perindag/pengawasan') }}">
                                    <h6>{{ $pengawasan }}</h6>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-3 col-md-6">

                <div class="card info-card customers-card">
                    <div class="card-body">
                        <h5 class="card-title">Kegiatan</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-calendar-check-fill"></i>
                            </div>
                            <div class="ps-3">
                                <a href="{{ url('perindag/perizinan') }}">
                                    <h6>{{ $kegiatanStaf }}</h6>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>

            </div><!-- End Customers Card -->

        </div>

    </div>
</div><!-- End Left side columns -->
