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
            <li class="breadcrumb-item active">{{ $title }} {{ $detail->nama_kriteria }}</li>
        </ol>
    </nav>
    <!--/ Breadcrumb -->
    <div class="row">
        <!-- Form -->
        <div class="col-md-3">
            <div class="card mt-2">
                <h5 class="card-header">Form {{ $title }} {{ $detail->nama_kriteria }}</h5>
                <div class="card-body">
                    <form class="needs-validation" action="/kriteria/{{ $detail->id }}/crips/edit" method="POST" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="nama_crips">Nama {{ $detail->nama_kriteria }}</label>
                            <input type="text" class="form-control" id="nama_crips" name="nama_crips" value="{{ $detail->nama_crips }}" placeholder="Masukkan nama crips..." required />
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please masukkan nama crips. </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="bobot_crips">Bobot {{ $detail->nama_kriteria }}</label>
                            <input type="text" class="form-control" id="bobot_crips" name="bobot_crips" value="{{ $detail->bobot_crips }}" placeholder="Masukkan nama crips..." required />
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please masukkan bobot crips. </div>
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
    </div>
@endsection
