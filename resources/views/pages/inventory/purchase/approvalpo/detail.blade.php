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
                    <a href="{{ route('approval-po.index') }}"
                        class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="card mb-4">
                <div class="card-header">Detail Pembelian
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="small mb-1" for="kode_po">Kode Pembelian</label>
                        <input class="form-control form-control-sm" id="kode_po" type="text" name="kode_po"
                            value="{{ $po->kode_po }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_pegawai">Pegawai</label>
                        <input class="form-control form-control-sm" id="id_pegawai" type="text" name="id_pegawai"
                            value="{{ $po->Pegawai->nama_pegawai }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="tanggal_po">Tanggal Pembelian</label>
                        <input class="form-control form-control-sm" id="tanggal_po" type="date" name="tanggal_po"
                            value="{{ $po->tanggal_po }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="approve_po">Approve Owner</label>
                        <input class="form-control form-control-sm" id="approve_po" type="text" name="approve_po"
                            value="{{ $po->approve_po }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="approve_ap">Approve AP</label>
                        <input class="form-control form-control-sm" id="approve_ap" type="text" name="approve_ap"
                            value="{{ $po->approve_ap }}" readonly />
                    </div>
                    <hr class="my-2" />
                    <div class="small mb-2">
                        <span class="font-weight-500 text-secondary">Keterangan</span>
                        Approval
                    </div>
                    <label class="small">
                        - {{ $po->keterangan_owner }}
                    </label>
                    <hr class="my-2" />
                    <div class="small mb-2">
                        <span class="font-weight-500 text-secondary">Keterangan</span>
                        Approval
                    </div>
                    <label class="small">
                        - {{ $po->keterangan_ap }}
                    </label>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header ">List Sparepart
                </div>
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
                                <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 80px;">Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 50px;">Merk Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 20px;">Qty</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 20px;">Satuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 30px;">Harga Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 80px;">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{--  --}}
                                        @forelse ($po->Detailsparepart as $detail)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                            </th>
                                            <td>{{ $detail->nama_sparepart }}</td>
                                            <td>{{ $detail->Merksparepart->merk_sparepart }}</td>
                                            <td>{{ $detail->pivot->qty }}</td>
                                            <td>{{ $detail->Konversi->satuan }}</td>
                                            <td>Rp.
                                                {{ number_format($detail->pivot->harga_satuan,0,',','.') }}
                                            </td>
                                            <td>Rp.
                                                {{ number_format($detail->pivot->total_harga,0,',','.') }}
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                Data Sparepart Kosong
                                            </td>
                                        </tr>
                                        @endforelse
                                        <tr>
                                        <td colspan="6" class="text-center font-weight-500">
                                            Total Harga
                                        </td>
                                        <td >
                                            Rp.{{ number_format($po->grand_total,0,',','.') }}
                                        </td>
                                        </tr>
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
