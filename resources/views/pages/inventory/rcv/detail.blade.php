@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Detail Penerimaan {{ $rcv->kode_rcv }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · Penerimaan · Sparepart
                </div>
            </div>
            <div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('Rcv.index') }}" class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">Detail Penerimaan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="small mb-1" for="kode_rcv">Kode Penerimaan</label>
                    <input class="form-control form-control-sm" id="kode_rcv" type="text" name="kode_rcv"
                        value="{{ $rcv->kode_rcv }}" readonly />
                </div>
                <div class="form-group col-md-4">
                    <label class="small mb-1" for="id_pegawai">Pegawai</label>
                    <input class="form-control form-control-sm" id="id_pegawai" type="text" name="id_pegawai"
                        value="{{ $rcv->Pegawai->nama_pegawai }}" readonly />
                </div>
                <div class="form-group col-md-4">
                    <label class="small mb-1" for="tanggal_rcv">Tanggal Rcv</label>
                    <input class="form-control form-control-sm" id="tanggal_rcv" type="date" name="tanggal_rcv"
                        value="{{ $rcv->tanggal_rcv }}" readonly />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="small mb-1" for="id_supplier">Supplier</label>
                    <input class="form-control form-control-sm" id="id_supplier" type="text" name="id_supplier"
                        value="{{ $rcv->Supplier->nama_supplier }}" readonly />
                </div>
                <div class="form-group col-md-4">
                    <label class="small mb-1" for="no_do">No. Delivery Order</label>
                    <input class="form-control form-control-sm" id="no_do" type="text" name="no_do"
                        value="{{ $rcv->no_do }}" readonly />
                </div>
                <div class="form-group col-md-4">
                    <label class="small mb-1" for="no_faktur">No. PO</label>
                    <input class="form-control form-control-sm" id="no_faktur" type="text" name="no_faktur"
                        value="{{ $rcv->PO->kode_po }}" readonly />
                </div>
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
                    Sparepart Penerimaan
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
                                            aria-label="Name: activate to sort column descending" style="width: 20px;">
                                            No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 100px;">Sparepart</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 80px;">Merk Sparepart</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 40px;">Satuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 40px;">Qty PO</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 40px;">Qty Rcv</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 40px;">Qty Retur</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 90px;">Harga Sparepart</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 90px;">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rcv->Detailrcv as $detail)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                        </th>
                                        <td>{{ $detail->nama_sparepart }}</td>
                                        <td>{{ $detail->Merksparepart->merk_sparepart }}</td>
                                        <td>{{ $detail->Konversi->satuan }}</td>
                                        <td>{{ $detail->pivot->qty_po }}</td>
                                        <td>{{ $detail->pivot->qty_rcv }}</td>
                                        <td>{{ $detail->pivot->qty_retur }}</td>
                                        <td>Rp.{{ number_format($detail->pivot->harga_diterima,2,',','.')}}</td>
                                        <td>{{ $detail->pivot->keterangan }}</td>
                                        {{-- <td>{{ $detail->qty_rcv }}</td>
                                        <td>Rp.
                                            {{ number_format($detail->Sparepart->Hargasparepart->harga_beli,0,',','.') }}
                                        </td>
                                        <td>{{ $detail->Sparepart->Rak->nama_rak }}</td> --}}
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
