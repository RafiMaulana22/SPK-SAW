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
    <!-- Table -->
    <div class="row">
        <div class="col-md-12">
            <form action="/penilaian" method="POST">
                @csrf
                <div class="card mt-2">
                    <h5 class="card-header">Data {{ $title }}</h5>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 float-right">
                                <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nama Alternatif</th>
                                        @foreach ($kriteria as $key => $value)
                                            <th>{{ $value->nama_kriteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($alternatif as $alt => $valt)
                                        <tr>
                                            <input type="hidden" value="{{ $valt->id }}" name="id_alternatif[]">
                                            <td>{{ $valt->nama_alternatif }}</td>
                                            @if (count($valt->penilaian) > 0)
                                                @foreach ($kriteria as $key => $value)
                                                    <td>
                                                        <select class="form-select"
                                                            name="id_crips[{{ $valt->id }}][]">
                                                            @foreach ($value->crips as $k_1 => $v_1)
                                                                <option value="{{ $v_1->id }}"
                                                                    {{ $v_1->id == $valt->penilaian[$key]->id_crips ? 'selected' : '' }}>
                                                                    {{ $v_1->nama_crips }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @endforeach
                                            @else
                                                @foreach ($kriteria as $key => $value)
                                                    <td>
                                                        <select class="form-select"
                                                            name="id_crips[{{ $valt->id }}][]">
                                                            @foreach ($value->crips as $k_1 => $v_1)
                                                                <option value="{{ $v_1->id }}">
                                                                    {{ $v_1->nama_crips }}</option>
                                                            @endforeach
                                                        </select>
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
            </form>
        </div>
        <!--/ Table -->
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
