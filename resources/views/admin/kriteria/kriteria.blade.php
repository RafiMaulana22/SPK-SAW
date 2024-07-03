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
    <div class="row">
        <!-- Form -->
        <div class="col-md-3">
            <div class="card mt-2">
                <h5 class="card-header">Form Kriteria</h5>
                <div class="card-body">
                    <form class="needs-validation" action="/kriteria" method="POST" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria"
                                placeholder="Masukkan nama kriteria..." required />
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please masukkan nama kriteria. </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="atribut_kriteria">Atribut Kriteria</label>
                            <select class="form-select" id="atribut_kriteria" name="atribut" required>
                                <option value="" selected disabled>Select Atribut</option>
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
                            </select>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please select atribut kriteria. </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bobot_kriteria">Bobot Kriteria</label>
                            <input type="text" class="form-control" id="bobot_kriteria" name="bobot"
                                placeholder="Masukkan nama kriteria..." required />
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please masukkan bobot kriteria. </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Form -->
        <!-- Table -->
        <div class="col-md-9">
            <div class="card mt-2">
                <h5 class="card-header">Data Kriteria</h5>
                <div class="card-body">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kriteria</th>
                                    <th>Atribut</th>
                                    <th>Bobot</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($kriteria as $get)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $get->nama_kriteria }}</td>
                                        <td>{{ $get->atribut }}</td>
                                        <td>{{ $get->bobot }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="/kriteria/{{ $get->id }}/crips">
                                                        <i class="bx bx-show-alt me-1"></i> Crips
                                                    </a>
                                                    <a class="dropdown-item" href="/kriteria/{{ $get->id }}/edit">
                                                        <i class="bx bx-edit-alt me-1"></i> Edit
                                                    </a>
                                                    <button class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#hapus{{ $get->id }}">
                                                        <i class="bx bx-trash me-1"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal Hapus-->
                                    <div class="modal fade" id="hapus{{ $get->id }}" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalToggleLabel">Hapus?</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Anda akan menghapus data dengan Kriteria <b>{{ $get->nama_kriteria }}</b>?
                                                </div>
                                                <div class="modal-footer">
                                                    <a class="btn btn-danger" href="/kriteria/{{ $get->id }}/hapus">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
