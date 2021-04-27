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
                            <div class="page-header-icon" style="color: white"><i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <div class="page-header-subtitle mr-2" style="color: white">Tambah Data Invoice Supplier</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Invoice</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('invoice-payable.index') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
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
                            <div class="wizard-step-text-name">Formulir Invoice</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard2-tab" href="#wizard2" data-toggle="tab" role="tab"
                        aria-controls="wizard2" aria-selected="true">
                        <div class="wizard-step-icon">2</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Detail Item</div>
                            <div class="wizard-step-text-details">Sparepart Receiving</div>
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
                                <h5 class="card-title">Input Formulir Invoice</h5>
                                <form action="{{ route('invoice-payable.store') }}" id="form1" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_jenis_transaksi">Pilih Jenis Transaksi</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                            <div class="input-group input-group-joined">
                                                <div class="input-group-append">
                                                    <a href="" class="btn btn-sm btn-secondary" type="button" data-toggle="modal"
                                                        data-target="#Modaltransaksi">
                                                        Tambah
                                                    </a>
                                                </div>
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
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_invoice">Kode Invoice</label>
                                            <input class="form-control" id="kode_invoice" type="text" name="kode_invoice"
                                                placeholder="Input Kode Invoice" value="{{ $kode_invoice }}" readonly />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="id_rcv">Kode Receiving</label>
                                            <input class="form-control" id="id_rcv" type="text" name="id_rcv"
                                                placeholder="Input Kode Invoice" value="{{ $invoice->Rcv->kode_rcv }}" readonly />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="id_supplier">Supplier</label>
                                            <input class="form-control" id="id_supplier" type="text" name="id_supplier"
                                                placeholder="Input Kode Invoice" value="{{ $invoice->Rcv->Supplier->nama_supplier }}" readonly />
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1" for="kode_po">Kode PO</label>
                                            <input class="form-control" id="kode_po" type="text" name="kode_po"
                                                placeholder="Input Kode Invoice" value="{{ $invoice->Rcv->PO->kode_po }}" readonly />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label class="small mb-1" for="tanggal_invoice">Tanggal Invoice</label>
                                            <input class="form-control" id="tanggal_invoice" type="date" name="tanggal_invoice"
                                                placeholder="Input Tanggal Invoice" value="{{ old('tanggal_invoice') }}"
                                                class="form-control @error('tanggal_invoice') is-invalid @enderror" />
                                            @error('tanggal_invoice')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label class="small mb-1" for="tenggat_invoice">Tanggal Bayar Terakhir</label>
                                            <input class="form-control" id="tenggat_invoice" type="date" name="tenggat_invoice"
                                                placeholder="Input Tanggal Bayar Terakhir" value="{{ old('tenggat_invoice') }}"
                                                class="form-control @error('tenggat_invoice') is-invalid @enderror" />
                                            @error('tenggat_invoice')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="deskripsi_invoice">Deskripsi Keperluan</label>
                                            <textarea class="form-control" id="deskripsi_invoice" type="text" name="deskripsi_invoice" placeholder=""
                                                value="{{ old('deskripsi_invoice') }}"
                                                class="form-control @error('deskripsi_invoice') is-invalid @enderror"> </textarea>
                                            @error('deskripsi_invoice')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('invoice-payable.index') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary">Next</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    {{-- CARD 2 --}}
                    <div class="tab-pane fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
                        <div class="card-body">
                            <h3 class="text-primary">Step 2</h3>
                            <h5 class="card-title">Detail Sparepart Receive</h5>
                            <div class="datatable">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-hover dataTable" id="dataTableDetail"
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
                                                            style="width: 60px;">Kode Rcv</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 150px;">Nama Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 50px;">Jenis</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 50px;">Merk</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 30px;">Qty Rcv</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 50px;">Harga Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
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
                                                            <td class="harga_diterima">Rp.{{ number_format($item->pivot->harga_diterima,2,',','.') }}
                                                            </td>
                                                            <td class="total_harga">Rp.{{ number_format($item->pivot->total_harga,2,',','.') }}
                                                            </td>
                                                            
                                                            
                                                        </tr>
                                                    @empty
                                                        
                                                    @endforelse
                                                    <tr id="grandtotal">
                                                        <td colspan="7" class="text-center font-weight-500">
                                                            Total Harga
                                                        </td>
                                                        <td class="grand_total">Rp.{{ number_format($invoice->Rcv->grand_total,2,',','.') }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('invoice-payable.index') }}" class="btn btn-light">Kembali</a>
                            <button class="btn btn-primary" type="button" data-toggle="modal"
                            data-target="#Modalsumbit">Submit</button>
                        </div>
                    </div>

                    {{-- CARD 3 --}}
                   
                </div>
                </form>
            </div>
        </div>
    </div>
