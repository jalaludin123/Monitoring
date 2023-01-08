<div class="col-md-12">
    <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <a href="{{ url('perindag/user') }}">
                                <h6>{{ $user }}</h6>
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
                                <h6>{{ $terverifikasiKabid }}</h6>
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
                    <h5 class="card-title">Perizinan</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-window"></i>
                        </div>
                        <div class="ps-3">
                            <a href="#">
                                <h6>{{ $perizinanKabid }}</h6>
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
                            <a href="#">
                                <h6>{{ $informasiKabid }}</h6>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div><!-- End Sales Card -->
    </div>
</div><!-- End Left side columns -->
