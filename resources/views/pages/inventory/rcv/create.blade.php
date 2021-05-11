@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon" style="color: white"><i class="fas fa-dolly-flatbed"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Tambah Data Penerimaan</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Receiving</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('Rcv.destroy', $rcv->id_rcv) }}"
                            class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-n10">
        <div class="row">
            <div class="col-lg-3">
                <div class="card mb-4">
                    <div class="card-header">Detail Formulir Pembelian
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Rcv.store') }}" id="form1" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="kode_rcv">Kode Receiving</label>
                                <input class="form-control" id="kode_rcv" type="text" name="kode_rcv"
                                    placeholder="Input Kode Receiving" value="{{ $kode_rcv }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="id_pegawai">Pegawai</label>
                                <select class="form-control" name="id_pegawai" id="id_pegawai"
                                    class="form-control @error('id_supplier') is-invalid @enderror">
                                    <option>Pilih Pegawai</option>
                                    @foreach ($pegawai as $item)
                                    <option value="{{ $item->id_pegawai }}">{{ $item->nama_pegawai }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('id_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="tanggal_rcv">Tanggal Receive</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
                                <input class="form-control" id="tanggal_rcv" type="date" name="tanggal_rcv"
                                    placeholder="Input Tanggal Receive" value="{{ $rcv->tanggal_rcv }}"
                                    class="form-control @error('tanggal_rcv') is-invalid @enderror" />
                                @error('tanggal_rcv')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="kode_po">Kode PO</label>
                                <input class="form-control" id="kode_po" type="text" name="kode_po"
                                    placeholder="Kode PO" value="{{ $rcv->PO->kode_po }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="id_supplier">Supplier</label>
                                <input class="form-control" id="id_supplier" type="text" name="id_supplier"
                                    placeholder="Supplier" value="{{ $rcv->Supplier->nama_supplier }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="no_do">Nomor DO</label><span class="mr-4 mb-3"
                                    style="color: red">*</span>
                                <input class="form-control" id="no_do" type="text" name="no_do"
                                    placeholder="Input Nomor Delivery Order" value="{{ $rcv->no_do }}">
                            </div>

                            <div class="form-group text-right">
                                <hr>
                                <a href="{{ route('Rcv.index') }}" class="btn btn-sm btn-light">Kembali</a>
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                    data-target="#Modalsumbit">Simpan</button>
                            </div>
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
                                <h5 class="alert-heading" class="small">Sparepart</h5>
                                Info Sparepart Pembelian
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
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 20px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 40px;">Kode</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 85px;">Sparepart</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 50px;">Merk Sparepart</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 60px;">Jumlah dipesan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 40px;">Kemasan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 40px;">Harga Beli</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Actions: activate to sort column ascending"
                                                        style="width: 20px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($rcv->PO->Detailsparepart as $item)
                                                <tr id="item-{{ $item->id_sparepart }}" role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td class="kode_sparepart">{{ $item->kode_sparepart }}</td>
                                                    <td class="nama_sparepart">{{ $item->nama_sparepart }}</td>

                                                    <td class="merk_sparepart">
                                                        {{ $item->Merksparepart->merk_sparepart }}</td>
                                                    <td class="qty">{{ $item->pivot->qty_po_sementara }}</td>
                                                    <td class="satuan">{{ $item->Kemasan->nama_kemasan }}</td>
                                                    <td>@if ($item->pivot->harga_satuan == '')
                                                        <div class="small text-muted d-none d-md-block">Tidak ada
                                                            data
                                                        </div>
                                                        @else
                                                        <div class="harga_beli">
                                                            Rp.{{ number_format($item->pivot->harga_satuan,2,',','.') }}
                                                        </div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="" class="btn btn-success btn-datatable" type="button"
                                                            data-toggle="modal"
                                                            data-target="#Modaltambah-{{ $item->id_sparepart }}">
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
            </div>
        </div>
    </div>


    <div class="container">
        <div class="card">
            <div class="card card-header-actions">
                <div class="card-header ">Detail Pembelian Sparepart
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Detail Sparepart</h5>
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
                                <table class="table table-bordered table-hover dataTable" id="dataTablekonfirmasi"
                                    width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                    style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">
                                                No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 100px;">
                                                Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 70px;">
                                                Merk</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 70px;">
                                                Satuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 70px;">
                                                Jumlah PO</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 80px;">
                                                Jumlah Rcv</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 80px;">
                                                Harga Beli</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 80px;">
                                                Keterangan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 60px;">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id='konfirmasi'>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
</main>


{{-- MODAL TAMBAH QTY SPAREPART --}}
@forelse ($rcv->PO->Detailsparepart as $item)
<div class="modal fade" id="Modaltambah-{{ $item->id_sparepart }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Receiving</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" id="form-{{ $item->id_sparepart }}" class="d-inline">
                <div class="modal-body">
                    <h6>Detail Pesanan</h6>
                    <div class="small mb-2">
                        <span class="font-weight-500 text-primary">{{ $item->nama_sparepart }}</span>
                    </div>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="d-flex flex-column font-weight-bold">
                                <label class="small text-muted line-height-normal">Jenis
                                    {{ $item->Merksparepart->Jenissparepart->jenis_sparepart }}, Merk
                                    {{ $item->Merksparepart->merk_sparepart }}
                            </div>
                        </div>
                        <div class="col">
                            <label class="small text-muted line-height-normal">
                                Qty Pesanan: {{ $item->pivot->qty_po_sementara }}
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1 mr-1" for="qty_rcv">Quantity Receive</label><span class="mr-4 mb-3" style="color: red">*</span>
                            <input class="form-control" name="qty_rcv" type="number" id="qty_rcv"
                                placeholder="Input Quantity Rcv" value="{{ old('qty_rcv') }}"></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="harga_diterima">Harga diterima</label>
                            <input class="form-control harga_diterima" name="harga_diterima" type="number"
                                placeholder="Input Harga Beli diterima" value="{{ $item->pivot->harga_satuan }}">
                            </input>
                            <div class="small text-primary">Detail Harga :
                                <span id="detailhargaditerima"
                                    class="detailhargaditerima">Rp.{{ number_format($item->pivot->harga_satuan,2,',','.')}}</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="keterangan">Masukan Keterangan Penerimaan</label>
                        <textarea class="form-control" name="keterangan" type="text" id="keterangan"
                            placeholder="Input Keterangan diterima">{{ old('keterangan') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" onclick="konfirmsparepart(event,{{ $item->id_sparepart }})"
                        type="button" data-dismiss="modal">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse


@forelse ($rcv->PO->Detailsparepart as $sparepart)
<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Form Penerimaan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">Apakah Form Receiving dengan kode {{ $kode_rcv }} yang Anda inputkan sudah
                    benar?</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button"
                    onclick="tambahrcv(event,{{ $rcv->PO->Detailsparepart }},{{ $rcv->id_rcv }})">Ya!Sudah</button>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse

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
    function tambahrcv(event, sparepart, id_rcv) {
        event.preventDefault()
        var form1 = $('#form1')
        var kode_rcv = form1.find('input[name="kode_rcv"]').val()
        var kode_po = form1.find('input[name="kode_po"]').val()
        var no_do = form1.find('input[name="no_do"]').val()
        var id_supplier = $('#id_supplier').val()
        var id_pegawai = $('#id_pegawai').val()
        var tanggal_rcv = form1.find('input[name="tanggal_rcv"]').val()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        for (var i = 0; i < sparepart.length; i++) {
            var form = $('#form-' + sparepart[i].id_sparepart)
            var qty_po = $($('#item-' + sparepart[i].id_sparepart).find('.qty')[0]).html()
            var qty_rcv = form.find('input[name="qty_rcv"]').val()
            var keterangan = form.find('textarea[name="keterangan"]').val()
            var harga_diterima = form.find('input[name="harga_diterima"]').val()
            var total_harga = qty_rcv * harga_diterima

            if (qty_rcv == 0 | qty_rcv == '' | harga_diterima == 0 | harga_diterima == '') {
                continue
            } else {
                var id_sparepart = sparepart[i].id_sparepart
                var obj = {
                    id_sparepart: id_sparepart,
                    id_rcv: id_rcv,
                    qty_rcv: qty_rcv,
                    qty_po: qty_po,
                    keterangan: keterangan,
                    harga_diterima: harga_diterima,
                    total_harga: total_harga,
                }

                dataform2.push(obj)
            }
        }

        if (dataform2.length == 0) {
            var alert = $('#alertsparepartkosong').show()
        } else {
            var data = {
                _token: _token,
                kode_rcv: kode_rcv,
                kode_po: kode_po,
                id_supplier: id_supplier,
                id_pegawai: id_pegawai,
                tanggal_rcv: tanggal_rcv,
                sparepart: dataform2
            }

            console.log(data)

            $.ajax({
                method: 'put',
                url: '/inventory/receiving/' + id_rcv,
                data: data,
                success: function (response) {
                    window.location.href = '/inventory/receiving'

                },
                error: function (response) {
                    console.log(response)
                }
            });
        }
    }


    function konfirmsparepart(event, id_sparepart) {
        var form = $('#form-' + id_sparepart)
        var qty_rcv = form.find('input[name="qty_rcv"]').val()
        var harga_diterima = form.find('input[name="harga_diterima"]').val()
        var harga_diterima_fix = new Intl.NumberFormat('id', {
            style: 'currency',
            currency: 'IDR'
        }).format(harga_diterima)
        var keterangan = form.find('textarea[name="keterangan"]').val()

        if (qty_rcv == 0 | qty_rcv == '' | harga_diterima_fix == 0 | harga_diterima_fix == '') {
            alert('Data Inputan Ada yang belum terisi')
        } else {
            var data = $('#item-' + id_sparepart)
            var qty = $(data.find('.qty')[0]).text()

            // Kondisi tidak boleh melebihi qty po
            if(parseInt(qty_rcv) > parseInt(qty)  ){
                alert('Qty Rcv tidak boleh melebihi Qty PO')
            }else{
                alert('Berhasil Menambahkan Sparepart')
                var kode_sparepart = $(data.find('.kode_sparepart')[0]).text()
                var nama_sparepart = $(data.find('.nama_sparepart')[0]).text()
                var jenis_sparepart = $(data.find('.jenis_sparepart')[0]).text()
                var merk_sparepart = $(data.find('.merk_sparepart')[0]).text()
                var satuan = $(data.find('.satuan')[0]).text()
                var qty = $(data.find('.qty')[0]).text()
                var harga_beli = $(data.find('.harga_beli')[0]).text()
                var template = $($('#template_delete_button').html())
                var table = $('#dataTablekonfirmasi').DataTable()
                // Akses Parent Sampai <tr></tr> berdasarkan id kode sparepart
                var row = $(`#${$.escapeSelector(nama_sparepart.trim())}`).parent().parent()
                table.row(row).remove().draw();
        
                $('#dataTablekonfirmasi').DataTable().row.add([
                    nama_sparepart, `<span id=${nama_sparepart}>${nama_sparepart}</span>`, merk_sparepart, satuan,
                    qty, qty_rcv, harga_diterima_fix, keterangan
                ]).draw();
            }
        }
    }

    function hapussparepart(element) {
        var table = $('#dataTablekonfirmasi').DataTable()
        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        table.row(row).remove().draw();
        alert('Data Sparepart Berhasil di Hapus')
        // draw() Reset Ulang Table
        var table = $('#dataTable').DataTable()
    }

    $(document).ready(function () {
        $('.harga_diterima').each(function () {
            $(this).on('input', function () {
                var harga = $(this).val()
                var harga_fix = new Intl.NumberFormat('id', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(harga)

                var harga_paling_fix = $(this).parent().find('.detailhargaditerima')
                $(harga_paling_fix).html(harga_fix);
            })
        })

        var template = $('#template_delete_button').html()
        $('#dataTablekonfirmasi').DataTable({
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