</main>

{{-- MODAL Jenis Transaksi --}}
<div class="modal fade" id="Modaltransaksi" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
        var kode_rcv = form1.find('input[name="id_rcv"]').val()
        var kode_invoice = form1.find('input[name="kode_invoice"]').val()
        var kode_po = form1.find('input[name="kode_po"]').val()
        var id_supplier = form1.find('input[name="id_supplier"]').val()
        var id_jenis_transaksi = $('#id_jenis_transaksi').val()
        var tanggal_invoice = form1.find('input[name="tanggal_invoice"]').val()
        var tenggat_invoice = form1.find('input[name="tenggat_invoice"]').val()
        var deskripsi_invoice = form1.find('textare[name="deskripsi_invoice"]').val()
  
        var formgrandtotal = $('#grandtotal')
        var grand_total = $(formgrandtotal.find('.grand_total')[0]).html()
        var total_pembayaran = grand_total.split('Rp.')[1].replace('.', '').replace('.', '').replace(',00', '')
     
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        for (var i = 0; i < sparepart.length; i++) {
            var data = $('#sparepart-' + id_sparepart)
            var total_harga = $($('#sparepart-'+ sparepart[i].id_sparepart).find('.total_harga')[0]).html()
            var splitqty = total_harga.split('Rp.')[1].replace('.', '').replace(',00', '')
            var qty_rcv = $($('#sparepart-'+ sparepart[i].id_sparepart).find('.qty_rcv')[0]).html()
            var harga_diterima = $($('#sparepart-'+ sparepart[i].id_sparepart).find('.harga_diterima')[0]).html()
            var harga_item = harga_diterima.split('Rp.')[1].replace('.', '').replace(',00', '')

          

            var id_sparepart = sparepart[i].id_sparepart
                var obj = {
                    id_sparepart: id_sparepart,
                    total_harga: splitqty,
                    qty_rcv: qty_rcv,
                    harga_item: harga_item,
                
                    
                }
                console.log(obj)

                dataform2.push(obj)

               
        }
    

        if (dataform2.length == 0) {
            var alert = $('#alertsparepartkosong').show()
        } else {
            var data = {
                _token: _token,
                kode_rcv: kode_rcv,
                kode_po: kode_po,
                kode_invoice: kode_invoice,
                id_supplier: id_supplier,
                id_jenis_transaksi: id_jenis_transaksi,
                tanggal_invoice: tanggal_invoice,
                tenggat_invoice: tenggat_invoice,
                total_pembayaran: total_pembayaran,
                deskripsi_invoice: deskripsi_invoice,
                sparepart: dataform2
            }

            console.log(data)

            $.ajax({
                method: 'put',
                url: '/Accounting/invoice-payable/'+ id_payable_invoice,
                data: data,
                success: function (response) {
                    window.location.href = '/Accounting/invoice-payable'

                },
                error: function(response){
                    console.log(response)
                }
            });
        }
    }

    $(document).ready(function () {
        var tablercv = $('#dataTableRcv').DataTable()
        var tabledetail = $('#dataTableDetail').DataTable()

    });


</script>


@endsection