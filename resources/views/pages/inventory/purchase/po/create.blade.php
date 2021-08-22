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
                            <div class="page-header-icon" style="color: white"><i class="fas fa-pallet"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Tambah Data Pembelian Sparepart</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Pembelian</span>
                            · Tambah · Data 
                            <span class="font-weight-500 text-primary" id="id_bengkel" style="display:none">{{ Auth::user()->bengkel->id_bengkel}}</span>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('purchase-order.index') }}"
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
                        <form action="{{ route('purchase-order.store') }}" id="form1" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="small mb-1" for="kode_po">Kode Pembelian</label>
                                <input class="form-control" id="kode_po" type="text" name="kode_po"
                                    placeholder="Input Kode Receiving" value="{{ $po->kode_po }}" readonly />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="id_pegawai">Pegawai</label>
                                <input class="form-control" id="id_pegawai" type="text" name="id_pegawai"
                                    placeholder="Input Kode Receiving" value="{{ Auth::user()->pegawai->nama_pegawai }}" readonly />
                            </div>
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="id_supplier">Supplier</label>
                                <input class="form-control" id="id_supplier" type="text" name="id_supplier"
                                    placeholder="Input Tanggal Receive" value="{{ $po->Supplier->nama_supplier }}"
                                    class="form-control @error('id_supplier') is-invalid @enderror" readonly />
                                @error('id_supplier')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="tanggal_po">Tanggal PO</label><span
                                    class="mr-4 mb-3" style="color: red">*</span>
                                <input class="form-control" id="tanggal_po" type="date" name="tanggal_po"
                                    placeholder="Input Tanggal Receive" value="{{ $po->tanggal_po }}"
                                    class="form-control @error('tanggal_po') is-invalid @enderror" />
                                @error('tanggal_po')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group text-right">
                                <hr>
                                <a href="{{ route('purchase-order.index') }}" class="btn btn-sm btn-light">Kembali</a>
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
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 20px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 30px;">Kode</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 150px;">Nama Sparepart</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 50px;">Merk</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 40px;">Kemasan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 20px;">Stock</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 60px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Actions: activate to sort column ascending"
                                                        style="width: 10px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($po->Supplier->Sparepart as $item)
                                                <tr id="item-{{ $item->id_sparepart }}" role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                                    <td class="kode_sparepart">{{ $item->kode_sparepart }}</td>
                                                    <td class="nama_sparepart">{{ $item->nama_sparepart }}</td>
                                                    <td class="merk_sparepart">{{ $item->Merksparepart->merk_sparepart }}</td>
                                                    <td class="kemasan">{{ $item->Kemasan->nama_kemasan }}
                                                    </td>
                                                    <td class="text-center stock">{{ $item->stock }}</td>
                                                    <td class="text-center status">
                                                        @if($item->status_jumlah == 'Cukup')
                                                        <span class="badge badge-success">
                                                            @elseif($item->status_jumlah == 'Habis')
                                                            <span class="badge badge-danger">
                                                                @elseif($item->status_jumlah == 'Kurang')
                                                                <span class="badge badge-warning">
                                                                @else
                                                                <span>
                                                                    @endif
                                                                    {{ $item->status_jumlah }}
                                                                </span>
                                                    </td>
                                                    {{-- <td class="harga_beli">@if ($item->Hargasparepart == '' | $item->Hargasparepart == '0')
                                                        <span class="text-center">Tidak ada Harga</span> 
                                                    @else Rp.{{ number_format($item->Hargasparepart->harga_beli,2,',','.') }}
                                                    @endif
                                                    </td> --}}
                                                    <td>
                                                        <button id="{{ $item->kode_sparepart }}-button" class="btn btn-success btn-datatable" type="button" data-toggle="modal"
                                                            data-target="#Modaltambah-{{ $item->id_sparepart }}">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">
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

    <div class="container">
        <div class="card">
            <div class="card card-header-actions">
                <div class="card-header ">Detail Pembelian Sparepart
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
                                <table class="table table-bordered table-hover dataTable" id="dataTableKonfirmasi"
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
                                                style="width: 30px;">Kode</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Nama Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Start date: activate to sort column ascending"
                                                style="width: 50px;">Merk</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 40px;">Kemasan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 20px;">Quantity</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 60px;">Harga Beli</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 60px;">Total Harga</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Actions: activate to sort column ascending"
                                                style="width: 10px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($po->Detailsparepart as $item)
                                        <tr id="gas-{{ $item->id_sparepart }}" role="row" class="odd">
                                            {{-- <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th> --}}
                                            <td></td>
                                            <td class="kode_sparepartedit"><span id="{{ $item->kode_sparepart }}">{{ $item->kode_sparepart }}</span></td>
                                            <td class="nama_sparepartedit">{{ $item->nama_sparepart }}</td>
                                            <td class="merk_sparepartedit">{{ $item->Merksparepart->merk_sparepart }}</td>
                                            <td class="kemasanedit">{{ $item->Kemasan->nama_kemasan }}</td>
                                            <td class="qtyedit">{{ $item->pivot->qty }}</td>
                                            <td class="total_hargaedit">Rp {{ number_format($item->pivot->harga_satuan,2,',','.')}}</td>
                                            <td class="total_hargaedit">Rp {{ number_format($item->pivot->total_harga,2,',','.')}}</td>
                                            {{-- <td class="harga_beli">@if ($item->Hargasparepart == '' | $item->Hargasparepart == '0')
                                                <span class="text-center">Tidak ada Harga</span> 
                                            @else Rp.{{ number_format($item->Hargasparepart->harga_beli,2,',','.') }}
                                            @endif
                                            </td> --}}
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

