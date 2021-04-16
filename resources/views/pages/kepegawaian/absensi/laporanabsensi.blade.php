@extends('layouts.Admin.adminpegawai')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-warehouse"></i></div>
                            Laporan Absensi
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="col-xxl-4 col-xl-12 mb-4">
            <div class="card h-100">
                <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-xxl-12">
                            <div class="text-center px-4 mb-4 mb-xl-0 mb-xxl-4">
                                <h1 class="text-primary" style="font-size: 15pt">Laporan Absensi</h1>
                                <p class="text-gray-700 mb-0">Silahkan melakukan pencarian berdasarkan tanggal</p>
                                <span id="total_records"></span>
                                <p></p>
                                <div class="row input-daterange">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-joined">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i data-feather="search"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="from_date" id="from_date"
                                                class="form-control form-control-sm" placeholder="From Date" />
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group input-group-joined">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i data-feather="search"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="to_date" id="to_date"
                                                class="form-control form-control-sm" placeholder="To Date" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" name="filter" id="filter"
                                            class="btn btn-sm btn-primary px-4">Filter</button>
                                        <button type="button" name="refresh" id="refresh"
                                            class="btn btn-sm btn-secondary">Refresh</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid"
                                src="/backend/src/assets/img/freepik/data-report-pana.svg" style="max-width: 20rem;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MAIN PAGE CONTENT --}}
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Absensi
                </div>
            </div>
            <div class="card-body">
                <div class="datatable">
                    {{-- DATE RANGE PICKER --}}

                    @if(session('messageberhasil'))
                    <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messageberhasil') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @if(session('messagehapus'))
                    <div class="alert alert-danger" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messagehapus') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    {{-- SHOW ENTRIES --}}
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Tanggal</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Pegawai</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Jabatan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 40px;">Absensi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 40px;">Jam Masuk</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 40px;">Jam Keluar</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 140px;">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($absensi as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                        </th>
                                        <td>{{ $item->tanggal_absensi }}</td>
                                        <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                        <td>{{ $item->Pegawai->jabatan->nama_jabatan }}</td>
                                        <td>
                                            @if($item->absensi == 'Absen_Pagi')
                                            <span> Masuk </span>
                                            @elseif ($item->absensi == 'Masuk')
                                            <span> Masuk</span>
                                            @elseif ($item->absensi == 'Ijin' | $item->absensi == 'Sakit' |
                                            $item->absensi == 'Cuti' | $item->absensi == 'Alpha')
                                            {{ $item->absensi }}
                                            @else
                                            <span>
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            @if($item->absensi == 'Absen_Pagi' | $item->absensi =='Masuk')
                                            {{ $item->jam_masuk }}
                                            @elseif ($item->absensi == 'Ijin' | $item->absensi == 'Sakit' |
                                            $item->absensi == 'Cuti' | $item->absensi == 'Alpha')
                                            @else
                                            <span>
                                                @endif
                                            </span>
                                        </td>
                                        <td>{{ $item->jam_pulang }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="tex-center">
                                                Data Kosong
                                            </td>
                                        </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                                @csrf
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script>
   
</script>

@endsection
