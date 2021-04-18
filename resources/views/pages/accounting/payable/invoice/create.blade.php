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
                            <div class="page-header-icon" style="color: white"><i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <div class="page-header-subtitle mr-2" style="color: white">Tambah Data Invoice Supplier</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Invoice</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('invoice-payable.index') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
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
                            <div class="wizard-step-text-name">Formulir Invoice</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard2-tab" href="#wizard2" data-toggle="tab" role="tab"
                        aria-controls="wizard2" aria-selected="true">
                        <div class="wizard-step-icon">2</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Daftar Sparepart</div>
                            <div class="wizard-step-text-details">Sparepart Receiving</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard3-tab" href="#wizard3" data-toggle="tab" role="tab"
                        aria-controls="wizard3" aria-selected="true">
                        <div class="wizard-step-icon">3</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Konfirmasi Invoice</div>
                            <div class="wizard-step-text-details">Konfirmasi</div>
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
                                <h5 class="card-title">Input Formulir Invoice</h5>
                                <form action="{{ route('invoice-payable.store') }}" id="form1" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_invoice">Kode Invoice</label>
                                            <input class="form-control" id="kode_invoice" type="text" name="kode_invoice"
                                                placeholder="Input Kode Invoice" value="{{ $kode_invoice }}" readonly />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_jenis_transaksi">Pilih Jenis Transaksi</label>
                                            <div class="input-group input-group-joined">
                                                <div class="input-group-append">
                                                    <a href="" class="btn btn-sm btn-secondary" type="button" data-toggle="modal"
                                                        data-target="#Modaltransaksi">
                                                        Tambah
                                                    </a>
                                                </div>
                                                <select class="form-control" name="id_jenis_transaksi" id="id_jenis_transaksi"
                                                    class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                                    <option>Pilih Jenis Transaksi</option>
                                                    @foreach ($jenis_transaksi as $item)
                                                    <option value="{{ $item->id_jenis_transaksi }}">{{ $item->nama_transaksi }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="nama_pegawai">Kode Rcv</label>
                                            <div class="input-group input-group-joined">
                                                <input class="form-control" type="text" placeholder="Pilih Kode Rcv" aria-label="Search"
                                                    id="detailrcv">
                                                <div class="input-group-append">
                                                    <a href="" class="input-group-text" type="button" data-toggle="modal"
                                                        data-target="#Modalrcv">
                                                        <i class="fas fa-folder-open"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_supplier">Supplier</label>
                                            <input class="form-control" id="detailsupplier" type="text" name="id_supplier"
                                                placeholder="Supplier Otomatis Terisi" value="{{ old('id_supplier') }}"
                                                class="form-control @error('id_supplier') is-invalid @enderror" readonly/>
                                            @error('id_supplier')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="small mb-1" for="tanggal_invoice">Tanggal Invoice</label>
                                            <input class="form-control" id="tanggal_invoice" type="date" name="tanggal_invoice"
                                                placeholder="Input Tanggal Invoice" value="{{ old('tanggal_invoice') }}"
                                                class="form-control @error('tanggal_invoice') is-invalid @enderror" />
                                            @error('tanggal_invoice')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="small mb-1" for="tenggat_invoice">Tanggal Bayar Terakhir</label>
                                            <input class="form-control" id="tenggat_invoice" type="date" name="tenggat_invoice"
                                                placeholder="Input Tanggal Bayar Terakhir" value="{{ old('tenggat_invoice') }}"
                                                class="form-control @error('tenggat_invoice') is-invalid @enderror" />
                                            @error('tenggat_invoice')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="deskripsi_invoice">Deskripsi Keperluan</label>
                                            <textarea class="form-control" id="deskripsi_invoice" type="text" name="deskripsi_invoice" placeholder=""
                                                value="{{ old('deskripsi_invoice') }}"
                                                class="form-control @error('deskripsi_invoice') is-invalid @enderror"> </textarea>
                                            @error('deskripsi_invoice')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('invoice-payable.index') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary">Next</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    {{-- CARD 2 --}}
                    <div class="tab-pane fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
                        <div class="card-body">
                            <h3 class="text-primary">Step 2</h3>
                            <h5 class="card-title">Detail Sparepart Receive</h5>
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
                                                            style="width: 60px;">Kode Rcv</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 150px;">Nama Item</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 50px;">Harga</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 50px;">Qty</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @forelse ($invoice->Rcv->Detail as $item)
                                                        <tr role="row" class="odd">
                                                            <th scope="row" class="small" class="sorting_1">
                                                                {{ $loop->iteration}}</th>
                                                            <td class="kode_sparepart">{{ $item->kode_sparepart }}</td>
                                                            <td class="nama_sparepart">{{ $item->nama_sparepart }}</td>
                                                            <td class="jenis_sparepart">
                                                                {{ $item->Merksparepart->Jenissparepart->jenis_sparepart }}
                                                            </td>
                                                            
                                                        </tr>
                                                    @empty
                                                        
                                                    @endforelse --}}
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('invoice-payable.index') }}" class="btn btn-light">Kembali</a>
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
                                    <h3 class="text-primary">Detail</h3>
                                    <h5 class="card-title">Pembelian</h5>
                                </div>
                                <div class="col-12 col-lg-auto text-center text-lg-right">
                                    <div class="h3 text-white">PO</div>
                                    #
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
                                                       </div>
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

