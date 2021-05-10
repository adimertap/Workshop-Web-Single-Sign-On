@extends('layouts.Admin.adminfrontoffice')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Detail Penjualan {{ $penjualan->kode_penjualan }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · Penjualan · Sparepart
                </div>
            </div>
            <div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('penjualansparepart.index') }}"
                        class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">Detail penjualan
        </div>
        <div class="card-body">
            <div class="form-group">
                <label class="small mb-1" for="kode_penjualan">Kode Penjualan</label>
                <input class="form-control form-control-sm" id="kode_penjualan" type="text" name="kode_penjualan"
                    value="{{ $penjualan->kode_penjualan }}" readonly />
            </div>
            <div class="form-group">
                <label class="small mb-1" for="id_pegawai">Pegawai</label>
                <input class="form-control form-control-sm" id="id_pegawai" type="text" name="id_pegawai"
                    value="{{Auth::user()->name}}" readonly />
            </div>
            <div class="form-group">
                <label class="small mb-1" for="tanggal">Tanggal Penjualan</label>
                <input class="form-control form-control-sm" id="tanggal" type="date" name="tanggal"
                    value="{{ $penjualan->tanggal }}" readonly />
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
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
                    Penjualan
                </div>
            </div>
            <div class="datatable">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover dataTable" id="dataTablekonfirmasi"
                                width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 20px;">
                                            No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 20px;">
                                            Kode</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 100px;">
                                            Nama Sparepart</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 70px;">
                                            Jenis Sparepart</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 70px;">
                                            Merk</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 40px;">
                                            Satuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 80px;">
                                            Harga Jual</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 20px;">
                                            Quantity</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 80px;">
                                            Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($penjualan->Detailsparepart as $detail)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                        </th>
                                        <td>{{ $detail->kode_sparepart }}</td>
                                        <td>{{ $detail->nama_sparepart }}</td>
                                        <td>{{ $detail->jenissparepart->jenis_sparepart }}</td>
                                        <td>{{ $detail->merksparepart->merk_sparepart }}</td>
                                        <td>{{ $detail->konversi->satuan }}</td>
                                        <td>Rp. {{ number_format($detail->Hargasparepart->harga_jual,0,',','.') }}</td>
                                        <td>{{ $detail->pivot->jumlah }}</td>
                                        <td>Rp. {{ number_format($detail->pivot->total_harga,0,',','.') }}</td>
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

@endsection
