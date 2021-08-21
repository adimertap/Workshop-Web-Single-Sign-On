@extends('layouts.Admin.adminfrontoffice')

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
                            <div class="page-header-subtitle mr-2" style="color: white">Service
                                {{ $pelayanan->kode_sa }}
                            </div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Pelayanan Service</span>
                            · Detail · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('pelayananservice.index') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
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
                        <div class="card-header ">Form Service
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="kode_prf">Kode PRF</label>
                                <input class="form-control" id="kode_prf" type="text" name="kode_prf"
                                    value="{{ $pelayanan->kode_sa }}" readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="kode_prf">Tanggal</label>
                                <input class="form-control" id="kode_prf" type="text" name="kode_prf"
                                    value="{{ $pelayanan->date }}" readonly />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="id_jenis_transaksi">Mekanik</label>
                                <input class="form-control" id="id_jenis_transaksi" type="text"
                                    name="id_jenis_transaksi" value="{{ $pelayanan->mekanik->nama_pegawai }}"
                                    readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="id_jenis_transaksi">Pitstop</label>
                                <input class="form-control" id="id_jenis_transaksi" type="text"
                                    name="id_jenis_transaksi" value="{{ $pelayanan->pitstop? $pelayanan->pitstop->nama_pitstop:"-" }}"
                                    readonly />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="id_jenis_transaksi">Status</label>
                                <input class="form-control" id="id_jenis_transaksi" type="text"
                                    name="id_jenis_transaksi" value="{{ $pelayanan->status }}"
                                    readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="keperluan_prf">Total Pembayaran</label>
                                <div class="input-group input-group-joined">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-gray-200">
                                            Rp.
                                        </span>
                                    </div>
                                    <input class="form-control" id="keperluan_prf" type="text" name="keperluan_prf"
                                    value="{{ number_format($pelayanan->total_bayar,2,',','.') }}" readonly />
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">Detail Service
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="keperluan_prf">Customer</label>
                                <input class="form-control" id="keperluan_prf" type="text" name="keperluan_prf"
                                    value="{{ $pelayanan->customer_bengkel->nama_customer }}" readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="keperluan_prf">Kendaraan</label>
                                <input class="form-control" id="keperluan_prf" type="text" name="keperluan_prf"
                                    value="{{ $pelayanan->kendaraan->nama_kendaraan }}" readonly />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="keperluan_prf">Plat Nomor</label>
                                <input class="form-control" id="keperluan_prf" type="text" name="keperluan_prf"
                                    value="{{ $pelayanan->plat_kendaraan }}" readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="keperluan_prf">Odo Meter</label>
                                <input class="form-control" id="keperluan_prf" type="text" name="keperluan_prf"
                                    value="{{ $pelayanan->odo_meter }} KM" readonly />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label class="small mb-1" for="keperluan_prf">Keluhan Kendaraan</label>
                                <textarea class="form-control" id="keperluan_prf" type="text" name="keperluan_prf"
                                     readonly>{{ $pelayanan->keluhan_kendaraan }}</textarea>
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
                <div class="card-header ">Detail Perbaikan
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
                                <table class="table table-bordered table-hover dataTable" id="dataTableJasa"
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
                                                style="width: 180px;">Jenis Perbaikan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 100px;">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pelayanan->detail_perbaikan as $jasa)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $jasa->nama_jenis_perbaikan }}</td>
                                            <td class="text-center">Rp. {{ number_format($jasa->pivot->total_harga,2,',','.') }}</td>
                                        </tr>
                                        @empty

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

    <div class="container mt-5">
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
                                <table class="table table-bordered table-hover dataTable" id="dataTableSparepart"
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
                                                style="width: 100px;">Nama Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 75px;">Jenis</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 75px;">Merk</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Jumlah</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 100px;">Harga</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 100px;">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pelayanan->detail_sparepart as $sparepart)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                            <td>{{ $sparepart->nama_sparepart }}</td>
                                            <td>{{ $sparepart->Jenissparepart->jenis_sparepart }}</td>
                                            <td>{{ $sparepart->Merksparepart->merk_sparepart }}</td>
                                            <td>{{ $sparepart->pivot->jumlah }}</td>
                                            <td class="text-center">Rp. {{ number_format($sparepart->pivot->harga,2,',','.') }}</td>
                                            <td class="text-center">Rp. {{ number_format($sparepart->pivot->total_harga,2,',','.') }}</td>
                                        </tr>
                                        @empty

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
</main>



{{-- @forelse ($prf->Detailprf as $item)
<div class="modal fade" id="Modalinvoice-{{ $item->id_payable_invoice }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Detail Item Invoice</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableDetailInvoice"
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
                                                style="width: 70px;">Harga Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 120px;">Total Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->Detailinvoice as $invoice)
                                        <tr id="sparepart-{{ $item->id_sparepart }}" role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">
                                                {{ $loop->iteration}}</th>
                                            <td class="kode_sparepart">{{ $invoice->kode_sparepart }}</td>
                                            <td class="nama_sparepart">{{ $invoice->nama_sparepart }}</td>
                                            <td class="jenis_sparepart">
                                                {{ $invoice->Merksparepart->Jenissparepart->jenis_sparepart }}
                                            </td>
                                            <td class="merk_sparepart">
                                                {{ $invoice->Merksparepart->merk_sparepart }}
                                            </td>
                                            <td class="qty_rcv">{{ $invoice->pivot->qty_rcv }}
                                            </td>
                                            <td class="harga_diterima">Rp.{{ number_format($invoice->pivot->harga_item,2,',','.') }}
                                            </td>
                                            <td class="total_harga">Rp.{{ number_format($invoice->pivot->total_harga,2,',','.') }}
                                            </td>


                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                    <tr>
                                        <td colspan="7" class="text-center font-weight-500">
                                            Total Harga
                                        </td>
                                        <td>Rp. {{ number_format($item->total_pembayaran,2,',','.') }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@empty

@endforelse --}}

<script>


    $(document).ready(function () {
        var table2 = $('#dataTableJasa').DataTable()
        var table3 = $('#dataTableSparepart').DataTable()
    });
</script>

@endsection