{{-- MODAL TAMBAH SPAREPART --}}
{{-- @forelse ($po->Supplier->Sparepart as $item) --}}
@forelse ($po->Supplier->Sparepart as $item)
<div class="modal fade" id="Modaltambah-{{ $item->id_sparepart }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Jumlah Pesanan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" id="form-{{ $item->id_sparepart }}" class="d-inline">
                <div class="modal-body">
                    <div class="small mb-2">
                        <span class="font-weight-500 text-primary">{{ $item->nama_sparepart }}</span>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="qty">Masukan Quantity Pesanan</label>
                        <input class="form-control" name="qty" type="text" id="qty" placeholder="Input Jumlah Pesanan"
                            value="{{ $item->qty }}"></input>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="harga_diterima">Harga Satuan</label>
                        <input class="form-control harga_diterima" name="harga_diterima" type="number"
                            id="harga_diterima" placeholder="Input Harga Beli diterima"
                            value="{{ $item->harga_satuan !=  null ? $item->harga_satuan : $item->Kartugudangterakhir['harga_beli'] }}"></input>
                        <div class="small text-primary">Detail Harga
                            <span id="detailhargaditerima" class="detailhargaditerima">
                                @if ($item->Kartugudangterakhir == '')

                                @else
                                Rp.{{ number_format($item->Kartugudangterakhir->harga_beli,2,',','.')}}
                                @endif

                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" onclick="konfirmsparepart(event, {{ $item->id_sparepart }})"
                        type="button" data-dismiss="modal">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse

{{-- @forelse ($po->Supplier->Sparepart as $sparepart) --}}
@forelse ($po->Supplier->Sparepart as $item)
<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Form Pembelian</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">Apakah Form yang Anda inputkan sudah benar?</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button"
                    onclick="tambahsparepart(event,{{ $po->Supplier->Sparepart }},{{ $po->id_po }})">Ya Sudah!</button>
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
    <button class="btn btn-primary btn-datatable" onclick="editsparepart(this)" type="button">
        <i class="fas fa-edit"></i>
    </button>
</template>

<template id="template_add_button">
    <button class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="#Modaltambah">
        <i class="fas fa-plus"></i>
    </button>
</template>

