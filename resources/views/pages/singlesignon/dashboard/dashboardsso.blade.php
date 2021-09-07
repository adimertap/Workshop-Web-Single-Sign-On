@extends('layouts.Admin.adminsinglesignon')

@section('content')

<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container mb-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            Dashboard Bengkel
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
    {{-- <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Dashboard Bengkel</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal_tahun }} · <span id="clock">12:16 PM</span>
                </div>

            </div>
        </div>
    </div> --}}
</main>

<script>
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
    }

</script>

@if (Auth::check() && !Auth::user()->email_verified_at)
<div class="container mt-n10">
    <div class="alert alert-danger" role="alert">
        Anda belum verifikasi email,
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit"
                class="text-danger btn btn-link p-0 m-0 align-baseline">{{ __('verifikasi ulang') }}</button>
        </form>.
    </div>
    @if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
    </div>
    @endif
</div>
@endif
<div class="container mt-n15">
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Halo, {{ Auth::user()->pegawai->nama_pegawai }}</h4>
        Seluruh panduan penggunaan sistem dapat diakses pada link <a class="alert-link"
            href="https://drive.google.com/file/d/1TUVXBCzFcM1WM6ZsRfnXLoP61i3-nC07/view?usp=sharing" target="_blank">User Guide</a>
    </div>
</div>

<div class="container mt-n4">
    <div class="row">
        @if(Auth::user()->hasRole('Aplikasi Front Office') || Auth::user()->role == 'owner')
        <div class="col-3 mt-4">
            <!-- Dashboard example card 1-->
            <a class="card lift h-100" href="https://pos.bengkel-kuy.com/sso">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <h5>Front Office<i class="mdi mdi-office-building-marker-outline:"></i></h5>
                            <div class="text-muted">Pengelolaan Layanan Bengkel</div>
                        </div>
                        <img class="card-img-top" src="/backend/src/assets/img/freepik/browser-stats-pana.svg" alt="..."
                            style="width: 5rem;">
                    </div>
                </div>
            </a>
        </div>
        @endif
        @if (Auth::user()->hasRole('Aplikasi Service Advisor') || Auth::user()->hasRole('Aplikasi Service Instructor') ||
        Auth::user()->role == 'owner')
        <div class="col-3 mt-4">
            <!-- Dashboard example card 2-->
            <a class="card lift h-100" href="{{ route('dashboardservice') }}">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <h5>Service</h5>
                            <div class="text-muted">Pengelolaan Service Bengkel</div>
                        </div>
                        <img class="card-img-top" src="/backend/src/assets/img/freepik/processing-pana.svg" alt="..."
                            style="width: 5rem;">
                    </div>
                </div>
            </a>
        </div>
        @endif

        @if (Auth::user()->hasRole('Aplikasi Point of Sales') || Auth::user()->role == 'owner')
        <div class="col-3 mt-4">
            <!-- Dashboard example card 3-->
            <a class="card lift h-100" href="{{ route('dashboardpointofsales') }}">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <h5>Point Of Sales</h5>
                            <div class="text-muted">Pengelolaan Transaksi Penjualan</div>
                        </div>
                        <img class="card-img-top" src="/backend/src/assets/img/freepik/cashier.svg" alt="..."
                            style="width: 7rem;">
                    </div>
                </div>
            </a>
        </div>
        @endif

        @if (Auth::user()->hasRole('Aplikasi Marketplace') || Auth::user()->role == 'owner')
        <div class="col-3 mt-4">
            <!-- Dashboard example card 3-->
            <a class="card lift h-100" href="{{ route('dashboardmarketplace') }}">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <h5>Marketplace</h5>
                            <div class="text-muted">Pengelolaan Marketplace Bengkel</div>
                        </div>
                        <img class="card-img-top" src="/backend/src/assets/img/freepik/marketplace.svg" alt="..."
                            style="width: 6.8rem;">
                    </div>
                </div>
            </a>
        </div>
        @endif
    </div>
</div>
{{-- BARIS 2 --}}
<div class="container">
    <div class="row">
        @if (Auth::user()->hasRole('Aplikasi Gudang') || Auth::user()->hasRole('Aplikasi Purchasing') || Auth::user()->role ==
        'owner' || Auth::user()->hasRole('Aplikasi Accounting'))
        <div class="col-3 mt-4">
            <!-- Dashboard example card 1-->
            <a class="card lift h-100" href="{{ route('dashboardinventory') }}">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <h5>Inventory</h5>
                            <div class="text-muted">Pengelolaan Persediaan Sparepart</div>
                        </div>
                        <img class="card-img-top" src="/backend/src/assets/img/freepik/logistic5.png" alt="..."
                            style="width: 5rem;">
                    </div>
                </div>
            </a>
        </div>
        @endif

        @if (Auth::user()->role == 'owner')
        <div class="col-3 mt-4">
            <!-- Dashboard example card 2-->
            <a class="card lift h-100" href="{{ route('pegawai.index') }}">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <h5>Kepegawaian</h5>
                            <div class="text-muted">Pengelolaan Kepegawaian</div>
                        </div>
                        <img class="card-img-top" src="/backend/src/assets/img/freepik/windows-pana.svg" alt="..."
                            style="width: 5rem;">
                    </div>
                </div>
            </a>
        </div>
        @endif

        @if (Auth::user()->role == 'owner')
        <div class="col-3 mt-4">
            <!-- Dashboard example card 3-->
            <a class="card lift h-100" href="{{ route('gaji-pegawai.index') }}">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <h5>Payroll</h5>
                            <div class="text-muted">Pengelolaan Gaji Pegawai</div>
                        </div>
                        <img class="card-img-top" src="/backend/src/assets/img/freepik/wallet.svg" alt="..."
                            style="width: 7rem;">
                    </div>
                </div>
            </a>
        </div>
        @endif

        @if (Auth::user()->hasRole('Aplikasi Accounting') ||
        Auth::user()->role == 'owner')
        <div class="col-3 mt-4">
            <!-- Dashboard example card 3-->
            <a class="card lift h-100" href="{{ route('dashboardaccounting') }}">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <h5>Accounting</h5>
                            <div class="text-muted">Pengelolaan Akuntansi Keuangan</div>
                        </div>

                        <img class="card-img-top" src="/backend/src/assets/img/freepik/accounting.svg" alt="..."
                            style="width: 6rem;">
                    </div>
                </div>
            </a>
        </div>
        @endif

    </div>
</div>

@endsection
