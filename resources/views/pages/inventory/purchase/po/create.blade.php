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
                            <div class="page-header-icon" style="color: white"><i class="fas fa-pallet"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Tambah Data Pembelian Sparepart</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Pembelian</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('purchaseorder') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
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
                            <div class="wizard-step-text-name">Formulir Pembelian</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard2-tab" href="#wizard2" data-toggle="tab" role="tab"
                        aria-controls="wizard2" aria-selected="true">
                        <div class="wizard-step-icon">2</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Daftar Sparepart</div>
                            <div class="wizard-step-text-details">Pemilihan Sparepart</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard3-tab" href="#wizard3" data-toggle="tab" role="tab"
                        aria-controls="wizard3" aria-selected="true">
                        <div class="wizard-step-icon">3</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Konfirmasi Pembelian</div>
                            <div class="wizard-step-text-details">Daftar Sparepart yang dibeli</div>
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
                                <h5 class="card-title">Input Formulir Pembelian</h5>
                                <form action="{{ route('purchase-order.store') }}" id="form1" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_po">Kode Pembelian</label>
                                            <input class="form-control" id="kode_po" type="text" name="kode_po"
                                                placeholder="Input Kode Receiving" value="{{ $kode_po }}" readonly />
                                        </div>
                                        <div class="form-group col-md-6">
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
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_supplier">Supplier</label>
                                            <select class="form-control" name="id_supplier" id="id_supplier"
                                                class="form-control @error('id_supplier') is-invalid @enderror">
                                                <option>Pilih Supplier</option>
                                                @foreach ($supplier as $item)
                                                <option value="{{ $item->id_supplier }}">{{ $item->nama_supplier }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_supplier')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="tanggal_po">Tanggal Receive</label>
                                            <input class="form-control" id="tanggal_po" type="date" name="tanggal_po"
                                                placeholder="Input Tanggal Receive" value="{{ old('tanggal_po') }}"
                                                class="form-control @error('tanggal_po') is-invalid @enderror" />
                                            @error('tanggal_po')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="id_akun">Akun</label>
                                            <select class="form-control" name="id_akun" id="id_akun"
                                                class="form-control @error('id_akun') is-invalid @enderror">
                                                <option>Pilih Akun</option>
                                                @foreach ($akun as $item)
                                                <option value="{{ $item->id_akun }}">{{ $item->nama_akun }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_akun')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="approve_po">Approval</label>
                                            <input class="form-control" id="approve_po" type="text" name="approve_po"
                                                value="Pending" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="approve_ap">Approval AP</label>
                                            <input class="form-control" id="approve_ap" type="text" name="approve_ap"
                                                value="Pending" readonly>
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('purchaseorder') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary">Next</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    {{-- CARD 2 --}}
                    <div class="tab-pane fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
                        <div class="card-body">
                            <h3 class="text-primary">Step 2</h3>
                            <h5 class="card-title">Pilih Sparepart yang akan dibeli</h5>
                            <div class="datatable">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-hover dataTable" id="dataTable"
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
                                                            style="width: 60px;">Kode</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 150px;">Nama Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 50px;">Jenis Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 50px;">Merk</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 20px;">Satuan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 20px;">Stock</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 80px;">Harga Beli</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
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
                                                        <td class="harga_beli">Rp.
                                                            {{ number_format($item->Hargasparepart->harga_beli,2,',','.') }}
                                                        </td>
                                                        <td>
                                                            <a href="" class="btn btn-success btn-datatable"
                                                                type="button" data-toggle="modal"
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
                        <hr class="my-4" />
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('purchaseorder') }}" class="btn btn-light">Kembali</a>
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
                                    <h5 class="card-title">Konfirmasi Pembelian</h5>
                                </div>
                                <div class="col-12 col-lg-auto text-center text-lg-right">
                                    <div class="h3 text-white">PO</div>
                                    #{{ $kode_po }}
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
                                                    <div class="font-weight-bold">Kode PO/Purchasing Order</div>
                                                    <div class="small text-muted d-none d-md-block">
                                                        {{ $kode_po }}</div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Supplier</div>
                                                    <div class="small text-muted d-none d-md-block"><span
                                                            id="detailsupplier"></span></div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Approval Owner</div>
                                                    <div class="small text-muted d-none d-md-block">Pending</div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Approval AP</div>
                                                    <div class="small text-muted d-none d-md-block">Pending</div>
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
                                                    <div class="font-weight-bold">Tanggal PO</div>
                                                    <div class="small text-muted d-none d-md-block"><span
                                                            id="detailtanggal"></span></div>
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
                                                    <div class="font-weight-bold">Akun</div>
                                                    <div class="small text-muted d-none d-md-block"><span
                                                            id="detailakun"></span></div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Total Item</div>
                                                    <div class="small text-muted d-none d-md-block"> Tes </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-danger" id="alertsparepartkosong" role="alert" style="display:none"> <i
                                class="fas fa-times"></i>
                            Error! Anda belum menambahkan sparepart!
                            <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        {{-- CARD CONFIRM --}}
                        <div class="card-footer p-4 p-lg-5 border-top-0">
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
                                                            style="width: 80px;">
                                                            Kode</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 180px;">
                                                            Nama Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 70px;">
                                                            Jenis Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 70px;">
                                                            Merk</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 40px;">
                                                            Satuan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 40px;">
                                                            Harga Beli</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 20px;">
                                                            Quantity</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 20px;">
                                                            Total</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
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

