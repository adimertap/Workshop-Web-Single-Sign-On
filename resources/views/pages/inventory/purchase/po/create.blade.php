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
                                <form action="{{ route('Rcv.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_po">Kode Pembelian</label>
                                            <input class="form-control" id="kode_po" type="text" name="kode_po"
                                                placeholder="Input Kode Receiving" value="{{ old('kode_po') }}"
                                                class="form-control @error('kode_po') is-invalid @enderror" />
                                            @error('kode_po')<div class="text-danger small mb-1">{{ $message }}
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
                                            <label class="small mb-1" for="approve_ap">Approval</label>
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
                        
                        {{-- <h5 class="card-title">Input Jumlah Penerimaan Sparepart</h5> --}}
                        <div class="card card-icon">
                            <div class="row no-gutters">
                                <div class="col-auto card-icon-aside bg-primary">
                                    <i class="fa fa-cogs" style="color: white"></i>
                                </div>
                                <div class="col">
                                    <div class="card-body py-5">
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
                                                                        style="width: 80px;">Kode</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                        rowspan="1" colspan="1"
                                                                        aria-label="Position: activate to sort column ascending"
                                                                        style="width: 180px;">Nama Sparepart</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                        rowspan="1" colspan="1"
                                                                        aria-label="Office: activate to sort column ascending"
                                                                        style="width: 70px;">Jenis Sparepart</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                        rowspan="1" colspan="1"
                                                                        aria-label="Start date: activate to sort column ascending"
                                                                        style="width: 70px;">Merk</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                        rowspan="1" colspan="1"
                                                                        aria-label="Salary: activate to sort column ascending"
                                                                        style="width: 40px;">Satuan</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                        rowspan="1" colspan="1"
                                                                        aria-label="Salary: activate to sort column ascending"
                                                                        style="width: 20px;">Stock</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                        rowspan="1" colspan="1"
                                                                        aria-label="Salary: activate to sort column ascending"
                                                                        style="width: 20px;">Min Stock</th>
                                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                                        rowspan="1" colspan="1"
                                                                        aria-label="Actions: activate to sort column ascending"
                                                                        style="width: 100px;">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($sparepart as $item)
                                                                <tr role="row" class="odd">
                                                                    <th scope="row" class="small" class="sorting_1">
                                                                        {{ $loop->iteration}}</th>
                                                                    <td>{{ $item->kode_sparepart }}</td>
                                                                    <td>{{ $item->nama_sparepart }}</td>
                                                                    <td>{{ $item->Jenissparepart->jenis_sparepart }}</td>
                                                                    <td>{{ $item->Merksparepart->merk_sparepart }}</td>
                                                                    <td>{{ $item->Konversi->satuan }}</td>
                                                                    <td>{{ $item->stock }}</td>
                                                                    <td>{{ $item->stock_min}}</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-success btn-datatable"
                                                                            type="button" data-toggle="modal"
                                                                            data-target="#Modalhapus-{{ $item->id_sparepart }}">
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="wizard3" role="tabpanel" aria-labelledby="wizard3-tab">

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
</main>

<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

</script>


@endsection
