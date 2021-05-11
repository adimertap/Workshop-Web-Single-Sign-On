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
    <div class="card h-100">
        <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
            <div class="row align-items-center">
                <div class="col-xl-8 col-xxl-12">
                    <div class="text-center px-4 mb-4 mb-xl-0 mb-xxl-4">
                        <h1 class="text-primary">Welcome Back!</h1>
                        <p class="text-gray-700 mb-0">It's time to get started! View new opportunities now, or
                            continue on your previous work.</p>
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
        <div class="col-xxl-3 col-lg-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-3">
                            <div class="text-white-75 small">Pemasukan (Bulan ini)</div>
                            <div class="text-lg font-weight-bold">Rp <span>4.500.000</span></div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-calendar feather-xl text-white-50">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Lihat Laporan</a>
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
        <div class="col-xxl-3 col-lg-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="mr-3">
                            <div class="text-white-75 small">Total Hutang (Supplier)</div>
                            <div class="text-lg font-weight-bold">Rp <span>500.000</span></div>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-dollar-sign feather-xl text-white-50">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">Lihat Laporan</a>
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
                                <div class="timeline-item-marker-text font-weight-bold text-dark">1</div>
                                <div class="timeline-item-marker-indicator bg-green"></div>
                            </div>
                            <div class="timeline-item-content">
                                Jumlah <span class="font-weight-bold text-dark"> Invoice </span> Supplier Inventory
                            </div>
                        </div>
                        <!-- Timeline Item 2-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text font-weight-bold text-dark">1</div>
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
                                <div class="timeline-item-marker-text font-weight-bold text-dark">13</div>
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
                                <div class="timeline-item-marker-text font-weight-bold text-dark">2</div>
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
                                <div class="timeline-item-marker-text font-weight-bold text-dark">1</div>
                                <div class="timeline-item-marker-indicator bg-green"></div>
                            </div>
                            <div class="timeline-item-content">
                                Jumlah <span class="font-weight-bold text-dark"> PRF </span>
                            </div>
                        </div>
                        <!-- Timeline Item 2-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text font-weight-bold text-dark">12</div>
                                <div class="timeline-item-marker-indicator bg-blue"></div>
                            </div>
                            <div class="timeline-item-content">
                                Jumlah <span class="font-weight-bold text-dark"> PRF </span> Pending
                            </div>
                        </div>
                        <!-- Timeline Item 3-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text font-weight-bold text-dark">1</div>
                                <div class="timeline-item-marker-indicator bg-purple"></div>
                            </div>
                            <div class="timeline-item-content">
                                Jumlah <span class="font-weight-bold text-dark"> PRF </span> Approved
                                
                            </div>
                        </div>
                        <!-- Timeline Item 4-->
                        <div class="timeline-item">
                            <div class="timeline-item-marker">
                                <div class="timeline-item-marker-text font-weight-bold text-dark">2</div>
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
