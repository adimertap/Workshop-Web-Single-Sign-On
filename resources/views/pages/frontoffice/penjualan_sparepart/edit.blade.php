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
                            <div class="page-header-icon" style="color: white"><i class="fas fa-pallet"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Edit Data Penjualan Sparepart</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Penjualan</span>
                            · Edit · Data
                            <span class="font-weight-500 text-primary" id="id_bengkel"
                                style="display:none">{{ Auth::user()->bengkel->id_bengkel}}</span>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('penjualansparepart.index') }}"
                            class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-n10 col-8">
        <div class="card mb-4">
            <div class="card-header">Detail Formulir Penjualan
            </div>
            <div class="card-body">
                <form action="{{ route('penjualansparepart.store') }}" id="form1" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="small mb-1" for="kode_penjualan">Kode Penjualan</label>
                            <input class="form-control" id="kode_penjualan" name="kode_penjualan" type="text"
                                value="{{ $penjualan->kode_penjualan }}" readonly />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="small mb-1" for="id_pegawai">Nama Pegawai</label>
                            <input class="form-control" id="id_pegawai" name="id_pegawai" type="text"
                                placeholder="Enter your last name" value="{{Auth::user()->pegawai->nama_pegawai}}"
                                readonly />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="small mb-1" for="tanggal">Tanggal
                            </label>
                            <input class="form-control" id="tanggal" type="date" name="tanggal"
                                placeholder="Masukkan Tanggal" value="{{ $penjualan->tanggal }}" readonly />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="small mb-1" for="id_customer_bengkel">Customer Bengkel
                            </label>
                            <input class="form-control" id="id_customer_bengkel" type="text" name="id_customer_bengkel"
                                value="{{ $penjualan->Customer->nama_customer }}" readonly />
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
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
                        Sparepart Pesanan Penjualan
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
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 60px;">Kode</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Nama Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Jenis Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 50px;">Merk</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 20px;">Satuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 20px;">Stock</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 20px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sparepart as $item)
                                        <tr id="item-{{ $item->id_sparepart }}" role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">
                                                {{ $loop->iteration}}</th>
                                            <td class="kode_sparepart">
                                                {{ $item->kode_sparepart }}</td>
                                            <td class="nama_sparepart">
                                                {{ $item->nama_sparepart }}</td>
                                            <td class="jenis_sparepart">
                                                {{ $item->Jenissparepart->jenis_sparepart }}
                                            </td>
                                            <td class="merk_sparepart">
                                                {{ $item->Merksparepart->merk_sparepart }}</td>
                                            <td class="satuan">{{ $item->Konversi->satuan }}
                                            </td>
                                            <td class="stock">{{ $item->stock }}</td>
                                            <td>
                                                <button id="{{ $item->kode_sparepart }}-button"
                                                    class="btn btn-success btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaltambah-{{ $item->id_sparepart }}">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </td>
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

    <div class="container-fluid">
        <div class="card">
            <div class="card card-header-actions">
                <div class="card-header ">Detail Penjualan Sparepart
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
                                                style="width: 80px;">
                                                Kode</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 180px;">
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
                                                style="width: 40px;">
                                                Harga Jual</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 20px;">
                                                Quantity</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 20px;">
                                                Total Harga</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 100px;">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id='konfirmasi'>
                                        @forelse ($penjualan->detailsparepart as $item)
                                        <tr id="item-{{ $item->id_sparepart }}" role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">
                                                {{ $loop->iteration}}</th>
                                            <td class="kode_sparepart">
                                                {{ $item->kode_sparepart }}</td>
                                            <td class="nama_sparepart">
                                                {{ $item->nama_sparepart }}</td>
                                            <td class="jenis_sparepart">
                                                {{ $item->Jenissparepart->jenis_sparepart }}
                                            </td>
                                            <td class="merk_sparepart">
                                                {{ $item->Merksparepart->merk_sparepart }}</td>
                                            <td class="satuan">{{ $item->Konversi->satuan }}
                                            </td>
                                            <td class="stock">{{ $item->pivot->harga }}</td>
                                            <td class="stock">{{ $item->pivot->jumlah }}</td>
                                            <td class="stock">{{ $item->pivot->total_harga }}</td>
                                            <td>
                                                <button id="{{ $item->kode_sparepart }}-button"
                                                    class="btn btn-success btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaltambah-{{ $item->id_sparepart }}">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                            </td>
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


        <div class="form-group text-center">
            <hr>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#Modalsumbit">Simpan
                Data</button>
        </div>
        </form>
    </div>
</main>

{{-- Modal Customer --}}
<div class="modal fade" id="ModalCustomer" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">Pilih Customer</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableCustomer"
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
                                                style="width: 50px;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 120px;">Alamat</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 60px;">No. Telp</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 60px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($customer as $item)
                                        <tr id="tes-{{$item->id_customer_bengkel}}" role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td class="nama_customer">{{ $item->nama_customer }}</td>
                                            <td class="alamat_customer">{{ $item->alamat_customer }}</td>
                                            <td class="nohp_customer">{{ $item->nohp_customer }}</td>
                                            <td class="email_customer">{{ $item->email_customer }}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm"
                                                    onclick="tambahcustomer(event, {{ $item->id_customer_bengkel }})"
                                                    type="button" data-dismiss="modal">Tambah
                                                </button>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="tex-center">
                                                Data Receiving Kosong
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
                    onclick="tambahsparepart(event,{{ $sparepart }})">Ya Sudah!</button>
            </div>
        </div>
    </div>
</div>

