@extends('layouts.Admin.admininventory')

@section('content')
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
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
    </div>

    <div class="container">
        <div class="card card-waves mb-4">
            <div class="card-body p-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col">
                        <h2 class="text-primary">Selamat Datang, your dashboard is ready!</h2>
                        <p class="text-gray-700">Great job, your affiliate dashboard is ready to go! You can view sales,
                            generate links, prepare coupons, and download affiliate reports using this dashboard.</p>
                        <a class="btn btn-primary btn-sm px-3 py-2" href="#!">
                            Get Started
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-arrow-right ml-1">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                    <div class="col d-none d-lg-block mt-xxl-n5"><img class="img-fluid px-xl-4 mt-xxl-n6"
                            style="width: 23rem;" src="/backend/src/assets/img/freepik/logistic5.png"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- CHART --}}

    {{-- <div class="card h-100">
    <div class="card-header">Traffic Sources</div>
    <div class="card-body">
        <div class="chart-pie mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="myPieChart" width="409" height="324" style="display: block; height: 240px; width: 303px;" class="chartjs-render-monitor"></canvas></div>
        <div class="list-group list-group-flush">
            <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                <div class="mr-3">
                    <svg class="svg-inline--fa fa-circle fa-w-16 fa-sm mr-1 text-blue" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <i class="fas fa-circle fa-sm mr-1 text-blue"></i> -->
                    Direct
                </div>
                <div class="font-weight-500 text-dark">55%</div>
            </div>
            <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                <div class="mr-3">
                    <svg class="svg-inline--fa fa-circle fa-w-16 fa-sm mr-1 text-purple" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <i class="fas fa-circle fa-sm mr-1 text-purple"></i> -->
                    Social
                </div>
                <div class="font-weight-500 text-dark">15%</div>
            </div>
            <div class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                <div class="mr-3">
                    <svg class="svg-inline--fa fa-circle fa-w-16 fa-sm mr-1 text-green" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path></svg><!-- <i class="fas fa-circle fa-sm mr-1 text-green"></i> -->
                    Referral
                </div>
                <div class="font-weight-500 text-dark">30%</div>
            </div>
        </div>
    </div>
</div> --}}
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

        <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-danger h-100">
            <div class="card-header border-bottom">
                <ul class="nav nav-tabs card-header-tabs" id="cardTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="overview-tab" href="#overview" data-toggle="tab" role="tab"
                            aria-controls="overview" aria-selected="true">Status Jumlah Sparepart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="example-tab" href="#example" data-toggle="tab" role="tab"
                            aria-controls="example" aria-selected="false">Example</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <p class="card-text">
                            <div class="datatable">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-hover dataTable" id="dataTable"
                                                width="100%" cellspacing="0" role="grid"
                                                aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 20px;">
                                                            No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 50px;">Kode</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 110px;">Nama Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Office: activate to sort column ascending"
                                                            style="width: 40px;">Jenis Sparepart</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Start date: activate to sort column ascending"
                                                            style="width: 40px;">Merk</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 40px;">Stock</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 20px;">Min Stock </th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 20px;">Kemasan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Salary: activate to sort column ascending"
                                                            style="width: 80px;">Status Sparepart</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($sparepart as $item)
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">
                                                            {{ $loop->iteration}}</th>
                                                        <td>{{ $item->kode_sparepart }}</td>
                                                        <td>{{ $item->nama_sparepart }}</td>
                                                        <td>{{ $item->Jenissparepart->jenis_sparepart }}</td>
                                                        <td>{{ $item->Merksparepart->merk_sparepart }}</td>
                                                        <td class="text-center">{{ $item->stock }}</td>
                                                        <td class="text-center">{{ $item->stock_min}}</td>
                                                        <td>{{ $item->Kemasan->nama_kemasan}}</td>
                                                        <td>{{ $item->status_jumlah }}</td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="9" class="text-center">
                                                            Data Sparepart Kosong
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </p>
                    </div>
                    <div class="tab-pane fade" id="example" role="tabpanel" aria-labelledby="example-tab">
                        <h5 class="card-title">Example Pane</h5>
                        <p class="card-text">...</p>
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