{{-- MODAL KONFIRMASI --}}
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
                    <button class="btn btn-primary" type="button"
                        onclick="tambahsparepart(event,{{ $sparepart }})">Ya!Sudah</button>
                </div>
            </div>
        </div>
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
                        <label class="small mb-1" for="qty">Masukan Quantity Pesanan</label>
                        <input class="form-control" name="qty" type="text" id="qty" placeholder="Input Jumlah Pesanan"
                            value="{{ old('qty') }}"></input>
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

<template id="template">
    <tr role="row" class="odd">
        <td class="kode_sparepart"></td>
        <td class="kode_sparepart"></td>
        <td class="nama_sparepart"></td>
        <td class="jenis_sparepart"></td>
        <td class="merk_sparepart"></td>
        <td class="satuan"></td>
        <td class="harga_beli"></td>
        <td class="qty"></td>
        <td class="total"></td>
        <td>
            <a href="" class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="">
                <i class="fas fa-plus"></i>
            </a>
        </td>
    </tr>
</template>

<script>
    function tambahsparepart(event, sparepart) {
        event.preventDefault()
        var form1 = $('#form1')
        var kode_po = form1.find('input[name="kode_po"]').val()
        var id_supplier = $('#id_supplier').val()
        var id_akun = $('#id_akun').val()
        var id_pegawai = $('#id_pegawai').val()
        var tanggal_po = form1.find('input[name="tanggal_po"]').val()
        var approve_po = form1.find('input[name="approve_po"]').val()
        var approve_ap = form1.find('input[name="approve_ap"]').val()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        for (var i = 0; i < sparepart.length; i++) {
            var form = $('#form-' + sparepart[i].id_sparepart)
            var qty = form.find('input[name="qty"]').val()

            if (qty == 0 | qty == '') {
                continue
            } else {
                var id_sparepart = sparepart[i].id_sparepart
                var obj = {
                    id_sparepart: id_sparepart,
                    qty: qty
                }
                dataform2.push(obj)
            }

        }

        if (dataform2.length == 0) {
            var alert = $('#alertsparepartkosong').show()
        } else {
            var data = {
                _token: _token,
                kode_po: kode_po,
                id_supplier: id_supplier,
                id_akun: id_akun,
                id_pegawai: id_pegawai,
                tanggal_po: tanggal_po,
                approve_po: approve_po,
                approve_ap: approve_ap,
                sparepart: dataform2
            }

            $.ajax({
                method: 'post',
                url: '/inventory/pembelian/purchase-order',
                data: data,
                success: function (response) {
                    window.location.href = '/inventory/pembelian/purchase-order'

                },
            });
        }

        // dataTablekonfirmasi
    }

    function konfirmsparepart(event, id_sparepart) {
        var form = $('#form-' + id_sparepart)
        var qty = form.find('input[name="qty"]').val()
        if (qty == 0 | qty == '') {
            alert('Quantity Kosong')
        } else {
            alert('Berhasil Menambahkan Sparepart')
            var data = $('#item-' + id_sparepart)
            var kode_sparepart = $(data.find('.kode_sparepart')[0]).text()
            var nama_sparepart = $(data.find('.nama_sparepart')[0]).text()
            var jenis_sparepart = $(data.find('.jenis_sparepart')[0]).text()
            var merk_sparepart = $(data.find('.merk_sparepart')[0]).text()
            var satuan = $(data.find('.satuan')[0]).text()
            var harga_beli = $(data.find('.harga_beli')[0]).text()
            var template = $($('#template').html())
            var splitqty = harga_beli.split('Rp.')[1].replace('.', '').replace(',00', '')
            var total = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(qty * splitqty)

            $('#dataTablekonfirmasi').DataTable().row.add([
                kode_sparepart, kode_sparepart, nama_sparepart, jenis_sparepart, merk_sparepart, satuan,
                harga_beli, qty, total
            ]).draw();
        }
        

    }


    $(document).ready(function () {
        $('#id_pegawai').on('change', function () {
            var select = $(this).find('option:selected')
            var textpegawai = select.text()
            if (textpegawai == 'Pilih Pegawai') {
                $('#detailpegawai').html('');
            } else {
                $('#detailpegawai').html(textpegawai);
            }
        })
        $('#id_supplier').on('change', function () {
            var select = $(this).find('option:selected')
            var textsupplier = select.text()
            if (textsupplier == 'Pilih Supplier') {
                $('#detailsupplier').html('');
            } else {
                $('#detailsupplier').html(textsupplier);
            }
        })
        $('#id_akun').on('change', function () {
            var select = $(this).find('option:selected')
            var textakun = select.text()
            if (textakun == 'Pilih Akun') {
                $('#detailakun').html('');
            } else {
                $('#detailakun').html(textakun);
            }
        })
        $('#tanggal_po').on('change', function () {
            var select = $(this)
            var textdate = select.val()
            var splitdate = textdate.split('-')
            console.log(splitdate)
            var datefix = new Date(splitdate[0], splitdate[1] - 1, splitdate[2])
            var formatindodate = new Intl.DateTimeFormat('id', {
                dateStyle: 'long'
            }).format(datefix)
            $('#detailtanggal').html(formatindodate);

        })

        $('#dataTablekonfirmasi').DataTable();
    });

</script>



@endsection
