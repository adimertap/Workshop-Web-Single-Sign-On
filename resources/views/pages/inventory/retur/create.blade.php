@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon" style="color: white"><i class="fas fa-truck-loading"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Tambah Data Retur</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Retur</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('retur.index') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
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
                            <div class="wizard-step-text-name">Formulir Retur</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard2-tab" href="#wizard2" data-toggle="tab" role="tab"
                        aria-controls="wizard2" aria-selected="true">
                        <div class="wizard-step-icon">2</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Detail Retur Sparepart</div>
                            <div class="wizard-step-text-details">Formulir Detail Sparepart</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard3-tab" href="#wizard3" data-toggle="tab" role="tab"
                        aria-controls="wizard3" aria-selected="true">
                        <div class="wizard-step-icon">3</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Konfirmasi Retur</div>
                            <div class="wizard-step-text-details">Notification and account options</div>
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
                                <h5 class="card-title">Input Formulir Retur</h5>
                                <form action="{{ route('retur.store') }}" id="form1" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="kode_retur">Kode Retur</label>
                                            <input class="form-control" id="kode_retur" type="text" name="kode_retur"
                                                placeholder="Input Kode Retur" value="{{ $kode_retur }}" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="kode_rcv">Kode Receiving</label>
                                            <input class="form-control" id="kode_rcv" type="text" name="kode_rcv"
                                                placeholder="Input Kode Retur" value="{{ $retur->Rcv->kode_rcv }}" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="id_pegawai">Pegawai</label>
                                            <select class="form-control" name="id_pegawai" id="id_pegawai"
                                                class="form-control @error('id_supplier') is-invalid @enderror">
                                                <option>Pilih Pegawai</option>
                                                @foreach ($pegawai as $item)
                                                    <option value="{{ $item->id_pegawai }}">{{ $item->nama_pegawai }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="tanggal_retur">Tanggal Retur</label>
                                            <input class="form-control" id="tanggal_retur" type="date" name="tanggal_retur"
                                                placeholder="Input Tanggal Receive" value="{{ $retur->tanggal_retur }}"
                                                class="form-control @error('tanggal_retur') is-invalid @enderror" />
                                            @error('tanggal_retur')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="id_supplier">Supplier</label>
                                            <input class="form-control" id="detailsupplier" type="text" name="id_supplier"
                                                placeholder="Supplier" value="{{ $retur->Supplier->nama_supplier }}"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="notelp">No. Telephone</label>
                                            <input class="form-control" id="detailtelp" type="text" name="notelp"
                                                placeholder="Supplier" value="{{ $retur->Supplier->telephone }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('Retur.index') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary">Next</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    {{-- CARD 2 --}}
                    <div class="tab-pane fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
                        <div class="card-body">
                            <h3 class="text-primary">Step 2</h3>
                            <h5 class="card-title">Input Jumlah Retur</h5>
                            <div class="datatable">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-hover dataTable" id="dataTableSparepart"
                                                width="100%" cellspacing="0" role="grid"
                                                aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 20px;">No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 40px;">Kode</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 85px;">Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 50px;">Jenis Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 40px;">Merk Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 30px;">Satuan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 30px;">Qty Retur</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 90px;">Keterangan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 20px;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($retur->Rcv->Detailrcv as $item)
                                                    <tr id="item-{{ $item->id_sparepart }}" role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">
                                                            {{ $loop->iteration}}</th>
                                                        <td class="kode_sparepart">{{ $item->kode_sparepart }}</td>
                                                        <td class="nama_sparepart">{{ $item->nama_sparepart }}</td>
                                                        <td class="jenis_sparepart">
                                                            {{ $item->Merksparepart->Jenissparepart->jenis_sparepart }}
                                                        </td>
                                                        <td class="merk_sparepart">
                                                            {{ $item->Merksparepart->merk_sparepart }}</td>
                                                        <td class="satuan">{{ $item->Konversi->satuan }}</td>
                                                        <td class="qty_retur_awal">{{ $item->pivot->qty_retur }}</td>
                                                        <td class="ketarangan">{{ $item->pivot->keterangan }}</td>
                                                        <td>
                                                            <a href="" class="btn btn-success btn-datatable"
                                                                type="button" data-toggle="modal"
                                                                data-target="#Modaltambah-{{ $item->id_sparepart }}">
                                                                <i class="fas fa-plus"></i>
                                                            </a>
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
                        <hr class="my-4" />
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('retur.index') }}" class="btn btn-light">Kembali</a>
                            <button class="btn btn-primary">Next</button>
                        </div>
                    </div>

                    {{-- CARD 3 --}}
                    <div class="tab-pane fade" id="wizard3" role="tabpanel" aria-labelledby="wizard3-tab">
                        <div class="alert alert-success" id="alerttambah" role="alert" style="display:none"> <i
                                class="fas fa-check"></i>
                            Berhasil! Anda berhasil menambahkan sparepart!
                            <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                    <h3 class="text-primary">Step 3</h3>
                                    <h5 class="card-title">Konfirmasi Retur</h5>
                                </div>
                                <div class="col-12 col-lg-auto text-center text-lg-right">
                                    <div class="h3 text-white">Retur</div>
                                    #{{ $kode_retur }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="table-responsive col-md-6">
                                    <table class="table table-borderless mb-0">
                                        <thead class="border-bottom">
                                            <tr class="small text-uppercase text-muted">
                                                <th scope="col">STEP 3</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Kode Retur</div>
                                                    <div class="small text-muted d-none d-md-block">
                                                        {{ $kode_retur }}</div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Pegawai</div>
                                                    <div class="small text-muted d-none d-md-block"><span
                                                            id="detailpegawai"></span></div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Tanggal Retur</div>
                                                    <div class="small text-muted d-none d-md-block">
                                                        <span>{{ $retur->tanggal_retur }}</span></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- 2 --}}
                                <div class="table-responsive col-md-6">
                                    <table class="table table-borderless mb-0">
                                        <thead class="border-bottom">
                                            <tr class="small text-uppercase text-muted">
                                                <th scope="col">Konfirmasi Formulir</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Supplier</div>
                                                    <div class="small text-muted d-none d-md-block">
                                                        <span id="detailsupplier2">{{ $retur->Supplier->nama_supplier }}</span></div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">No.Telp Supplier</div>
                                                    <div class="small text-muted d-none d-md-block"><span>
                                                            {{$retur->Supplier->telephone}}</span></div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Alamat Supplier</div>
                                                    <div class="small text-muted d-none d-md-block"><span>
                                                            {{$retur->Supplier->alamat_supplier}}</span></div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <h5 class="card-title">Detail Sparepart</h5>
                        <div class="alert alert-danger" id="alertsparepartkosong" role="alert" style="display:none"> <i
                                class="fas fa-times"></i>
                            Error! Anda belum menambahkan sparepart!
                            <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        {{-- CARD CONFIRM --}}

                        <div class="datatable">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable"
                                            id="dataTablekonfirmasi" width="100%" cellspacing="0" role="grid"
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
                                                        style="width: 90px;">
                                                        Sparepart</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 70px;">
                                                        Jenis Sparepart</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 70px;">
                                                        Merk Sparepart</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 40px;">
                                                        Satuan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 70px;">
                                                        Jumlah Retur</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 100px;">
                                                        Keterangan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Actions: activate to sort column ascending"
                                                        style="width: 60px;">
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
                        <hr class="my-4">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-light" type="button">Previous</button>
                            <button class="btn btn-primary" type="button" data-toggle="modal"
                                data-target="#Modalsumbit">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</main>