{{-- MODAL TAMBAH SPAREPART --}}
@forelse ($sparepart as $item)
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
                    <div class="form-group">
                        <label class="small mb-1" for="jumlah">Masukan Quantity Pesanan</label>
                        <input class="form-control" name="jumlah" type="text" id="jumlah"
                            placeholder="Input Jumlah Pesanan" value="{{ old('jumlah') }}"></input>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="harga">Harga</label>
                        <input class="form-control" name="harga" type="text" id="harga"
                            placeholder="Input Jumlah Pesanan"
                            value="{{ isset($item->Kartugudangpenjualan['harga_beli']) }}"></input>
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

<template id="template_delete_button">
    <button class="btn btn-danger btn-datatable" onclick="hapussparepart(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
    <button class="btn btn-primary btn-datatable" onclick="editSparepart(this)" type="button">
        <i class="fas fa-edit"></i>
    </button>
</template>

<template id="template_add_button">
    <button class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="#Modaltambah">
        <i class="fas fa-plus"></i>
    </button>

</template>

{{-- javascript --}}
<script>
    function tambahcustomer(event, id_customer_bengkel) {
        var data = $('#tes-' + id_customer_bengkel)
        var _token = $('#form1').find('input[name="_token"]').val()
        var nama_customer = $(data.find('.nama_customer')[0]).text()

        $('#detailcustomer').val(nama_customer)
    }

    function tambahsparepart(event, sparepart) {
        event.preventDefault()
        var form1 = $('#form1')
        var kode_penjualan = form1.find('input[name="kode_penjualan"]').val()
        var nama_customer = $('#detailcustomer').val()
        var tanggal = form1.find('input[name="tanggal"]').val()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        for (var i = 0; i < sparepart.length; i++) {
            var form = $('#form-' + sparepart[i].id_sparepart)
            var jumlah = form.find('input[name="jumlah"]').val()
            var harga = form.find('input[name="harga"]').val()
            var total_harga = jumlah * harga
            var id_bengkel = $('#id_bengkel').text()

            if (jumlah == 0 | jumlah == '') {
                continue
            } else {
                var id_sparepart = sparepart[i].id_sparepart
                var obj = {
                    id_sparepart: id_sparepart,
                    jumlah: jumlah,
                    total_harga: total_harga,
                    harga: harga,
                    id_bengkel: id_bengkel
                }
                dataform2.push(obj)
            }

        }

        if (dataform2.length == 0) {
            var alert = $('#alertsparepartkosong').show()
        } else {
            var data = {
                _token: _token,
                kode_penjualan: kode_penjualan,
                nama_customer: nama_customer,
                tanggal: tanggal,
                sparepart: dataform2
            }

            console.log(data)

            $.ajax({
                method: 'post',
                url: '/frontoffice/penjualansparepart',
                data: data,
                success: function (response) {
                    window.location.href = '/frontoffice/penjualansparepart'
                },
                error: function (response) {
                    console.log(response)
                }
            });
        }

        // dataTablekonfirmasi
    }

    function konfirmsparepart(event, id_sparepart) {
        var form = $('#form-' + id_sparepart)
        var jumlah = form.find('input[name="jumlah"]').val()
        var harga = form.find('input[name="harga"]').val()
        if (jumlah == 0 | jumlah == '' | harga == 0 | harga == '') {
            alert('Jumlah Kosong')
        } else {

            var data = $('#item-' + id_sparepart)
            var stock = $(data.find('.stock')[0]).text()

            // Kondisi tidak boleh melebihi qty po
            if (parseInt(jumlah) > parseInt(stock)) {
                alert('Qty Stock tidak Memenuhi')
            } else {
                alert('Berhasil Menambahkan Sparepart')
                var kode_sparepart = $(data.find('.kode_sparepart')[0]).text()
                var nama_sparepart = $(data.find('.nama_sparepart')[0]).text()
                var jenis_sparepart = $(data.find('.jenis_sparepart')[0]).text()
                var merk_sparepart = $(data.find('.merk_sparepart')[0]).text()
                var satuan = $(data.find('.satuan')[0]).text()
                var template = $($('#template_delete_button').html())
                var total = new Intl.NumberFormat('id', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(jumlah * harga)

                var hargaidr = new Intl.NumberFormat('id', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(harga)

                //Delete Data di Table Konfirmasi sebelum di add
                var table = $('#dataTablekonfirmasi').DataTable()
                // Akses Parent Sampai <tr></tr> berdasarkan id kode sparepart
                var row = $(`#${$.escapeSelector(kode_sparepart.trim())}`).parent().parent()
                table.row(row).remove().draw();

                $('#dataTablekonfirmasi').DataTable().row.add([
                    kode_sparepart, `<span id=${kode_sparepart}>${kode_sparepart}</span>`, nama_sparepart,
                    jenis_sparepart, merk_sparepart, satuan,
                    hargaidr, jumlah, total,
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

    function editSparepart(element) {
        var table = $('#dataSparepart').DataTable()
        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        var children = $(row).children()[1]
        console.log(children)
        var kode = $($(children).children()[0]).html().trim()

        $(`#${$.escapeSelector(kode)}-button`).trigger('click');
    }


    $(document).ready(function () {
        var table = $('#dataTableCustomer').DataTable()

        $('#tanggal').on('change', function () {
            var select = $(this)
            var textdate = select.val()
            var splitdate = textdate.split('-')
            console.log(splitdate)
            var datefix = new Date(splitdate[0], splitdate[1] - 1, splitdate[2])
            var formatindodate = new Intl.DateTimeFormat('id', {
                dateStyle: 'long'
            }).format(datefix)
            $('#detailtanggal').html(formatindodate);

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
