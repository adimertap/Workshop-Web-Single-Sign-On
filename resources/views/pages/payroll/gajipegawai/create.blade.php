@extends('layouts.Admin.adminpayroll')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon" style="color: white"><i class="fas fa-wallet"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Tambah Data Pembayaran Gaji Pegawai
                            </div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Gaji Pegawai</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('gaji-pegawai.index') }}"
                            class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-n10">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Detail Formulir Pegawai</div>
                    <div class="card-body">
                        <form action="{{ route('gaji-pegawai.update', $gaji->id_gaji_pegawai) }}" id="form1"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="tahun_gaji">Tahun Gaji</label>
                                    <input class="form-control" id="tahun_gaji" type="text" name="tahun_gaji"
                                        placeholder="Input Tahun Gaji" value="{{ $gaji->tahun_gaji }}" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="bulan_gaji">Bulan Gaji</label>
                                    <select name="bulan_gaji" id="bulan_gaji" class="form-control"
                                        class="form-control @error('bulan_gaji') is-invalid @enderror">
                                        <option value="{{ $gaji->bulan_gaji }}">{{ $gaji->bulan_gaji }}</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                    @error('bulan_gaji')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="id_pegawai">Nama Pegawai</label>
                                <input class="form-control" id="id_pegawai" type="text" name="id_pegawai"
                                    value="{{ $gaji->Pegawai->nama_pegawai }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="id_jabatan">Jabatan</label>
                                <input class="form-control" id="id_jabatan" type="text" name="id_jabatan"
                                    value="{{ $gaji->Pegawai->Jabatan->nama_jabatan }}" readonly>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="gaji_diterima">Total Bayar</label>
                                <div class="input-group input-group-joined">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-gray-200">
                                            Rp.
                                        </span>
                                    </div>
                                        <input class="form-control" id="gaji_diterima" type="text" name="gaji_diterima"
                                        placeholder="Keterangan Pembayaran"
                                        value=" {{ $gaji->Pegawai->Jabatan->Gajipokok->besaran_gaji }}"
                                        class="form-control @error('keterangan') is-invalid @enderror" readonly>
                                    @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" type="text" name="keterangan"
                                    placeholder="Keterangan Pembayaran"
                                    class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                                @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group text-right">
                                <hr>
                                <a href="" class="btn btn-secondary btn-sm" type="button" data-toggle="modal"
                                    data-target="#Modalabsensi">
                                    Lihat Absensi
                                </a>
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                    data-target="#Modalsumbit">Simpan</button>
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card card-collapsable">
                    <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="collapseCardExample">Gaji
                        Pokok Pegawai
                        <div class="card-collapsable-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </a>
                    <div class="collapse show" id="collapseCardExample">
                        <div class="card-body">
                            <div class="datatable">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-hover dataTable" id="dataTable"
                                                width="100%" cellspacing="0" role="grid"
                                                aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 20px;">
                                                            No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 80px;">
                                                            Jabatan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 180px;">
                                                            Gaji Pokok</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">1</th>
                                                        <td>{{ $gaji->Pegawai->Jabatan->nama_jabatan}}
                                                        </td>
                                                        <td>Rp.
                                                            {{ number_format($gaji->Pegawai->Jabatan->Gajipokok->besaran_gaji,2,',','.') }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="card">
                    <div class="card card-header-actions">
                        <div class="card-header">
                            Tunjangan Pegawai
                            <a href="" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                data-target="#Modaltambahtunjangan">
                                Tambah Tunjangan
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="datatable">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-hover dataTable"
                                                id="dataTabletunjangan" width="100%" cellspacing="0" role="grid"
                                                aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 20px;">
                                                            No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 120px;">
                                                            Tunjangan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 150px;">
                                                            Jumlah</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 50px;">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id='konfirmasi'>

                                                </tbody>
                                                <tr id="totaltunjangan">
                                                    <td colspan="2" class="text-center font-weight-500">
                                                        Total Tunjangan
                                                    </td>
                                                    <td  colspan="2" class="grand_total text-center font-weight-500">
                                                        <span>Rp. </span><span id="totaltunjangan2">0</span>
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
            </div>
        </div>
    </div>
</main>


{{-- MODAL TAMBAH TUNJANGAN --}}
<div class="modal fade" id="Modaltambahtunjangan" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Data Tunjangan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable"
                                        id="dataTablesemuatunjangan" width="100%" cellspacing="0" role="grid"
                                        aria-describedby="dataTable_info" style="width: 100%;">
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
                                                    Tunjangan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 180px;">
                                                    Jumlah</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 180px;">
                                                    Keterangan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 180px;">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($tunjangan as $item)
                                            <tr id="item-{{ $item->id_tunjangan }}" role="row" class="odd" >
                                                <th scope="row" class="small" class="sorting_1">
                                                    {{ $loop->iteration}}</th>
                                                <td class="nama_tunjangan">{{ $item->nama_tunjangan }}</td>
                                                <td class="jumlah_tunjangan">Rp {{ number_format($item->jumlah_tunjangan,2,',','.') }}</td>
                                                </td>
                                                <td class="keterangan">{{ $item->keterangan }}</td>
                                                <td>
                                                    <button class="btn btn-success btn-sm"
                                                        onclick="tambahtunjangan(event, {{ $item->id_tunjangan }})"
                                                        type="button" data-dismiss="modal">Tambah</button>
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


<div class="modal fade" id="Modalabsensi" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Data Absensi Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" id="form3" class="d-inline">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="datatable">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable" id="dataTableAbsensi"
                                            width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 20px;">
                                                        No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">
                                                        Tanggal</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">
                                                        Absensi</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">
                                                        Jam Masuk</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">
                                                        Jam Keluar</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">
                                                        Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($gaji->Pegawai->absensi as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}
                                                    </th>
                                                    <td>{{ $item->tanggal_absensi }}</td>
                                                    <td>
                                                        @if($item->absensi == 'Absen_Pagi')
                                                        <span> Masuk </span>
                                                        @elseif ($item->absensi == 'Masuk')
                                                        <span> Masuk</span>
                                                        @elseif ($item->absensi == 'Ijin' | $item->absensi == 'Sakit' |
                                                        $item->absensi == 'Cuti' | $item->absensi == 'Alpha')
                                                        {{ $item->absensi }}
                                                        @else
                                                        <span>
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>
                                                        @if($item->absensi == 'Absen_Pagi' | $item->absensi =='Masuk')
                                                        {{ $item->jam_masuk }}
                                                        @elseif ($item->absensi == 'Ijin' | $item->absensi == 'Sakit' |
                                                        $item->absensi == 'Cuti' | $item->absensi == 'Alpha')
                                                        @else
                                                        <span>
                                                            @endif
                                                        </span>
                                                    </td>
                                                    <td>{{ $item->jam_pulang }}</td>
                                                    <td>{{ $item->keterangan }}</td>
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


<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Pembayaran Gaji</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group text-center">Apakah Form yang Anda inputkan sudah benar?</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary"
                    onclick="tambahgaji(event,{{ $tunjangan }},{{ $gaji->id_gaji_pegawai }})">Ya!Sudah</button>
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
    <button class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="#Modaltambahtunjangan">
        <i class="fas fa-plus"></i>
    </button>
</template>

<script>
    function tambahgaji(event, tunjangan, id_gaji_pegawai) {
        event.preventDefault()
        var form1 = $('#form1')
        var tahun_gaji = form1.find('input[name="tahun_gaji"]').val()
        var bulan_gaji = $('#bulan_gaji').val()
        var gaji_diterima = form1.find('input[name="gaji_diterima"]').val()
        var keterangan = form1.find('textarea[name="keterangan"]').val()
        var total_tunjangan = $('#totaltunjangan2').html()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        var datatunjangan = $('#konfirmasi').children()
        for (let index = 0; index < datatunjangan.length; index++) {
            var children = $(datatunjangan[index]).children()
            var td = children[1]
            var span = $(td).children()[0]
            var id_tunjangan = $(span).attr('id')
            dataform2.push({
                id_tunjangan: id_tunjangan
            })
        }

        var data = {
            _token: _token,
            tahun_gaji: tahun_gaji,
            bulan_gaji: bulan_gaji,
            gaji_diterima: gaji_diterima,
            total_tunjangan: total_tunjangan,
            keterangan: keterangan,
            tunjangan: dataform2
        }

        $.ajax({
            method: 'put',
            url: '/payroll/gaji-pegawai/' + id_gaji_pegawai,
            data: data,
            success: function (response) {
                window.location.href = '/payroll/gaji-pegawai'

            },
            error: function (response) {
                console.log(response)
            }
        });
    }



    function tambahtunjangan(event, id_tunjangan) {
        var data = $('#item-' + id_tunjangan)
        var nama_tunjangan = $(data.find('.nama_tunjangan')[0]).text()
        var jumlah_tunjangan = $(data.find('.jumlah_tunjangan')[0]).text()
        var template = $($('#template_delete_button').html())

        // GAJI DITERIMA
        var totaltambahtunjangan = $('#gaji_diterima').val()
        var splittunjangan = jumlah_tunjangan.split('Rp')[1].replace('.', '').replace(',00', '').trim()
        var jumlahfix = parseInt(splittunjangan) + parseInt(totaltambahtunjangan)
        $('#gaji_diterima').val(jumlahfix)

        // TUNJANGAN
        var totaltunjangan = $('#totaltunjangan2').html()
        var totalfix = parseInt(splittunjangan) + parseInt(totaltunjangan)
        console.log(totalfix)
        $('#totaltunjangan2').html(totalfix)
      
        var table = $('#dataTabletunjangan').DataTable()
        var row = $(`#${$.escapeSelector(nama_tunjangan.trim())}`).parent().parent()
        table.row(row).remove().draw();

        $('#dataTabletunjangan').DataTable().row.add([
            nama_tunjangan, `<span id=${id_tunjangan}>${nama_tunjangan}</span>`, jumlah_tunjangan,
        ]).draw();

        // TABLE TAB 3
        var table2 = $('#dataTabletunjangankonfirmasi').DataTable()
        var row2 = $(`#${$.escapeSelector(nama_tunjangan.trim())}`).parent().parent()
        table2.row(row2).remove().draw();

        $('#dataTabletunjangankonfirmasi').DataTable().row.add([
            `<span id=${nama_tunjangan}>${nama_tunjangan}</span>`, jumlah_tunjangan,
        ]).draw();
    }

    function hapussparepart(element) {
        var table = $('#dataTabletunjangan').DataTable()

        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        table.row(row).remove().draw();
        alert('Data Tunjangan Berhasil di Hapus')
        // draw() Reset Ulang Table
        var table = $('#dataTable').DataTable()
        var table2 = $('#dataTabletunjangankonfirmasi').DataTable()

        // Akses Parent Sampai <tr></tr>
        var row2 = $(element).parent().parent()

        // Gaji diterima berkurang
        var gajiberkurang = $(row2.children()[2]).text()
        var totaltambahtunjangan = $('#gaji_diterima').val()
        var splittunjangan = gajiberkurang.split('Rp')[1].replace('.', '').replace(',00', '').trim()
        var jumlahfix = parseInt(totaltambahtunjangan) -  parseInt(splittunjangan)
        $('#gaji_diterima').val(jumlahfix)

        var totaltunjangan = $('#totaltunjangan2').html()
        var totaltunjanganfix = parseInt(totaltunjangan) -  parseInt(splittunjangan)
        $('#totaltunjangan2').html(totaltunjanganfix)
        table2.row(row2).remove().draw();

        // draw() Reset Ulang Table
        var table2 = $('#dataTable').DataTable()
    }

    $(document).ready(function () {


        var table2 = $('#dataTableAbsensi').DataTable()
        var table = $('#dataTablesemuatunjangan').DataTable()
        var template = $('#template_delete_button').html()
        $('#dataTabletunjangan').DataTable({
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
