@extends('layouts.Admin.adminpayroll')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon" style="color: white"><i class="fas fa-wallet"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Tambah Data Pembayaran Gaji Pegawai
                            </div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Gaji Pegawai</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('gaji-pegawai.index') }}"
                            class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-n10">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                    <!-- Wizard navigation item 1-->
                    <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-toggle="tab" role="tab"
                        aria-controls="wizard1" aria-selected="true">
                        <div class="wizard-step-icon">1</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Formulir Pembayaran</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard2-tab" href="#wizard2" data-toggle="tab" role="tab"
                        aria-controls="wizard2" aria-selected="true">
                        <div class="wizard-step-icon">2</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Data Gaji Pegawai</div>
                            <div class="wizard-step-text-details">Lengkapi data gaji berikut</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard3-tab" href="#wizard3" data-toggle="tab" role="tab"
                        aria-controls="wizard3" aria-selected="true">
                        <div class="wizard-step-icon">3</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Konfirmasi</div>
                            <div class="wizard-step-text-details">Konfirmasi Pembayaran Gaji</div>
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
                                <h3 class="text-primary">Step 1</h3>
                                <h5 class="card-title">Input Formulir Pembayaran</h5>
                                <form action="{{ route('gaji-pegawai.update', $gaji->id_gaji_pegawai) }}" id="form1"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="tahun_gaji">Tahun Gaji</label>
                                            <input class="form-control" id="tahun_gaji" type="text" name="tahun_gaji"
                                                placeholder="Input Tahun Gaji" value="{{ $gaji->tahun_gaji }}" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="bulan_gaji">Bulan Gaji</label>
                                            <select name="bulan_gaji" id="bulan_gaji" class="form-control"
                                                class="form-control @error('bulan_gaji') is-invalid @enderror">
                                                <option value="{{ $gaji->bulan_gaji }}">{{ $gaji->bulan_gaji }}</option>
                                                <option value="Januari">Januari</option>
                                                <option value="Februari">Februari</option>
                                                <option value="Maret">Maret</option>
                                                <option value="April">April</option>
                                                <option value="Mei">Mei</option>
                                                <option value="Juni">Juni</option>
                                                <option value="Juli">Juli</option>
                                                <option value="Agustus">Agustus</option>
                                                <option value="September">September</option>
                                                <option value="Oktober">Oktober</option>
                                                <option value="November">November</option>
                                                <option value="Desember">Desember</option>
                                            </select>
                                            @error('bulan_gaji')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="nama_pegawai">Pilih Pegawai</label>
                                            <div class="input-group input-group-joined">
                                                <input class="form-control" type="text" placeholder="Pilih Pegawai"
                                                    aria-label="Search" id="detailpegawai"
                                                    value="{{ $gaji->Pegawai->nama_pegawai }}">
                                                <div class="input-group-append">
                                                    <a href="" class="input-group-text" type="button"
                                                        data-toggle="modal" data-target="#Modalpegawai">
                                                        <i class="fas fa-folder-open"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_jabatan">Jabatan</label>
                                            <input class="form-control" id="detailjabatan" type="text" name="id_jabatan"
                                                value="{{ $gaji->Pegawai->Jabatan->nama_jabatan }}" readonly>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="status_diterima">Status diterima</label>
                                            <input class="form-control" id="status_diterima" type="text"
                                                name="status_diterima" value="Belum dibayarkan" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="keterangan">Keterangan</label>
                                            <textarea class="form-control" id="keterangan" type="text" name="keterangan"
                                                placeholder="Keterangan Pembayaran"
                                                class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                                            @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>

                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('gaji-pegawai.index') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary">Next</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    {{-- CARD 2 ----------------------------------------------------------------------------------}}
                    <div class="tab-pane fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
                        <div class="tab-pane py-2 py-xl-2 fade show active" id="wizard1" role="tabpanel"
                            aria-labelledby="wizard1-tab">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                    <h3 class="text-primary">Step 2</h3>
                                    <h5 class="card-title">Tambah Data Gaji Pegawai</h5>

                                </div>
                                <div class="col-12 col-lg-auto text-center text-lg-right">
                                    
                                    <h5 class="small mb-1">Laporan Absensi Pegawai</h5>
                                    <a href="" class="btn btn-secondary btn-sm" type="button" data-toggle="modal"
                                        data-target="#Modalabsensi">
                                        Lihat Absensi
                                    </a>
                             
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card card-collapsable card-waves">
                                        <a class="card-header" href="#collapseCardExample" data-toggle="collapse"
                                            role="button" aria-expanded="true" aria-controls="collapseCardExample">Gaji
                                            Pokok Pegawai
                                            <div class="card-collapsable-arrow">
                                                <i class="fas fa-chevron-down"></i>
                                            </div>
                                        </a>
                                        <div class="collapse show" id="collapseCardExample">
                                            <div class="card-body">
                                                <div class="datatable">
                                                    <div id="dataTable_wrapper"
                                                        class="dataTables_wrapper dt-bootstrap4">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <table
                                                                    class="table table-bordered table-hover dataTable"
                                                                    id="dataTable" width="100%" cellspacing="0"
                                                                    role="grid" aria-describedby="dataTable_info"
                                                                    style="width: 100%;">
                                                                    <thead>
                                                                        <tr role="row">
                                                                            <th class="sorting" tabindex="0"
                                                                                aria-controls="dataTable" rowspan="1"
                                                                                colspan="1" aria-sort="ascending"
                                                                                aria-label="Name: activate to sort column descending"
                                                                                style="width: 20px;">
                                                                                No</th>
                                                                            <th class="sorting" tabindex="0"
                                                                                aria-controls="dataTable" rowspan="1"
                                                                                colspan="1"
                                                                                aria-label="Position: activate to sort column ascending"
                                                                                style="width: 80px;">
                                                                                Jabatan</th>
                                                                            <th class="sorting" tabindex="0"
                                                                                aria-controls="dataTable" rowspan="1"
                                                                                colspan="1"
                                                                                aria-label="Position: activate to sort column ascending"
                                                                                style="width: 180px;">
                                                                                Gaji Pokok</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr role="row" class="odd">
                                                                            <th scope="row" class="small"
                                                                                class="sorting_1">1</th>
                                                                            <td>{{ $gaji->Pegawai->Jabatan->nama_jabatan}}
                                                                            </td>
                                                                            <td>Rp.
                                                                                {{ number_format($gaji->Pegawai->Jabatan->Gajipokok->besaran_gaji,2,',','.') }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card card-header-actions">
                                        <div class="card-header">
                                            Tunjangan Pegawai
                                            <a href="" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                                data-target="#Modaltambahtunjangan">
                                                Tambah Data
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <div class="datatable">
                                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <table class="table table-bordered table-hover dataTable"
                                                                id="dataTabletunjangan" width="100%" cellspacing="0"
                                                                role="grid" aria-describedby="dataTable_info"
                                                                style="width: 100%;">
                                                                <thead>
                                                                    <tr role="row">
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1" aria-sort="ascending"
                                                                            aria-label="Name: activate to sort column descending"
                                                                            style="width: 20px;">
                                                                            No</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Position: activate to sort column ascending"
                                                                            style="width: 80px;">
                                                                            Tunjangan</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Position: activate to sort column ascending"
                                                                            style="width: 180px;">
                                                                            Jumlah</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Position: activate to sort column ascending"
                                                                            style="width: 180px;">
                                                                            Action</th>
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
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-light" type="button">Previous</button>
                            <button class="btn btn-primary" type="button">Next</button>
                        </div>
                    </div>

                    {{-- CARD 3 ------------------------------------------------------------------------------------------}}
                    <div class="tab-pane fade" id="wizard3" role="tabpanel" aria-labelledby="wizard3-tab">
                        {{-- ALERT --}}
                        <div class="alert alert-danger" id="alertsparepartkosong" role="alert" style="display:none"> <i
                                class="fas fa-times"></i>
                            Error! Anda belum menambahkan Data Pajak!
                            <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="alert alert-success" id="alerttambah" role="alert" style="display:none"> <i
                                class="fas fa-check"></i>
                            Berhasil! Anda berhasil menambahkan Data Pajak!
                            <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="container mt-4">
                            <div class="card-invoice">
                                <div class="card-header border-bottom-0 bg-white">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                            <!-- Invoice branding-->
                                            <div class="h2 mb-0" id="detailpegawai2">{{ $gaji->Pegawai->nama_pegawai }}
                                            </div>
                                            Pembayaran bulan <span
                                                id="detailbulangaji">{{ $gaji->bulan_gaji }}</span>,Tahun <span
                                                id="detailtahungaji">{{ $gaji->tahun_gaji }}</span>

                                        </div>
                                        <div class="col-12 col-lg-auto text-center text-lg-right">
                                            <!-- Invoice details-->
                                            <div class="h5">{{ $today }}</div>
                                            Jabatan<span
                                                id="detailjabatan2">{{ $gaji->Pegawai->Jabatan->nama_jabatan }}</span>
                                            <br />
                                            <div class="small text-muted">Alamat {{ $gaji->Pegawai->alamat }}</div>
                                            No.Telp <div class="small text-muted" id="detailnotelp">
                                                {{ $gaji->Pegawai->no_telp }}</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body p-2 p-md-3">
                                    <div class="small text-muted text-uppercase font-weight-700 mb-2">Detail Gaji</div>
                                    <div class="datatable">
                                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table class="table display compact dataTable" id="dataTable"
                                                        width="100%" cellspacing="0" role="grid"
                                                        aria-describedby="dataTable_info" style="width: 100%;">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="dataTable" rowspan="1" colspan="1"
                                                                    aria-label="Position: activate to sort column ascending"
                                                                    style="width: 500px;">
                                                                    Jabatan</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="dataTable" rowspan="1" colspan="1"
                                                                    aria-label="Position: activate to sort column ascending"
                                                                    style="width: 120px;">
                                                                    Gaji Pokok</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr role="row" class="odd">
                                                                <td>{{ $gaji->Pegawai->Jabatan->nama_jabatan}}
                                                                </td>
                                                                <td>Rp.
                                                                    {{ number_format($gaji->Pegawai->Jabatan->Gajipokok->besaran_gaji,2,',','.') }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="datatable">
                                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table class="table display compact dataTable"
                                                        id="dataTabletunjangankonfirmasi" width="100%" cellspacing="0"
                                                        role="grid" aria-describedby="dataTable_info"
                                                        style="width: 100%;">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="dataTable" rowspan="1" colspan="1"
                                                                    aria-label="Position: activate to sort column ascending"
                                                                    style="width: 500px;">
                                                                    Tunjangan</th>
                                                                <th class="sorting" tabindex="0"
                                                                    aria-controls="dataTable" rowspan="1" colspan="1"
                                                                    aria-label="Position: activate to sort column ascending"
                                                                    style="width: 120px;">
                                                                    Jumlah Tunjangan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="konfirmasi">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="col-12 col-lg-auto text-center text-lg-right p-2 p-md-3">
                                        <div class="row">
                                            <div class="text-uppercase small font-weight-700 text-muted col-sm-8 ">
                                                Total Gaji: </div>
                                            <div class="h5 mb-0 font-weight-700 col">Rp. 1.500.000,00</div>
                                        </div>
                                    </div>
                                    <p></p>
                                    <div class="card-footer p-4 p-lg-5 border-top-0">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                                <!-- Invoice - sent to info-->
                                                <div class="small text-muted text-uppercase font-weight-700 mb-2">Kepada
                                                </div>
                                                <div class="h6 mb-1" id="detailpegawai3">
                                                    {{ $gaji->Pegawai->nama_pegawai }}"</div>
                                                <div class="small">Alias {{ $gaji->Pegawai->nama_panggilan }}</div>
                                                <div class="small" id="detailjabatan3">
                                                    {{ $gaji->Pegawai->Jabatan->nama_jabatan }}</div>
                                            </div>
                                            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                                <!-- Invoice - sent from info-->
                                                <div class="small text-muted text-uppercase font-weight-700 mb-2">Dari
                                                </div>
                                                <div class="h6 mb-0">Bengkel Jaya</div>
                                                <div class="small">5678 Company Rd.</div>
                                                <div class="small">Yorktown, MA 39201</div>
                                            </div>
                                            <div class="col-lg-6">
                                                <!-- Invoice - additional notes-->
                                                <div class="small text-muted text-uppercase font-weight-700 mb-2">Note
                                                </div>
                                                <span class="small mb-0" id="detailketerangan"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-light" type="button">Previous</button>
                                <button class="btn btn-primary" type="button" data-toggle="modal"
                                    data-target="#Modalsumbit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
</main>

{{-- MODAL TAMBAH TUNJANGAN --}}
<div class="modal fade" id="Modaltambahtunjangan" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Data Tunjangan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" id="form2" class="d-inline">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="datatable">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable"
                                            id="dataTablesemuatunjangan" width="100%" cellspacing="0" role="grid"
                                            aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 20px;">
                                                        No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">
                                                        Tunjangan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 180px;">
                                                        Jumlah</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 180px;">
                                                        Keterangan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 180px;">
                                                        Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($tunjangan as $item)
                                                <tr id="item-{{ $item->id_tunjangan }}" role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td class="nama_tunjangan">{{ $item->nama_tunjangan }}</td>
                                                    <td class="jumlah_tunjangan">Rp.
                                                        {{ number_format($item->jumlah_tunjangan,2,',','.') }}</td>
                                                    </td>
                                                    <td class="keterangan">{{ $item->keterangan }}</td>
                                                    <td>
                                                        <button class="btn btn-success btn-sm"
                                                            onclick="tambahtunjangan(event, {{ $item->id_tunjangan }})"
                                                            type="button" data-dismiss="modal">Tambah
                                                        </button>
                                                    </td>
                                                </tr>
                                                @empty

                                                @endforelse

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
    </div>
</div>

<div class="modal fade" id="Modalabsensi" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Data Absensi Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" id="form2" class="d-inline">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="datatable">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable"
                                            id="dataTableAbsensi" width="100%" cellspacing="0" role="grid"
                                            aria-describedby="dataTable_info" style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 20px;">
                                                        No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">
                                                        Tanggal</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">
                                                        Absensi</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">
                                                        Jam Masuk</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">
                                                        Jam Keluar</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">
                                                        Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($gaji->Pegawai->absensi as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                                </th>
                                                <td>{{ $item->tanggal_absensi }}</td>
                                                <td>
                                                    @if($item->absensi == 'Absen_Pagi')
                                                    <span> Masuk </span>
                                                    @elseif ($item->absensi == 'Masuk')
                                                    <span> Masuk</span>
                                                    @elseif ($item->absensi == 'Ijin' | $item->absensi == 'Sakit' |
                                                    $item->absensi == 'Cuti' | $item->absensi == 'Alpha')
                                                    {{ $item->absensi }}
                                                    @else
                                                    <span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($item->absensi == 'Absen_Pagi' | $item->absensi =='Masuk')
                                                    {{ $item->jam_masuk }}
                                                    @elseif ($item->absensi == 'Ijin' | $item->absensi == 'Sakit' |
                                                    $item->absensi == 'Cuti' | $item->absensi == 'Alpha')
                                                    @else
                                                    <span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>{{ $item->jam_pulang }}</td>
                                                <td>{{ $item->keterangan }}</td>
                                                </tr>
                                                @empty
                                                    
                                                @endforelse
                                                {{-- BELUM DIKERJAKAN --}}

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
    </div>
</div>

{{-- MODAL PEGAWAI --}}
<div class="modal fade" id="Modalpegawai" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Pilih Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="border-bottom">
                            <tr class="small text-uppercase text-muted">
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">No. Telp</th>
                                <th scope="col">Gaji Pokok</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($seluruhpegawai as $item)
                            <tr id="item-{{ $item->id_pegawai }}" class="border-bottom">
                                <td>
                                    <div class="font-weight-bold nama_pegawai">{{ $item->nama_pegawai }}</div>
                                </td>
                                <td>
                                    <div class="small text-muted d-none d-md-block nama_jabatan">{{ $item->jabatan->nama_jabatan }}</div>
                                </td>
                                <td>
                                    <div class="small text-muted d-none d-md-block no_telp">{{ $item->no_telp }}</div>
                                </td>
                                <td>
                                    @if ($item->jabatan->gajipokok == '')
                                    <div class="small text-muted d-none d-md-block">Tidak ada data
                                        <a href="{{ route('gaji-pokok.index') }}"
                                            class="btn btn-light btn-sm btn-datatable" type="button">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    @else
                                    <div class="small text-muted d-none d-md-block gaji_pokok">
                                        Rp.{{ number_format($item->jabatan->gajipokok->besaran_gaji,2,',','.') }}</div>
                                    @endif

                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-datatable"
                                        onclick="tambahpegawai(event, {{ $item->id_pegawai }})" type="button"
                                        data-dismiss="modal">Tambah
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="tex-center">
                                    Tidak ada Data Pegawai
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
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="submit(event)" type="button">Ya!Sudah</button>
                </div>
            </div>
        </div>
    </div>
</div>

<template id="template_delete_button">
    <button class="btn btn-danger btn-datatable" onclick="hapussparepart(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
</template>

<template id="template_add_button">
    <button class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="#Modaltambahtunjangan">
        <i class="fas fa-plus"></i>
    </button>
</template>

<script>
    function tambahpegawai(event, id_pegawai) {
        var data = $('#item-' + id_pegawai)
        var _token = $('#form1').find('input[name="_token"]').val()
        var nama_pegawai = $(data.find('.nama_pegawai')[0]).text()
        var nama_jabatan = $(data.find('.nama_jabatan')[0]).text()
        var no_telp = $(data.find('.no_telp')[0]).text()
        var gaji_pokok = $(data.find('.gaji_pokok')[0]).text()

        $('#detailpegawai').val(nama_pegawai)
        $('#detailpegawai3').val(nama_pegawai)
        $('#detailjabatan').val(nama_jabatan)
        $('#detailnotelp').val(no_telp)
    }

    function tambahtunjangan(event, id_tunjangan) {
        var data = $('#item-' + id_tunjangan)
        var nama_tunjangan = $(data.find('.nama_tunjangan')[0]).text()
        var jumlah_tunjangan = $(data.find('.jumlah_tunjangan')[0]).text()
        var template = $($('#template_delete_button').html())
        //Delete Data di Table Konfirmasi sebelum di add
        var table = $('#dataTabletunjangan').DataTable()

        // Akses Parent Sampai <tr></tr> berdasarkan id kode sparepart
        var row = $(`#${$.escapeSelector(nama_tunjangan.trim())}`).parent().parent()
        table.row(row).remove().draw();

        $('#dataTabletunjangan').DataTable().row.add([
            nama_tunjangan, `<span id=${nama_tunjangan}>${nama_tunjangan}</span>`, jumlah_tunjangan,
        ]).draw();

        $('#dataTabletunjangankonfirmasi').DataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "searching": false
        }).row.add([
            `<span id=${nama_tunjangan}>${nama_tunjangan}</span>`, jumlah_tunjangan,
        ]).draw();


    }



    function hapussparepart(element) {
        var table = $('#dataTabletunjangan').DataTable()
       
        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        table.row(row).remove().draw();
        alert('Data Tunjangan Berhasil di Hapus')
        // draw() Reset Ulang Table
        var table = $('#dataTable').DataTable()
    }

    $(document).ready(function () {

        $('#bulan_gaji').on('change', function () {
            var select = $(this).find('option:selected')
            var bulan = select.text()
            $('#detailbulangaji').html(bulan);
        })

        $('#tahun_gaji').on('input', function () {
            var tahun = $(this).val()
            $('#detailtahungaji').html(tahun);
        })

        $('#keterangan').on('input', function () {
            var keterangan = $(this).val()
            $('#detailketerangan').html(keterangan);
        })

        $('#detailpegawai').on('change', function () {
            var select = $(this)
            var textpegawai = select.text()
            console.log(textpegawai)
            $('#detailpegawai2').html(textpegawai);
        })

        var table2 = $('#dataTableAbsensi').DataTable()
        var table = $('#dataTablesemuatunjangan').DataTable()

        var template = $('#template_delete_button').html()
        $('#dataTabletunjangan').DataTable({
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
        });
    });

</script>

@endsection
