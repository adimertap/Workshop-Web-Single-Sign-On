@extends('layouts.Admin.adminsinglesignon')

@section('content')

<main>
        <div class="container mt-3">
            <!-- Custom page header alternative example-->
            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                <div class="mr-4 mb-3 mb-sm-0">
                    <h1 class="mb-0">Dashboard Bengkel</h1>
                    <div class="small">
                        <span class="font-weight-500 text-primary">Welcome</span>
                        · Page · Bengkel
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="container">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <h5 class="alert-heading">Informasi, Simak dengan Baik</h5>
            Getting Started, Seluruh panduan kami berikan pada link berikut <a class="alert-link" href="javascript:void(0);">Panduan Pengguaan Sistem</a>
        </div>
    </div>
    

    <div class="container">
        <div class="row">
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 1-->
                <a class="card lift h-100" href="{{ route('dashboardfrontoffice') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Front Office<i class="mdi mdi-office-building-marker-outline:"></i></h5>
                                <div class="text-muted">Pengelolaan Office Bengkel</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/browser-stats-pana.svg"
                                alt="..." style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 2-->
                <a class="card lift h-100" href="{{ route('dashboardservice') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Service</h5>
                                <div class="text-muted">Pengelolaan Service Bengkel</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/processing-pana.svg"
                                alt="..." style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 3-->
                <a class="card lift h-100" href="{{ route('dashboardpointofsales') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Point Of Sales</h5>
                                <div class="text-muted">Pengelolaan Penjualan Bengkel</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/windows-pana.svg" alt="..."
                                style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 3-->
                <a class="card lift h-100" href="{{ route('dashboardaccounting') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Marketplace</h5>
                                <div class="text-muted">Marketplace Bengkel</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/windows-pana.svg" alt="..."
                                style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    {{-- BARIS 2 --}}
    <div class="container">
        <div class="row">
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 1-->
                <a class="card lift h-100" href="{{ route('dashboardinventory') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Inventory</h5>
                                <div class="text-muted">Pengelolaan Persediaan Barang</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/ilustrasi/inventoryilustration.jpg" alt="..."
                                style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 2-->
                <a class="card lift h-100" href="{{ route('dashboardpegawai') }}">
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
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 3-->
                <a class="card lift h-100" href="{{ route('dashboardpayroll') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Payroll</h5>
                                <div class="text-muted">Pengelolaan Gaji Pegawai</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/processing-pana.svg"
                            alt="..." style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 3-->
                <a class="card lift h-100" href="{{ route('dashboardaccounting') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Accounting</h5>
                                <div class="text-muted">Pengelolaan Keuangan Bengkel</div>
                            </div>
                            
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/browser-stats-pana.svg"
                            alt="..." style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection
