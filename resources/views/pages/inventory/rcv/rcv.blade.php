@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Penerimaan Pembelian Sparepart</h1>
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
</main>
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card card-header-actions h-100">
            <div class="card-header">
                Daftar Pembelian Yang Belum Datang
                <div class="dropdown no-caret">
                    <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton"
                        type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-more-vertical text-gray-500">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="12" cy="5" r="1"></circle>
                            <circle cx="12" cy="19" r="1"></circle>
                        </svg></button>
                    <div class="dropdown-menu dropdown-menu-right animated--fade-in-up"
                        aria-labelledby="dropdownMenuButton" style="">
                        <h6 class="dropdown-header">Filter Activity:</h6>
                        <a class="dropdown-item" href="#!"><span
                                class="badge badge-green-soft text-green my-1">Commerce</span></a>
                        <a class="dropdown-item" href="#!"><span
                                class="badge badge-blue-soft text-blue my-1">Reporting</span></a>
                        <a class="dropdown-item" href="#!"><span
                                class="badge badge-yellow-soft text-yellow my-1">Server</span></a>
                        <a class="dropdown-item" href="#!"><span
                                class="badge badge-purple-soft text-purple my-1">Users</span></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="timeline timeline-xs">
                    <!-- Timeline Item 1-->
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">27 min</div>
                            <div class="timeline-item-marker-indicator bg-green"></div>
                        </div>
                        <div class="timeline-item-content">
                            New order placed!
                            <a class="font-weight-bold text-dark" href="#!">Order #2912</a>
                            has been successfully placed.
                        </div>
                    </div>
                    <!-- Timeline Item 2-->
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">58 min</div>
                            <div class="timeline-item-marker-indicator bg-blue"></div>
                        </div>
                        <div class="timeline-item-content">
                            Your
                            <a class="font-weight-bold text-dark" href="#!">weekly report</a>
                            has been generated and is ready to view.
                        </div>
                    </div>
                    <!-- Timeline Item 3-->
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">2 hrs</div>
                            <div class="timeline-item-marker-indicator bg-purple"></div>
                        </div>
                        <div class="timeline-item-content">
                            New user
                            <a class="font-weight-bold text-dark" href="#!">Valerie Luna</a>
                            has registered
                        </div>
                    </div>
                    <!-- Timeline Item 4-->
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">1 day</div>
                            <div class="timeline-item-marker-indicator bg-yellow"></div>
                        </div>
                        <div class="timeline-item-content">Server activity monitor alert</div>
                    </div>
                    <!-- Timeline Item 5-->
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">1 day</div>
                            <div class="timeline-item-marker-indicator bg-green"></div>
                        </div>
                        <div class="timeline-item-content">
                            New order placed!
                            <a class="font-weight-bold text-dark" href="#!">Order #2911</a>
                            has been successfully placed.
                        </div>
                    </div>
                    <!-- Timeline Item 6-->
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">1 day</div>
                            <div class="timeline-item-marker-indicator bg-purple"></div>
                        </div>
                        <div class="timeline-item-content">
                            Details for
                            <a class="font-weight-bold text-dark" href="#!">Marketing and Planning Meeting</a>
                            have been updated.
                        </div>
                    </div>
                    <!-- Timeline Item 7-->
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">2 days</div>
                            <div class="timeline-item-marker-indicator bg-green"></div>
                        </div>
                        <div class="timeline-item-content">
                            New order placed!
                            <a class="font-weight-bold text-dark" href="#!">Order #2910</a>
                            has been successfully placed.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card card-header-actions">
            <div class="card-header ">List Penerimaan
                <a href="{{ route('Rcv.create') }}" class="btn btn-sm btn-primary"> Tambah Penerimaan</a>
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
                                            aria-label="Name: activate to sort column descending" style="width: 20px;">
                                            No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 50px;">Kode Rcv</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 150px;">Pegawai</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 100px;">Supplier</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 50px;">Nomor Do</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 40px;">Tanggal</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            style="width: 90px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rcv as $item)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                        <td>{{ $item->kode_rcv }}</td>
                                        <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                        <td>{{ $item->Supplier->nama_supplier }}</td>
                                        <td>{{ $item->no_do }}</td>
                                        <td>{{ $item->tanggal_rcv }}</td>
                                        <td>
                                            <a href="{{ route('Rcv.show', $item->id_rcv) }}"
                                                class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="" class="btn btn-primary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-datatable" type="button"
                                                data-toggle="modal" data-target="#Modalhapus-{{ $item->id_rcv }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <a href="" class="btn btn-info btn-datatable" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Cetak Data Rcv">
                                                <i class="fas fa-print"></i></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="tex-center">
                                            Data Penerimaan Kosong
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
</main>

@forelse ($rcv as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_rcv }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('Rcv.destroy', $item->id_rcv) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Penerimaan {{ $item->kode_rcv }} pada tanggal
                    {{ $item->tanggal_rcv }}?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Ya! Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse
@endsection
