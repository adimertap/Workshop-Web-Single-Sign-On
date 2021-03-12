@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Detail Opname {{ $opname->kode_opname }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · Opname · Sparepart
                </div>
            </div>
            <div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('Opname') }}" class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Detail Opname
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="small mb-1" for="kode_opname">Kode Opname</label>
                        <input class="form-control form-control-sm" id="kode_opname" type="text" name="kode_opname"
                            value="{{ $opname->kode_opname }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_pegawai">Pegawai</label>
                        <input class="form-control form-control-sm" id="id_pegawai" type="text" name="id_pegawai"
                            value="{{ $opname->Pegawai->nama_pegawai }}" readonly />
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="tanggal_opname">Tanggal Opname</label>
                            <input class="form-control form-control-sm" id="tanggal_opname" type="date"
                                name="tanggal_opname" value="{{ $opname->tanggal_opname }}" readonly />
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="approve">Approve Opname</label>
                            <input class="form-control form-control-sm" id="approve" type="text" name="approve"
                                value="{{ $opname->approve }}" readonly />
                        </div>
                    </div>
                    <hr class="my-4" />
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card card-header-actions">
                    <div class="card-header ">List Sparepart</div>
                </div>
                <div class="card-body">
                    <div class="alert alert-info alert-icon" role="alert">
                        <div class="alert-icon-aside">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="alert-icon-content">
                            <h5 class="alert-heading" class="small">Sparepart Info</h5>
                            Sparepart Opname
                        </div>
                    </div>
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTable"
                                        width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 20px;">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 230px;">Sparepart</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 230px;">Lokasi Rak</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 230px;">Jumlah Real</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 230px;">Jumlah Sistem</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 230px;">Selisih</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 230px;">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($opname->Detailsparepart as $detail)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                                </th>
                                                <td>{{ $detail->nama_sparepart }}</td>
                                                <td>{{ $detail->Rak->nama_rak }}</td>
                                                <td>{{ $detail->jumlah_real }}</td>
                                                <td>
                                                    @if($opname->approve == 'Pending')
                                                    Menunggu Approval
                                                    @elseif($opname->approve == 'Not Approved')
                                                    {{ $opname->approve }}
                                                    @elseif($opname->approve == 'Approved')
                                                    {{ $detail->Sparepart->stock }}
                                                    @else
                                                    <span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>
                                                    @if($opname->approve == 'Pending')
                                                    Menunggu Approval
                                                    @elseif($opname->approve == 'Not Approved')
                                                    {{ $opname->approve }}
                                                    @elseif($opname->approve == 'Approved')
                                                    {{ $detail->selisih }}
                                                    @else
                                                    <span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td>{{ $detail->keterangan_detail }}</td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="tex-center">
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
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
