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
                            <div class="page-header-subtitle" style="color: white">Tambah Data Opname</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Stock Opname</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('Opname.index') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card-header">Detail Formulir Pembelian
            </div>
            <div class="card-body">
                <form action="{{ route('Opname.store') }}" id="form1" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="small mb-1" for="kode_opname">Kode Opname</label>
                            <input class="form-control" id="kode_opname" type="text" name="kode_opname"
                                placeholder="Input Kode Opname" value="{{ $kode_opname }}" readonly />
                        </div>
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
                            <label class="small mb-1" for="approve">Approval</label>
                            <input class="form-control" id="approve" type="text" name="approve" value="Pending" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="small mb-1 mr-1" for="tanggal_opname">Tanggal Opname</label><span
                                class="mr-4 mb-3" style="color: red">*</span>
                            <input class="form-control" id="tanggal_opname" type="date" name="tanggal_opname"
                                placeholder="Input Tanggal Opname" value="{{ old('tanggal_opname') }}"
                                class="form-control @error('tanggal_opname') is-invalid @enderror" />
                            @error('tanggal_opname')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                    <div class="form-group text-right">
                        <hr>
                        <a href="{{ route('Opname.index') }}" class="btn btn-sm btn-light">Kembali</a>
                        <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                            data-target="#Modalsumbit">Simpan</button>
                    </div>
            </div>
        </div>

   
            <div class="card mb-4">
                <div class="card card-header-actions">
                    <div class="card-header ">List Sparepart
                    </div>
                </div>
                <div class="card-body">
                    
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
                                                    style="width: 20px;">
                                                    No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 60px;">Kode</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 70px;">Nama Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 50px;">Merk</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 80px;">Stock Real</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                                    style="width: 50px;">Selisih</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Salary: activate to sort column ascending"
                                                    style="width: 20px;">Satuan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Salary: activate to sort column ascending"
                                                    style="width: 60px;">Keterangan</th>
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
                                                <td class="merk_sparepart">
                                                    {{ $item->Merksparepart->merk_sparepart }}</td>
                                                <td><input class="form-control form-control-sm" id="stock-real-{{ $item->id_sparepart }}" onchange="calculateSelisih({{ $item->id_sparepart }}, {{ $item->stock }})" type="number" 
                                                    placeholder="Input Stock Real"/>
                                                </td>
                                                <td><input class="form-control form-control-sm" id="selisih-{{ $item->id_sparepart }}" type="text"  disabled/>
                                                </td>
                                                <td class="satuan">{{ $item->Konversi->satuan }}</td>
                                                <td><input class="form-control form-control-sm" id="keterangan-{{ $item->id_sparepart }}" type="text" 
                                                    placeholder="Input Keterangan"/>
                                                </td>
                                                <td>  <button class="btn btn-success btn-datatable" onclick="konfirmsparepart(event, {{ $item->id_sparepart }})"
                                                    type="button" data-dismiss="modal"><i class="fas fa-plus"></i></button></td>
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
                                                Stock Real</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 20px;">
                                                Keterangan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 100px;">
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
    </div>
</main>

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
                <div class="form-group">Apakah Form yang Anda inputkan sudah benar?

                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="button"
                    onclick="tambahsparepart(event,{{ $sparepart }}.{{ $opname->id_opname }})">Ya!Sudah</button>
            </div>
        </div>
    </div>
</div>
{{-- 
@forelse ($sparepart as $item)
<div class="modal fade" id="Modaltambah-{{ $item->id_sparepart }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Sparepart</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" id="form-{{ $item->id_sparepart }}" method="POST" class="d-inline">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="jumlah_real">Masukan Stock Real</label>
                        <input class="form-control" name="jumlah_real" type="text" id="jumlah_real"
                            placeholder="Input Stock Real" value="{{ old('jumlah_real') }}"></input>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan_detail">Masukan Keterangan</label>
                        <input class="form-control" name="keterangan_detail" type="text" id="keterangan_detail"
                            placeholder="Input Keterangan" value="{{ old('keterangan_detail') }}"></input>
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
@endforelse --}}

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
    function calculateSelisih(id_sparepart, stock){
        var jumlah_real = $(`#stock-real-${id_sparepart}`).val()
        var selisih =parseInt(stock) - ( parseInt(jumlah_real)  | 0)
        $(`#selisih-${id_sparepart}`).val(selisih)
    }

    function tambahsparepart(event, sparepart, id_opname) {
        event.preventDefault()
        var form1 = $('#form1')
        var kode_opname = form1.find('input[name="kode_opname"]').val()
        var id_pegawai = $('#id_pegawai').val()
        var tanggal_opname = form1.find('input[name="tanggal_opname"]').val()
        var approve = form1.find('input[name="approve"]').val()
        var keterangan = form1.find('input[name="keterangan"]').val()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        for (var i = 0; i < sparepart.length; i++) {
            var form = $('#form-' + sparepart[i].id_sparepart)
            var jumlah_real = form.find('input[name="jumlah_real"]').val()
            var keterangan_detail = form.find('input[name="keterangan_detail"]').val()

            if (jumlah_real == 0 | jumlah_real == '') {
                continue
            } else {
                var id_sparepart = sparepart[i].id_sparepart
                var obj = {
                    id_opname: id_opname,
                    id_sparepart: id_sparepart,
                    jumlah_real: jumlah_real,
                    keterangan_detail: keterangan_detail
                }
                console.log(obj)
                dataform2.push(obj)
            }
        }

        if (dataform2.length == 0) {
            var alert = $('#alertsparepartkosong').show()
        } else {
            var data = {
                _token: _token,
                kode_opname: kode_opname,
                id_pegawai: id_pegawai,
                tanggal_opname: tanggal_opname,
                approve: approve,
                keterangan: keterangan,
                sparepart: dataform2
            }

            $.ajax({
                method: 'post',
                url: '/inventory/Opname',
                data: data,
                success: function (response) {
                    window.location.href = '/inventory/Opname'
                }
            })
        }
    }

    function konfirmsparepart(event, id_sparepart) {
        // var form = $('#item-' + id_sparepart)
        // var jumlah_real = form.find('input[name="jumlah_real"]').val()
        // var keterangan_detail = form.find('input[name="keterangan_detail"]').val()

        var jumlah_real = $(`#stock-real-${id_sparepart}`).val()
        var keterangan_detail = $(`#keterangan-${id_sparepart}`).val()

        if (jumlah_real == 0 | jumlah_real == '') {
            alert('Quantity Kosong')
        } else {
            alert('Berhasil Menambahkan Sparepart')
            var data = $('#item-' + id_sparepart)
            var kode_sparepart = $(data.find('.kode_sparepart')[0]).text()
            var nama_sparepart = $(data.find('.nama_sparepart')[0]).text()
            var merk_sparepart = $(data.find('.merk_sparepart')[0]).text()
            var satuan = $(data.find('.satuan')[0]).text()
            var template = $($('#template_delete_button').html())

            var table = $('#dataTablekonfirmasi').DataTable()
            // Akses Parent Sampai <tr></tr> berdasarkan id kode sparepart
            var row = $(`#${$.escapeSelector(kode_sparepart.trim())}`).parent().parent()
            table.row(row).remove().draw();

            $('#dataTablekonfirmasi').DataTable().row.add([
                kode_sparepart, `<span id=${kode_sparepart}>${kode_sparepart}</span>`, nama_sparepart, merk_sparepart, satuan,
                jumlah_real, keterangan_detail
            ]).draw();
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
        var table = $('#dataTableSparepart').DataTable({
            "pageLength": 5,
            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, ]
            ]
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