{{-- MODAL Jenis Transaksi --}}
<div class="modal fade" id="Modaltransaksi" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Jenis Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('jenis-transaksi.store') }}" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="nama_transaksi">Jenis Transaksi</label>
                        <input class="form-control" name="nama_transaksi" type="text" id="nama_transaksi"
                            placeholder="Input Jenis Transaksi" value="{{ old('nama_transaksi') }}"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="Modalrcv" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">Pilih Receiving</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableRcv" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Kode Rcv</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 120px;">Supplier</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 60px;">No. DO</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Tanggal Rcv</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 60px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($rcv as $item)
                                        <tr id="item-{{ $item->id_rcv }}" role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td class="kode_rcv">{{ $item->kode_rcv }}</td>
                                            <td class="nama_supplier">{{ $item->Supplier->nama_supplier }}</td>
                                            <td class="no_do">{{ $item->no_do }}</td>
                                            <td class="tanggal_rcv">{{ $item->tanggal_rcv }}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm"
                                                onclick="tambahrcv(event, {{ $item->id_rcv }})" type="button"
                                                data-dismiss="modal">Tambah
                                            </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="tex-center">
                                                Data Receiving Kosong
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

{{-- MODAL KONFIRMASI --}}
{{-- <div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
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
                    onclick="tambahsparepart(event,{{ $sparepart }})">Ya!Sudah</button>
            </div>
        </div>
    </div>
</div> --}}


{{-- MODAL TAMBAH SPAREPART --}}
{{-- @forelse ($sparepart as $item)
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
@endforelse --}}

{{-- <template id="template_delete_button">
    <button class="btn btn-danger btn-datatable" onclick="hapussparepart(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
</template>

<template id="template_add_button">
    <button class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="#Modaltambah">
        <i class="fas fa-plus"></i>
    </button>
</template> --}}


<script>
     function tambahrcv(event, id_rcv) {
        var data = $('#item-' + id_rcv)
        var _token = $('#form1').find('input[name="_token"]').val()
        var kode_rcv = $(data.find('.kode_rcv')[0]).text()
        var nama_supplier = $(data.find('.nama_supplier')[0]).text()

        $('#detailrcv').val(kode_rcv)
        $('#detailsupplier').val(nama_supplier)
    }



    $(document).ready(function () {
        var tablercv = $('#dataTableRcv').DataTable()


    });


</script>


@endsection