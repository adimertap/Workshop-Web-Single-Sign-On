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
                            <div class="page-header-icon" style="color: white"><i
                                    class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <div class="page-header-subtitle mr-2" style="color: white">Invoice
                                {{ $invoice->kode_invoice }}
                            </div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Invoice</span>
                            · Detail · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('invoice-payable.index') }}"
                            class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-n10">
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header ">Form Invoice
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="kode_invoice">Kode Invoice</label>
                                <input class="form-control" id="kode_invoice" type="text" name="kode_invoice"
                                    placeholder="Input Kode Invoice" value="{{ $invoice->kode_invoice }}" readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="kode_invoice">Jenis Transaksi</label>
                                <input class="form-control" id="kode_invoice" type="text" name="kode_invoice"
                                    placeholder="Input Kode Invoice"
                                    value="{{ $invoice->Jenistransaksi->nama_transaksi }}" readonly />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="tanggal_invoice">Tanggal Invoice</label>
                                <input class="form-control" id="tanggal_invoice" type="date" name="tanggal_invoice"
                                    placeholder="Input Tanggal Invoice" value="{{ $invoice->tanggal_invoice }}"
                                    readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="tenggat_invoice">Tanggal Bayar Terakhir</label>
                                <input class="form-control" id="tenggat_invoice" type="date" name="tenggat_invoice"
                                    placeholder="Input Tanggal Bayar Terakhir" value="{{ $invoice->tenggat_invoice }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="deskripsi_invoice">Deskripsi Keperluan</label>
                                <input class="form-control" id="deskripsi_invoice" type="text" name="deskripsi_invoice"
                                    placeholder="" value="{{ $invoice->deskripsi_invoice }}" readonly>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="kode_invoice">Status PRF</label>
                                <input class="form-control" id="kode_invoice" type="text" name="kode_invoice"
                                    placeholder="Input Kode Invoice"
                                    value="{{ $invoice->status_prf }}" readonly />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">Detail Invoice
                    </div>
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="id_rcv">Kode Receiving</label>
                                <input class="form-control" id="id_rcv" type="text" name="id_rcv"
                                    placeholder="Input Kode Invoice" value="{{ $invoice->Rcv->kode_rcv }}" readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="id_supplier">Supplier</label>
                                <input class="form-control" id="id_supplier" type="text" name="id_supplier"
                                    placeholder="Input Kode Invoice"
                                    value="{{ $invoice->Rcv->Supplier->nama_supplier }}" readonly />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="kode_po">Kode PO</label>
                                <input class="form-control" id="kode_po" type="text" name="kode_po"
                                    placeholder="Input Kode Invoice" value="{{ $invoice->Rcv->PO->kode_po }}"
                                    readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="kode_invoice">Alamat Supplier</label>
                                <input class="form-control" id="kode_invoice" type="text" name="kode_invoice"
                                    placeholder="Input Kode Invoice"
                                    value="{{ $invoice->Rcv->Supplier->alamat_supplier }}" readonly />
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card card-header-actions">
                <div class="card-header ">Detail Sparepart
                </div>
            </div>
            <div class="card-body">
                <div class="alert alert-danger" id="alertsparepartkosong" role="alert" style="display:none"> <i
                        class="fas fa-times"></i>
                    Error! Anda belum menambahkan sparepart!
                    <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableDetail"
                                    width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                    style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 60px;">Kode Rcv</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Nama Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Jenis</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Merk</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 30px;">Qty Rcv</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Harga Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($invoice->Rcv->Detailrcv as $item)
                                        <tr id="sparepart-{{ $item->id_sparepart }}" role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">
                                                {{ $loop->iteration}}</th>
                                            <td class="kode_sparepart">{{ $item->kode_sparepart }}</td>
                                            <td class="nama_sparepart">{{ $item->nama_sparepart }}</td>
                                            <td class="jenis_sparepart">
                                                {{ $item->Merksparepart->Jenissparepart->jenis_sparepart }}
                                            </td>
                                            <td class="merk_sparepart">
                                                {{ $item->Merksparepart->merk_sparepart }}
                                            </td>
                                            <td class="qty_rcv">{{ $item->pivot->qty_rcv }}
                                            </td>
                                            <td class="harga_diterima">
                                                Rp.{{ number_format($item->pivot->harga_diterima,2,',','.') }}
                                            </td>
                                            <td class="total_harga">
                                                Rp.{{ number_format($item->pivot->total_harga,2,',','.') }}
                                            </td>


                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                    <tr id="grandtotal">
                                        <td colspan="7" class="text-center font-weight-500">
                                            Total Harga
                                        </td>
                                        <td class="grand_total">
                                            Rp.{{ number_format($invoice->Rcv->grand_total,2,',','.') }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

@endsection