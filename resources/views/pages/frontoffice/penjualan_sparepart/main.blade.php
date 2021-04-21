@extends('layouts.Admin.adminfrontoffice')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="shopping-cart"></i></div>
                            Penjualan Sparepart
                        </h1>
                        <div class="page-header-subtitle">Data Penjualan Sparepart pada Bengkel</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">Penjualan Sparepart
                    <a href="{{ route('penjualansparepart.create') }}" class="btn btn-sm btn-primary"> Tambah Penjualan</a>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable">
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
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Kode Transaksi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Nama Customer</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Tanggal</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($penjualan as $item)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$item->kode_penjualan}}</td>
                                                <td>{{$item->Customer->nama_customer}}</td>
                                                <td>{{$item->tanggal}}</td>
                                                <td>
                                                    @if ($item->status_bayar == 'Belum Bayar')
                                                        <span class="badge badge-danger">
                                                    @elseif ($item->status_bayar == 'Lunas')
                                                        <span class="badge badge-success">
                                                    @else
                                                        <span>
                                                            @endif
                                                            {{$item->status_bayar}}
                                                        </span>
                                                    
                                                </td>
                                                <td>
                                                    <a href="/" class="btn btn-secondary btn-datatable"
                                                        data-toggle="tooltip" data-placement="top" title=""
                                                        data-original-title="Detail">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="" class="btn btn-primary btn-datatable" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-datatable" type="button"
                                                        data-toggle="modal">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
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