{{-- MODAL TAMBAH SUPPLIER --}}
<div class="modal fade" id="Modalsupplier" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">Pilih Suppleir</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="border-bottom">
                            <tr class="small text-uppercase text-muted">
                                <th scope="col">Nama Supplier</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($supplier as $item)
                            <tr id="supplier-{{ $item->id_supplier }}" class="border-bottom">
                                <td>
                                    <div class="font-weight-bold nama_supplier">{{ $item->nama_supplier }}</div>
                                </td>
                                <td>
                                    <div class="small text-muted d-none d-md-block telephone">{{ $item->telephone }}
                                    </div>
                                </td>
                                <td>
                                    <div class="small text-muted d-none d-md-block alamat_supplier">
                                        {{ $item->alamat_supplier }}</div>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-datatable"
                                        onclick="tambahsupplier(event, {{ $item->id_supplier }})" type="button"
                                        data-dismiss="modal">Tambah
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="tex-center">
                                    Data Supplier Kosong
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


{{-- MODAL TAMBAH QTY SPAREPART --}}
@forelse ($retur->Rcv->Detailrcv as $item)
<div class="modal fade" id="Modaltambah-{{ $item->id_sparepart }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Receiving</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" id="form-{{ $item->id_sparepart }}" class="d-inline">
                <div class="modal-body">
                    <div class="small mb-2">
                        <span class="font-weight-500 text-primary">{{ $item->nama_sparepart }}</span>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="d-flex flex-column font-weight-bold">
                                <label class="small text-muted line-height-normal">
                                    Qty Retur saat Receiving: {{ $item->pivot->qty_retur }}
                            </div>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="form-group">
                        <label class="small mb-1" for="qty_retur">Masukan Quantity Retur</label>
                        <input class="form-control" name="qty_retur" type="number" id="qty_retur"
                            placeholder="Input Quantity Retur" value="{{ old('qty_retur') }}"></input>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan">Masukan Keterangan Retur</label>
                        <textarea class="form-control" name="keterangan" type="text" id="keterangan"
                            placeholder="Input Keterangan diterima">{{ old('keterangan') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" onclick="konfirmsparepart(event,{{ $item->id_sparepart }})"
                        type="button" data-dismiss="modal">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse


@forelse ($retur->Rcv->Detailrcv as $sparepart)
<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Formulir Retur</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">Apakah Form Retur dengan kode {{ $kode_retur }} yang Anda inputkan sudah
                    benar?</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button"
                    onclick="tambahretur(event,{{ $retur->Rcv->Detailrcv }},{{ $retur->id_retur }})">Ya!Sudah</button>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse

<template id="template_delete_button">
    <button class="btn btn-danger btn-datatable" onclick="hapussparepart(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
</template>

<template id="template_add_button">
    <button class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="#Modaltambah">
        <i class="fas fa-plus"></i>
    </button>
</template>

<script>
     function tambahretur(event, sparepart, id_retur) {
        event.preventDefault()
        var form1 = $('#form1')
        var kode_retur = form1.find('input[name="kode_retur"]').val()
        var kode_rcv = form1.find('input[name="kode_rcv"]').val()
        var id_supplier = $('#id_supplier').val()
        var id_pegawai = $('#id_pegawai').val()
        var tanggal_retur = form1.find('input[name="tanggal_retur"]').val()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        for (var i = 0; i < sparepart.length; i++) {
            var form = $('#form-' + sparepart[i].id_sparepart)
            var qty_retur = form.find('input[name="qty_retur"]').val()
            var keterangan = form.find('textarea[name="keterangan"]').val()
         
            if (qty_retur == 0 | qty_retur == '') {
                continue
            } else {
                var id_sparepart = sparepart[i].id_sparepart
                var obj = {
                    id_sparepart: id_sparepart,
                    id_retur: id_retur,
                    qty_retur: qty_retur,
                    keterangan: keterangan,
                } 
               
                dataform2.push(obj)
            }
        }

        if (dataform2.length == 0) {
            var alert = $('#alertsparepartkosong').show()
        } else {
            var data = {
                _token: _token,
                kode_retur: kode_retur,
                kode_rcv: kode_rcv,
                id_supplier: id_supplier,
                id_pegawai: id_pegawai,
                tanggal_retur: tanggal_retur,
                sparepart: dataform2
            }

            console.log(data)

            $.ajax({
                method: 'put',
                url: '/inventory/retur/'+ id_retur,
                data: data,
                success: function (response) {
                    window.location.href = '/inventory/retur'

                },
                error: function(response){
                    console.log(response)
                }
            });
        }

        // dataTablekonfirmasi
    }

     $(document).ready(function () {
        var table = $('#dataTableSparepart').DataTable()

        $('#id_pegawai').on('change', function () {
            var select = $(this).find('option:selected')
            var textpegawai = select.text()
            if (textpegawai == 'Pilih Pegawai') {
                $('#detailpegawai').html('');
            } else {
                $('#detailpegawai').html(textpegawai);
            }
        })

        var template = $('#template_delete_button').html()
        $('#dataTablekonfirmasi').DataTable({
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

    })

    function konfirmsparepart(event, id_sparepart) {
        var form = $('#form-' + id_sparepart)
        var qty_retur = form.find('input[name="qty_retur"]').val()
        var keterangan = form.find('textarea[name="keterangan"]').val()

        if (qty_retur == 0 | qty_retur == '' ) {
            alert('Data Inputan Ada yang belum terisi')
        } else {
            alert('Berhasil Menambahkan Sparepart')
            var data = $('#item-' + id_sparepart)
            var nama_sparepart = $(data.find('.nama_sparepart')[0]).text()
            var jenis_sparepart = $(data.find('.jenis_sparepart')[0]).text()
            var merk_sparepart = $(data.find('.merk_sparepart')[0]).text()
            var satuan = $(data.find('.satuan')[0]).text()
            var template = $($('#template_delete_button').html())

            var table = $('#dataTablekonfirmasi').DataTable()
            // Akses Parent Sampai <tr></tr> berdasarkan id kode sparepart
            var row = $(`#${$.escapeSelector(nama_sparepart.trim())}`).parent().parent()
            table.row(row).remove().draw();

            $('#dataTablekonfirmasi').DataTable().row.add([
                nama_sparepart, `<span id=${nama_sparepart}>${nama_sparepart}</span>`, jenis_sparepart, merk_sparepart, satuan, qty_retur,
                keterangan
            ]).draw();
        }
    }

    function hapussparepart(element) {
        var table = $('#dataTablekonfirmasi').DataTable()
        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        table.row(row).remove().draw();
        alert('Data Sparepart Berhasil di Hapus')
        // draw() Reset Ulang Table
        var table = $('#dataTable').DataTable()
    }


    // function tambahsupplier(event, id_supplier) {
    //     var data = $('#supplier-' + id_supplier)
    //     // var _token = $('#form1').find('input[name="_token"]').val()
    //     var nama_supplier = $(data.find('.nama_supplier')[0]).text()
    //     var no_telp = $(data.find('.telephone')[0]).text()
    //     alert('Berhasil Menambahkan Data Supplier')
    //     // $("#toast").toast("show");

    //     $('#detailsupplier').val(nama_supplier)
    //     $('#detailtelp').val(no_telp)
        
    //     $.ajax({
    //             method: 'get',
    //             url: '/inventory/supplier/'+ id_supplier + '/sparepart',
    //             success: function (response) {
    //                 console.log(response.sparepart)
    //                     $('#dataTable').DataTable().rows.add(response.sparepart).draw();
    //             },
    //             error: function(response){
    //                 console.log(response)
    //             }
    //         });
    // }
</script>
@endsection
