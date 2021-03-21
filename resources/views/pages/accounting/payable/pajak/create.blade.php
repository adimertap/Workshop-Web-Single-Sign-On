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
                            <div class="page-header-icon" style="color: white"><i class="fas fa-pallet"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Tambah Data Pembayaran Pajak</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Pajak</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('pajak.index') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
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
                            <div class="wizard-step-text-name">Daftar Data Pajak</div>
                            <div class="wizard-step-text-details">Tambah Data</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard3-tab" href="#wizard3" data-toggle="tab" role="tab"
                        aria-controls="wizard3" aria-selected="true">
                        <div class="wizard-step-icon">3</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Konfirmasi Pembayaran</div>
                            <div class="wizard-step-text-details">Daftar Pajak</div>
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
                                <form action="{{ route('pajak.store') }}" id="form1" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_pajak">Kode Pajak</label>
                                            <input class="form-control" id="kode_pajak" type="text" name="kode_pajak"
                                                placeholder="Input Kode Pajak" value="{{ $kode_pajak }}" readonly />
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
                                            <label class="small mb-1" for="status_jurnal">Status Jurnal</label>
                                            <input class="form-control" id="status_jurnal" type="text"
                                                name="status_jurnal" value="Pending" readonly>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="id_jenis_transaksi">Pilih Jenis
                                                Transaksi</label>
                                            <select class="form-control" name="id_jenis_transaksi"
                                                id="id_jenis_transaksi"
                                                class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                                <option>Pilih Jenis Transaksi</option>
                                                @foreach ($jenis_transaksi as $item)
                                                <option value="{{ $item->id_jenis_transaksi }}">
                                                    {{ $item->nama_transaksi }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_jenis_transaksi')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="tanggal_bayar">Tanggal Pembayaran</label>
                                            <input class="form-control" id="tanggal_bayar" type="date"
                                                name="tanggal_bayar" placeholder="Input Tanggal Receive"
                                                value="{{ old('tanggal_bayar') }}"
                                                class="form-control @error('tanggal_bayar') is-invalid @enderror" />
                                            @error('tanggal_bayar')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="deskripsi_pajak">Deskripsi</label>
                                        <input class="form-control" id="deskripsi_pajak" type="text"
                                            name="deskripsi_pajak" placeholder="Input Deskripsi"
                                            value="{{ old('deskripsi_pajak') }}"
                                            class="form-control @error('deskripsi_pajak') is-invalid @enderror" />
                                        @error('deskripsi_pajak')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('pajak') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary">Next</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    {{-- CARD 2 --}}
                    <div class="tab-pane fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">

                        {{-- <h5 class="card-title">Input Jumlah Penerimaan Sparepart</h5> --}}
                        <div class="tab-pane py-2 py-xl-2 fade show active" id="wizard1" role="tabpanel"
                            aria-labelledby="wizard1-tab">
                            <div class="row justify-content-center">
                                <div class="col-xxl-6 col-xl-9">
                                    <h3 class="text-primary">Step 2</h3>
                                    <h5 class="card-title">inputkan Data Pajak</h5>
                                    <div class="form-group">
                                        <label class="small mb-1" for="data_pajak">Data Pajak</label>
                                        <div class="input-group input-group-joined">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-clipboard-list"></i>
                                                </span>
                                            </div>
                                            <input class="form-control" id="data_pajak" type="text" name="data_pajak"
                                                placeholder="Input Data Pajak" value="{{ old('data_pajak') }}"
                                                class="form-control @error('data_pajak') is-invalid @enderror" />
                                            @error('data_pajak')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="nilai_pajak">Nominal Pajak</label>
                                        <div class="input-group input-group-joined">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </div>
                                            <input class="form-control" id="nilai_pajak" type="text" name="nilai_pajak"
                                                placeholder="Input Nominal Pajak" value="{{ old('nilai_pajak') }}"
                                                class="form-control @error('nilai_pajak') is-invalid @enderror" />
                                            @error('nilai_pajak')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="wizard3" role="tabpanel" aria-labelledby="wizard3-tab">
                        <div class="alert alert-danger" id="alertsparepartkosong" role="alert" style="display:none"> <i
                                class="fas fa-times"></i>
                            Error! Anda belum menambahkan sparepart!
                            <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="alert alert-success" id="alerttambah" role="alert" style="display:none"> <i
                                class="fas fa-check"></i>
                            Berhasil! Anda berhasil menambahkan sparepart!
                            <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <h3 class="text-primary">Step 3</h3>
                        <h5 class="card-title">Konfirmasi Pembayaran</h5>
                        <div class="card card-icon">
                            <div class="row no-gutters">
                                <div class="col-auto card-icon-aside bg-primary">
                                    <i class="fas fa-clipboard-list" style="color: white"></i>
                                </div>
                                <div class="col">
                                    <div class="card-body py-5">
                                        <h5 class="card-title">Data Pajak</h5>
                                        <div class="datatable">
                                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table class="table table-bordered table-hover dataTable"
                                                            id="dataTablekonfirmasi" width="100%" cellspacing="0"
                                                            role="grid" aria-describedby="dataTable_info"
                                                            style="width: 100%;">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="dataTable" rowspan="1"
                                                                        colspan="1" aria-sort="ascending"
                                                                        aria-label="Name: activate to sort column descending"
                                                                        style="width: 20px;">No</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="dataTable" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Position: activate to sort column ascending"
                                                                        style="width: 180px;">Data Pajak</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="dataTable" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Position: activate to sort column ascending"
                                                                        style="width: 180px;">Nilai Pajak</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="dataTable" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Actions: activate to sort column ascending"
                                                                        style="width: 100px;">Actions</th>
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
                        <hr class="my-4">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-light" type="button">Previous</button>
                            <button class="btn btn-primary" type="button" data-toggle="modal"
                                data-target="#Modalsumbit">Submit</button>
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
                    <button class="btn btn-primary" type="button">Ya!Sudah</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
