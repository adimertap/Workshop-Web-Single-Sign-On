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
                            <div class="page-header-icon" style="color: white"><i class="fas fa-dolly-flatbed"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Tambah Data Penerimaan</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Receiving</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('Rcv.index') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
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
                            <div class="wizard-step-text-name">Formulir Penerimaan</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard2-tab" href="#wizard2" data-toggle="tab" role="tab"
                        aria-controls="wizard2" aria-selected="true">
                        <div class="wizard-step-icon">2</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Detail Pembelian Sparepart</div>
                            <div class="wizard-step-text-details">Formulir Detail Sparepart</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard3-tab" href="#wizard3" data-toggle="tab" role="tab"
                        aria-controls="wizard3" aria-selected="true">
                        <div class="wizard-step-icon">3</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Konfirmasi Penerimaan</div>
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
                                <h5 class="card-title">Input Formulir Penerimaan</h5>
                                <form action="{{ route('Rcv.store') }}" id="form1" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_rcv">Kode Receiving</label>
                                            <input class="form-control" id="kode_rcv" type="text" name="kode_rcv"
                                                placeholder="Input Kode Receiving" value="{{ $kode_rcv }}" readonly>
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
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="kode_po">Kode PO</label>
                                            <input class="form-control" id="kode_po" type="text" name="kode_po"
                                                placeholder="Kode PO" value="{{ $rcv->PO->kode_po }}" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="id_supplier">Supplier</label>
                                            <input class="form-control" id="id_supplier" type="text" name="id_supplier"
                                                placeholder="Supplier" value="{{ $rcv->Supplier->nama_supplier }}"
                                                readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="no_do">Nomor DO</label>
                                            <input class="form-control" id="no_do" type="text" name="no_do"
                                                placeholder="Input Nomor Delivery Order" value="{{ $rcv->no_do }}">
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
                                            <label class="small mb-1" for="tanggal_rcv">Tanggal Receive</label>
                                            <input class="form-control" id="tanggal_rcv" type="date" name="tanggal_rcv"
                                                placeholder="Input Tanggal Receive" value="{{ $rcv->tanggal_rcv }}"
                                                class="form-control @error('tanggal_rcv') is-invalid @enderror" />
                                            @error('tanggal_rcv')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="total_pembayaran">Total Pembayaran</label>
                                            <input class="form-control" id="total_pembayaran" type="number"
                                                name="total_pembayaran" placeholder="Input Total Pembayaran"
                                                value="{{ old('total_pembayaran') }}"
                                                class="form-control @error('total_pembayaran') is-invalid @enderror" />
                                            @error('total_pembayaran')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('masterdatasparepart') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary">Next</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    {{-- CARD 2 --}}
                    <div class="tab-pane fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
                        <div class="card-body">
                            <h3 class="text-primary">Step 2</h3>
                            <h5 class="card-title">Input Jumlah Receiving</h5>
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
                                                            style="width: 50px;">Merk Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 60px;">Jumlah dipesan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 40px;">Satuan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 40px;">Harga Beli</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 20px;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($rcv->PO->Detailsparepart as $item)
                                                    <tr>
                                                        <th scope="row" class="small" class="sorting_1">
                                                            {{ $loop->iteration}}</th>
                                                        <td>{{ $item->kode_sparepart }}</td>
                                                        <td>{{ $item->nama_sparepart }}</td>
                                                        <td>{{ $item->Merksparepart->Jenissparepart->jenis_sparepart }}
                                                        </td>
                                                        <td>{{ $item->Merksparepart->merk_sparepart }}</td>
                                                        <td>{{ $item->pivot->qty }}</td>
                                                        <td>{{ $item->Konversi->satuan }}</td>
                                                        <td>{{ $item->Hargasparepart->harga_beli }}</td>
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
                                    #{{ $kode_rcv }}
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
                                                    <div class="font-weight-bold">Kode RCV/Penerimaan</div>
                                                    <div class="small text-muted d-none d-md-block">
                                                        {{ $kode_rcv }}</div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Pegawai</div>
                                                    <div class="small text-muted d-none d-md-block"><span
                                                            id="detailsupplier"></span></div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Tanggal Receive</div>
                                                    <div class="small text-muted d-none d-md-block"><span
                                                            id="detailtanggal"></span></div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Total Pembayaran</div>
                                                    <div class="small text-muted d-none d-md-block"><span
                                                            id="detailtotalbayar"></span></div>
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
                                                    <div class="font-weight-bold">Kode PO/Purchasing</div>
                                                    <div class="small text-muted d-none d-md-block"><span
                                                            id="detailpo"></span></div>
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
                                                    <div class="font-weight-bold">Nomor DO/Delivery Order</div>
                                                    <div class="small text-muted d-none d-md-block"><span
                                                            id="detaildo"></span></div>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="font-weight-bold">Akun</div>
                                                    <div class="small text-muted d-none d-md-block"><span
                                                            id="detailakun"></span></div>
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
                                                            style="width: 50px;">
                                                            Kode</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 90px;">
                                                            Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 70px;">
                                                            Jenis</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 70px;">
                                                            Merk</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 80px;">
                                                            Jumlah diterima</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 80px;">
                                                            Lokasi Rak</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 20px;">
                                                            satuan</th>
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

