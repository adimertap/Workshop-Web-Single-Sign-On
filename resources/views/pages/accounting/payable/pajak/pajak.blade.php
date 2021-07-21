@extends('layouts.Admin.adminaccounting')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Pembayaran Pajak</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal }} · <span id="clock">12:16 PM</span>
                </div>
            </div>
            <div class="small">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                Bengkel
                <span class="font-weight-500 text-primary">{{ Auth::user()->bengkel->nama_bengkel}}</span>
                <hr>
                </hr>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card card-header-actions">
            <div class="card-header ">List Pajak
                <a href="" class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">
                    Tambah Pajak
                </a>
            </div>
        </div>
        <div class="card-body ">
            <div class="datatable">
                @if(session('messageberhasil'))
                <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                    {{ session('messageberhasil') }}
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                @if(session('messagejurnal'))
                <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                    {{ session('messagejurnal') }}
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                @if(session('messagehapus'))
                <div class="alert alert-danger" role="alert"> <i class="fas fa-check"></i>
                    {{ session('messagehapus') }}
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif

                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 10px;">
                                            No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 10px;">Kode</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 120px;">Deskripsi Pajak</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 20px;">Tanggal Bayar</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 50px;">Pegawai</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 50px;">Total Pajak</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 40px;">Status Jurnal</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            style="width: 100px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($pajak as $item)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                        <td>{{ $item->kode_pajak }}</td>
                                        <td>{{ $item->deskripsi_pajak }}</td>
                                        <td>{{ $item->tanggal_bayar }}</td>
                                        <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                        <td>Rp. {{ number_format($item->total_pajak,0,',','.') }}</td>
                                        <td>
                                            @if($item->status_jurnal == 'Belum Diposting')
                                            <a href="" class="btn btn-danger btn-xs" type="button" data-toggle="modal"
                                                data-target="#Modaljurnal-{{ $item->id_pajak }}">
                                                Posting?
                                            </a>
                                            @elseif($item->status_jurnal == 'Sudah Diposting')
                                            <span class="badge badge-success"> {{ $item->status_jurnal }}
                                                @else
                                                <span>
                                                    @endif
                                                </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('pajak.show', $item->id_pajak) }}"
                                                class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('pajak.edit', $item->id_pajak) }}"
                                                class="btn btn-primary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-datatable" type="button"
                                                data-toggle="modal" data-target="#Modalhapus-{{ $item->id_pajak }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <a href="{{ route('cetak-pajak', $item->id_pajak) }}" class="btn btn-warning btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Cetak Data Pajak">
                                                <i class="fas fa-print"></i></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center">
                                            Data Pajak Kosong
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
</main>

