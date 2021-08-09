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
                            Service Advisor - Layanan Booking
                        </h1>
                        <div class="page-header-subtitle">Formulir penerimaan service kendaraan yang dilakukan Service
                            Advisor</div>

                        <span class="font-weight-500 text-primary" id="id_bengkel"
                            style="display:none">{{ Auth::user()->bengkel->id_bengkel}}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid mt-n10">
        {{-- Form SA --}}
        <div class="card mb-4">
            <div class="card-header-actions">
                <div class="card-header"> Form Service Advisor
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('penerimaanservice.store') }}" id="form1" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-5">
                            <label for="kode_reservasi">Kode Reservasi</label>
                            <div class="d-flex justify-content-between">
                                <input type="text" class="form-control" id="kode_reservasi" name="kode_reservasi"
                                    placeholder="Input Kode Reservasi">
                                <button class="btn btn-secondary ml-1" type="button" id="reservasi">Cari</button>
                            </div>

                        </div>
                        <div class="form-group col-3">
                        </div>


                    </div>
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label for="kode_sa">Kode SPK</label>
                            <input class="form-control" id="kode_sa" name="kode_sa" type="text" value="{{ $kode_sa }}"
                                readonly />

                        </div>

                        <div class="form-group col-4">
                            <label for="id_pegawai">Pegawai</label>
                            <input class="form-control" id="id_pegawai" type="text" name="id_pegawai"
                                placeholder="Input Pegawai" value="{{ Auth::user()->pegawai->nama_pegawai }}" readonly>
                            @error('id_pegawai')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="date">Tanggal</label>
                            <input class="form-control" id="date" name="date" type="text" value="{{ $date }}"
                                readonly />
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-4">
                            <label for="id_customer_bengkel">Pilih Customer</label>
                            <div class="input-group input-group-joined">    
                                <select class="form-control" name="id_customer_bengkel" id="id_customer_bengkel"
                                    class="form-control @error('id_customer_bengkel') is-invalid @enderror">
                                    <option>Pilih Customer</option>
                                    @foreach ($customer_bengkel as $item)
                                    <option value="{{ $item->id_customer_bengkel }}">
                                        {{ $item->nama_customer }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('id_customer_bengkel')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="id_kendaraan">Pilih
                                Kendaraan</label>
                            <div class="input-group input-group-joined">
                                <select class="form-control" name="id_kendaraan" id="id_kendaraan"
                                    class="form-control @error('id_kendaraan') is-invalid @enderror">
                                    <option>Pilih Kendaraan</option>
                                    @foreach ($kendaraan as $item)
                                    <option value="{{ $item->id_kendaraan }}">
                                        {{ $item->nama_kendaraan }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('id_kendaraan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-4">
                            <label for="plat_kendaraan">No. Plat Kendaraan</label>
                            <input type="text" class="form-control" id="plat_kendaraan" name="plat_kendaraan"
                                placeholder="Input Plat Kendaraan">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-3">
                            <label for="odo_meter">Odo Meter (KM)</label>
                            <input type="text" class="form-control" id="odo_meter" name="odo_meter"
                                placeholder="Input Odo Meter">
                        </div>
                        <div class="form-group col-3">
                            <label for="keluhan_kendaraan">Keluhan Kendaraan</label>
                            <input type="text" class="form-control" id="keluhan_kendaraan" name="keluhan_kendaraan"
                                placeholder="Input Keluhan Kendaraan">
                        </div>
                        <div class="form-group col-3">
                            <label for="id_mekanik">Pilih Mekanik</label>
                            <select class="form-control" name="id_mekanik" id="id_mekanik"
                                class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                <option>Pilih Mekanik</option>
                                @foreach ($mekanik_asli as $item)
                                <option value="{{ $item->id_pegawai }}">
                                    {{ $item->nama_pegawai }}
                                </option>
                                @endforeach
                            </select>
                            @error('nama_mekanik')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-3">
                            <label for="waktu_estimasi">Estimasi Pengerjaan (menit)</label>
                            <input type="text" class="form-control" id="waktu_estimasi" name="waktu_estimasi"
                                placeholder="Input Waktu Estimasi">
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header ">List Jasa Perbaikan
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
                                <table class="table table-bordered table-hover dataTable" id="dataTablePerbaikan"
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
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
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
                                                <button class="btn btn-success btn-datatable"
                                                    onclick="konfirmperbaikan(event, {{ $item->id_jenis_perbaikan }})"
                                                    type="button" data-dismiss="modal"><i
                                                        class="fas fa-plus"></i></button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="tex-center">
                                                Data Jasa Perbaikan Kosong
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

        <div class="card mb-4">
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
                                <table class="table table-bordered table-hover dataTable" id="dataPerbaikan"
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
                                                style="width: 60px;">Kode</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Nama Jasa Perbaikan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Jenis Jasa Perbaikan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 80px;">Harga</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 20px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id='konfirmasiPerbaikan'>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                                <table class="table table-bordered table-hover dataTable" id="dataTableSparepart"
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
                                                style="width: 60px;">Kode</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Nama Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Jenis Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 50px;">Merk</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 20px;">Satuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 20px;">Stock</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 20px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sparepart as $item)
                                        <tr id="sparepart-{{ $item->id_sparepart }}" role="row" class="odd">
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
                                            <td>
                                                <button id="{{ $item->kode_sparepart }}-button"
                                                    class="btn btn-success btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaltambah-{{ $item->id_sparepart }}">
                                                    <i class="fas fa-plus"></i>
                                                </button>
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

        <div class="card mb-4">
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
                                <table class="table table-bordered table-hover dataTable" id="dataSparepart"
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
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
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

        <div class="text-center">
            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#Modalsumbit">Kirim ke
                Front Office</button>
        </div>

    </div>

    {{-- MODAL TAMBAH SPAREPART --}}
    @forelse ($sparepart as $item)
    <div class="modal fade" id="Modaltambah-{{ $item->id_sparepart }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary-soft">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Jumlah Pesanan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="" method="POST" id="form-{{ $item->id_sparepart }}" class="d-inline">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="small mb-1" for="jumlah">Masukan Quantity Pesanan</label>
                            <input class="form-control" name="jumlah" type="text" id="jumlah"
                                placeholder="Input Jumlah Pesanan" value="{{ old('jumlah') }}"></input>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="harga">Harga</label>
                            <input class="form-control" name="harga" type="text" id="harga"
                                placeholder="Input Jumlah Pesanan" value="{{ $item->Kartugudangpenjualan['harga_beli'] }}"></input>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-success" onclick="konfirmsparepart(event, {{ $item->id_sparepart }})"
                            type="button" data-dismiss="modal">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @empty
    @endforelse

    <div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success-soft">
                    <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Form Pembelian</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">Apakah Form yang Anda inputkan sudah benar?</div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button"
                        onclick="kirimfrontoffice(event,{{ $sparepart }},{{ $jasa_perbaikan }},{{ $idbaru }})">Ya!Sudah</button>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL Tambah -------------------------------------------------------------------------------------------}}
    <div class="modal fade" id="ModalCustomer" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Customer</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('customerterdaftar.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="small mb-1">Isikan Form Dibawah Ini</label>
                        <hr>
                        </hr>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_customer">Nama Customer <span
                                    style="color: red">*</span>
                            </label>
                            <input class="form-control" name="nama_customer" type="text" id="nama_customer"
                                placeholder="Input Nama Customer" value="{{ old('nama_customer') }}"
                                class="form-control @error('nama_customer') is-invalid @enderror">
                            @error('nama_customer')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="email_customer">Email Customer <span
                                    style="color: red">*</span>
                            </label>
                            <input class="form-control" name="email_customer" type="email" id="email_customer"
                                placeholder="Input Email Customer" value="{{ old('email_customer') }}"
                                class="form-control @error('email_customer') is-invalid @enderror">
                            @error('email_customer')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="nohp_customer">No. Telp Customer <span
                                    style="color: red">*</span>
                            </label>
                            <input class="form-control" name="nohp_customer" type="text" id="nohp_customer"
                                placeholder="Input No. Telp Customer" value="{{ old('nohp_customer') }}"
                                class="form-control @error('nohp_customer') is-invalid @enderror">
                            @error('nohp_customer')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="alamat_customer">Alamat</label>
                            <input class="form-control" name="alamat_customer" type="text" id="alamat_customer"
                                placeholder="Input Alamat Customer" value="{{ old('alamat_customer') }}"
                                class="form-control @error('alamat_customer') is-invalid @enderror">
                            @error('alamat_customer')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                    @if (count($errors) > 0)
                    @endif
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="Submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>


<template id="template_delete_button">
    <button class="btn btn-danger btn-datatable" onclick="hapusPerbaikan(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
</template>

<template id="template_delete_button_sparepart">
    <button class="btn btn-danger btn-datatable" onclick="hapusSparepart(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
</template>


<script>
    $(function () {
        $("input[name='odo_meter']").on('input', function (e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });

    $(function () {
        $("input[name='waktu_estimasi']").on('input', function (e) {
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
    });

    $(document).ready(function () {

        $("#reservasi").click(function () {
            var kode_reservasi = $("#kode_reservasi").val();
            $.ajax({
                type: 'get',
                url: '/service/kode-reservasi',
                dataType: "json",
                data: {
                    kode_reservasi: kode_reservasi,
                },
                success: function (data) {
                    if (!data) {
                        alert('Kode Reservasi Tidak Ada');
                    }

                    // alert(data.no_plat)
                    $("#id_customer_bengkel").val(data.id_customer_bengkel).change();
                    $("#id_kendaraan").val(data.id_kendaraan).change();
                    $("#plat_kendaraan").val(data.no_plat);
                    $("#keluhan_kendaraan").val(data.keluhan_kendaraan);
                },
            });

        });


        var template = $('#template_delete_button').html()
        $('#dataPerbaikan').DataTable({
            "columnDefs": [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": template
                },
                {
                    "targets": 0,
                    "data": null,
                    'render': function (data, type, row, meta) {
                        return meta.row + 1
                    }
                }
            ]
        })

        var template2 = $('#template_delete_button_sparepart').html()
        $('#dataSparepart').DataTable({
            "columnDefs": [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": template2
                },
                {
                    "targets": 0,
                    "data": null,
                    'render': function (data, type, row, meta) {
                        return meta.row + 1
                    }
                }
            ]
        });

        $('#dataTablePerbaikan').DataTable({
        });
        
        $('#dataTableSparepart').DataTable({
        });
    });

    function konfirmperbaikan(event, id_jenis_perbaikan) {
        var data = $('#item-' + id_jenis_perbaikan)
        var kode_jenis_perbaikan = $(data.find('.kode_jenis_perbaikan')[0]).text()
        var nama_jenis_perbaikan = $(data.find('.nama_jenis_perbaikan')[0]).text()
        var group_jenis_perbaikan = $(data.find('.group_jenis_perbaikan')[0]).text()
        var harga_jenis_perbaikan = $(data.find('.harga_jenis_perbaikan')[0]).text()

        var table = $('#dataPerbaikan').DataTable()
        // Akses Parent Sampai <tr></tr> berdasarkan id kode sparepart
        var row = $(`#${$.escapeSelector(kode_jenis_perbaikan.trim())}`).parent().parent()
        table.row(row).remove().draw();

        alert('Berhasil menambahkan jasa perbaikan')
        $('#dataPerbaikan').DataTable().row.add([
            kode_jenis_perbaikan, `<span id=${id_jenis_perbaikan}>${kode_jenis_perbaikan}</span>`,
            nama_jenis_perbaikan,
            group_jenis_perbaikan, harga_jenis_perbaikan
        ]).draw();
    }

    function hapusPerbaikan(element) {
        var table = $('#dataPerbaikan').DataTable()
        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        table.row(row).remove().draw();
        alert('Data Jasa Perbaikan Berhasil di Hapus')
        // draw() Reset Ulang Table
        var table = $('#dataTable').DataTable()
    }

    function konfirmsparepart(event, id_sparepart) {
        var form = $('#form-' + id_sparepart)
        var jumlah = form.find('input[name="jumlah"]').val()
        var harga = form.find('input[name="harga"]').val()
        if (jumlah == 0 | jumlah == '') {
            alert('Jumlah Kosong')
        } else {

            var data = $('#sparepart-' + id_sparepart)
            var stock = $(data.find('.stock')[0]).text()

            // Kondisi tidak boleh melebihi qty po
            if (parseInt(jumlah) > parseInt(stock)) {
                alert('Qty Stock tidak Memenuhi')
            } else {
                alert('Berhasil Menambahkan Sparepart')
                var kode_sparepart = $(data.find('.kode_sparepart')[0]).text()
                var nama_sparepart = $(data.find('.nama_sparepart')[0]).text()
                var jenis_sparepart = $(data.find('.jenis_sparepart')[0]).text()
                var merk_sparepart = $(data.find('.merk_sparepart')[0]).text()
                var satuan = $(data.find('.satuan')[0]).text()
               
                var template = $($('#template_delete_button_sparepart').html())
              
                var total = new Intl.NumberFormat('id', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(jumlah * harga)

                var hargaidr = new Intl.NumberFormat('id', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(harga)

                //Delete Data di Table Konfirmasi sebelum di add
                var table = $('#dataSparepart').DataTable()
                // Akses Parent Sampai <tr></tr> berdasarkan id kode sparepart
                var row = $(`#${$.escapeSelector(kode_sparepart.trim())}`).parent().parent()
                table.row(row).remove().draw();

                $('#dataSparepart').DataTable().row.add([
                    kode_sparepart, `<span id=${kode_sparepart}>${kode_sparepart}</span>`, nama_sparepart,
                    jenis_sparepart, merk_sparepart, satuan,
                    hargaidr, jumlah, total,
                ]).draw();
            }
        }
    }

    function hapusSparepart(element) {
        var table = $('#dataSparepart').DataTable()
        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        table.row(row).remove().draw();
        alert('Data Sparepart Berhasil di Hapus')
        // draw() Reset Ulang Table
        var table = $('#dataTable').DataTable()
    }

    function editSparepart(element) {
        var table = $('#dataSparepart').DataTable()
        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        var children = $(row).children()[1]
        console.log(children)
        var kode = $($(children).children()[0]).html().trim()

        $(`#${$.escapeSelector(kode)}-button`).trigger('click');
    }

    function kirimfrontoffice(event, sparepart, jasa_perbaikan, idbaru) {
        event.preventDefault();
        var form1 = $('#form1')
        var kode_reservasi = $('#kode_reservasi').val()
        var kode_sa = form1.find('input[name="kode_sa"]').val()
        var id_pegawai = form1.find('input[name="id_pegawai"]').val()
        var id_customer_bengkel = $('#id_customer_bengkel').val()
        var id_kendaraan = $('#id_kendaraan').val()
        var odo_meter = form1.find('input[name="odo_meter"]').val()
        var date = form1.find('input[name="date"]').val()
        var plat_kendaraan = form1.find('input[name="plat_kendaraan"]').val()
        var keluhan_kendaraan = form1.find('input[name="keluhan_kendaraan"]').val()
        var id_mekanik = $('#id_mekanik').val()
        var waktu_estimasi = form1.find('input[name="waktu_estimasi"]').val()
        var dataform2 = []
        var dataform3 = []
        var _token = form1.find('input[name="_token"]').val()

        for (var i = 0; i < sparepart.length; i++) {
            var form = $('#form-' + sparepart[i].id_sparepart)
            var jumlah = form.find('input[name="jumlah"]').val()
            var harga = form.find('input[name="harga"]').val()
            var id_bengkel = $('#id_bengkel').text()
            var total_harga = jumlah * harga

            if (jumlah == 0 | jumlah == '') {
                continue
            } else {
                var id_sparepart = sparepart[i].id_sparepart
                var obj = {
                    id_service_advisor: idbaru,
                    id_sparepart: id_sparepart,
                    jumlah: jumlah,
                    harga: harga,
                    id_bengkel: id_bengkel,
                    total_harga: total_harga
                }
                dataform2.push(obj)
            }
        }

        var dataperbaikan = $('#konfirmasiPerbaikan').children()
        for (let index = 0; index < dataperbaikan.length; index++) {
            var children = $(dataperbaikan[index]).children()
            var td = children[1]
            var span = $(td).children()[0]
            console.log(span)
            var id_jenis_perbaikan = $(span).attr('id')

            var id_bengkel = $('#id_bengkel').text()
            // HARGA
            var td_harga = children[4]
            var harga = $(td_harga).html().trim()
            var splitharga = harga.split('Rp.')[1].replace('.', '').replace(',00', '').trim()

            dataform3.push({
                id_service_advisor: idbaru,
                id_jenis_perbaikan: id_jenis_perbaikan,
                total_harga: splitharga,
                id_bengkel: id_bengkel,
            })
        }

        if (dataform3.length == 0) {
            alert('Data Perbaikan Kosong')
        } else {
            var data = {
                _token: _token,
                kode_reservasi: kode_reservasi,
                kode_sa: kode_sa,
                id_pegawai: id_pegawai,
                id_customer_bengkel: id_customer_bengkel,
                id_kendaraan: id_kendaraan,
                odo_meter: odo_meter,
                date: date,
                plat_kendaraan: plat_kendaraan,
                keluhan_kendaraan: keluhan_kendaraan,
                id_mekanik: id_mekanik,
                waktu_estimasi: waktu_estimasi,
                sparepart: dataform2,
                jasa_perbaikan: dataform3

            }
            console.log(data)

            $.ajax({
                method: 'post',
                url: '/service/penerimaanservice',
                data: data,
                success: function (response) {
                    window.location.href = '/service/penerimaanservice'

                },
                error: function (response) {
                    console.log(response)
                }
            });
        }



    }

</script>




@endsection
