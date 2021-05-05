@extends('layouts.Admin.adminpegawai')

@section('content')
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Dashboard Pegawai</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal }} · <span id="clock"> 12:16 PM </span>
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
<div class="container mt-2">
    <!-- Account page navigation-->
    <nav class="nav nav-borders">
        <a class="nav-link active ml-0" href="account-profile.html">Profile Pegawai</a>
        <a class="nav-link" href="account-security.html">Security</a>
        <a class="nav-link" href="account-security.html">Absensi Pegawai</a>
    </nav>
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2"
                        src="/backend/src/assets/img/freepik/profiles/profile-6.png" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">Upload Profile Picture Pegawai</div>
                    <!-- Profile picture upload button-->
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card card-header-actions mb-4">
                <div class="card-header">Profile Pegawai
                    <button class="btn btn-sm btn-primary">Edit Profile</button>
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
                                <label class="small text-muted line-height-normal">: {{ Auth::user()->name }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">NIP
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: 192003994982
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Jabatan
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: Inventory
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Nama Panggilan
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: Adim
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Tempat Lahir
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: Tabanan
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Tanggal Lahir
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: 29 Agustus 1998
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Jenis Kelamin
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: Laki-Laki
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Agama
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: Hindu
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">No Telephone
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: 081246602400
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Status Perkawinan
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: Lajang
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Jumlah Tanggungan
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: -
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Email
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: adimertap@gmail.com
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Alamat Lengkap
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: Jl. Anyelir Bongan Kauh Tabanan
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Kota Asal
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: Tabanan
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Pendidikan Terakhir
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: SMK
                            </div>
                        </div>
                    </form>
                </div>
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
