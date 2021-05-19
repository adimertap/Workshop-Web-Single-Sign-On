@extends('layouts.Admin.adminaccounting')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Gaji Pegawai</h1>
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

{{--  --}}
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header ">Data Gaji Pegawai
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
                    @if(session('messagekirim'))
                    <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messagekirim') }}
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
                                <table class="table table-bordered table-hover dataTable" id="dataTableUtama" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 10px;">
                                                No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Bulan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Tahun</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 40px;">Jumlah Pegawai</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 150px;">Total Gaji</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 100px;">Total Tunjangan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Status Gaji</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 50px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($gajipegawai as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->bulan_gaji }}</td>
                                            <td>{{ $item->tahun_gaji }}</td>
                                            <td class="text-center">{{ $item->jumlah_pegawai }}</td>
                                            <td>Rp. {{ number_format($item->total_gaji,2,',','.') }}</td>
                                            <td>Rp. {{ number_format($item->total_tunjangan,2,',','.') }}</td>
                                            <td>@if($item->status_diterima == 'Belum Dibayarkan')
                                                <span class="badge badge-danger">
                                                    @elseif($item->status_diterima == 'Sudah Dibayarkan')
                                                    <span class="badge badge-success">
                                                        @else
                                                        <span>
                                                            @endif
                                                            {{ $item->status_diterima }}
                                                        </span>
                                            </td>
                                            <td>  @if($item->status_diterima == 'Belum Dibayarkan')
                                                <a href="" class="btn btn-success btn-datatable" type="button"
                                                data-toggle="modal" data-target="#Modalbayar-{{ $item->bulan_gaji }}-{{ $item->tahun_gaji }}">
                                                <i class="fas fa-check"></i>
                                                @endif
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
</main>


@forelse ($gajipegawai as $item)
<div class="modal fade" id="Modalbayar-{{ $item->bulan_gaji }}-{{ $item->tahun_gaji }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Pembayaran Gaji Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('gaji-pegawai-status-bulan-tahun',
            ['bulan_gaji'=>$item->bulan_gaji, 'tahun_gaji'=>$item->tahun_gaji]) }}?status=Dibayarkan" method="POST" class="d-inline">
                @csrf
                <div class="modal-body text-center">Apakah Anda Yakin untuk Melakukan Pembayaran Gaji Pegawai pada bulan {{ $item->bulan_gaji }}, tahun {{ $item->tahun_gaji }} </div>
                <div class="modal-footer ">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse


<script>
     function tambahrcv(event, id_rcv) {
        var data = $('#item-' + id_rcv)
        var _token = $('#form1').find('input[name="_token"]').val()
        var kode_rcv = $(data.find('.kode_rcv')[0]).text()
        var kode_po = $(data.find('.kode_po')[0]).text()
        var nama_supplier = $(data.find('.nama_supplier')[0]).text()
        var tanggal_rcv = $(data.find('.tanggal_rcv')[0]).text()
        alert('Berhasil Menambahkan Data Receiving')

        $('#detailkodercv').val(kode_rcv)
        $('#detailkodepo').val(kode_po)
        $('#detailsupplier').val(nama_supplier)
        $('#detailtanggalrcv').val(tanggal_rcv)
    }

    function submit1() {
        var _token = $('#form1').find('input[name="_token"]').val()
        var id_jenis_transaksi = $('#id_jenis_transaksi').val()
        var kode_rcv = $('#detailkodercv').val()
        var nama_supplier = $('#detailsupplier').val()
        var kode_po = $('#detailkodepo').val()
        var data = {
            _token: _token,
            id_jenis_transaksi: id_jenis_transaksi,
            kode_rcv: kode_rcv,
            kode_po: kode_po,
            nama_supplier: nama_supplier,
        }

        if (kode_rcv == 0 | kode_rcv == '' | id_jenis_transaksi == 0 | id_jenis_transaksi == 'Pilih Jenis Transaksi' ) {
            var alert = $('#alertdatakosong').show()
        } else {

            $.ajax({
                method: 'post',
                url: "/Accounting/invoice-payable",
                data: data,
                success: function (response) {
                    window.location.href = '/Accounting/invoice-payable/' + response.id_payable_invoice + '/edit'
                },
                error: function (error) {
                    console.log(error)
                }

            });
        }

    }


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

   $(document).ready(function () {
        var tablercv = $('#dataTableRcv').DataTable()
        var tableutama = $('#dataTableUtama').DataTable()
    });

</script>

@endsection