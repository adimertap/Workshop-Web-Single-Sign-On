@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-cog"></i></div>
                            Tambah Data Pembelian
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('purchaseorder') }}"
                            class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</main>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-6">
                <div class="card-header">Formulir Pembelian</div>
                <div class="card-body">
                    <form action="{{ route('purchase-order.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="kode_po">Kode PO</label>
                                <input class="form-control" id="kode_po" type="text" name="kode_po"
                                    value="{{ old('kode_po') }}" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="id_pegawai">Pegawai</label>
                                <input class="form-control" id="id_pegawai" type="text" name="id_pegawai"
                                    placeholder="Input Nama Pegawai" value="{{ old('id_pegawai') }}"
                                    class="form-control @error('id_pegawai') is-invalid @enderror" />
                                @error('id_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
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
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="tanggal_po">Tanggal PO</label>
                                <input class="form-control" id="tanggal_po" type="date" name="tanggal_po"
                                    value="{{ old('tanggal_po') }}"
                                    class="form-control @error('tanggal_po') is-invalid @enderror" />
                                @error('tanggal_po')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="approve_po">Approve Owner</label>
                                <input class="form-control" id="approve_po" type="tex" name="approve_po"
                                    value="Pending" readonly>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="small mb-1" for="approve_ap">Approve AP</label>
                                <input class="form-control" id="approve_ap" type="text" name="approve_ap"
                                    value="Pending" readonly>
                            </div>

                        </div>
                        <hr class="my-4" />
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card mb-4">
                <div class="card-body text-center p-5">
                    <img class="img-fluid mb-5" src="/backend/src/assets/img/freepik/Manualbook.png" style="max-width: 7rem;">
                    <h4>Panduan Pembelian</h4>
                    <p style="font-size: 14px;">Ready to get started? Let us know now! It's time to start building that dashboard you've been waiting to create!</p>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header border-bottom">
            <ul class="nav nav-tabs card-header-tabs" id="dashboardNav" role="tablist">
                <li class="nav-item mr-1"><a class="nav-link active" id="overview-pill" href="#overview" data-toggle="tab" role="tab" aria-controls="overview" aria-selected="true">Daftar Sparepart</a></li>
                <li class="nav-item"><a class="nav-link" id="activities-pill" href="#activities" data-toggle="tab" role="tab" aria-controls="activities" aria-selected="false">Daftar Pembelian</a></li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="dashboardNavContent">
                <div class="tab-pane fade active show" id="overview" role="tabpanel" aria-labelledby="overview-pill">
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                        cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending" style="width: 20px;">
                                                    No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 40px;">
                                                    Kode Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 120px;">Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 80px;">
                                                    Merk Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 50px;">
                                                    Stock</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 70px;">
                                                    Satuan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 50px;">
                                                    Stock Min</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 100px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($sparepart as $item)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                                <td>{{ $item->kode_sparepart }}</td>
                                                <td>{{ $item->nama_sparepart }}</td>
                                                <td>{{ $item->Merksparepart->merk_sparepart }}</td>
                                                <td>{{ $item->stock }}</td>
                                                <td>{{ $item->Konversi->satuan }}</td>
                                                <td>{{ $item->stock_min}}</td>
                                                <td>
                                                    <a href="" class="btn btn-success btn-datatable" type="button"
                                                        data-toggle="modal" data-target="#Modalhapus-{{ $item->id_sparepart }}">
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
               
                <div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="activities-pill">
                    <div class="datatable">
                        <div id="dataTable_wrapperr" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                        cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending" style="width: 20px;">
                                                    No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 40px;">
                                                    Kode Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 120px;">Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 80px;">
                                                    Merk Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 50px;">
                                                    Stock</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 70px;">
                                                    Satuan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 50px;">
                                                    Stock Min</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
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
</main>

<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Large Modal</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <p>This is an example of a large modal.</p>
            </div>
            <div class="modal-footer"><button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
