@extends('layouts.Admin.adminaccounting')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Invoice Supplier</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Friday</span>
                    · September 20, 2020 · 12:16 PM
                </div>
            </div>
            <div class="small">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                Bengkel
                <span class="font-weight-500 text-primary">Adi Jaya</span>
                <hr>
                </hr>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header ">Data Invoice Supplier Inventory
                    <a href="{{ route('invoice-payable.create') }}" class="btn btn-sm btn-primary" type="button">
                        Tambah Data
                    </a>
                </div>
            </div>
            <div class="card-body ">
                <div class="datatable">
                    @if(session('messageberhasil'))
                    <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messageberhasil') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @if(session('messagekirim'))
                    <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messagekirim') }}
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
                                                style="width: 10px;">
                                                No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 40px;">Kode Inv.</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 30px;">Tanggal Inv.</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 50px;">Kode Rcv</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 80px;">Supplier</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 30px;">Tenggat Waktu</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 90px;">Total Inv.</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 60px;">Status Prf</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 60px;">Status Jurnal</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 140px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($invoice as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->kode_invoice }}</td>
                                            <td>{{ $item->tanggal_invoice }}</td>
                                            <td>{{ $item->Rcv->kode_rcv }}</td>
                                            <td>{{ $item->Rcv->Supplier->nama_supplier }}</td>
                                            <td>{{ $item->tenggat_invoice }}</td>
                                            <td>Rp. {{ number_format($item->total_pembayaran,2,',','.') }}</td>
                                            <td>@if($item->status_prf == 'Belum Dibuat')
                                                <span class="badge badge-danger">
                                                    @elseif($item->status_prf == 'Telah Dibuat')
                                                    <span class="badge badge-success">
                                                        @else
                                                        <span>
                                                            @endif
                                                            {{ $item->status_prf }}
                                                        </span>
                                            </td>
                                            <td>@if($item->status_jurnal == 'Belum Diposting')
                                                <button class="btn btn-sm btn-danger">
                                                    Posting?
                                                </button>
                                                @elseif($item->status_jurnal == 'Sudah Diposting')
                                                <span class="badge badge-success">{{ $item->status_jurnal }}</span>
                                                @else
                                                <span>
                                                    @endif
                                                </span>
                                            </td>
                                            <td> @if($item->status_prf == 'Belum Dibuat')
                                                <a href="" class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Detail Invoice">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="" class="btn btn-primary btn-datatable" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Edit Invoice">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapus-{{ $item->id_payable_invoice }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="" class="btn btn-warning btn-datatable" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Cetak Invoice">
                                                    <i class="fas fa-print"></i></i>
                                                </a>
                                                @elseif ($item->status_prf == 'Telah Dibuat')
                                                <a href="" class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Detail Invoice">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="" class="btn btn-warning btn-datatable" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Cetak Invoice">
                                                    <i class="fas fa-print"></i></i>
                                                </a>
                                                @else
                                                @endif
                                            </td>
                                            @empty

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
</main>


@endsection
