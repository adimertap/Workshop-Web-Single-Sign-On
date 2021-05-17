@extends('layouts.Admin.adminaccounting')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon" style="color: white"><i
                                    class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <div class="page-header-subtitle mr-2" style="color: white">Tambah Data Payment Requisition
                                Form
                            </div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">PRF</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('prf.destroy', $prf->id_prf) }}" class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container mt-n10">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header ">Form PRF
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('prf.store') }}" id="form1" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="kode_prf">Kode PRF</label>
                                <input class="form-control" id="kode_prf" type="text" name="kode_prf"
                                    placeholder="Input Kode Invoice" value="{{ $kode_prf }}" readonly />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="id_jenis_transaksi">Pilih Jenis
                                    Transaksi</label><span class="mr-4 mb-3" style="color: red">*</span>
                                <select class="form-control" name="id_jenis_transaksi" id="id_jenis_transaksi">
                                    <option value="{{ $prf->Jenistransaksi->id_jenis_transaksi }}">
                                        {{ $prf->Jenistransaksi->nama_transaksi }}</option>
                                    @foreach ($jenis_transaksi as $jenistransaksi)
                                    <option value="{{ $jenistransaksi->id_jenis_transaksi }}">
                                        {{ $jenistransaksi->nama_transaksi }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="tanggal_prf">Tanggal Pembuatan PRF</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
                                <input class="form-control" id="tanggal_prf" type="date" name="tanggal_prf"
                                    placeholder="Input Tanggal Prf" value="{{ old('tanggal_prf') }}"
                                    class="form-control @error('tanggal_prf') is-invalid @enderror" />
                                @error('tanggal_prf')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="keperluan_prf">Deskripsi Keperluan</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
                                <textarea class="form-control" id="keperluan_prf" type="text" name="keperluan_prf"
                                    placeholder="Input Keperluan PRF" value="{{ old('keperluan_prf') }}"
                                    class="form-control @error('keperluan_prf') is-invalid @enderror"> </textarea>
                                @error('keperluan_prf')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card card-header-actions">
                        <div class="card-header ">Detail Invoice Supplier
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datatable">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable" id="dataTableDetail"
                                            width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 20px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">Kode Invoice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 60px;">Kode PO</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Tanggal Invoice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Tenggat Invoice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 100px;">Total Biaya</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Kode Rcv</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($prf->Supplier->InvoicePayable as $item)
                                                <tr id="invoice-{{ $item->id_payable_invoice }}" role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td class="kode_invoice">{{ $item->kode_invoice }}</td>
                                                    <td class="kode_po">{{ $item->PO->kode_po }}</td>
                                                    <td class="tanggal_invoice">{{ $item->tanggal_invoice }}</td>
                                                    <td class="tenggat_invoice">{{ $item->tenggat_invoice }}</td>
                                                    <td class="total_pembayaran">
                                                        Rp.{{ number_format($item->total_pembayaran,2,',','.') }}</td>
                                                    <td class="kode_rcv">{{ $item->Rcv->kode_rcv }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalinvoice-{{ $item->id_payable_invoice }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <button class="btn btn-success btn-datatable"
                                                            onclick="tambahinvoice(event, {{ $item->id_payable_invoice }})"
                                                            type="button" data-dismiss="modal"><i
                                                                class="fas fa-plus"></i>
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
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card card-header-actions">
                        <div class="card-header ">Konfirmasi
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datatable">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable"
                                            id="dataTableKonfirmasi" width="100%" cellspacing="0" role="grid"
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
                                                        style="width: 100px;">Kode Invoice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 60px;">Kode Rcv</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 100px;">Total Biaya</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody id="konfirmasi">

                                            </tbody>
                                            <tr id="totalgrand">
                                                <td colspan="3" class="text-center font-weight-500">
                                                    Total Pembayaran
                                                </td>
                                                <td colspan="2" class="text-center font-weight-500">
                                                    <span>Rp. </span><span id="totalgrand2">0</span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-header">Detail Pembayaran
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="id_supplier">Supplier</label>
                                <input class="form-control" id="id_supplier" type="text" name="id_supplier"
                                    placeholder="Input Kode Invoice" value="{{ $prf->Supplier->nama_supplier }}"
                                    readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="no_rek">No Rekening Supplier</label>
                                <input class="form-control" id="no_rek" type="text" name="no_rek"
                                    placeholder="Input Kode Invoice" value="{{ $prf->Supplier->rekening_supplier }}"
                                    readonly />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="grand_total">Total Pembayaran</label>
                            <div class="input-group input-group-joined">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  bg-gray-200">
                                        Rp.
                                    </span>
                                </div>
                                <input class="form-control" id="grand_total" type="text" name="grand_total"
                                    placeholder="Grand Total" value="0" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="id_fop">Pilih Metode Pembayaran</label><span
                                class="mr-4 mb-3" style="color: red">*</span>

                            <div class="input-group input-group-joined">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-money-bill-wave-alt"></i>
                                    </span>
                                </div>
                                <select class="form-control" name="id_fop" id="id_fop">
                                    <option>Pilih Metode Pembayaran</option>
                                    @foreach ($fop as $fops)
                                    <option value="{{ $fops->id_fop }}">{{ $fops->nama_fop }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row" id="bank" style="display:none">
                            <div class="form-group col-md-6">
                                <label class="small mb-1 mr-1" for="id_akun_bank">Pilih Bank</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
                                <div class="input-group input-group-joined">
                                    <input class="form-control" type="text" placeholder="Pilih Bank" aria-label="Search"
                                        id="detailbank">
                                    <div class="input-group-append">
                                        <a href="" class="input-group-text" type="button" data-toggle="modal"
                                            data-target="#ModalBank">
                                            <i class="fas fa-folder-open"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="nomor_rekening">Nomor Rekening</label>
                                <input class="form-control" id="detailrekening" type="text" name="nomor_rekening"
                                    readonly />
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <hr>
                            <a href="{{ route('prf.index') }}" class="btn btn-sm btn-light">Kembali</a>
                            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                data-target="#Modalsumbit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</main>

{{-- Modal Bank --}}
<div class="modal fade" id="ModalBank" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">Pilih Bank</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableBank"
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
                                                style="width: 50px;">Kode Bank</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 90px;">Nama Bank</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 150px;">Nama Account</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Jenis Account</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 120px;">No. Rekening</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 60px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($akun_bank as $bank)
                                        <tr id="bank-{{ $bank->id_bank_account }}" role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td class="kode_bank">{{ $bank->kode_bank }}</td>
                                            <td class="nama_bank">{{ $bank->nama_bank }}</td>
                                            <td class="nama_account">{{ $bank->nama_account }}</td>
                                            <td class="jenis_account">{{ $bank->jenis_account }}</td>
                                            <td class="nomor_rekening">{{ $bank->nomor_rekening }}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm"
                                                    onclick="tambahbank(event, {{ $bank->id_bank_account }})"
                                                    type="button" data-dismiss="modal">Tambah
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="tex-center">
                                                Data Bank Kosong
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
</div>

{{-- MODAL DETAIL INVOICE --}}
@forelse ($prf->Supplier->InvoicePayable as $item)
<div class="modal fade" id="Modalinvoice-{{ $item->id_payable_invoice }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Detail Item Invoice</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableDetailInvoice"
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
                                                style="width: 60px;">Kode Rcv</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Nama Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Jenis</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Merk</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 30px;">Qty Rcv</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Harga Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->Detailinvoice as $invoice)
                                        <tr id="sparepart-{{ $item->id_sparepart }}" role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">
                                                {{ $loop->iteration}}</th>
                                            <td class="kode_sparepart">{{ $invoice->kode_sparepart }}</td>
                                            <td class="nama_sparepart">{{ $invoice->nama_sparepart }}</td>
                                            <td class="jenis_sparepart">
                                                {{ $invoice->Merksparepart->Jenissparepart->jenis_sparepart }}
                                            </td>
                                            <td class="merk_sparepart">
                                                {{ $invoice->Merksparepart->merk_sparepart }}
                                            </td>
                                            <td class="qty_rcv">{{ $invoice->pivot->qty_rcv }}
                                            </td>
                                            <td class="harga_diterima">Rp.{{ number_format($invoice->pivot->harga_item,2,',','.') }}
                                            </td>
                                            <td class="total_harga">Rp.{{ number_format($invoice->pivot->total_harga,2,',','.') }}
                                            </td>


                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                    <tr>
                                        <td colspan="7" class="text-center font-weight-500">
                                            Total Harga
                                        </td>
                                        <td>Rp.{{ number_format($item->total_pembayaran,2,',','.') }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@empty

@endforelse




{{-- MODAL SUBMIT --}}
<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Invoice</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">Apakah Form Invoice yang Anda inputkan sudah benar?</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button"
                    onclick="tambahprf(event,{{ $prf->Supplier->InvoicePayable  }},{{ $prf->id_prf }})">Ya!Sudah</button>
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
    <button class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="#Modaltambah">
        <i class="fas fa-plus"></i>
    </button>
</template>


<script>
    function tambahprf(event, invoice, id_prf) {
        event.preventDefault()
        var form1 = $('#form1')
        var kode_prf = form1.find('input[name="kode_prf"]').val()
        var id_jenis_transaksi = $('#id_jenis_transaksi').val()
        var tanggal_prf = form1.find('input[name="tanggal_prf"]').val()
        var keperluan_prf = form1.find('textarea[name="keperluan_prf"]').val()
        var grand_total = $('#grand_total').val()
        var id_fop = $('#id_fop').val()
        var nama_bank = $('#detailbank').val()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        var datainvoice = $('#konfirmasi').children()
        for (let index = 0; index < datainvoice.length; index++) {
            var children = $(datainvoice[index]).children()
            var td = children[1]
            var span = $(td).children()[0]
            var id = $(span).attr('id')
            dataform2.push({
                id_payable_invoice: id
            })
        }

        var data = {
            _token: _token,
            kode_prf: kode_prf,
            id_jenis_transaksi: id_jenis_transaksi,
            tanggal_prf: tanggal_prf,
            keperluan_prf: keperluan_prf,
            grand_total: grand_total,
            id_fop: id_fop,
            nama_bank: nama_bank,
            invoice: dataform2
        }

        console.log(data)

        $.ajax({
            method: 'put',
            url: '/accounting/prf/' + id_prf,
            data: data,
            success: function (response) {
                window.location.href = '/accounting/prf'

            },
            error: function (response) {
                console.log(response)
            }
        });
    }



    function tambahbank(event, id_bank_account) {
        var data = $('#bank-' + id_bank_account)
        var _token = $(data.find('input[name="_token"]')[0]).val()
        var nama_bank = $(data.find('.nama_bank')[0]).text()
        var nomor_rekening = $(data.find('.nomor_rekening')[0]).text()

        $('#detailbank').val(nama_bank)
        $('#detailrekening').val(nomor_rekening)
    }

    function tambahinvoice(event, id_payable_invoice) {
        var data = $('#invoice-' + id_payable_invoice)
        var kode_invoice = $(data.find('.kode_invoice')[0]).text()
        var kode_rcv = $(data.find('.kode_rcv')[0]).text()
        var total_pembayaran = $(data.find('.total_pembayaran')[0]).text()
        var template = $($('#template_delete_button').html())

        // GAJI DITERIMA
        var grandtotal = $('#grand_total').val()
        var grandtotalsplit = total_pembayaran.split('Rp.')[1].replace('.', '').replace('.', '').replace(',00', '')
            .trim()
        var grandtotalfix = parseInt(grandtotal) + parseInt(grandtotalsplit)
        $('#grand_total').val(grandtotalfix)

        // TUNJANGAN
        var totalgrand = $('#totalgrand2').html()
        var totalfix = parseInt(grandtotalsplit) + parseInt(totalgrand)
        $('#totalgrand2').html(totalfix)

        var table = $('#dataTableKonfirmasi').DataTable()
        var row = $(`#${$.escapeSelector(kode_invoice.trim())}`).parent().parent()
        table.row(row).remove().draw();

        $('#dataTableKonfirmasi').DataTable().row.add([
            kode_invoice, `<span id=${id_payable_invoice}>${kode_invoice}</span>`, kode_rcv, total_pembayaran,
            kode_invoice
        ]).draw();
    }


    function hapussparepart(element) {
        var table = $('#dataTableKonfirmasi').DataTable()

        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        table.row(row).remove().draw();
        alert('Data Invoice Berhasil di Hapus')
        // draw() Reset Ulang Table
        var table = $('#dataTable').DataTable()

        // Akses Parent Sampai <tr></tr>
        var row2 = $(element).parent().parent()

        // Gaji diterima berkurang
        var biayarberkurang = $(row2.children()[3]).text()
        var grandtotal = $('#grand_total').val()
        var grandtotalsplit = biayarberkurang.split('Rp.')[1].replace('.', '').replace('.', '').replace(',00', '')
        .trim()
        var jumlahfix = parseInt(grandtotal) - parseInt(grandtotalsplit)
        $('#grand_total').val(jumlahfix)

        var biayaberkurang2 = $('#totalgrand2').html()
        var biaraberkurangfix = parseInt(biayaberkurang2) - parseInt(grandtotalsplit)
        $('#totalgrand2').html(biaraberkurangfix)
    }

    $(document).ready(function () {
        $('#id_fop').on('change', function () {
            var select = $(this).find('option:selected')
            var akun = select.text().trim()
            if (akun == 'Transfer') {
                $('#bank').show();
            } else {
                $('#bank').hide();
            }
        })

        var tablercv = $('#dataTableRcv').DataTable()

        var tabledetail = $('#dataTableDetail').DataTable({
            "pageLength": 5,
            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, ]
            ]
        })

        var template = $('#template_delete_button').html()
        $('#dataTableKonfirmasi').DataTable({
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


        var tablebank = $('#dataTableBank').DataTable({
            "pageLength": 5,
            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, ]
            ]
        })
        // var tabledetailinvoice = $('#dataTableDetailInvoice').DataTable()

    });

</script>


@endsection
