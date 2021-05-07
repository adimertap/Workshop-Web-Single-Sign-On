@extends('layouts.Admin.adminaccounting')

@section('content')
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Dashboard Accounting</h1>
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
<!-- Main page content-->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-8">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Getting Started</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 13rem;"
                            src="/backend/src/assets/img/ilustrasi/inventoryilustration.jpg" alt="">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 13rem;"
                            src="/backend/src/assets/img/ilustrasi/logistic.jpg" alt="">
                    </div>
                    <h2 class="m-0 font-weight-bold text-primary" style="text-align: center">Selamat Datang, {{ Auth::user()->pegawai->nama_pegawai }}</h2>
                    <p></p>
                    <p style="text-align: center">Add some quality, svg illustrations to your project courtesy of <a
                            target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated
                        collection of beautiful svg images that you can use completely free and without attribution!</p>
                </div>
            </div>
        </div>

        {{-- Profile  --}}
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Profile Pegawai</div>
                <div class="card-body">
                    <!-- Row Profile 1-->
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center flex-shrink-0 mr-3">
                            <div class="avatar avatar-xl mr-3 bg-gray-200"><img class="avatar-img img-fluid"
                                    src="/backend/src/assets/img/freepik/profiles/profile-6.png" alt=""></div>
                            <div class="d-flex flex-column font-weight-bold">
                                <a class="text-dark line-height-normal mb-1" ">{{ Auth::user()->pegawai->nama_pegawai }}</a>
                                    <div class=" small text-muted line-height-normal">Bagian Gudang</div>
                        </div>
                    </div>
                    <div class="dropdown no-caret">
                        <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownPeople1"
                            type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-more-vertical">
                                <circle cx="12" cy="12" r="1"></circle>
                                <circle cx="12" cy="5" r="1"></circle>
                                <circle cx="12" cy="19" r="1"></circle>
                            </svg></button>
                        <div class="dropdown-menu dropdown-menu-right animated--fade-in-up"
                            aria-labelledby="dropdownPeople1" style="">
                            <a class="dropdown-item"
                                href="https://themes.startbootstrap.com/sb-admin-pro/dashboard-2.html#!">Lihat
                                Profile</a>
                            <a class="dropdown-item"
                                href="https://themes.startbootstrap.com/sb-admin-pro/dashboard-2.html#!">Edit
                                Profile</a>
                        </div>
                    </div>
                </div>

                <form>
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
                                <label class="small text-muted line-height-normal">Alamat
                            </div>
                        </div>
                        <div class="col">
                            <label class="small text-muted line-height-normal">: {{ Auth::user()->pegawai->alamat }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="d-flex flex-column font-weight-bold">
                                <label class="small text-muted line-height-normal">Telephone
                            </div>
                        </div>
                        <div class="col">
                            <label class="small text-muted line-height-normal">: {{ Auth::user()->pegawai->no_telp }}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
       document.getElementById('clockmodal').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
   }
</script>

@endsection
