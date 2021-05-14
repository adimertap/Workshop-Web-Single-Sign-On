@extends('layouts.Admin.adminservice')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="file-plus"></i></div>
                            Service Advisor
                        </h1>
                        <div class="page-header-subtitle">Formulir penerimaan service kendaraan yang dilakukan Service
                            Advisor</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid mt-n10">
        {{-- Form SA --}}
        <div class="row">
            <div class="card col-10 mx-auto">
                <div class="card-header"> Form Service Advisor
                </div>
                <div class="card-body">
                    <form action="">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-6">
                                <label for="kode_penjualan">Kode SA</label>
                                <input class="form-control" id="kode_penjualan" name="kode_penjualan" type="text"
                                    value="{{ $kode_sa }}" readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1 mr-1" for="id_customer_bengkel">Pilih Customer</label><span class="mr-4 mb-3" style="color: red">*</span>
                                <div class="input-group input-group-joined">
                                    <div class="input-group-append">
                                        <a href="" class="btn btn-sm btn-secondary" type="button" data-toggle="modal"
                                            data-target="#ModalCustomer">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    <select class="form-control" name="id_customer_bengkel" id="id_customer_bengkel"
                                        class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                        <option>Pilih Customer</option>
                                        @foreach ($customer_bengkel as $item)
                                        <option value="{{ $item->nama_customer }}">
                                            {{ $item->nama_customer }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('id_customer_bengkel')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1 mr-1" for="id_jenis_kendaraan">Pilih Jenis
                                    Kendaraan</label><span class="mr-4 mb-3" style="color: red">*</span>
                                <div class="input-group input-group-joined">
                                    <div class="input-group-append">
                                        <a href="" class="btn btn-sm btn-secondary" type="button" data-toggle="modal"
                                            data-target="#ModalJenisKendaraan">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    <select class="form-control" name="id_jenis_kendaraan" id="id_jenis_kendaraan"
                                        class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                        <option>Pilih Kendaraan</option>
                                        @foreach ($kendaraan as $item)
                                        <option value="{{ $item->nama_kendaraan }}">
                                            {{ $item->nama_kendaraan }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('id_jenis_kendaraan')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group col-6">
                                <label for="inputOdoMeter">Odo Meter</label>
                                <input type="text" class="form-control" id="inputOdoMeter"
                                    placeholder="Input Odo Meter">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-5">
                                <label for="inputKeluhanKendaraan">Keluhan Kendaraan</label>
                                <input type="text" class="form-control" id="inputKeluhanKendaraan"
                                    placeholder="Input Keluhan Kendaraan">
                            </div>
                            <div class="form-group col-4">
                                <label for="inputMekanik">Mekanik</label>
                                <input type="text" class="form-control" id="inputMekanik"
                                    placeholder="Input Nama Mekanik">
                            </div>
                            <div class="form-group col-3">
                                <label for="inputWaktuEstimasi">Waktu Pengerjaan (menit)</label>
                                <input type="text" class="form-control" id="inputWaktuEstimasi"
                                    placeholder="Input Waktu">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="card col-10 mx-auto card-header-actions">
                <div class="card-header">Data Service
                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#Modaltambah">Tambah
                        Data</button>
                </div>
                <div class="card-body">
                    <div class="datatable">
                        <table class="table table-bordered table-hover dataTable" id="dataTable1" width="100%"
                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">Kode Sparepart</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">Nama Sparepart</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="card col-10 mx-auto card-header-actions">
                <div class="card-header">Data Sparepart
                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#Modaltambah">Tambah
                        Data</button>
                </div>
                <div class="card-body">
                    <div class="datatable">
                        <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">Kode Sparepart</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">Nama Sparepart</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-5">Submit to Front Office</button>
        </div>
    </div>
</main>


@endsection
