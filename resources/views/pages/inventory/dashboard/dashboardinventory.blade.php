@extends('layouts.Admin.admininventory')

@section('content')
<main>

    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            Dashboard Inventory
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



    {{-- <div class="container mt-5">
        
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Dashboard Inventory</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal_tahun }} · <span id="clock">12:16 PM</span>
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
    </div> --}}

   
        @if ($sparepart_kosong == 0 | $sparepart_kosong == null)
        <div class="container">
            <div class="alert alert-danger alert-icon" role="alert">
                <div class="alert-icon-aside">
                    <i class="fas fa-cog"></i>
                </div>
                <div class="alert-icon-content">
                    <h6 class="alert-heading">Informasi Sparepart!</h6>
                    Anda belum memiliki data sparepart, silahkan menambahkan data sparepart pada menu master data!
                </div>
            </div>
        </div>

        @else

        @endif
   



    <div class="container mt-n10">
        <div class="card card-waves mb-4">
            <div class="card-body p-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col">
                        <h2 class="text-primary">Selamat Datang, {{ Auth::user()->pegawai->nama_pegawai}}!</h2>
                        <p class="text-gray-700"><b>Bengkel-Kuy </b>menggunakan teknologi web secara online yang
                            memudahkan
                            Anda untuk memonitor inventory atau persediaan sparepart Anda selama 7x24 jam.
                        </p>

                        @if ($sparepart_kosong == 0 | $sparepart_kosong == null)
                        <a class="btn btn-primary btn-sm px-3 py-2" href="{{ route('sparepart.index') }}">
                            Get Started
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-arrow-right ml-1">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                        @else
                        <a class="btn btn-primary btn-sm px-3 py-2" href="{{ route('purchase-order.index') }}">
                            Get Started
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-arrow-right ml-1">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                        @endif
                       
                    </div>
                    <div class="col d-none d-lg-block mt-xxl-n5"><img class="img-fluid px-xl-4 mt-xxl-n6"
                            style="width: 23rem;" src="/backend/src/assets/img/freepik/logistic5.png"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 1-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-primary mb-1">Stock Opname</div>
                                <div class="h6">Total: {{ $opname }}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-cubes" style="color: gainsboro"></i> </svg>
                            </div>

                        </div>
                        <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trending-up mr-1">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            Hari ini + <span>{{ $opname_today }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 2-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-secondary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-secondary mb-1">Purchase Order</div>
                                <div class="h6">Total: {{ $po }}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-shopping-cart" style="color: gainsboro"></i>
                            </div>
                        </div>
                        <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trending-up mr-1">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            Hari ini + <span>{{ $po_today }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 4-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-info mb-1">Receiving</div>
                                <div class="h6">Total: {{ $rcv }}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-box-open" style="color: gainsboro"></i>
                            </div>
                        </div>
                        <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trending-up mr-1">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            Hari ini + <span>{{ $rcv_today }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <!-- Dashboard info widget 3-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-success h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-success mb-1">Retur</div>
                                <div class="h6">Total: {{ $retur }}</div>
                            </div>
                            <div class="ml-2"><i class="fas fa-truck-loading" style="color: gainsboro"></i>
                            </div>
                        </div>
                        <div class="text-xs font-weight-bold text-success d-inline-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-trending-up mr-1">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                            Hari ini + <span>{{ $retur_today }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-secondary h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-secondary mb-1">Opname Approval</div>
                                <div class="small">
                                    <span class="font-weight-400 text-primary">Pending</span>
                                    Jumlah : {{ $opname_pending }}
                                </div>
                                <div class="small">
                                    <span class="font-weight-400 text-primary">Approved</span>
                                    Jumlah : {{ $opname_approve }}
                                </div>
                                <div class="small">
                                    <span class="font-weight-400 text-primary">Not Approved</span>
                                    Jumlah : {{ $opname_tolak }}
                                </div>
                            </div>
                            <div class="ml-2"><svg class="svg-inline--fa fa-dollar-sign fa-w-9 fa-2x text-gray-200"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Dashboard info widget 4-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-info mb-1">Purchasing Approval</div>
                                <div class="small">
                                    <span class="font-weight-400 text-primary">Pending</span>
                                    Jumlah : {{ $po_pending }}
                                </div>
                                <div class="small">
                                    <span class="font-weight-400 text-primary">Approve</span>
                                    Jumlah : {{ $po_approve }}
                                </div>
                                <div class="small">
                                    <span class="font-weight-400 text-primary">Not Approved</span>
                                    Jumlah : {{ $po_tolak }}
                                </div>
                            </div>
                            <div class="ml-2"><svg class="svg-inline--fa fa-percentage fa-w-12 fa-2x text-gray-200"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="percentage"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M109.25 173.25c24.99-24.99 24.99-65.52 0-90.51-24.99-24.99-65.52-24.99-90.51 0-24.99 24.99-24.99 65.52 0 90.51 25 25 65.52 25 90.51 0zm256 165.49c-24.99-24.99-65.52-24.99-90.51 0-24.99 24.99-24.99 65.52 0 90.51 24.99 24.99 65.52 24.99 90.51 0 25-24.99 25-65.51 0-90.51zm-1.94-231.43l-22.62-22.62c-12.5-12.5-32.76-12.5-45.25 0L20.69 359.44c-12.5 12.5-12.5 32.76 0 45.25l22.62 22.62c12.5 12.5 32.76 12.5 45.25 0l274.75-274.75c12.5-12.49 12.5-32.75 0-45.25z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Dashboard info widget 4-->
                <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-info h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <div class="small font-weight-bold text-info mb-1">Purchasing AP Approval</div>
                                <div class="small">
                                    <span class="font-weight-400 text-primary">Pending</span>
                                    Jumlah : {{ $poap_pending }}
                                </div>
                                <div class="small">
                                    <span class="font-weight-400 text-primary">Approve</span>
                                    Jumlah : {{ $poap_approve }}
                                </div>
                                <div class="small">
                                    <span class="font-weight-400 text-primary">Not Approved</span>
                                    Jumlah : {{ $poap_tolak }}
                                </div>
                            </div>
                            <div class="ml-2"><svg class="svg-inline--fa fa-mouse-pointer fa-w-10 fa-2x text-gray-200"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="mouse-pointer"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"
                                    data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M302.189 329.126H196.105l55.831 135.993c3.889 9.428-.555 19.999-9.444 23.999l-49.165 21.427c-9.165 4-19.443-.571-23.332-9.714l-53.053-129.136-86.664 89.138C18.729 472.71 0 463.554 0 447.977V18.299C0 1.899 19.921-6.096 30.277 5.443l284.412 292.542c11.472 11.179 3.007 31.141-12.5 31.141z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p></p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Jumlah Sparepart Akan Habis</div>
                                <div class="font-weight-bold ">Jumlah : <span>{{ $sparepart_akan_habis }}</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" target="_blank"
                            href="{{ route('purchase-order.index') }}">Lakukan Pembelian </a>
                        <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8"
                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z">
                                </path>
                            </svg><!-- <i class="fas fa-angle-right"></i> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="mr-3">
                                <div class="text-white-75 small">Jumlah Sparepart Habis</div>
                                <div class=" font-weight-bold ">Jumlah : <span>{{ $sparepart_habis }}</span></div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" target="_blank"
                            href="{{ route('purchase-order.index') }}">Lakukan Pembelian</a>
                        <div class="small text-white"><svg class="svg-inline--fa fa-angle-right fa-w-8"
                                aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
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
