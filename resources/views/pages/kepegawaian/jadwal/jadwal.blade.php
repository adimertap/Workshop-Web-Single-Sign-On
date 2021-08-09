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
                        <div class="m-0 font-weight-bold text-primary" style="text-align: center">
                            <span>{{ $bengkel->jam_buka_bengkel }}</span> - <span>{{ $bengkel->jam_tutup_bengkel }}</span>
                        </div>
                        <hr class="my-2">
                        <p style="text-align: center">Pilih <span class="font-weight-bold text-primary"> Tanggal
                            </span> untuk melakukan pengaturan jadwal pegawai bengkel
                    </div>
                    <button id="ButtonTambah" class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah" style="display: none">
                        Tambah
                    </button>
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
</main>

<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" data-backdrop="static"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Jadwal</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form id="form1" class="d-inline">
                @csrf
                <div class="modal-body">
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
                                    <table class="table table-bordered table-hover dataTable" id="dataTablePegawai"
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
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var month = new Date().getMonth()+1;
            var year = new Date().getFullYear();

            makecalendar()

            var calendar = new FullCalendar.Calendar(calendarEl, {

                initialView: 'dayGridMonth',
                dateClick: function(date) {
                    $('#ButtonTambah').click()
                    var form1 = $('#form1')
                    var _token = form1.find('input[name="_token"]').val()
                    var table = $('#dataTablePegawai').DataTable().destroy()
                    var table = $('#dataTablePegawai').DataTable({
                        "pageLength": 5,
                        "lengthMenu": [
                            [5, 10, 20, -1],
                            [5, 10, 20, ]
                        ],
                        "ajax":{
                            'type': 'POST',
                            'url': '/kepegawaian/jadwal-pegawai/tanggal',
                            'data':{
                                    date: date.dateStr,
                                    _token: _token
                                    },
                            'dataSrc': ""
                        },
                        "columns":[
                            {"data": null, render:function(data, type, row, meta){
                                return meta.row + meta.settings._iDisplayStart+1;
                            }},
                            {"data": "nama_pegawai"},
                            {"data": "nama_jabatan"},
                            {"data": "tanggal_jadwal",render:function(data, type, row, meta){
                                console.log(row)
                                if (data == null){
                                    return `<button class="btn btn-secondary btn-xs" onclick="masuk(event,${row.id_pegawai},'${date.dateStr}')">Masuk</button>`
                                }else{
                                    return `<button class="btn btn-danger btn-xs" onclick="libur(event, ${row.id_pegawai},'${date.dateStr}')"><i class="fas fa-trash"></i></button>`
                                } 
                            }},
                            
                        ]
                    })
                }
            });
            
            calendar.render();
        });
    
    function makecalendar(){
        var calendarEl = document.getElementById('calendar');

        $.ajax({
                method: 'get',
                url: '/kepegawaian/jadwal-pegawai/tanggal',
                success:function(response){
                    var event = []
                    response.forEach(element => {

                        event.push({
                            title: 'Sudah Dijadwalkan', // a property!
                            start: element.tanggal_jadwal, // a property!
                            end: element.tanggal_jadwal
                        })
                    });
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        events: event,
                        initialView: 'dayGridMonth',

                        dateClick: function(date) {
                            $('#ButtonTambah').click()
                            var form1 = $('#form1')
                            var _token = form1.find('input[name="_token"]').val()
                            var table = $('#dataTablePegawai').DataTable().destroy()
                            var table = $('#dataTablePegawai').DataTable({
                                "pageLength": 5,
                                "lengthMenu": [
                                    [5, 10, 20, -1],
                                    [5, 10, 20, ]
                                ],
                                "ajax":{
                                    'type': 'POST',
                                    'url': '/kepegawaian/jadwal-pegawai/tanggal',
                                    'data':{
                                            date: date.dateStr,
                                            _token: _token
                                            },
                                    'dataSrc': ""
                                },
                                "columns":[
                                    {"data": null, render:function(data, type, row, meta){
                                        return meta.row + meta.settings._iDisplayStart+1;
                                    }},
                                    {"data": "nama_pegawai"},
                                    {"data": "nama_jabatan"},
                                    {"data": "tanggal_jadwal",render:function(data, type, row, meta){
                                        console.log(row)
                                        if (data == null){
                                            return `<button class="btn btn-secondary btn-xs" onclick="masuk(event,${row.id_pegawai},'${date.dateStr}')">Masuk</button>`
                                        }else{
                                            return `<button class="btn btn-danger btn-xs" onclick="libur(event, ${row.id_pegawai},'${date.dateStr}')"><i class="fas fa-trash"></i></button>`
                                        } 
                                    }},
                                    
                                ]
                            })
                        }
                    });
                    calendar.render();

                }
            })
    }

    function masuk(event, id_pegawai, date){
        event.preventDefault()
        var form1 = $('#form1')
        var _token = form1.find('input[name="_token"]').val()
        $.ajax({
                method: 'post',
                url: '/kepegawaian/jadwal-pegawai/masuk',
                data: {
                    _token: _token,
                    id_pegawai: id_pegawai,
                    date: date,
                },
                success: function (response) {
                    
                    alert('Berhasil Menambahkan Jadwal')

                    var form1 = $('#form1')
                    var _token = form1.find('input[name="_token"]').val()
                    var table = $('#dataTablePegawai').DataTable().destroy()
                    var table = $('#dataTablePegawai').DataTable({
                        "pageLength": 5,
                        "lengthMenu": [
                            [5, 10, 20, -1],
                            [5, 10, 20, ]
                        ],
                        "ajax":{
                            'type': 'POST',
                            'url': '/kepegawaian/jadwal-pegawai/tanggal',
                            'data':{
                                    date: date,
                                    _token: _token
                                    },
                            'dataSrc': ""
                        },
                        "columns":[
                            {"data": null, render:function(data, type, row, meta){
                                return meta.row + meta.settings._iDisplayStart+1;
                            }},
                            {"data": "nama_pegawai"},
                            {"data": "nama_jabatan"},
                            {"data": "tanggal_jadwal",render:function(data, type, row, meta){
                                // console.log(row)
                                if (data == null){
                                    return `<button class="btn btn-secondary btn-xs" onclick="masuk(event,${row.id_pegawai},'${date}')">Masuk</button>`
                                }else{
                                    return `<button class="btn btn-danger btn-xs" onclick="libur(event, ${row.id_pegawai},'${date}')"><i class="fas fa-trash"></i></button>`
                                } 
                            }},
                            
                        ]
                    })

                    makecalendar()
                   
                },
                error: function (response) {
                }
            });
    }

    function libur(event, id_pegawai, date){
        event.preventDefault()
        var form1 = $('#form1')
        var _token = form1.find('input[name="_token"]').val()
        $.ajax({
                method: 'post',
                url: '/kepegawaian/jadwal-pegawai/libur',
                data: {
                    _token: _token,
                    id_pegawai: id_pegawai,
                    date: date,
                },
                success: function (response) {
                    var form1 = $('#form1')
                    var _token = form1.find('input[name="_token"]').val()
                    var table = $('#dataTablePegawai').DataTable().destroy()
                    var table = $('#dataTablePegawai').DataTable({
                        "pageLength": 5,
                        "lengthMenu": [
                            [5, 10, 20, -1],
                            [5, 10, 20, ]
                        ],
                        "ajax":{
                            'type': 'POST',
                            'url': '/kepegawaian/jadwal-pegawai/tanggal',
                            'data':{
                                    date: date,
                                    _token: _token
                                    },
                            'dataSrc': ""
                        },
                        "columns":[
                            {"data": null, render:function(data, type, row, meta){
                                return meta.row + meta.settings._iDisplayStart+1;
                            }},
                            {"data": "nama_pegawai"},
                            {"data": "nama_jabatan"},
                            {"data": "tanggal_jadwal",render:function(data, type, row, meta){
                                // console.log(row)
                                if (data == null){
                                    return `<button class="btn btn-secondary btn-xs" onclick="masuk(event,${row.id_pegawai},'${date}')">Masuk</button>`
                                }else{
                                    return `<button class="btn btn-danger btn-xs" onclick="libur(event, ${row.id_pegawai},'${date}')"><i class="fas fa-trash"></i></button>`
                                } 
                            }},
                            
                        ]
                    })
                    alert('Berhasil Menghapus Jadwal')
                   makecalendar()
                },
                error: function (response) {
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

</script>

@endsection
