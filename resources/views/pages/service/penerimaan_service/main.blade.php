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
            <div class="card mb-4 mx-auto">
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
                                <label class="small mb-1 mr-1" for="id_customer_bengkel">Pilih Customer</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
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

        <div class="container-fluid mt-5">
            <div class="card mb-4">
                <div class="card card-header-actions">
                    <div class="card-header ">List Sparepart
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-info alert-icon" role="alert">
                        <div class="alert-icon-aside">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="alert-icon-content">
                            <h5 class="alert-heading" class="small">Jasa Perbaikan Info</h5>
                            List Jasa Perbaikan
                        </div>
                    </div>
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTable"
                                        width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 20px;">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 60px;">Kode</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 150px;">Nama Jasa Perbaikan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 50px;">Jenis Jasa Perbaikan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 80px;">Harga</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                                    style="width: 20px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($jasa_perbaikan as $item)
                                            <tr id="item-{{ $item->id_jenis_perbaikan }}" role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">
                                                    {{ $loop->iteration}}</th>
                                                <td class="kode_jenis_perbaikan">
                                                    {{ $item->kode_jenis_perbaikan }}</td>
                                                <td class="nama_jenis_perbaikan">
                                                    {{ $item->nama_jenis_perbaikan }}</td>
                                                <td class="group_jenis_perbaikan">
                                                    {{ $item->group_jenis_perbaikan }}
                                                </td>
                                                <td class="harga_jenis_perbaikan">Rp.
                                                    {{ number_format($item->harga_jenis_perbaikan,2,',','.') }}
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-success btn-datatable" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modaltambah-{{ $item->id_jenis_perbaikan }}">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="tex-center">
                                                    Data Sparepart Kosong
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="card mb-4">
                <div class="card card-header-actions">
                    <div class="card-header ">List Sparepart
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-info alert-icon" role="alert">
                        <div class="alert-icon-aside">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="alert-icon-content">
                            <h5 class="alert-heading" class="small">Sparepart Info</h5>
                            Sparepart Pesanan Penjualan
                        </div>
                    </div>
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTable"
                                        width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 20px;">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 60px;">Kode</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 150px;">Nama Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 50px;">Jenis Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 50px;">Merk</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Salary: activate to sort column ascending"
                                                    style="width: 20px;">Satuan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Salary: activate to sort column ascending"
                                                    style="width: 20px;">Stock</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Salary: activate to sort column ascending"
                                                    style="width: 80px;">Harga Jual</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                                    style="width: 20px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($sparepart as $item)
                                            <tr id="item-{{ $item->id_sparepart }}" role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">
                                                    {{ $loop->iteration}}</th>
                                                <td class="kode_sparepart">
                                                    {{ $item->kode_sparepart }}</td>
                                                <td class="nama_sparepart">
                                                    {{ $item->nama_sparepart }}</td>
                                                <td class="jenis_sparepart">
                                                    {{ $item->Jenissparepart->jenis_sparepart }}
                                                </td>
                                                <td class="merk_sparepart">
                                                    {{ $item->Merksparepart->merk_sparepart }}</td>
                                                <td class="satuan">{{ $item->Konversi->satuan }}
                                                </td>
                                                <td class="stock">{{ $item->stock }}</td>
                                                <td class="harga_jual">Rp.
                                                    {{ number_format($item->Hargasparepart->harga_jual,2,',','.') }}
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-success btn-datatable" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modaltambah-{{ $item->id_sparepart }}">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="tex-center">
                                                    Data Sparepart Kosong
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-5">
            <div class="card">
                <div class="card card-header-actions">
                    <div class="card-header ">Detail Jasa Perbaikan
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-danger" id="alertsparepartkosong" role="alert" style="display:none"> <i
                            class="fas fa-times"></i>
                        Error! Anda belum menambahkan sparepart!
                        <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTablekonfirmasi"
                                        width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 20px;">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 60px;">Kode</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 150px;">Nama Jasa Perbaikan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 50px;">Jenis Jasa Perbaikan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 80px;">Harga</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                                    style="width: 20px;">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id='konfirmasi'>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="container-fluid mt-5">
            <div class="card">
                <div class="card card-header-actions">
                    <div class="card-header ">Detail Penggunaan Sparepart
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-danger" id="alertsparepartkosong" role="alert" style="display:none"> <i
                            class="fas fa-times"></i>
                        Error! Anda belum menambahkan sparepart!
                        <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTablekonfirmasi"
                                        width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 20px;">
                                                    No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 80px;">
                                                    Kode</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 180px;">
                                                    Nama Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                                    style="width: 70px;">
                                                    Jenis Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 70px;">
                                                    Merk</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Salary: activate to sort column ascending"
                                                    style="width: 40px;">
                                                    Satuan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Salary: activate to sort column ascending"
                                                    style="width: 40px;">
                                                    Harga Jual</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Salary: activate to sort column ascending"
                                                    style="width: 20px;">
                                                    Quantity</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Salary: activate to sort column ascending"
                                                    style="width: 20px;">
                                                    Total Harga</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                                    style="width: 100px;">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id='konfirmasi'>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-5">Submit to Front Office</button>
        </div>
    </div>
</main>


@endsection
