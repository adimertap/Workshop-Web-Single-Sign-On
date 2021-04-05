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
                            Edit Data Sparepart
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
                                <h3 class="text-primary">{{ $item->nama_sparepart }}</h3>
                                <h5 class="card-title">Ubah Data Sparepart</h5>
                                <form action="{{ route('sparepart.update',$item->id_sparepart) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_sparepart">Kode Sparepart</label>
                                            <input class="form-control" id="kode_sparepart" type="text"
                                                name="kode_sparepart" value="{{ $item->kode_sparepart }}" readonly/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="nama_sparepart">Nama Sparepart</label>
                                            <input class="form-control" id="nama_sparepart" type="text"
                                                name="nama_sparepart" value="{{ $item->nama_sparepart }}" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_jenis_sparepart">Jenis Sparepart</label>
                                            <select class="form-control" name="id_jenis_sparepart"
                                                id="id_jenis_sparepart">
                                                <option value="{{ $item->Jenissparepart->id_jenis_sparepart }}">
                                                    {{ $item->Jenissparepart->jenis_sparepart }}</option>
                                                @foreach ($jenis_sparepart as $jenissparepart)
                                                <option value="{{ $jenissparepart->id_jenis_sparepart }}">
                                                    {{ $jenissparepart->jenis_sparepart }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_merk">Merk Sparepart</label>
                                            <select class="form-control" name="id_merk" id="id_merk">
                                                <option value="{{ $item->Merksparepart->id_merk }}">
                                                    {{ $item->Merksparepart->merk_sparepart }}</option>
                                                @foreach ($merk_sparepart as $merksparepart)
                                                <option value="{{ $merksparepart->id_merk }}">
                                                    {{ $merksparepart->merk_sparepart }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row"> 
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_konversi">Konversi Satuan</label>
                                            <select class="form-control" name="id_konversi" id="id_konversi">
                                                <option value="{{ $item->Konversi->id_konversi }}">
                                                    {{ $item->Konversi->satuan }}</option>
                                                @foreach ($konversi as $konversisatuan)
                                                <option value="{{ $konversisatuan->id_konversi }}">
                                                    {{ $konversisatuan->satuan }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_rak">Tempat Rak</label>
                                            <select class="form-control" name="id_rak" id="id_rak">
                                                <option value="{{ $item->Rak->id_rak }}">
                                                    {{ $item->Rak->nama_rak }}</option>
                                                @foreach ($rak as $raks)
                                                <option value="{{ $raks->id_rak }}">
                                                    {{ $raks->nama_rak }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="stock">Stock</label>
                                            <input class="form-control" id="stock" type="text" name="stock"
                                                value="{{ $item->stock }}"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="stock_min">Stock Min</label>
                                            <input class="form-control" id="stock_min" type="text" name="stock_min"
                                                value="{{ $item->stock_min }}" />
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-light" type="button">Back</button>
                                        <button class="btn btn-primary" type="Submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
