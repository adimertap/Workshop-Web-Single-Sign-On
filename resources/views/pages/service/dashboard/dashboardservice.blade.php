@extends('layouts.Admin.adminservice')

@section('content')
<main>
    <div class="container mt-3">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Dashboard Service</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{$blt}}</span>
                    <span id="clock"></span>
                </div>
            </div>
            <div class="small">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                Bengkel
                <span class="font-weight-500 text-primary">{{ Auth::user()->bengkel->nama_bengkel}}</span>
                <hr>
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
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                            src="/backend/src/assets/img/service.jpg" alt="">>
                    </div>
                    <h2 class="m-0 font-weight-bold text-primary" style="text-align: center">Selamat Datang, I Gede Angga Kusuma Putra</h2>
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
                                <a class="text-dark line-height-normal mb-1">{{ Auth::user()->pegawai->nama_pegawai }}</a>
                                    <div class=" small text-muted line-height-normal">Bagian Service</div>
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

{{-- CARD  --}}
{{-- CARD MENU --}}
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <!-- Dashboard info widget 1-->
        <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-primary h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="small font-weight-bold text-primary mb-1">Transaksi Sparepart</div>
                        <div class="h6">Jumlah : 20</div>
                    </div>
                    <div class="ml-2"><svg class="svg-inline--fa fa-dollar-sign fa-w-9 fa-2x text-gray-200"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="dollar-sign" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 288 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M209.2 233.4l-108-31.6C88.7 198.2 80 186.5 80 173.5c0-16.3 13.2-29.5 29.5-29.5h66.3c12.2 0 24.2 3.7 34.2 10.5 6.1 4.1 14.3 3.1 19.5-2l34.8-34c7.1-6.9 6.1-18.4-1.8-24.5C238 74.8 207.4 64.1 176 64V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48h-2.5C45.8 64-5.4 118.7.5 183.6c4.2 46.1 39.4 83.6 83.8 96.6l102.5 30c12.5 3.7 21.2 15.3 21.2 28.3 0 16.3-13.2 29.5-29.5 29.5h-66.3C100 368 88 364.3 78 357.5c-6.1-4.1-14.3-3.1-19.5 2l-34.8 34c-7.1 6.9-6.1 18.4 1.8 24.5 24.5 19.2 55.1 29.9 86.5 30v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16v-48.2c46.6-.9 90.3-28.6 105.7-72.7 21.5-61.6-14.6-124.8-72.5-141.7z">
                            </path>
                        </svg><!-- <i class="fas fa-dollar-sign fa-2x text-gray-200"></i> -->
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small stretched-link" href="#">Cek Disini</a>
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
    <div class="col-xl-3 col-md-6 mb-4">
        <!-- Dashboard info widget 2-->
        <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-secondary h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="small font-weight-bold text-secondary mb-1">Pelayanan Service</div>
                        <div class="h6">Jumlah : 3 </div>
                    </div>
                    <div class="ml-2"><svg class="svg-inline--fa fa-tag fa-w-16 fa-2x text-gray-200" aria-hidden="true"
                            focusable="false" data-prefix="fas" data-icon="tag" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M0 252.118V48C0 21.49 21.49 0 48 0h204.118a48 48 0 0 1 33.941 14.059l211.882 211.882c18.745 18.745 18.745 49.137 0 67.882L293.823 497.941c-18.745 18.745-49.137 18.745-67.882 0L14.059 286.059A48 48 0 0 1 0 252.118zM112 64c-26.51 0-48 21.49-48 48s21.49 48 48 48 48-21.49 48-48-21.49-48-48-48z">
                            </path>
                        </svg><!-- <i class="fas fa-tag fa-2x text-gray-200"></i> -->
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small stretched-link" href="#">Cek Disini</a>
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
    <div class="col-xl-3 col-md-6 mb-4">
        <!-- Dashboard info widget 3-->
        <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-success h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="small font-weight-bold text-success mb-1">Customer Terdaftar</div>
                        <div class="h6">Jumlah : 3</div>
                    </div>
                    <div class="ml-2"><svg class="svg-inline--fa fa-mouse-pointer fa-w-10 fa-2x text-gray-200"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="mouse-pointer" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M302.189 329.126H196.105l55.831 135.993c3.889 9.428-.555 19.999-9.444 23.999l-49.165 21.427c-9.165 4-19.443-.571-23.332-9.714l-53.053-129.136-86.664 89.138C18.729 472.71 0 463.554 0 447.977V18.299C0 1.899 19.921-6.096 30.277 5.443l284.412 292.542c11.472 11.179 3.007 31.141-12.5 31.141z">
                            </path>
                        </svg><!-- <i class="fas fa-mouse-pointer fa-2x text-gray-200"></i> -->
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small stretched-link" href="#">Cek Disini</a>
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
    <div class="col-xl-3 col-md-6 mb-4">
        <!-- Dashboard info widget 4-->
        <div class="card border-top-0 border-bottom-0 border-right-0 border-left-lg border-info h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="small font-weight-bold text-info mb-1">Customer Care</div>
                        <div class="h6">Jumlah : 1</div>
                    </div>
                    <div class="ml-2"><svg class="svg-inline--fa fa-percentage fa-w-12 fa-2x text-gray-200"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="percentage" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M109.25 173.25c24.99-24.99 24.99-65.52 0-90.51-24.99-24.99-65.52-24.99-90.51 0-24.99 24.99-24.99 65.52 0 90.51 25 25 65.52 25 90.51 0zm256 165.49c-24.99-24.99-65.52-24.99-90.51 0-24.99 24.99-24.99 65.52 0 90.51 24.99 24.99 65.52 24.99 90.51 0 25-24.99 25-65.51 0-90.51zm-1.94-231.43l-22.62-22.62c-12.5-12.5-32.76-12.5-45.25 0L20.69 359.44c-12.5 12.5-12.5 32.76 0 45.25l22.62 22.62c12.5 12.5 32.76 12.5 45.25 0l274.75-274.75c12.5-12.49 12.5-32.75 0-45.25z">
                            </path>
                        </svg><!-- <i class="fas fa-percentage fa-2x text-gray-200"></i> -->
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a class="small stretched-link" href="#">Cek Disini</a>
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
</div>

@endsection
