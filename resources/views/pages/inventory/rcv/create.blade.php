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
                        <a href="{{ route('Receive') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
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
                                <form action="{{ route('Rcv.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_rcv">Kode Receiving</label>
                                            <input class="form-control" id="kode_rcv" type="text" name="kode_rcv"
                                                placeholder="Input Kode Receiving" value="{{ $kode_rcv }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_pegawai">Pegawai</label>
                                            <input class="form-control" id="id_pegawai" type="text" name="id_pegawai"
                                                placeholder="Input Nama Pegawai" value="{{ old('id_pegawai') }}"
                                                class="form-control @error('id_pegawai') is-invalid @enderror" />
                                            @error('id_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="kode_rcv">Kode PO</label>
                                            <input class="form-control" id="kode_rcv" type="text" name="kode_rcv"
                                                placeholder="Kode PO" value="{{ old('kode_po') }}" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
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
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="no_do">Nomor DO</label>
                                            <input class="form-control" id="no_do" type="text" name="no_do"
                                                placeholder="Input Nomor Delivery Order" value="{{ old('no_do') }}"
                                                class="form-control @error('no_do') is-invalid @enderror" />
                                            @error('no_do')<div class="text-danger small mb-1">{{ $message }}
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
                                            <label class="small mb-1" for="tanggal_rcv">Tanggal Receive</label>
                                            <input class="form-control" id="tanggal_rcv" type="date" name="tanggal_rcv"
                                                placeholder="Input Tanggal Receive" value="{{ old('tanggal_rcv') }}"
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
                                                            aria-label="Actions: activate to sort column ascending"
                                                            style="width: 20px;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
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

{{-- MODAL ACTION --}}
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Jumlah Receiving</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" class="d-inline">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="qty">Masukan Quantity Sparepart diterima</label>
                        <input class="form-control" name="qty" type="text" id="qty" placeholder="Input Jumlah Pesanan"
                            value="{{ old('qty') }}"></input>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="qty">Masukan Quantity Sparepart diterima</label>
                        <input class="form-control" name="qty" type="text" id="qty" placeholder="Input Jumlah Pesanan"
                            value="{{ old('qty') }}"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" onclick="konfirmsparepart(event)"
                        type="button" data-dismiss="modal">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

</script>


@endsection