{{-- MODAL TAMBAH QTY SPAREPART --}}
@forelse ($rcv->PO->Detailsparepart as $item)
<div class="modal fade" id="Modaltambah-{{ $item->id_sparepart }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Receiving</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" id="form-{{ $item->id_sparepart }}" method="POST" class="d-inline">
                <div class="modal-body">
                    <h6>Detail Pesanan</h6>
                    <div class="small mb-2">
                        <span class="font-weight-500 text-primary">{{ $item->nama_sparepart }}</span>

                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="d-flex flex-column font-weight-bold">
                                <label class="small text-muted line-height-normal">Jenis
                                    {{ $item->Merksparepart->Jenissparepart->jenis_sparepart }}, Merk
                                    {{ $item->Merksparepart->merk_sparepart }}
                            </div>
                        </div>
                        <div class="col">
                            <label class="small text-muted line-height-normal">
                                Qty Pesanan: {{ $item->pivot->qty }}
                        </div>

                    </div>
                    <hr class="my-4">
                    <div class="form-group">
                        <label class="small mb-1" for="qty_rcv">Masukan Quantity Sparepart diterima</label>
                        <input class="form-control" name="qty_rcv" type="text" id="qty_rcv"
                            placeholder="Input Quantity diterima" value="{{ old('qty_rcv') }}"></input>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="id_rak">Penempatan Sparepart</label>
                            <select class="form-control" name="id_rak" id="id_akun"
                                class="form-control @error('id_rak') is-invalid @enderror">
                                <option>Pilih Rak</option>
                                @foreach ($rak as $item)
                                <option value="{{ $item->id_rak }}">{{ $item->nama_rak }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_rak')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="harga_diterima">Harga diterima</label>
                            <input class="form-control" name="harga_diterima" type="text" id="harga_diterima"
                                placeholder="Input Harga Beli diterima" value="{{ old('harga_diterima') }}"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan">Masukan Keterangan Penerimaan</label>
                        <textarea class="form-control" name="keterangan" type="text" id="keterangan"
                            placeholder="Input Keterangan diterima" value="{{ old('keterangan') }}"></textarea>
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


@forelse ($rcv->PO->Detailsparepart as $sparepart)
<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Form Penerimaan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">Apakah Form Receiving dengan kode {{ $kode_rcv }} yang Anda inputkan sudah
                    benar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button"
                        onclick="tambahrcv(event,{{ $sparepart }})">Ya!Sudah</button>
                </div>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse

<script>
    function tambahrcv(event, sparepart) {
        event.preventDefault()
        var form1 = $('#form1')
        var kode_rcv = form1.find('input[name="kode_rcv"]').val()
        var kode_po = form1.find('input[name="kode_po"]').val()
        var no_do = form1.find('input[name="no_do"]').val()
        var id_supplier = $('#id_supplier').val()
        var id_akun = $('#id_akun').val()
        var id_pegawai = $('#id_pegawai').val()
        var tanggal_rcv = form1.find('input[name="tanggal_rcv"]').val()
        var total_pembayaran = form1.find('input[name="total_pembayaran"]').val()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        Detail
        for (var i = 0; i < sparepart.length; i++) {
            var form = $('#form-' + sparepart[i].id_sparepart)
            var qty_rcv = form.find('input[name="qty_rcv"]').val()
            var keterangan = form.find('input[name="keterangan"]').val()
            var id_rak = $('#id_rak').val()

            if (qty_rcv == 0 | qty_rcv == '') {
                continue
            } else {
                var id_sparepart = sparepart[i].id_sparepart
                var obj = {
                    id_sparepart: id_sparepart,
                    qty_rcv: qty_rcv,
                    keterangan: keterangan,
                    id_rak: id_rak
                }
                dataform2.push(obj)
            }
        }

        if (dataform2.length == 0) {
            var alert = $('#alertsparepartkosong').show()
        } else {
            var data = {
                _token: _token,
                kode_rcv: kode_rcv,
                kode_po: kode_po,
                id_supplier: id_supplier,
                id_akun: id_akun,
                id_pegawai: id_pegawai,
                tanggal_rcv: tanggal_rcv,
                total_pembayaran: total_pembayaran,
                sparepart: dataform2
            }

            console.log(data)

            $.ajax({
                method: 'post',
                url: '/inventory/receiving',
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
        var qty_rcv = form.find('input[name="qty_rcv"]').val()
        var id_rak = $('#id_rak').val()
        var keterangan = form.find('input[name="keterangan"]').val()

        if (qty_rcv == 0 | qty_rcv == '') {
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

</script>


@endsection
