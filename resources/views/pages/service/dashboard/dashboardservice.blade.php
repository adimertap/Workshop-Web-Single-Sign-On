@extends('layouts.Admin.adminservice')

@section('content')
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            Dashboard Service
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">{{ $today }}</span>
                            · Tanggal {{ $tanggal_tahun }} · <span id="clock">12:16 PM</span>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="small">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            Bengkel
                            <span class="font-weight-500">{{ Auth::user()->bengkel->nama_bengkel}}</span>
                            <hr>
                            </hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-n10">
        <div class="card card-waves mb-4">
            <div class="card-body p-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col">
                        <h2 class="text-primary">Selamat Datang, {{ Auth::user()->pegawai->nama_pegawai}}!</h2>
                        <p class="text-gray-700"><b>Aplikasi E-Bengkel </b>menggunakan teknologi web secara online yang
                            memudahkan
                            Anda untuk melakukan penerimaan dan pengerjaan service.
                        </p>

                        <a class="btn btn-primary btn-sm px-3 py-2" href="{{ route('pelayananservice.index') }}">
                            Get Started
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-arrow-right ml-1">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>

                    </div>
                    <div class="col d-none d-lg-block mt-xxl-n5">
                        <img class="img-fluid px-xl-4 mt-xxl-n6" style="width: 23rem; margin-bottom: 60px;"
                            src="/backend/src/assets/img/service.jpg">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4">
            <!-- Dashboard info widget 1-->
            <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small font-weight-bold text-primary mb-1">Jumlah Hadir Mekanik</div>
                            <div class="h6">Jumlah : {{ $mekanik_count }}</div>
                        </div>
                        <div class="ml-2"><svg class="svg-inline--fa fa-dollar-sign fa-w-9 fa-2x text-gray-200"
                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z">
                                </path>
                            </svg><!-- <i class="fas fa-dollar-sign fa-2x text-gray-200"></i> -->
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="{{ route('jadwalmekanik.index') }}">Cek Disini</a>
                    <div class="small"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true"
                            focusable="false" data-prefix="fas" data-icon="angle-right" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-right"></i> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <!-- Dashboard info widget 2-->
            <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-secondary h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <div class="small font-weight-bold text-secondary mb-1">Pengerjaan Service</div>
                            <div class="h6">Jumlah : 3 </div>
                        </div>
                        <div class="ml-2"><svg class="svg-inline--fa fa-tag fa-w-16 fa-2x text-gray-200"
                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tag" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z">
                                </path>
                            </svg><!-- <i class="fas fa-tag fa-2x text-gray-200"></i> -->
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small stretched-link" href="{{ route('pengerjaanservice.index') }}">Cek Disini</a>
                    <div class="small"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true"
                            focusable="false" data-prefix="fas" data-icon="angle-right" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z">
                            </path>
                        </svg><!-- <i class="fas fa-angle-right"></i> -->
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