<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" data-backdrop="static"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Pajak</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('pajak.store') }}" method="POST" id="form1" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger" id="alertdatakosong" role="alert" style="display:none"><i class="far fa-times-circle"></i>
                        <span class="small">Error! Terdapat Data yang Masih Kosong!</span> 
                        <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <label class="small mb-1">Pilih Jenis Pajak Terlebih Dahulu</label>
                    <hr>
                    </hr>
                    <div class="row mb-1" id="radio1">
                        <div class="col-md-6">
                            <input class="mr-1" value="Tidak Terkait" type="radio" name="radio2" checked>Tidak Terkait Pegawai
                        </div>
                        <div class="col-md-6">
                            <input class="mr-1" value="Terkait Pegawai" type="radio" name="radio2">Pajak Terkait Pegawai
                        </div>
                    </div>
                    <p></p>


                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="kode_pajak">Kode Pajak</label>
                            <input class="form-control" id="kode_pajak" type="text" name="kode_pajak"
                                placeholder="Input Kode Pajak" value="{{ $kode_pajak }}" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1 mr-1" for="id_jenis_transaksi">Pilih Jenis Transaksi</label><span
                                class="mr-4 mb-3" style="color: red">*</span>
                            <select class="form-control" name="id_jenis_transaksi" id="id_jenis_transaksi"
                                class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                <option>Pilih Jenis Transaksi</option>
                                @foreach ($jenis_transaksi as $item)
                                <option value="{{ $item->id_jenis_transaksi }}">{{ $item->nama_transaksi }}
                                </option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="row" id="terkait" style="display:none">
                        <div class="form-group col-md-4">
                            <label class="small mb-1 mr-1" for="kode_po">Pilih Gaji Pegawai</label><span
                                class="mr-4 mb-3" style="color: red">*</span>
                            <div class="input-group input-group-joined">
                                <input class="form-control" type="text" placeholder="Pilih Gaji Pegawai"
                                    aria-label="Search" id="detailbulan">
                                <div class="input-group-append">
                                    <a href="" class="input-group-text" type="button" data-toggle="modal"
                                        data-target="#Modalgaji">
                                        <i class="fas fa-folder-open"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="small" id="alertgaji" style="display:none">
                                <span class="font-weight-500 text-danger">Error! Anda Belum Memilih Gaji Pegawai!</span>
                                <button class="close" type="button" onclick="$(this).parent().hide()"
                                    aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="detailtahun">Tahun Gaji</label>
                            <input class="form-control" id="detailtahun" type="text" name="detailtahun" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="detailpph21">Total Pajak</label>
                            <input class="form-control" id="detailpph21" type="text" name="detailpph21" readonly>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" onclick="simpanpajak()" type="button">Selanjutnya!</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="Modalgaji" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">Pilih Penggajian Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableGaji" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                            style="width: 30px;">No.</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                            style="width: 70px;">Tahun Gaji</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                            style="width: 70px;">Bulan Gaji</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                            aria-label="Position: activate to sort column ascending" style="width: 150px;">Total PPh21</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 80px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($gaji as $item)
                                    <tr id="item-{{ $item->id_gaji_pegawai }}">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                        <td><div class="tahun_gaji">{{ $item->tahun_gaji }}</div></td>
                                        <td><div class="bulan_gaji">{{ $item->bulan_gaji }}</div></td>
                                        
                                        <td><div class="grand_total_pph21">Rp {{ number_format($item->grand_total_pph21,2,',','.') }}</div></td>
                                        <td class="text-center"><button class="btn btn-success btn-xs" 
                                            onclick="tambahgaji(event, {{ $item->id_gaji_pegawai }})" type="button" 
                                            data-dismiss="modal">Tambah</button>
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


@forelse ($pajak as $item)
<div class="modal fade" id="Modaljurnal-{{ $item->id_pajak }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Posting Jurnal</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('jurnal-pengeluaran-pajak', $item->id_pajak) }}" method="POST" class="d-inline">
                @csrf
                <div class="modal-body text-center">Apakah Anda Yakin Memposting Data Pajak {{ $item->kode_pajak }} pada
                    tanggal
                    {{ $item->tanggal_bayar }}?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Posting</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

@forelse ($pajak as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_pajak }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('pajak.destroy', $item->id_pajak) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body text-center">
                    Apakah Anda Yakin Menghapus Data Pajak {{ $item->kode_pajak }},tanggal bayar
                    {{ $item->tanggal_bayar }} ?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Ya! Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

