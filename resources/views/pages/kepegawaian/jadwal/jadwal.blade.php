@extends('layouts.Admin.adminpegawai')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Jadwal Pegawai</h1>
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
        <div class="row">
            <div class="col-lg-3">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Jadwal</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 17rem;"
                                src="/backend/src/assets/img/freepik/jadwal2.png" alt="">
                        </div>
                        <h2 class="m-0 font-weight-bold text-primary" style="text-align: center">Jam Kerja</h2>
                        <div class="m-0 font-weight-bold text-primary" style="text-align: center">Pukul 08.00 - 16.00
                        </div>
                        <hr class="my-2">
                        <p style="text-align: center">Pilih <span class="font-weight-bold text-primary"> Tanggal
                            </span> untuk melakukan pengaturan jadwal pegawai bengkel
                    </div>

                </div>
            </div>
            <div class="col-lg-9">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Kalendar Jadwal</h6>
                    </div>
                    <div class="card-body">
                        <div class="mr-3 ml-3" id="calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header">Jadwal Seluruh Pegawai
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datatable">
                            @if(session('messageberhasil'))
                            <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                                {{ session('messageberhasil') }}
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

                            {{-- SHOW ENTRIES --}}
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
                                                        style="width: 180px;">Nama Pegawai</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 120px;">Jabatan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id='konfirmasi'>
                                                @forelse ($pegawai as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}
                                                    </th>
                                                    <td>{{ $item->nama_pegawai }}</td>
                                                    <td>{{ $item->jabatan->nama_jabatan }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('jadwal-pegawai.create',$item->id_pegawai) }}"
                                                            class="btn btn-secondary btn-xs"> Atur Jadwal
                                                        </a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">
                                                        Tidak ada Data Pegawai
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
</main>

<script>
   
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth'
        });
        calendar.render();
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
