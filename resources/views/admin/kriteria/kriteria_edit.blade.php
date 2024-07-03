@extends('layout.template')

@section('content')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-style1">
            <li class="breadcrumb-item">
                <a href="/dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/kriteria">Kriteria</a>
            </li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
    <!--/ Breadcrumb -->
    <div class="row">
        <!-- Form -->
        <div class="col-md-3">
            <div class="card mt-2">
                <h5 class="card-header">Form Edit Kriteria</h5>
                <div class="card-body">
                    <form class="needs-validation" action="/kriteria/{{ $detail->id }}/edit" method="POST" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{ $detail->nama_kriteria }}" placeholder="Masukkan nama kriteria..." required />
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please masukkan nama kriteria. </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="atribut_kriteria">Atribut Kriteria</label>
                            <select class="form-select" id="atribut_kriteria" name="atribut" required>
                                <option value="" selected disabled>Select Atribut</option>
                                <option value="Benefit" {{ $detail->atribut == 'Benefit' ? 'selected' : '' }}>Benefit</option>
                                <option value="Cost" {{ $detail->atribut == 'Cost' ? 'selected' : '' }}>Cost</option>
                            </select>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please select atribut kriteria. </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bobot_kriteria">Bobot Kriteria</label>
                            <input type="text" class="form-control" id="bobot_kriteria" name="bobot" value="{{ $detail->bobot }}" placeholder="Masukkan nama kriteria..." required />
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please masukkan bobot kriteria. </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="/kriteria" class="btn btn-danger">Kembali</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Form -->
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
