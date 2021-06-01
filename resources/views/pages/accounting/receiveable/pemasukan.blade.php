@extends('layouts.Admin.adminaccounting')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Pemasukan</h1>
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
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-bottom">
                <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab"
                            aria-controls="overview" aria-selected="true">Pemasukan Kasir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="example-tab" href="#example" data-toggle="tab" role="tab"
                            aria-controls="example" aria-selected="false">Pemasukan Penjualan Online</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <div class="datatable">
                            @if(session('messageberhasil'))
                            <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                                {{ session('messageberhasil') }}
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @endif
                            @if(session('messagebayar'))
                            <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                                {{ session('messagebayar') }}
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @endif

                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable" id="dataTableUtama"
                                            width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 10px;">
                                                        No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">Tanggal Bayar</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Jumlah Transaksi</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 150px;">Grand Total</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 80px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @forelse ($pemasukankasir as $pos)
                                               <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                <td>{{ date('j F, Y', strtotime($pos->tanggal_laporan)) }}</td>
                                                <td class="text-center">{{ $pos->jumlah_transaksi }}</td>
                                                <td>Rp. {{ number_format($pos->grand_total,2,',','.') }}</td>
                                                <td class="text-center"> <a href="{{ route('pemasukan-kasir.show', $pos->tanggal_laporan) }}" class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Detail Laporan">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                               @empty
                                                   
                                               @endforelse
                                            </tbody>
                                            <tr>
                                                <td colspan="3" class="text-center font-weight-500">
                                                    Total Pemasukan Kasir
                                                </td>
                                                <td colspan="2" class="grand_total font-weight-500">
                                                    Rp. {{ number_format($total_pemasukan,2,',','.') }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="example" role="tabpanel" aria-labelledby="example-tab">
                        <div class="datatable">
                            @if(session('messageberhasil'))
                            <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                                {{ session('messageberhasil') }}
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @endif
                            @if(session('messagebayar'))
                            <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                                {{ session('messagebayar') }}
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            @endif

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
                                                        style="width: 10px;">
                                                        No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 100px;">Tanggal Transaksi</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 50px;">Jumlah Transaksi</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 150px;">Grand Total</th>
                                                    <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Salary: activate to sort column ascending"
                                                        style="width: 80px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @forelse ($transaksionline as $item)
                                               <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                <td>{{ date('j F, Y', strtotime($item->updated_at)) }}</td>
                                                <td class="text-center">{{ $item->jumlah_transaksi_online }}</td>
                                                <td>Rp. {{ number_format($item->total_harga,2,',','.') }}</td>
                                                <td class="text-center"> <a href="{{ route('pemasukan-online', $item->updated_at) }}" class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Detail Laporan">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                               @empty
                                                   
                                               @endforelse
                                            </tbody>
                                            <tr>
                                                <td colspan="3" class="text-center font-weight-500">
                                                    Total Penjualan Online
                                                </td>
                                                <td colspan="2" class="grand_total font-weight-500">
                                                    Rp. {{ number_format($total_pemasukan_online,2,',','.') }}
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

    {{--  --}}
    <div class="container-fluid">

    </div>
</main>

{{-- @forelse ($gajipegawai as $item)
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
            ['bulan_gaji'=>$item->bulan_gaji, 'tahun_gaji'=>$item->tahun_gaji]) }}" method="POST" class="d-inline">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    Apakah Anda Yakin untuk Melanjutkan Proses Pembayaran Gaji Pegawai pada bulan
                    {{ $item->bulan_gaji }}, tahun {{ $item->tahun_gaji }} dengan jumlah pegawai
                    <span class="font-weight-700">{{ $item->jumlah_pegawai }}</span> Orang, sebesar <span
                        class="font-weight-700">Rp. {{ number_format($item->total_gaji,2,',','.') }}</span>
                </div>
            </div>

            @if (count($errors) > 0)
            @endif

            <div class="modal-footer ">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-success" type="submit">Ya! Proses</button>
            </div>
        </form>
    </div>
</div>
</div>
@empty
@endforelse --}}

<script>
    function postingjurnal(bulan_gaji, tahun_gaji) {

        var _token = $('input[name="_token"]').val()

        $.ajax({
            method: 'post',
            url: '/Accounting/gaji-accounting/posting-jurnal',
            data: {
                _token: _token,
                bulan_gaji: bulan_gaji,
                tahun_gaji: tahun_gaji,
            },
            success: function (response) {
                window.location.href = '/Accounting/gaji-accounting'
                console.log(response)
            },
            error: function (response) {
                console.log(response)
            }
        });

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
