@extends('layouts.Admin.adminpegawai')

@section('content')
<main>
    <div class="container mt-3">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Absensi Pegawai</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal }} ·
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

@if ($jumlah_absensi != $jumlah_pegawai)
<div class="container-fluid">
    <div class="alert alert-danger alert-icon" role="alert">
        <div class="alert-icon-aside">
            <i class="fas fa-calendar-times"></i>
        </div>
        <div class="alert-icon-content">
            <h6 class="alert-heading">Informasi Hari ini!</h6>
            Anda Belum Melakukan Absensi Kepada Pegawai Bengkel
           
        </div>
    </div>
</div>
@else
<div class="container-fluid">
    <div class="alert alert-success alert-icon" role="alert">
        <div class="alert-icon-aside">
            <i class="fas fa-calendar-check"></i>
        </div>
        <div class="alert-icon-content">
            <h6 class="alert-heading">Informasi Hari ini!</h6>
            Anda Telah Melakukan Absensi Kepada Seluruh pegawai
           
        </div>
    </div>
</div>
@endif


<!-- Main page content-->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Menu Absensi</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 12rem;"
                            src="/backend/src/assets/img/freepik/absen3.png" alt="">
                    </div>
                    <h2 class="m-0 font-weight-bold text-primary" id="clock" style="text-align: center"></h2>
                    <div class="m-0 font-weight-bold text-primary" style="text-align: center">{{ $tanggal }}</div>
                    <hr class="my-2">
                    <p style="text-align: center">Klik <span class="font-weight-bold text-primary"> Mulai Absensi </span> untuk
                        melakukan
                        absensi kepada pegawai bengkel

                </div>
                <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#Modaltambah">Mulai
                    Absensi</button>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card card-header-actions">
                    <div class="card-header">Absensi Pegawai Hari ini
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
                                    <table class="table table-bordered table-hover dataTable" id="dataTableAbsensi"
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
                                                    style="width: 120px;">Nama Pegawai</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 120px;">Jabatan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 120px;">Absensi</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 120px;">Jam Masuk</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 120px;">Jam Pulang</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                                    style="width: 77px;">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody id='konfirmasi'>
                                            @forelse ($absensi as $item)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                                </th>
                                                <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                                <td>{{ $item->Pegawai->jabatan->nama_jabatan }}</td>
                                                
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
                                                <td id="item-{{ $item->id_pegawai }}">
                                                    @if($item->absensi == 'Absen_Pagi')
                                                    {{-- <button class="btn btn-secondary btn-sm" id="pulang"
                                                            onclick="pulang(event, {{ $absensi }})"
                                                    type="button" data-dismiss="modal">Pulang!</button> --}}

                                                    <a href="{{ route('absensipulang',$item->id_absensi) }}?status=Masuk"
                                                        class="btn btn-secondary btn-sm"> Pulang!
                                                    </a>
                                                    @elseif($item->absensi == 'Masuk')
                                                    {{ $item->jam_pulang }}
                                                    @else
                                                    <span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>{{ $item->keterangan }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="text-center">
                                                    Anda Belum Melakukan Absensi Pegawai
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

<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Absensi Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('absensi.store') }}" id="form1" method="POST">
                @csrf
                <div class="modal-body">
                    <h6>Hari ini</h6>
                    <div class="small mb-2">
                        <span class="font-weight-500 text-primary">{{ $tanggal }}</span>
                        <div class="font-weight-500 text-primary" id="clockmodal"></div>
                        Jumlah Pegawai: {{ $jumlah_pegawai }} Orang
                    </div>
                    <hr class="my-4">
                    <div class="form-group">
                        <label class="mr-1" for="id_pegawai">Pegawai</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <select class="form-control" name="id_pegawai" id="id_pegawai"
                            class="form-control @error('id_pegawai') is-invalid @enderror">
                            <option>Pilih Pegawai</option>
                            @foreach ($pegawai as $item)
                            <option value="{{ $item->id_pegawai }}">{{ $item->nama_pegawai }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="absensi">Absensi</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <select name="absensi" id="absensi" class="form-control"
                            class="form-control @error('absensi') is-invalid @enderror">
                            <option> Pilih Absen Pegawai</option>
                            <option value="Absen_Pagi">Masuk</option>
                            {{-- <option value="Masuk">Masuk</option> --}}
                            <option value="Ijin">Ijin</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Alpha">Alpha</option>
                        </select>
                        @error('absensi')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan" id="keteranganlabel" style="display:none">Masukan
                            Keterangan</label>
                        <input class="form-control" name="keterangan" type="text" id="keterangan"
                            placeholder="Input Keterangan" style="display:none"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Absen</button>
                </div>
            </form>
        </div>
    </div>
</div>



<template id="template">
    <tr role="row" class="odd">
        <td class="no"></td>
        <td class="id_pegawai"></td>
        <td class="jabatan"></td>
        <td class="absensi"></td>
        <td class="jam_pulang"></td>
        <td class="keterangan"></td>
    </tr>
</template>

<script>
    // On Change Absensi Field
    $(document).ready(function () {
        $('#absensi').on('change', function () {
            var select = $(this).find('option:selected')
            var absensi = select.text()
            if (absensi == 'Ijin' | absensi == 'Sakit' | absensi == 'Cuti' | absensi ==
                'Alpha') {
                $('#keterangan').show();
                $('#keteranganlabel').show();
            } else {
                $('#keterangan').hide();
                $('#keteranganlabel').hide();
            }
        })
        var tableabsensi = $('#dataTableAbsensi').DataTable()

    });

    // Waktu
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
        document.getElementById('clockmodal').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
    }

</script>

@endsection
