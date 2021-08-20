@extends('layouts.Admin.adminsinglesignon')

@section('content')
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Profile Pengguna</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal }} · <span id="clock"> 12:16 PM </span>
                </div>
            </div>
            <div class="small">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                Bengkel
                <span class="font-weight-500 text-primary">{{ Auth::user()->bengkel->nama_bengkel}}</span>
            </div>
        </div>
    </div>
</main>
<div class="container mt-2">
    <div class="row">

        <div class="col-12">
            <!-- Account details card-->
            <div class="card card-header-actions mb-4">
                <div class="card-header">Profile Pengguna
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Nama Lengkap Pegawai
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">:
                                    {{ Auth::user()->pegawai->nama_pegawai }}
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Jabatan
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ Auth::user()->pegawai->jabatan->nama_jabatan }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Username
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ Auth::user()->username }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Tempat Lahir
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ Auth::user()->pegawai->tempat_lahir }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Tanggal Lahir
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ Auth::user()->pegawai->tanggal_lahir }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Jenis Kelamin
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ Auth::user()->pegawai->jenis_kelamin }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">No Telephone
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ Auth::user()->pegawai->no_telp }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Email
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ Auth::user()->email }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center">
            <a href="{{ route('password.edit') }}" class="btn btn-primary"><i data-feather="key" class="mr-2"></i>  Ganti Password</a>
            </div>
        </div>
    </div>
</div>
</main>

<script>
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
