@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-cog"></i></div>
                            Tambah Foto Sparepart
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('masterdatagallery') }}"
                            class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
{{--  --}}

    <div class="container">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                    <!-- Wizard navigation item 1-->
                    <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-toggle="tab" role="tab"
                        aria-controls="wizard1" aria-selected="true">
                        <div class="wizard-step-icon"><i class="fas fa-plus"></i></div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Formulir Foto Sparepart</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- CARD 1 --}}
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <!-- Wizard tab pane item 1-->
                    <div class="tab-pane py-2 py-xl-2 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-6 col-xl-9">
                                <h3 class="text-primary">Sparepart</h3>
                                <h5 class="card-title">Input Formulir Sparepart</h5>
                                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="small mb-1" for="id_sparepart">Sparepart</label>
                                        {{-- <select class="form-control" name="id_sparepart"
                                            class="form-control @error('id_sparepart') is-invalid @enderror"
                                            id="id_sparepart">
                                            <option>Pilih Sparepart</option>
                                            @foreach ($sparepart as $item)
                                            <option value="{{ $item->id_sparepart }}">
                                                {{ $item->nama_sparepart }}
                                            </option>
                                            @endforeach
                                        </select> --}}
                                        <input type="hidden" name="id_sparepart" value="{{ $sparepart->id_sparepart }}">
                                        <input type="text" value="{{ $sparepart->nama_sparepart }}" class="form-control" disabled>
                                        @error('id_sparepart')<div class="text-danger small mb-1">
                                            {{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="photo">Foto Sparepart</label>
                                        <input class="form-control" id="photo" type="file" name="photo"
                                            value="{{ old('photo') }}" accept="image/*" multiple="multiple" 
                                            class="form-control @error('photo') is-invalid @enderror">
                                        @error('photo')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('masterdatasparepart') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary" type="Submit">Tambah Foto Sparepart</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

</script>

@endsection
