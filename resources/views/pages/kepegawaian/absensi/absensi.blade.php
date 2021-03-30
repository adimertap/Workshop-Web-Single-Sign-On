@extends('layouts.Admin.adminpegawai')

@section('content')
<main>
    <div class="container mt-3">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Absensi Pegawai</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Friday</span>
                    · {{ $blt }} ·
                </div>
            </div>
            <div class="small">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                Bengkel
                <span class="font-weight-500 text-primary">Adi Jaya</span>
                <hr>
                </hr>
            </div>
        </div>
    </div>
</main>
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
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 10rem;"
                            src="/backend/src/assets/img/freepik/absen.png" alt="">
                    </div>
                    <h2 class="m-0 font-weight-bold text-primary" id="clock" style="text-align: center"></h2>
                    <div class="m-0 font-weight-bold text-primary" style="text-align: center">{{ $blt }}</div>
                    <hr class="my-4">
                    <p style="text-align: center">Pilih pegawai yang akan dilakukan absensi <a target="_blank"
                            rel="nofollow" href="{{ route('pegawai.index') }}">Daftar Pegawai</a> Klik presensi untuk
                        melakukan
                        absensi kepada pegawai bengkel

                        {{-- <hr class="my-4" /> --}}
                        {{-- <div class="d-flex justify-content-between">
                        <button class="btn btn-primary">Presensi Masuk</button>
                        <button class="btn btn-secondary">Presensi Pulang</button>
                    </div> --}}

                </div>
                <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#Modaltambah">Mulai
                    Absensi Masuk !</button>
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
                                    <table class="table table-bordered table-hover dataTable" id="dataTable"
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
                                                <td>{{ $item->jam_masuk }}</td>
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
                                                <td colspan="7" class="tex-center">
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
                        <span class="font-weight-500 text-primary">{{ $blt }}</span>
                        <div class="font-weight-500 text-primary" id="clockmodal"></div>
                    </div>
                    <hr class="my-4">
                    <div class="form-group">
                        <label class="" for="id_pegawai">Pegawai</label>
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
                        <label class="small mb-1" for="absensi">Absensi</label>
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
                    <button class="btn btn-primary" type="submit">Absen Masuk!</button>
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
    function pualng(event) {
        event.PreventDefault()
        var data = $('#item-' + id_pegawai)
        var _token = $('#form1').find('input[name="_token"]').val()

    }

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

    });


    // function tambahpegawai(event, pegawai) {
    //     event.preventDefault()
    //     var form1 = $('#form1')
    //     var id_pegawai = $('#id_pegawai').val()
    //     var absensi = $('#absensi').val()
    //     var keterangan = form1.find('input[name="keterangan"]').val()
    //     var data = []
    //     var _token = form1.find('input[name="_token"]').val()

    //     $.ajax({
    //         method: 'post',
    //         url: '/kepegawaian/absensi',
    //         data: {
    //             _token: _token,
    //             id_pegawai: id_pegawai,
    //             absensi: absensi,
    //             keterangan: keterangan,
    //         },
    //         success: function (response) {
    //             console.log(response)




    //             $('#dataTable tbody').append('<tr><td>' + id_pegawai + '</td><td>' + absensi + '</td><td>' +
    //                     absensi + '</td><td>' + absensi + '</td><td>' + keterangan + '</td></tr>'),
    //                 $('#form1')[0].reset();
    //         },
    //         error: function (error) {
    //             console.log(error)
    //         }

    //     });




    //     // dataTablekonfirmasi
    // }

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
