@extends('layouts.Admin.adminaccounting')

@section('content')
<main>

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            Dashboard Accounting
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">{{ $today }}</span>
                            · Tanggal {{ $tanggal }} · <span id="clock">12:16 PM</span>
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




    {{-- <div class="container mt-5">
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
</main> --}}
<!-- Main page content-->
<div class="container-fluid mt-n10">
    <div class="card card-waves h-100">
        <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
            <div class="row align-items-center">
                <div class="col-xl-8 col-xxl-12">
                    <div class="text-left px-4 mb-4 mb-xl-0 mb-xxl-4">
                        <h2 class="text-primary">Selamat Datang, {{ Auth::user()->pegawai->nama_pegawai}}!</h2>
                        <p class="text-gray-700 mb-0"><b> Modul Accounting</b> membantu pembukuan & operasional bisnis bengkel menjadi lebih mudah & efisien. Kelola usaha dengan solusi automasi, real-time, kapanpun & dimanapun.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid"
                        src="/backend/src/assets/img/freepik/accounting.png" style="max-width: 11rem;"></div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-xxl-3 col-lg-3">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-3">
                            <div class="text-white-75 small">Penjualan Sparepart</div>
                            <div class="text-lg font-weight-bold ">Rp <span>{{ number_format($pendapatan_penjualan,2,',','.') }}</span></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" target="_blank" href="{{ route('pemasukan-kasir.index') }}">Lihat Laporan</a>
                    <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true"
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
        <div class="col-xxl-3 col-lg-3">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-3">
                            <div class="text-white-75 small">Pendapatan Service</div>
                            <div class="text-lg font-weight-bold ">Rp <span>{{ number_format($pendapatan_service,2,',','.') }}</span></div>
                        </div>
                        
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" target="_blank" href="{{ route('pemasukan-kasir.index') }}">Lihat Laporan</a>
                    <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true"
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
        <div class="col-xxl-3 col-lg-3">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-3">
                            <div class="text-white-75 small">Pendapatan Marketplace</div>
                            <div class="text-lg font-weight-bold ">Rp <span>{{ number_format($pendapatan_marketplace,2,',','.') }}</span></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" target="_blank" href="{{ route('pemasukan-kasir.index') }}">Lihat Laporan</a>
                    <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true"
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
        <div class="col-xxl-3 col-lg-3">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-3">
                            <div class="text-white-75 small">Total Hutang (Supplier)</div>
                            <div class="text-lg font-weight-bold ">Rp <span>{{ number_format($hutang_supplier,2,',','.') }}</span></div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" target="_blank" href="{{ route('invoice-payable.index') }}">Lihat Invoice</a>
                    <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8" aria-hidden="true"
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
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xxl-4 col-xl-6 mb-4">
            <div class="card card-header-actions h-100">
                <div class="card-header">
                    Invoice Supplier
                </div>
                <div class="card-body">
                    <div class="timeline timeline-xs">
                        <!-- Timeline Item 1-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text font-weight-bold text-dark">{{ $invoice }}</div>
                                <div class="timeline-item-marker-indicator bg-green"></div>
                            </div>
                            <div class="timeline-item-content">
                                Jumlah <span class="font-weight-bold text-dark"> Invoice </span> Supplier Inventory
                            </div>
                        </div>
                        <!-- Timeline Item 2-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text font-weight-bold text-dark">{{ $invoice_prf_belum }}</div>
                                <div class="timeline-item-marker-indicator bg-blue"></div>
                            </div>
                            <div class="timeline-item-content">
                                Jumlah <span class="font-weight-bold text-dark"> Invoice </span> Belum di Buat PRF
                                Inventory
                            </div>
                        </div>
                        <!-- Timeline Item 3-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text font-weight-bold text-dark">{{ $invoice_prf_sudah }}</div>
                                <div class="timeline-item-marker-indicator bg-purple"></div>
                            </div>
                            <div class="timeline-item-content">
                                Jumlah <span class="font-weight-bold text-dark"> Invoice </span> Sudah di Buat PRF
                                Inventory
                            </div>
                        </div>
                        <!-- Timeline Item 4-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text font-weight-bold text-dark">1</div>
                                <div class="timeline-item-marker-indicator bg-danger"></div>
                            </div>
                            <div class="timeline-item-content">
                                Jumlah <span class="font-weight-bold text-dark"> Invoice </span> Melewati Batas Pembayaran
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-4 col-xl-6 mb-4">
            <div class="card card-header-actions h-100">
                <div class="card-header">
                    Payment Requisition Form
                </div>
                <div class="card-body">
                    <div class="timeline timeline-xs">
                        <!-- Timeline Item 1-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text font-weight-bold text-dark">{{ $prf }}</div>
                                <div class="timeline-item-marker-indicator bg-green"></div>
                            </div>
                            <div class="timeline-item-content">
                                Jumlah <span class="font-weight-bold text-dark"> PRF </span>
                            </div>
                        </div>
                        <!-- Timeline Item 2-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text font-weight-bold text-dark">{{ $prf_pending }}</div>
                                <div class="timeline-item-marker-indicator bg-blue"></div>
                            </div>
                            <div class="timeline-item-content">
                                Jumlah <span class="font-weight-bold text-dark"> PRF </span> Pending
                            </div>
                        </div>
                        <!-- Timeline Item 3-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text font-weight-bold text-dark">{{ $prf_approve }}</div>
                                <div class="timeline-item-marker-indicator bg-purple"></div>
                            </div>
                            <div class="timeline-item-content">
                                Jumlah <span class="font-weight-bold text-dark"> PRF </span> Approved
                                
                            </div>
                        </div>
                        <!-- Timeline Item 4-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text font-weight-bold text-dark">{{ $prf_tolak }}</div>
                                <div class="timeline-item-marker-indicator bg-danger"></div>
                            </div>
                            <div class="timeline-item-content">
                                Jumlah <span class="font-weight-bold text-dark"> PRF </span> Not Approved
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>



<script type="text/javascript">

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
