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
                            <div class="page-header-subtitle mr-2" style="color: white">Tambah Data Payment Requisition
                                Form
                            </div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">PRF</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('prf.index') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container mt-n10">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header ">Form PRF
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('prf.store') }}" id="form1" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="id_jenis_transaksi">Pilih Jenis
                                    Transaksi</label><span class="mr-4 mb-3" style="color: red">*</span>
                                <select class="form-control" name="id_jenis_transaksi" id="id_jenis_transaksi">
                                    <option value="{{ $prf->Jenistransaksi->id_jenis_transaksi }}">
                                        {{ $prf->Jenistransaksi->nama_transaksi }}</option>
                                    @foreach ($jenis_transaksi as $jenistransaksi)
                                    <option value="{{ $jenistransaksi->id_jenis_transaksi }}">
                                        {{ $jenistransaksi->nama_transaksi }}
                                    </option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="kode_prf">Kode PRF</label>
                                <input class="form-control" id="kode_prf" type="text" name="kode_prf"
                                    placeholder="Input Kode Invoice" value="{{ $kode_prf }}" readonly />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="tanggal_prf">Tanggal Pembuatan PRF</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
                                <input class="form-control" id="tanggal_prf" type="date" name="tanggal_prf"
                                    placeholder="Input Tanggal Prf" value="{{ old('tanggal_prf') }}"
                                    class="form-control @error('tanggal_prf') is-invalid @enderror" />
                                @error('tanggal_prf')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="keperluan_prf">Deskripsi Keperluan</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
                                <textarea class="form-control" id="keperluan_prf" type="text" name="keperluan_prf"
                                    placeholder="Input Keperluan PRF" value="{{ old('keperluan_prf') }}"
                                    class="form-control @error('keperluan_prf') is-invalid @enderror"> </textarea>
                                @error('keperluan_prf')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card card-header-actions">
                        <div class="card-header ">Detail Invoice Supplier
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datatable">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable" id="dataTableDetail"
                                            width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 20px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">Kode Invoice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 60px;">Kode PO</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Tanggal Invoice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Tenggat Invoice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 100px;">Total Biaya</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Kode Rcv</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($prf->Supplier->InvoicePayable as $item)
                                                <tr id="invoice-{{ $item->id_payable_invoice }}" role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td class="kode_invoice">{{ $item->kode_invoice }}</td>
                                                    <td class="kode_po">{{ $item->PO->kode_po }}</td>
                                                    <td class="tanggal_invoice">{{ $item->tanggal_invoice }}</td>
                                                    <td class="tenggat_invoice">{{ $item->tenggat_invoice }}</td>
                                                    <td class="total_pembayaran">
                                                        Rp.{{ number_format($item->total_pembayaran,2,',','.') }}</td>
                                                    <td class="kode_rcv">{{ $item->Rcv->kode_rcv }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalinvoice-{{ $item->id_payable_invoice }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="" class="btn btn-success btn-datatable"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Tambah">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </td>
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
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card card-header-actions">
                        <div class="card-header ">Konfirmasi
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datatable">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable" id="dataTableDetail"
                                            width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 20px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">Kode Invoice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 60px;">Kode PO</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Tanggal Invoice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Tenggat Invoice</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 100px;">Total Biaya</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Kode Rcv</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 50px;">Action</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($prf->Supplier->InvoicePayable as $item)
                                                <tr id="invoice-{{ $item->id_payable_invoice }}" role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td class="kode_invoice">{{ $item->kode_invoice }}</td>
                                                    <td class="kode_po">{{ $item->PO->kode_po }}</td>
                                                    <td class="tanggal_invoice">{{ $item->tanggal_invoice }}</td>
                                                    <td class="tenggat_invoice">{{ $item->tenggat_invoice }}</td>
                                                    <td class="total_pembayaran">
                                                        Rp.{{ number_format($item->total_pembayaran,2,',','.') }}</td>
                                                    <td class="kode_rcv">{{ $item->Rcv->kode_rcv }}</td>
                                                    <td>
                                                        <a href="" class="btn btn-primary btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modalinvoice-{{ $item->id_payable_invoice }}">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="" class="btn btn-success btn-datatable"
                                                            data-toggle="tooltip" data-placement="top" title=""
                                                            data-original-title="Tambah">
                                                            <i class="fas fa-plus"></i>
                                                        </a>
                                                    </td>
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
                </form>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Detail Pembayaran
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="id_supplier">Supplier</label>
                                <input class="form-control" id="id_supplier" type="text" name="id_supplier"
                                    placeholder="Input Kode Invoice" value="{{ $prf->Supplier->nama_supplier }}"
                                    readonly />
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="no_rek">No Rekening Supplier</label>
                                <input class="form-control" id="no_rek" type="text" name="no_rek"
                                    placeholder="Input Kode Invoice" value="{{ $prf->Supplier->rekening_supplier }}"
                                    readonly />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="small mb-1" for="grand_total">Total Pembayaran</label>
                            <input class="form-control" id="grand_total" type="text" name="grand_total"
                                placeholder="Grand Total" readonly />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1 mr-1" for="id_fop">Pilih Metode Pembayaran</label><span
                                class="mr-4 mb-3" style="color: red">*</span>
                            <select class="form-control" name="id_fop" id="id_fop">
                                @foreach ($fop as $fops)
                                <option value="{{ $fops->id_fop }}">
                                    {{ $fops->nama_fop }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group text-right">
                            <hr>
                            <a href="{{ route('prf.index') }}" class="btn btn-sm btn-light">Kembali</a>
                            <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                data-target="#Modalsumbit">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</main>

{{-- MODAL Jenis Transaksi --}}
<div class="modal fade" id="Modaltransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Jenis Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('jenis-transaksi.store') }}" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="nama_transaksi">Jenis Transaksi</label>
                        <input class="form-control" name="nama_transaksi" type="text" id="nama_transaksi"
                            placeholder="Input Jenis Transaksi" value="{{ old('nama_transaksi') }}"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL DETAIL INVOICE --}}
@forelse ($prf->Supplier->InvoicePayable as $item)
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
                                                style="width: 50px;">Harga Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Total Harga</th>
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
                                            <td class="harga_diterima">
                                                Rp.{{ number_format($invoice->pivot->harga_item,2,',','.') }}
                                            </td>
                                            <td class="total_harga">
                                                Rp.{{ number_format($invoice->pivot->total_harga,2,',','.') }}
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
                                            Rp.{{ number_format($item->total_pembayaran,2,',','.') }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@empty

@endforelse




{{-- MODAL KONFIRMASI --}}
{{-- <div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Invoice</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">Apakah Form Invoice yang Anda inputkan sudah benar?</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button"
                    onclick="submit(event,{{ $invoice->Rcv->Detailrcv }},{{ $invoice->id_payable_invoice }})">Ya!Sudah</button>
</div>
</div>
</div>
</div> --}}



{{-- <template id="template_delete_button">
    <button class="btn btn-danger btn-datatable" onclick="hapussparepart(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
</template>

<template id="template_add_button">
    <button class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="#Modaltambah">
        <i class="fas fa-plus"></i>
    </button>
</template> --}}


<script>
    function tambahrcv(event, id_rcv) {
        var data = $('#item-' + id_rcv)
        var _token = $('#form1').find('input[name="_token"]').val()
        var kode_rcv = $(data.find('.kode_rcv')[0]).text()
        var nama_supplier = $(data.find('.nama_supplier')[0]).text()

        $('#detailrcv').val(kode_rcv)
        $('#detailsupplier').val(nama_supplier)
    }

    function submit(event, sparepart, id_payable_invoice) {
        event.preventDefault()
        var form1 = $('#form1')
        var kode_invoice = form1.find('input[name="kode_invoice"]').val()
        var id_jenis_transaksi = $('#id_jenis_transaksi').val()
        var tanggal_invoice = form1.find('input[name="tanggal_invoice"]').val()
        var tenggat_invoice = form1.find('input[name="tenggat_invoice"]').val()
        var deskripsi_invoice = form1.find('textarea[name="deskripsi_invoice"]').val()
        var formgrandtotal = $('#grandtotal')
        var grand_total = $(formgrandtotal.find('.grand_total')[0]).html()
        var total_pembayaran = grand_total.split('Rp.')[1].replace('.', '').replace('.', '').replace(',00', '')

        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        for (var i = 0; i < sparepart.length; i++) {
            var data = $('#sparepart-' + id_sparepart)
            var total_harga = $($('#sparepart-' + sparepart[i].id_sparepart).find('.total_harga')[0]).html()
            var splitqty = total_harga.split('Rp.')[1].replace('.', '').replace(',00', '')
            var qty_rcv = $($('#sparepart-' + sparepart[i].id_sparepart).find('.qty_rcv')[0]).html()
            var harga_diterima = $($('#sparepart-' + sparepart[i].id_sparepart).find('.harga_diterima')[0]).html()
            var harga_item = harga_diterima.split('Rp.')[1].replace('.', '').replace(',00', '')

            var id_sparepart = sparepart[i].id_sparepart
            var obj = {
                id_sparepart: id_sparepart,
                total_harga: splitqty,
                qty_rcv: qty_rcv,
                harga_item: harga_item,
            }
            dataform2.push(obj)
        }


        if (dataform2.length == 0) {
            var alert = $('#alertsparepartkosong').show()
        } else {
            var data = {
                _token: _token,
                kode_invoice: kode_invoice,
                id_jenis_transaksi: id_jenis_transaksi,
                tanggal_invoice: tanggal_invoice,
                tenggat_invoice: tenggat_invoice,
                total_pembayaran: total_pembayaran,
                deskripsi_invoice: deskripsi_invoice,
                sparepart: dataform2
            }

            $.ajax({
                method: 'put',
                url: '/Accounting/invoice-payable/' + id_payable_invoice,
                data: data,
                success: function (response) {
                    window.location.href = '/Accounting/invoice-payable'

                },
                error: function (response) {
                    console.log(response)
                }
            });
        }
    }

    $(document).ready(function () {
        var tablercv = $('#dataTableRcv').DataTable()
        var tabledetail = $('#dataTableDetail').DataTable()
        // var tabledetailinvoice = $('#dataTableDetailInvoice').DataTable()

    });

</script>


@endsection
