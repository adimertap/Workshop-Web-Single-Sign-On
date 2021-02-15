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
                            Edit Data Sparepart {{ $item->nama_sparepart }}
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('masterdatasparepart') }}"
                            class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                    <!-- Wizard navigation item 1-->
                    <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-toggle="tab" role="tab"
                        aria-controls="wizard1" aria-selected="true">
                        <div class="wizard-step-icon"><i class="fas fa-plus"></i></div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Formulir Sparepart</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- CARD 1 --}}
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <!-- Wizard tab pane item 1-->
                    <div class="tab-pane py-5 py-xl-5 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-6 col-xl-8">
                                <h3 class="text-primary">Step 1</h3>
                                <h5 class="card-title">Input Formulir Identitas Diri</h5>
                                <form action="{{ route('sparepart.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_sparepart">Kode Sparepart</label>
                                            <input class="form-control" id="kode_sparepart" type="text" name="kode_sparepart"
                                                value="{{ $item->kode_sparepart }}" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="nama_sparepart">Nama Sparepart</label>
                                            <input class="form-control" id="nama_sparepart" type="text" name="nama_sparepart"
                                            value="{{ $item->nama_sparepart }}"  />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_jenis_sparepart">Jenis Sparepart</label>
                                            <select class="form-control" name="id_jenis_sparepart" id="id_jenis_sparepart">
                                                <option value="{{ $item->Jenissparepart->jenis_sparepart }}">{{ $item->Jenissparepart->jenis_sparepart }}</option>
                                                @foreach ($jenis_sparepart as $item)
                                                    <option value="{{ $item->id_jenis_spareaprt }}">{{ $item->jenis_sparepart }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_merk">Merk Sparepart</label>
                                            <select class="form-control" name="id_merk" id="id_merk">
                                                <option value="{{ $item->Merksparepart->merk_sparepart }}">{{ $item->Merksparepart->merk_sparepart }}</option>
                                                @foreach ($merk_sparepart as $item)
                                                    <option value="{{ $item->id_merk }}">{{ $item->merk_sparepart }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="id_konversi">Konversi Satuan</label>
                                        <select class="form-control" name="id_konversi" id="id_konversi">
                                            <option value="{{ $item->Konversi->satuan }}">{{ $item->Konversi->satuan }}</option>
                                            @foreach ($konversi as $item)
                                            <option value="{{ $item->id_konversi }}">{{ $item->satuan }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                    {{-- Validasi Error --}}
                                    @if (count($errors) > 0)
                                    
                                    @endif

                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-light" type="button">Previous</button>
                                        <button class="btn btn-primary" type="Submit">Submit</button>
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
