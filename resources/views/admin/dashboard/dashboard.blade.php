@extends('layout.template')

@section('content')
    <div class="row">
        <div class="col-lg-7 col-md-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h3>Welcome, {{ Auth::user()->name }} 👋🏻 </h3>
                    <p>Kami dengan senang hati menyambut Anda di platform Sistem Pendukung Keputusan kami. Di sini,<br> Anda
                        akan menemukan berbagai alat dan fitur yang dirancang untuk membantu Anda membuat <br> keputusan
                        yang
                        lebih baik dan lebih cepat.
                        <br>
                        <br>
                        Apakah Anda ingin menganalisis data, membuat laporan, atau mengelola proyek, dashboard ini <br>
                        menyediakan semua yang Anda butuhkan. Jelajahi menu di sebelah kiri untuk mengakses berbagai <br>
                        modul
                        dan mulailah perjalanan Anda menuju keputusan yang lebih informatif dan tepat sasaran.
                        <br>
                        <br>
                        Jika Anda memerlukan bantuan, jangan ragu untuk menghubungi tim dukungan kami. Kami siap <br>
                        membantu
                        Anda kapan saja.
                        <br>
                        <br>
                        Selamat bekerja dan semoga sukses!
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <!-- Card Border Shadow -->
            <div class="row mt-3">
                <div class="col-sm-6 col-lg-6 mb-4">
                    <div class="card card-border-shadow-primary h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-primary"><i
                                            class="bx bxs-customize"></i></span>
                                </div>
                                <h4 class="ms-1 mb-0">{{ $alternatif }}</h4>
                            </div>
                            <p class="mb-0">
                                <span class="fw-medium me-1">Alternatif</span>
                                <small class="text-muted">Data</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 mb-4">
                    <div class="card card-border-shadow-warning h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-warning"><i
                                            class='bx bx-layout'></i></span>
                                </div>
                                <h4 class="ms-1 mb-0">{{ $kriteria }}</h4>
                            </div>
                            <p class="mb-0">
                                <span class="fw-medium me-1">Kriteria</span>
                                <small class="text-muted">Data</small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-12 mb-4">
                    <div class="card card-border-shadow-danger h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2 pb-1">
                                <div class="avatar me-2">
                                    <span class="avatar-initial rounded bg-label-danger"><i
                                            class='bx bx-git-repo-forked'></i></span>
                                </div>
                                <h4 class="ms-1 mb-0">{{ $crips }}</h4>
                            </div>
                            <p class="mb-0">
                                <span class="fw-medium me-1">Crips</span>
                                <small class="text-muted">Data</small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Card Border Shadow -->
        </div>
    </div>
@endsection

@section('script')
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('') }}assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('') }}assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/i18n/i18n.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('') }}assets/vendor/js/menu.js"></script>
    <!-- endbuild -->
    <!-- Vendors JS -->
    <script src="{{ asset('') }}assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <!-- Main JS -->
    <script src="{{ asset('') }}assets/js/main.js"></script>
    <!-- Page JS -->
    <script src="{{ asset('') }}assets/js/dashboards-analytics.js"></script>
@endsection
