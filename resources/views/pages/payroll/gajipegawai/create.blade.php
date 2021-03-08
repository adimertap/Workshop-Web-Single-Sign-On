@extends('layouts.Admin.adminpayroll')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Tambah Gaji Pegawai</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Gaji</span>
                    · Pegawai · Bengkel
                </div>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <!-- Illustration card example-->
            <div class="card mb-4">
                <div class="card-body text-center p-5">
                    <img class="img-fluid mb-5" src="/backend/src/assets/img/freepik/wallet.png">
                    <h4>Report generation</h4>
                    <p class="mb-4">Ready to get started? Let us know now! It's time to start building that dashboard
                        you've been waiting to create!</p>
                    <a class="btn btn-primary btn-sm py-2 px-3" href="#!">Continue</a>
                </div>
            </div>
            <!-- Report summary card example-->

            <!-- Progress card example-->
            <div class="card bg-primary border-0">
                <div class="card-body">
                    <h5 class="text-white-50">Total Gaji Pegawai</h5>
                    <div class="mb-4">
                        <span class="display-4 text-white">Rp. 2.500.000</span>
                    </div>
                    <div class="progress bg-white-25 rounded-pill" style="height: 0.5rem;">
                        <div class="progress-bar bg-white w-100 rounded-pill" role="progressbar" aria-valuenow="100"
                            aria-valuemin="100" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-4">
            <!-- Area chart example-->
            <div class="card mb-4">
                <div class="card-header">Data Gaji</div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="besaran_gaji">Jabatan</label>
                            <input class="form-control" name="besaran_gaji" type="text" id="besaran_gaji" value=""
                                class="form-control @error('besaran_gaji') is-invalid @enderror" />
                            @error('besaran_gaji')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-md-8">
                            <label class="small mb-1" for="besaran_gaji">Gaji Pokok</label>
                            <input class="form-control" name="besaran_gaji" type="number" id="besaran_gaji" value=""
                                class="form-control @error('besaran_gaji') is-invalid @enderror" />
                            @error('besaran_gaji')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="besaran_gaji">Tunjangan</label>
                        <input class="form-control" name="besaran_gaji" type="number" id="besaran_gaji" value=""
                            class="form-control @error('besaran_gaji') is-invalid @enderror" />
                        @error('besaran_gaji')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>

                    <a href="{{ route('gaji-pegawai.create') }}" class="btn btn-primary"> Tambah Tunjangan</a>



                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <!-- Bar chart example-->
                    <div class="card h-100">
                        <div class="card-header">Detail Gaji</div>
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="chart-bar">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div><canvas id="myBarChart" width="409" height="324" class="chartjs-render-monitor"
                                    style="display: block; height: 240px; width: 303px;"></canvas>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a class="text-xs d-flex align-items-center justify-content-between" href="#!">
                                View More Reports
                                <svg class="svg-inline--fa fa-long-arrow-alt-right fa-w-14" aria-hidden="true"
                                    focusable="false" data-prefix="fas" data-icon="long-arrow-alt-right" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M313.941 216H12c-6.627 0-12 5.373-12 12v56c0 6.627 5.373 12 12 12h301.941v46.059c0 21.382 25.851 32.09 40.971 16.971l86.059-86.059c9.373-9.373 9.373-24.569 0-33.941l-86.059-86.059c-15.119-15.119-40.971-4.411-40.971 16.971V216z">
                                    </path>
                                </svg><!-- <i class="fas fa-long-arrow-alt-right"></i> -->
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Pie chart example-->
                    <div class="card h-100">
                        <div class="card-header">Laporan Absensi</div>
                        <div class="card-body">
                            <div class="chart-pie mb-4">
                                <div class="chartjs-size-monitor">
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                    </div>
                                    <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                    </div>
                                </div><canvas id="myPieChart" width="409" height="324" class="chartjs-render-monitor"
                                    style="display: block; height: 240px; width: 303px;"></canvas>
                            </div>
                            <div class="list-group list-group-flush">
                                <div
                                    class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                    <div class="mr-3">
                                        <svg class="svg-inline--fa fa-circle fa-w-16 fa-sm mr-1 text-blue"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                            </path>
                                        </svg><!-- <i class="fas fa-circle fa-sm mr-1 text-blue"></i> -->
                                        Kehadiran
                                    </div>
                                    <div class="font-weight-500 text-dark">55%</div>
                                </div>
                                <div
                                    class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                    <div class="mr-3">
                                        <svg class="svg-inline--fa fa-circle fa-w-16 fa-sm mr-1 text-purple"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                            </path>
                                        </svg><!-- <i class="fas fa-circle fa-sm mr-1 text-purple"></i> -->
                                        Ijin/Sakit
                                    </div>
                                    <div class="font-weight-500 text-dark">15%</div>
                                </div>
                                <div
                                    class="list-group-item d-flex align-items-center justify-content-between small px-0 py-2">
                                    <div class="mr-3">
                                        <svg class="svg-inline--fa fa-circle fa-w-16 fa-sm mr-1 text-green"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                                            </path>
                                        </svg><!-- <i class="fas fa-circle fa-sm mr-1 text-green"></i> -->
                                        Tidak Hadir
                                    </div>
                                    <div class="font-weight-500 text-dark">30%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







@endsection
