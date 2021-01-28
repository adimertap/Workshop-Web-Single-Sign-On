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
                            Tambah Data Sparepart
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('masterdatasparepart') }}" class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="card">
            <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                <a class="nav-item nav-link active">
                    <div class="wizard-step-icon"><i class="fas fa-plus"></i></div>
                    <div class="wizard-step-text">
                        <div class="wizard-step-text-name">Data Sparepart</div>
                        <div class="wizard-step-text-details">Formulir Data Sparepart</div>
                    </div>
                </a>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane py-5 py-xl-4 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-6 col-xl-8">

                                {{-- Validasi Error --}}
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Error</strong>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif


                                <h3 class="text-primary">Step 1</h3>
                                <h5 class="card-title">Input Informasi Sparepart</h5>
                                <form action="{{ route('sparepart.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="small mb-1" for="kode_sparepart">Kode Sparepart </label>
                                        <input class="form-control" name="kode_sparepart" type="text"
                                            id="kode_sparepart" placeholder="Input Kode Sparepart"
                                            value="{{ old('kode_sparepart') }}">
                                    </div>
                                    <div class="form-group ">
                                        <label class="small mb-1" for="nama_sparepart">Nama Sparepart</label>
                                        <input class="form-control" name="nama_sparepart" type="text"
                                            id="nama_sparepart" placeholder="Input Nama Sparepart"
                                            value="{{ old('nama_sparepart') }}">
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_jenis_sparepart">Jenis Sparepart</label>
                                            <select class="form-control" name="id_jenis_sparepart"
                                                id="id_jenis_sparepart">
                                                @foreach ($jenis_sparepart as $item)
                                                <option value="{{ $item->id_jenis_sparepart }}">
                                                    {{ $item->jenis_sparepart }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_merk">Merk Sparepart</label>
                                            <select class="form-control" name="id_merk" id="id_merk">
                                                @foreach ($merk_sparepart as $item)
                                                <option value="{{ $item->id_merk }}">{{ $item->merk_sparepart }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="id_konversi">Satuan</label>
                                        <select class="form-control" name="id_konversi" id="id_konversi">
                                            @foreach ($konversi as $item)
                                            <option value="{{ $item->id_konversi }}">{{ $item->satuan }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <hr class="my-4" />
                                    <h3 class="text-primary">Step 2</h3>
                                    <h5 class="card-title">Upload Gambar dan Input Keterangan</h5>

                                    <div class="form-group">
                                        <label class="small mb-1" for="inputBillingName">Upload Gambar
                                            Sparepart</label>
                                        <input class="form-control" id="inputBillingName" type="file" />
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputOrgName">Keterangan Sparepart</label>
                                        <textarea class="form-control" id="inputOrgName" type="text"
                                            placeholder="Input Keterangan Sparepart" value="06"></textarea>
                                    </div>

                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-light disabled" type="button" disabled>Kembali</button>
                                        <button class="btn btn-primary" type="button">Tambah</button>
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
