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
                    @csrf
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
                                                style="width: 70px;">Status Penyerahan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 80px;">Status Jurnal</th>
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
                                            <td class="text-center">
                                                @if($item->status_dana == 'Dana Belum Cair')
                                                <a href="" class="btn btn-warning btn-xs" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalbayar-{{ $item->bulan_gaji }}-{{ $item->tahun_gaji }}">
                                                    Proses?
                                                </a>
                                                @elseif ($item->status_dana == 'Dana Telah Diberikan')
                                                <span class="badge badge-success"> Dana Telah Cair
                                                    @endif
                                            </td>
                                            <td> @if($item->status_dana == 'Dana Belum Cair' and $item->status_jurnal == 'Belum Diposting')
                                                <span>Menunggu Pembayaran Gaji..</span>
                                                @elseif ($item->status_dana == 'Dana Telah Diberikan' and $item->status_jurnal == 'Belum Diposting')
                                                <button class="btn btn-danger btn-xs"
                                                    onclick="postingjurnal('{{ $item->bulan_gaji }}', '{{ $item->tahun_gaji }}')"
                                                    type="button" data-dismiss="modal">Posting Jurnal?</button>
                                                @elseif ($item->status_jurnal == 'Sudah Diposting')
                                                Gas
                                                <span>
                                                    @endif
                                                </span>
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
                {{-- Validasi Error --}}
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
@endforelse

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
