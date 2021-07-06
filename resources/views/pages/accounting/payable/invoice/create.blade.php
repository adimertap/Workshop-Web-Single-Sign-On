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
                            <div class="page-header-subtitle mr-2" style="color: white">Tambah Data Invoice Supplier
                            </div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Invoice</span>
                            · Tambah · Data
                            <span class="font-weight-500 text-primary" id="id_bengkel" style="display:none">{{ Auth::user()->bengkel->id_bengkel}}</span>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('invoice-payable.index') }}"
                            class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger" id="alertsparepartkosong" role="alert" style="display:none"><i class="far fa-times-circle"></i>
                <span class="small">Error! Terdapat Data yang Masih Kosong!</span> 
                <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </header>


    <div class="container mt-n10">
        <div class="row">
            <div class="col-lg-7">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header ">Form Invoice
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('invoice-payable.store') }}" id="form1" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="kode_invoice">Kode Invoice</label>
                                    <input class="form-control" id="kode_invoice" type="text" name="kode_invoice"
                                        placeholder="Input Kode Invoice" value="{{ $kode_invoice }}" readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1 mr-1" for="id_jenis_transaksi">Pilih Jenis
                                        Transaksi</label><span class="mr-4 mb-3" style="color: red">*</span>
                                        <select class="form-control" name="id_jenis_transaksi" id="id_jenis_transaksi">
                                            <option value="{{ $invoice->Jenistransaksi->id_jenis_transaksi }}">
                                                {{ $invoice->Jenistransaksi->nama_transaksi }}</option>
                                            @foreach ($jenis_transaksi as $transaksijenis)
                                            <option value="{{ $transaksijenis->id_jenis_transaksi }}">
                                                {{ $transaksijenis->nama_transaksi }}
                                            </option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1 mr-1" for="tanggal_invoice">Tanggal Invoice</label><span class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="tanggal_invoice" type="date" name="tanggal_invoice"
                                        placeholder="Input Tanggal Invoice" value="{{ $invoice->tanggal_invoice }}"
                                        class="form-control @error('tanggal_invoice') is-invalid @enderror" />
                                    @error('tanggal_invoice')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1 mr-1" for="tenggat_invoice">Tanggal Bayar Terakhir</label><span class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="tenggat_invoice" type="date" name="tenggat_invoice"
                                        placeholder="Input Tanggal Bayar Terakhir" value="{{ $invoice->tenggat_invoice }}"
                                        class="form-control @error('tenggat_invoice') is-invalid @enderror" />
                                    @error('tenggat_invoice')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                            </div>
                         <div class="form-row">
                            <div class="form-group col-md-6">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                        <label class="small mb-1" for="total_harga">Total Keseluruhan</label>
                                    </div>
                                </div>
                                <div class="input-group input-group-joined">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-gray-200">
                                            Rp.
                                        </span>
                                    </div>
                                    <input class="form-control" id="total_harga_keseluruhan" type="number" name="total_harga" value="{{ $invoice->total_pembayaran !=  null ? $invoice->total_pembayaran : 0  }}" readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="deskripsi_invoice">Deskripsi Keperluan</label>
                                <textarea class="form-control" id="deskripsi_invoice" type="text"
                                    name="deskripsi_invoice" placeholder="" value="{{ $invoice->deskripsi_invoice }}"
                                    class="form-control @error('deskripsi_invoice') is-invalid @enderror">{{ $invoice->deskripsi_invoice }} </textarea>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-header">Detail Invoice
                    </div>
                    <div class="card-body">
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="id_rcv">Kode Receiving</label>
                                    <input class="form-control" id="id_rcv" type="text" name="id_rcv"
                                        placeholder="Input Kode Invoice" value="{{ $invoice->Rcv->kode_rcv }}"
                                        readonly />
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
                                    <label class="small mb-1" for="alamat_supplier">Alamat Supplier</label>
                                    <input class="form-control" id="alamat_supplier" type="text" name="alamat_supplier"
                                        placeholder="Input Kode Invoice"
                                        value="{{ $invoice->Rcv->Supplier->alamat_supplier }}" readonly />
                                </div>
                            </div>
                            
                            <div class="form-group text-right">
                                <hr>
                                <a href="{{ route('invoice-payable.index') }}" class="btn btn-sm btn-light">Kembali</a>
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                    data-target="#Modalsumbit">Simpan</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card card-header-actions">
                <div class="card-header ">Detail Penerimaan
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
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 60px;">Kode Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Nama Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Merk</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 30px;">Qty</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Harga Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Total Harga</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($invoice->Rcv->Detailrcv as $item)
                                        <tr id="sparepart-{{ $item->id_sparepart }}" role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">
                                                {{ $loop->iteration}}</th>
                                            <td class="kode_sparepart">{{ $item->kode_sparepart }}</td>
                                            <td class="nama_sparepart">{{ $item->nama_sparepart }}</td>
                                            <td class="merk_sparepart">{{ $item->Merksparepart->merk_sparepart }}</td>
                                            <td class="qty_rcv">{{ $item->pivot->qty_rcv }}</td>
                                            <td class="harga_diterima">Rp.{{ number_format($item->pivot->harga_diterima,2,',','.') }}</td>
                                            <td class="total_harga">Rp.{{ number_format($item->pivot->total_harga,2,',','.') }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-success btn-datatable"
                                                    onclick="tambahinvoice(event, {{ $item->id_sparepart }})"
                                                    type="button" data-dismiss="modal"><i
                                                        class="fas fa-plus"></i>
                                                </button>
                                            </td>

                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                    <tr id="grandtotal">
                                        <td colspan="6" class="text-center font-weight-500">
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

    <div class="container mt-3">
        <div class="card">
            <div class="card card-header-actions">
                <div class="card-header ">Detail Invoice
                </div>
            </div>
            <div class="card-body">
              
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableInvoice"
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
                                                style="width: 60px;">Kode Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Nama Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 30px;">Qty</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Harga Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Total Harga</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="konfirmasi">
                                       @forelse ($invoice->Detailinvoice as $detail)
                                        <tr id="gas-{{ $detail->id_sparepart }}" role="row" class="odd">
                                            {{-- <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th> --}}
                                            <td></td>
                                            <td class="kode_sparepartedit"><span id="{{ $detail->kode_sparepart }}">{{ $detail->kode_sparepart }}</span></td>
                                            <td class="nama_sparepartedit">{{ $detail->nama_sparepart }}</td>
                                            <td class="qtyedit">{{ $detail->pivot->qty_rcv }}</td>
                                            <td class="total_hargaedit">Rp {{ number_format($detail->pivot->harga_item,2,',','.')}}</td>
                                            <td class="total_hargaedit">Rp.{{ number_format($detail->pivot->total_harga,2,',','.')}}</td>
                                            <td>
                                            
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


{{-- MODAL KONFIRMASI --}}
<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
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
</div>


<template id="template_delete_button">
    <button class="btn btn-danger btn-datatable" onclick="hapussparepart(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
</template>

<template id="template_add_button">
    <button class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="#Modaltambah">
        <i class="fas fa-plus"></i>
    </button>
</template>


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
        console.log(id_payable_invoice)
        event.preventDefault()
        var form1 = $('#form1')
        var kode_invoice = form1.find('input[name="kode_invoice"]').val()
        var id_jenis_transaksi = $('#id_jenis_transaksi').val()
        var tanggal_invoice = form1.find('input[name="tanggal_invoice"]').val()
        var tenggat_invoice = form1.find('input[name="tenggat_invoice"]').val()
        var deskripsi_invoice = form1.find('textarea[name="deskripsi_invoice"]').val()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()
        var formgrandtotal = $('#total_harga_keseluruhan').val()
        // var grand_total = $(formgrandtotal.find('.grand_total')[0]).html()
        // var total_pembayaran = grand_total.split('Rp.')[1].replace('.', '').replace('.', '').replace(',00', '')

        var datasparepart = $('#konfirmasi').children()
        for (let index = 0; index < datasparepart.length; index++) {
            var children = $(datasparepart[index]).children()
            var td = children[1]
            var span = $(td).children()[0]
            var id = $(span).attr('id')

            var tdqty = children[3]
            var qty = $(tdqty).html()
            
            var tdharga = children[4]
            var getharga = $(tdharga).html()
            var hargafix = getharga.split('Rp.')[1].replace('.', '').replace('.', '').replace(',00', '').trim()

            var tdhtotalarga = children[5]
            var gethargatotal = $(tdhtotalarga).html()
            var hargatotalfix = gethargatotal.split('Rp.')[1].replace('.', '').replace('.', '').replace(',00', '').trim()
           
            var id_bengkel = $('#id_bengkel').text()
            var obj = {
                    id_sparepart: id,
                    id_payable_invoice: id_payable_invoice,
                    id_bengkel: id_bengkel,
                    qty_rcv: qty,
                    harga_item: hargafix,
                    total_harga: hargatotalfix
                }
            dataform2.push(obj)
            console.log(obj)
        }

        if (dataform2.length == 0 | tanggal_invoice == '' | tenggat_invoice == '') {
                $('#alertsparepartkosong').show()
        } else {
            var data = {
                _token: _token,
                kode_invoice: kode_invoice,
                id_jenis_transaksi: id_jenis_transaksi,
                tanggal_invoice: tanggal_invoice,
                tenggat_invoice: tenggat_invoice,
                total_pembayaran: formgrandtotal,
                deskripsi_invoice: deskripsi_invoice,
                sparepart: dataform2
            }
            console.log(data)

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

    function tambahinvoice(event, id_sparepart) {
        var data = $('#sparepart-' + id_sparepart)
        var kode_sparepart = $(data.find('.kode_sparepart')[0]).text()
        var nama_sparepart = $(data.find('.nama_sparepart')[0]).text()
        var qty_rcv = $(data.find('.qty_rcv')[0]).text()
        var harga_diterima = $(data.find('.harga_diterima')[0]).text()
        var total_harga = $(data.find('.total_harga')[0]).text()
        var template = $($('#template_delete_button').html())

        var grandtotal = $('#total_harga_keseluruhan').val()
        var grandtotalsplit = total_harga.split('Rp.')[1].replace('.', '').replace('.', '').replace(',00', '').trim()
        var grandtotalfix = parseInt(grandtotal) + parseInt(grandtotalsplit)
        $('#total_harga_keseluruhan').val(grandtotalfix)

        var table = $('#dataTableInvoice').DataTable()
        var row = $(`#${$.escapeSelector(kode_sparepart.trim())}`).parent().parent()
        table.row(row).remove().draw();

        alert('Berhasil Menambahkan Detail Sparepart')

        $('#dataTableInvoice').DataTable().row.add([
            kode_sparepart, `<span id=${id_sparepart}>${kode_sparepart}</span>`, nama_sparepart, qty_rcv, harga_diterima, total_harga,
            kode_sparepart
        ]).draw();
    }

    function hapussparepart(element) {
        var table = $('#dataTableInvoice').DataTable()

        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        table.row(row).remove().draw();
        alert('Data Invoice Berhasil di Hapus')
        // draw() Reset Ulang Table
        var table = $('#dataTable').DataTable()

        // Akses Parent Sampai <tr></tr>
        var row2 = $(element).parent().parent()

        // Gaji diterima berkurang
        var biayarberkurang = $(row2.children()[5]).text()
        var grandtotal = $('#total_harga_keseluruhan').val()
        var grandtotalsplit = biayarberkurang.split('Rp.')[1].replace('.', '').replace('.', '').replace(',00', '').trim()
        var jumlahfix = parseInt(grandtotal) - parseInt(grandtotalsplit)
        $('#total_harga_keseluruhan').val(jumlahfix)
    }

    $(document).ready(function () {
        var tablercv = $('#dataTableRcv').DataTable()
        var tabledetail = $('#dataTableDetail').DataTable()

        var template = $('#template_delete_button').html()
        $('#dataTableInvoice').DataTable({
            "columnDefs": [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": template
                },
                {
                    "targets": 0,
                    "data": null,
                    'render': function (data, type, row, meta) {
                        return meta.row + 1
                    }
                }
            ]
        });

    });

</script>


@endsection
