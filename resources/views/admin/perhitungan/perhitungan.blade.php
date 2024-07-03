@extends('layout.template')

@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
    <!--/ Breadcrumb -->
    <!-- Table Analisa -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-2">
                <h5 class="card-header">Tahap Analisa</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Alternatif / Kriteria</th>
                                    @foreach ($kriteria as $key => $value)
                                        <th>{{ $value->nama_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($alternatif as $alt => $valt)
                                    <tr>
                                        <td>{{ $valt->nama_alternatif }}</td>
                                        @if (count($valt->penilaian) > 0)
                                            @foreach ($valt->penilaian  as $key => $value)
                                                <td>
                                                    {{ $value->crips->bobot_crips }}
                                                </td>
                                            @endforeach
                                        @endif
                                    </tr>
                                @empty
                                <tr>
                                    <td>Tidak ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Table Analisa -->
    <!-- Table Normalisasi -->
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card mt-2">
                <h5 class="card-header">Tahap Normalisasi</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Alternatif / Kriteria</th>
                                    @foreach ($kriteria as $key => $value)
                                        <th>{{ $value->nama_kriteria }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($normalisasi as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        @foreach ($value as $key_1 => $value_1)
                                            <td>
                                                {{ $value_1 }}
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Table Normalisasi -->
    <!-- Table Perangkingan -->
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card mt-2">
                <h5 class="card-header">Tahap Perangkingan</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    @foreach ($kriteria as $key => $value)
                                        <th>{{ $value->nama_kriteria }}</th>
                                    @endforeach
                                    <th rowspan="2" style="text-align: center; padding-bottom: 27px">Total</th>
                                    <th rowspan="2" style="text-align: center; padding-bottom: 27px">Rank</th>
                                </tr>
                                <tr>
                                    <th>Bobot</th>
                                    @foreach ($kriteria as $key => $value)
                                        <th>{{ $value->bobot }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($rangking as $key => $value)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        @foreach ($value as $key_1 => $value_1)
                                            <td>
                                                {{ number_format($value_1,1) }}
                                            </td>
                                        @endforeach
                                        <td>{{ $no++ }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Table Perangkingan -->
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
    <script src="{{ asset('') }}assets/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/moment/moment.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/flatpickr/flatpickr.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/tagify/tagify.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js"></script>
    <script src="{{ asset('') }}assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js"></script>
    <!-- Main JS -->
    <script src="{{ asset('') }}assets/js/main.js"></script>
    <!-- Page JS -->
    <script src="{{ asset('') }}assets/js/form-validation.js"></script>
@endsection
