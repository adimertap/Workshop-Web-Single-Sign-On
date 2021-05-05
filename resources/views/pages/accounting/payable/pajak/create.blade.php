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
                            <div class="page-header-icon" style="color: white"><i class="fas fa-pallet"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Tambah Data Pembayaran Pajak</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Pajak</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('pajak.index') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-n10">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header ">Form Invoice
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pajak.store') }}" id="form1" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="kode_pajak">Kode Pajak</label>
                                    <input class="form-control" id="kode_pajak" type="text" name="kode_pajak"
                                        placeholder="Input Kode Pajak" value="{{ $kode_pajak }}" readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="status_jurnal">Status Jurnal</label>
                                    <input class="form-control" id="status_jurnal" type="text" name="status_jurnal"
                                        value="Pending" readonly>
                                </div>
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
                                <label class="small mb-1" for="tanggal_bayar">Tanggal Pembayaran</label>
                                <input class="form-control" id="tanggal_bayar" type="date" name="tanggal_bayar"
                                    placeholder="Input Tanggal Receive" value="{{ old('tanggal_bayar') }}"
                                    class="form-control @error('tanggal_bayar') is-invalid @enderror" />
                                @error('tanggal_bayar')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="deskripsi_pajak">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi_pajak" type="text" name="deskripsi_pajak"
                                    placeholder="Deskripsi Pembayaran"
                                    class="form-control @error('deskripsi_pajak') is-invalid @enderror"></textarea>
                                @error('deskripsi_pajak')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group text-right">
                                <hr>
                                <a href="{{ route('Opname.index') }}" class="btn btn-sm btn-light">Kembali</a>
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                    data-target="#Modalsumbit">Simpan</button>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header">
                            Detail Pajak
                            <a href="" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                data-target="#Modaltambahpajak">
                                Tambah Pajak
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="datatable">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-hover dataTable"
                                                id="dataTablekonfirmasi" width="100%" cellspacing="0" role="grid"
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
                                                            style="width: 150px;">
                                                            Data Pajak</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 90px;">
                                                            Keterangan Pajak</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 120px;">
                                                            Nilai Pajak</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 30px;">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id='konfirmasi'>

                                                </tbody>
                                                <tr id="grandtotal">
                                                    <td colspan="3" class="text-center font-weight-500">
                                                        Total Pajak
                                                    </td>
                                                    <td colspan="2" class="grand_total">
                                                        Rp.
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
            </form>
        </div>
    </div>
</main>


<div class="modal fade" id="Modaltambahpajak" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Pajak</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" id="form2" class="d-inline">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="data_pajak">Data Pajak</label>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-clipboard-list"></i>
                                </span>
                            </div>
                            <input class="form-control" id="data_pajak" type="text" name="data_pajak"
                                placeholder="Input Data Pajak">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                <label class="small mb-1" for="nilai_pajak">Nominal Pajak</label>
                            </div>
                            <div class="col-12 col-lg-auto text-center text-lg-right">
                                <div class="small text-lg-right">
                                    <span class="font-weight-500 text-primary">Detail Nominal: </span>
                                    <span id="detailnominalpajak"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    Rp.
                                </span>
                            </div>
                            <input class="form-control" id="nilai_pajak" type="number" name="nilai_pajak"
                                placeholder="Input Nominal Pajak">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan_pajak">Keterangan Pajak</label>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fas fa-align-left"></i>
                                </span>
                            </div>
                            <textarea class="form-control" id="keterangan_pajak" type="text" name="keterangan_pajak"
                                placeholder="Input Keterangan Pajak"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" onclick="tambahpajak(event)" type="button"
                        data-dismiss="modal">Tambah</button>
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
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Form Pembelian</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">Apakah Form yang Anda inputkan sudah benar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="submit(event,{{ $pajak }})" type="button">Ya!Sudah</button>
                </div>
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
    function submit(event, pajak) {
        event.preventDefault()
        var form1 = $('#form1')
        var kode_pajak = form1.find('input[name="kode_pajak"]').val()
        var id_pegawai = $('#id_pegawai').val()
        var tanggal_bayar = form1.find('input[name="tanggal_pembayaran"]').val()
        var deskripsi_pajak = form1.find('input[name="approve_po"]').val()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        for (var i = 0; i < pajak.length; i++) {
            var form2 = $('#form2')
            var data_pajak = form2.find('input[name="data_pajak"]').val()
            var nilai_pajak = form2.find('input[name="nilai_pajak"]').val()
            var nilai_pajak_fix = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(nilai_pajak)
            var keterangan_pajak = form2.find('textarea[name="keterangan_pajak"]').val()

            if (nilai_pajak_fix == 0 | nilai_pajak_fix == '') {
                continue
            } else {
                var id_pajak = pajak[i].id_pajak
                var obj = {
                    id_pajak: id_pajak,
                    data_pajak: data_pajak,
                    nilai_pajak_fix: nilai_pajak_fix,
                    keterangan_pajak: keterangan_pajak
                }
                dataform2.push(obj)

                console.log(obj)
            }

        }
        // if (dataform2.length == 0) {
        //     var alert = $('#alertsparepartkosong').show()
        // } else {
        //     var data = {
        //         _token: _token,
        //         kode_pajak: kode_pajak,
        //         id_pegawai: id_pegawai,
        //         tanggal_bayar: tanggal_bayar,
        //         deskripsi_pajak: deskripsi_pajak,
        //         pajak: dataform2
        //     }

        //     $.ajax({
        //         method: 'post',
        //         url: '/accounting/pajak',
        //         data: data,
        //         success: function (response) {
        //             window.location.href = '/accounting/pajak'
        //             console.log(response)

        //         },
        //     });
        // }
    }

    function tambahpajak(event) {
        var form = $('#form2')
        var _token = form.find('input[name="_token"]').val()
        var data_pajak = form.find('input[name="data_pajak"]').val()
        var nilai_pajak = form.find('input[name="nilai_pajak"]').val()
        var nilai_pajak_fix = new Intl.NumberFormat('id', {
            style: 'currency',
            currency: 'IDR'
        }).format(nilai_pajak)
        var keterangan_pajak = form.find('textarea[name="keterangan_pajak"]').val()

        if (nilai_pajak == 0 | nilai_pajak == '' | data_pajak == '') {
            alert('Data Inputan Ada yang belum terisi')
        } else {
          

            $('#dataTablekonfirmasi').DataTable().row.add([
                data_pajak, data_pajak, keterangan_pajak, nilai_pajak_fix
            ]).draw();
        }
    }

    function hapussparepart(element) {
        var table = $('#dataTablekonfirmasi').DataTable()
        var row = $(element).parent().parent()
        table.row(row).remove().draw();
        alert('Data Pajak Berhasil di Hapus')
    }

    $(document).ready(function () {
        $('#nilai_pajak').on('input', function () {
            var nominal = $(this).val()
            var nominal_fix = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(nominal)

            $('#detailnominalpajak').html(nominal_fix);
        })
        $('#id_pegawai').on('change', function () {
            var select = $(this).find('option:selected')
            var textpegawai = select.text()
            if (textpegawai == 'Pilih Pegawai') {
                $('#detailpegawai').html('');
            } else {
                $('#detailpegawai').html(textpegawai);
            }
        })
        $('#deskripsi_pajak').on('change', function () {
            var deskripsi = $(this).val()

            $('#detaildeskripsi').html(deskripsi);
        })
        $('#tanggal_bayar').on('change', function () {
            var select = $(this)
            var textdate = select.val()
            var splitdate = textdate.split('-')
            console.log(splitdate)
            var datefix = new Date(splitdate[0], splitdate[1] - 1, splitdate[2])
            var formatindodate = new Intl.DateTimeFormat('id', {
                dateStyle: 'long'
            }).format(datefix)
            $('#detailtanggalbayar').html(formatindodate);
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
