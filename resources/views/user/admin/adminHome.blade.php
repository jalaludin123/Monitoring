<div class="col-md-12">
    <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title"> Staf Lapangan</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <a href="{{ url('perindag/staf') }}">
                                <h6>{{ $staf }}</h6>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Terverifikasi</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-calendar-check-fill"></i>
                        </div>
                        <div class="ps-3">
                            <a href="{{ url('perindag/report') }}">
                                <h6>{{ $terverifikasi }}</h6>
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
                            <i class="bi bi-calendar-x-fill"></i>
                        </div>
                        <div class="ps-3">
                            <a href="{{ url('perindag/perizinan') }}">
                                <h6>{{ $kegiatan }}</h6>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div><!-- End Customers Card -->

        <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title"> Informasi</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-megaphone"></i>
                        </div>
                        <div class="ps-3">
                            <a href="{{ url('perindag/informasi') }}">
                                <h6>{{ $informasi }}</h6>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->
    </div>
</div><!-- End Left side columns -->
