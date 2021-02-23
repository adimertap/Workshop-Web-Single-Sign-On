@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Detail Pembelian {{ $po->kode_po }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · Pembelian · Sparepart 
                </div>
            </div>
            <div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('approvalpo') }}"
                        class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Detail Pembelian
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="small mb-1" for="kode_po">Kode Pembelian</label>
                        <input class="form-control form-control-sm" id="kode_po" type="text"
                            name="kode_po" value="{{ $po->kode_po }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_pegawai">Pegawai</label>
                        <input class="form-control form-control-sm" id="id_pegawai" type="text"
                            name="id_pegawai" value="{{ $po->Pegawai->nama_pegawai }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="tanggal_po">Tanggal Pembelian</label>
                        <input class="form-control form-control-sm" id="tanggal_po" type="date"
                            name="tanggal_po" value="{{ $po->tanggal_po }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_akun">Akun</label>
                        <input class="form-control form-control-sm" id="id_akun" type="text"
                            name="id_akun" value="{{ $po->Akun->nama_akun }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan">Keterangan Pembelian</label>
                        <input class="form-control form-control-sm" id="keterangan" type="text"
                            name="keterangan" value="{{ $po->keterangan }}" readonly />
                    </div>
                    <hr class="my-4" />
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card card-header-actions">
                    <div class="card-header ">List Sparepart</div>
                </div>
                <div class="card-body">
                    <div class="alert alert-info alert-icon" role="alert">
                        <div class="alert-icon-aside">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="alert-icon-content">
                            <h5 class="alert-heading" class="small">Sparepart Info</h5>
                            Sparepart Pesanan Pembelian 
                        </div>
                    </div>
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTable"
                                        width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 20px;">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"aria-label="Start date: activate to sort column ascending"
                                                    style="width: 230px;">Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"aria-label="Start date: activate to sort column ascending"
                                                    style="width: 230px;">Qty</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"aria-label="Start date: activate to sort column ascending"
                                                    style="width: 230px;">Harga Sparepart</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($po->Detail as $detail)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                                <td>{{ $detail->Sparepart->nama_sparepart }}</td>
                                                <td>{{ $detail->Sparepart->nama_sparepart }}</td>
                                                <td>{{ $detail->qty }}</td>
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
</main>

{{-- Script Open Modal Callback --}}
<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

</script>
@endsection