<script>
    function tambahsparepart(event, sparepart, id_po) {
        event.preventDefault()
        var form1 = $('#form1')
        var kode_po = form1.find('input[name="kode_po"]').val()
        var id_supplier = $('#id_supplier').val()
        var id_pegawai =form1.find('input[name="id_pegawai"]').val()
        var tanggal_po = form1.find('input[name="tanggal_po"]').val()
        var approve_po = form1.find('input[name="approve_po"]').val()
        var approve_ap = form1.find('input[name="approve_ap"]').val()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()
      
        for (var i = 0; i < sparepart.length; i++) {
            var form = $('#form-' + sparepart[i].id_sparepart)
            var qty = form.find('input[name="qty"]').val()
            var harga_satuan = form.find('input[name="harga_diterima"]').val()
            var id_bengkel = $('#id_bengkel').text()
            var total_harga = qty * harga_satuan
          
            if (qty == 0 | qty == '') {
                continue
            } else {
                var id_sparepart = sparepart[i].id_sparepart
                var obj = {
                    id_sparepart: id_sparepart,
                    qty: qty,
                    qty_po_sementara: qty,
                    id_bengkel: id_bengkel,
                    total_harga: total_harga,
                    harga_satuan: harga_satuan
                }
                dataform2.push(obj)
            }
        }

        if (dataform2.length == 0) {
            var alert = $('#alertsparepartkosong').show()
            
        } else {
            var data = {
                _token: _token,
                kode_po: kode_po,
                id_supplier: id_supplier,
                id_pegawai: id_pegawai,
                tanggal_po: tanggal_po,
                approve_po: approve_po,
                approve_ap: approve_ap,
                sparepart: dataform2
            }
            console.log(data)

            $.ajax({
                method: 'put',
                url: '/inventory/purchase-order/' + id_po,
                data: data,
                success: function (response) {
                    window.location.href = '/inventory/purchase-order'

                },
                error: function (response) {
                    console.log(response)
                }
            });
        }
    }

    function konfirmsparepart(event, id_sparepart) {
        var form = $('#form-' + id_sparepart)
        var qty = form.find('input[name="qty"]').val()
        var harga_satuan = form.find('input[name="harga_diterima"]').val()
        var harga_fix = new Intl.NumberFormat('id', {
            style: 'currency',
            currency: 'IDR'
        }).format(harga_satuan)

        var total_harga = new Intl.NumberFormat('id', {
            style: 'currency',
            currency: 'IDR'
        }).format(qty * harga_satuan)

        if (qty == 0 | qty == '' | harga_diterima == '' | harga_diterima == 0) {
            alert('Terdapat Data Kosong')
        } else {
            alert('Berhasil Menambahkan Sparepart')
            var data = $('#item-' + id_sparepart)
            var kode_sparepart = $(data.find('.kode_sparepart')[0]).text()
            var nama_sparepart = $(data.find('.nama_sparepart')[0]).text()
            var merk_sparepart = $(data.find('.merk_sparepart')[0]).text()
            var kemasan = $(data.find('.kemasan')[0]).text()
            var template = $($('#template_delete_button').html())
           
            //Delete Data di Table Konfirmasi sebelum di add
            var table = $('#dataTableKonfirmasi').DataTable()
            // Akses Parent Sampai <tr></tr> berdasarkan id kode sparepart
            var row = $(`#${$.escapeSelector(kode_sparepart.trim())}`).parent().parent()
            table.row(row).remove().draw();

            $('#dataTableKonfirmasi').DataTable().row.add([
                kode_sparepart, `<span id=${kode_sparepart}>${kode_sparepart}</span>`, nama_sparepart,
                merk_sparepart, kemasan, qty, harga_fix, total_harga,
            ]).draw();
        }
    }

    function hapussparepart(element) {
        var table = $('#dataTableKonfirmasi').DataTable()
        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        console.log(row)
        table.row(row).remove().draw();
        alert('Data Sparepart Berhasil di Hapus')
        // draw() Reset Ulang Table
        var table = $('#dataTable').DataTable()
    }

    function editsparepart(element){
        var table = $('#dataTableKonfirmasi').DataTable()
        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
 
        var children = $(row).children()[1]
        console.log(children)
        var kode = $($(children).children()[0]).html().trim()
        console.log(kode)
        $(`#${$.escapeSelector(kode)}-button`).trigger('click');
    }

    // 
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

        var table = $('#dataTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, ]
            ]
        })

        var template = $('#template_delete_button').html()
        $('#dataTableKonfirmasi').DataTable({
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
        // var tablekonfirmasi = $('#dataTableKonfirmasi').DataTable({
        //     "pageLength": 5,
        //     "lengthMenu": [
        //         [5, 10, 20, -1],
        //         [5, 10, 20, ]
        //     ]
        // })
    });

</script>



@endsection
