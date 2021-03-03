@extends('layouts.Admin.adminservice')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-warehouse"></i></div>
                            Penerimaan Service
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid">
        <div class="row">
            <div class="card col-8 mx-auto">
                <div class="card-header"> Form Service Advisor
                </div>
                <div class="card-body">
                    <form action="">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kode SA</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="SA-001">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputNamaCustomer">Nama Customer</label>
                            <input type="text" class="form-control" id="inputNamaCustomer" placeholder="Masukkan Nama Customer">
                        </div>
                        <div class="form-group">
                            <label for="inputJenisKendaraan">Jenis Kendaraan</label>
                            <input type="text" class="form-control" id="inputJenisKendaraan" placeholder="Masukkan Jenis Kendaraan">
                        </div>
                        <div class="form-group">
                            <label for="inputOdoMeter">Odo Meter</label>
                            <input type="text" class="form-control" id="inputOdoMeter" placeholder="Masukkan Odo Meter">
                        </div>
                        <div class="form-group">
                            <label for="inputKeluhanKendaraan">Keluhan Kendaraan</label>
                            <input type="text" class="form-control" id="inputKeluhanKendaraan" placeholder="Masukkan Keluhan Kendaraan">
                        </div>
                        <div class="form-group">
                            <label for="inputMekanik">Mekanik</label>
                            <input type="text" class="form-control" id="inputMekanik" placeholder="Masukkan Nama Mekanik">
                        </div>
                        <div class="form-group">
                            <label for="inputWaktuEstimasi">Waktu Estimasi</label>
                            <input type="text" class="form-control" id="inputWaktuEstimasi" placeholder="Masukkan Waktu Estimasi">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row my-5">
            <div class="card col-8 mx-auto card-header-actions">
                <div class="card-header">Data Service
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">Tambah
                        Data</button>
                </div>
                <div class="card-body">
                    <div class="datatable">
                        <table class="table table-bordered table-hover dataTable" id="dataTable1" width="100%"
                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">Kode Sparepart</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">Nama Sparepart</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
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
            <div class="card col-8 mx-auto card-header-actions">
                <div class="card-header">Data Sparepart
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">Tambah
                        Data</button>
                </div>
                <div class="card-body">
                    <div class="datatable">
                        <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">Kode Sparepart</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
                                        style="width: 20px;">Nama Sparepart</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending"
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
