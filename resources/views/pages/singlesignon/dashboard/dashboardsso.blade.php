@extends('layouts.Admin.adminsinglesignon')

@section('content')

<main>
    <div class="container mt-4">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Dashboard Bengkel</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal_tahun }} · <span id="clock">12:16 PM</span>
                </div>

            </div>
        </div>
    </div>
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
<div class="container">
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
<div class="container">
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <h4 class="alert-heading">Halo, {{ Auth::user()->pegawai->nama_pegawai }}</h4>
        Seluruh panduan penggunaan sistem dapat diakses pada link berikut <a class="alert-link"
            href="javascript:void(0);">Panduan Penggunaan Sistem</a>
    </div>
</div>

<div class="container">
    <div class="row">
        @if(Auth::user()->role == 'admin_front_office' || Auth::user()->role == 'owner')
        <div class="col-3 mt-4">
            <!-- Dashboard example card 1-->
            <a class="card lift h-100" href="{{ route('dashboardfrontoffice') }}">
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
        @if (Auth::user()->role == 'admin_service_advisor' || Auth::user()->role == 'admin_service_instructor' ||
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

        @if (Auth::user()->role == 'admin_kasir' || Auth::user()->role == 'owner')
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

        @if (Auth::user()->role == 'admin_marketplace' || Auth::user()->role == 'owner')
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
        @if (Auth::user()->role == 'admin_gudang' || Auth::user()->role == 'admin_purchasing' || Auth::user()->role ==
        'owner')
        <div class="col-3 mt-4">
            <!-- Dashboard example card 1-->
            <a class="card lift h-100" href="{{ route('dashboardinventory') }}">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <h5>Inventory</h5>
                            <div class="text-muted">Pengelolaan Persediaan Barang</div>
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
                            <div class="text-muted">Pengelolaan Human Resources</div>
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

        @if (Auth::user()->role == 'admin_accounting' || Auth::user()->role == 'admin_accounting' ||
        Auth::user()->role == 'owner')
        <div class="col-3 mt-4">
            <!-- Dashboard example card 3-->
            <a class="card lift h-100" href="{{ route('dashboardaccounting') }}">
                <div class="card-body d-flex justify-content-center flex-column">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="mr-3">
                            <h5>Accounting</h5>
                            <div class="text-muted">Pengelolaan Keuangan Bengkel</div>
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
