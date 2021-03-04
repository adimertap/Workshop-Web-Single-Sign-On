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
                                                placeholder="Input Kode Receiving" value="{{ old('kode_rcv') }}"
                                                class="form-control @error('kode_rcv') is-invalid @enderror" />
                                            @error('kode_rcv')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
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
                        <div class="card card-icon">
                            <div class="row no-gutters">
                                <div class="col-auto card-icon-aside bg-primary">
                                    <i class="fa fa-cogs" style="color: white"></i>
                                </div>
                                <div class="col">
                                    <div class="card-body py-5">
                                        <h3 class="text-primary">Step 2</h3>
                                        <h5 class="card-title">Pesanan Sparepart PO</h5>

                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_po">Pembelian</label>
                                            <select class="form-control" name="id_po" id="id_po"
                                                class="form-control @error('id_po') is-invalid @enderror">
                                                <option>Pilih Pembelian</option>
                                                @foreach ($po as $item)
                                                <option value="{{ $item->id_po }}">{{ $item->kode_po }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>






                                            <div class="datatable">
                                                <div id="dataTable_wrapperr" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row justify-content-center">
                                                        <div class="col-sm-12">
                                                            <table class="table table-bordered table-hover dataTable"
                                                                id="dataTable" width="100%" cellspacing="0" role="grid"
                                                                aria-describedby="dataTable_info" style="width: 100%;">
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
                                                                            aria-label="Start date: activate to sort column ascending"
                                                                            style="width: 40px;">
                                                                            Kode Sparepart</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Start date: activate to sort column ascending"
                                                                            style="width: 120px;">Sparepart</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Start date: activate to sort column ascending"
                                                                            style="width: 80px;">
                                                                            Merk Sparepart</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Start date: activate to sort column ascending"
                                                                            style="width: 50px;">
                                                                            Jumlah dipesan</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Start date: activate to sort column ascending"
                                                                            style="width: 70px;">
                                                                            Jumlah diterima</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Start date: activate to sort column ascending"
                                                                            style="width: 50px;">
                                                                            Satuan</th>
                                                                        <th class="sorting" tabindex="0"
                                                                            aria-controls="dataTable" rowspan="1"
                                                                            colspan="1"
                                                                            aria-label="Start date: activate to sort column ascending"
                                                                            style="width: 100px;">Action</th>
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
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="wizard3" role="tabpanel" aria-labelledby="wizard3-tab">
                            <h3 class="text-primary">Step 3</h3>
                            <h5 class="card-title">Konfirmasi Jumlah Penerimaan Sparepart</h5>
                            <div class="datatable">
                                <div id="dataTable_wrapperr" class="dataTables_wrapper dt-bootstrap4">
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
                                                            style="width: 20px;">
                                                            No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 40px;">
                                                            Kode Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 120px;">Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 80px;">
                                                            Merk Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 70px;">
                                                            Jumlah diterima</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 50px;">
                                                            Satuan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 100px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="my-4">
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-light" type="button">Previous</button>
                                <button class="btn btn-primary" type="button">Submit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</main>

<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

</script>


@endsection