{{-- Script Open Modal Callback --}}
<script>
     function tambahgaji(event, id_gaji_pegawai) {
        var data = $('#item-' + id_gaji_pegawai)
        var _token = $('#form1').find('input[name="_token"]').val()
        var bulan_gaji = $(data.find('.bulan_gaji')[0]).text()
        var tahun_gaji = $(data.find('.tahun_gaji')[0]).text()
        var pph21 = $(data.find('.grand_total_pph21')[0]).text()
        alert('Berhasil Menambahkan Data Gaji')

        $('#detailbulan').val(bulan_gaji)
        $('#detailtahun').val(tahun_gaji)
        $('#detailpph21').val(pph21)
    }


    function simpanpajak() {
        var _token = $('#form1').find('input[name="_token"]').val()
        var kode_pajak = $('#kode_pajak').val()
        var id_jenis_transaksi = $('#id_jenis_transaksi').val()
        // Radio
        var radio = $('#radio1').find("input[name='radio2']:checked").val()
      

        // Gaji
        var bulan_gaji = $('#detailbulan').val()
        var tahun_gaji = $('#detailtahun').val()

        if(radio == 'Tidak Terkait'){
            var data1 ={
                _token:_token,
                kode_pajak: kode_pajak,
                id_jenis_transaksi: id_jenis_transaksi,
                status_pajak: radio
            }
            if(id_jenis_transaksi == 'Pilih Jenis Transaksi'){
                $('#alertdatakosong').show()
            }else{
                    $.ajax({
                    method: 'post',
                    url: "/accounting/pajak",
                    data: data1,
                    success: function (response) {
                        window.location.href = '/accounting/pajak/' + response.id_pajak + '/edit'
                        console.log(response)
                    },
                    error: function (error) {
                        console.log(error)
                    }

                });
            }
            
        }else if(radio == 'Terkait Pegawai'){
            var data2 ={
                _token: _token,
                kode_pajak: kode_pajak,
                id_jenis_transaksi:id_jenis_transaksi,
                bulan_gaji: bulan_gaji,
                tahun_gaji: tahun_gaji,
                status_pajak: radio
            }
            console.log(data2)
            if(id_jenis_transaksi == 'Pilih Jenis Transaksi' | bulan_gaji == ''){
                $('#alertdatakosong').show()
            }else{
                    $.ajax({
                    method: 'post',
                    url: "/accounting/pajak",
                    data: data2,
                    success: function (response) {
                        window.location.href = '/accounting/pajak/' + response.id_pajak + '/edit'
                        console.log(response)
                    },
                    error: function (error) {
                        console.log(error)
                    }

                });
            }
        }


      


        
 
    }



        // var kode_po = $('#detailkodepo').val()
        // var nama_supplier = $('#detailsupplier').val()
        // var data = {
        //     _token: _token,
        //     kode_po: kode_po,
        //     nama_supplier: nama_supplier,
        //     no_do: no_do,
        //     tanggal_rcv: tanggal_rcv
        // }

        // if (kode_po == 0 | kode_po == '') {
        //     $('#alertkodepo').show()
        // } else if (no_do == 0 | no_do == '')
        //     $('#alertdo').show()
        // else if (tanggal_rcv == 0 | tanggal_rcv == '')
        //     $('#alerttanggal').show()

        // else {

        //     $.ajax({
        //         method: 'post',
        //         url: "/inventory/receiving",
        //         data: data,
        //         success: function (response) {
        //             window.location.href = '/inventory/receiving/' + response.id_rcv + '/edit'
        //         },
        //         error: function (error) {
        //             console.log(error)
        //         }

        //     });
        

    




    $(document).ready(function () {
        $('#validasierror').click();

        $('#dataTableGaji').DataTable()

        $("#radio1").change(function () {
            var value = $("input[name='radio2']:checked").val();

            if (value == 'Tidak Terkait') {
                $('#terkait').hide()
            } else {
                $('#terkait').show()
            }


        });

    });

    setInterval(displayclock, 500);

    function displayclock() {
        var time = new Date()
        var hrs = time.getHours()
        var min = time.getMinutes()
        var sec = time.getSeconds()
        var en = 'AM';

        if (hrs > 12) {
            en = 'PM'
        }

        if (hrs > 12) {
            hrs = hrs - 12;
        }

        if (hrs == 0) {
            hrs = 12;
        }

        if (hrs < 10) {
            hrs = '0' + hrs;
        }

        if (min < 10) {
            min = '0' + min;
        }

        if (sec < 10) {
            sec = '0' + sec;
        }

        document.getElementById('clock').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
    }

</script>
@endsection
