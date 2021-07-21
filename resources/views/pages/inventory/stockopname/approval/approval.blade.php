@extends('layouts.Admin.admininventory')

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
                            Approval Stock Opname
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
</main>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card card-header-actions">
            <div class="card-header ">List Opname</div>
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
                                            style="width: 50px;">Kode Opname</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 150px;">Pegawai</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 100px;">Tanggal</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            style="width: 90px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($opname as $item)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                        <td>{{ $item->kode_opname }}</td>
                                        <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                        <td>{{ $item->tanggal_opname }}</td>
                                        <td>
                                            @if($item->approve == 'Pending')
                                            <a href="{{ route('approval-opname.show', $item->id_opname) }}"
                                                class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="" class="btn btn-success btn-datatable" type="button"
                                                data-toggle="modal"
                                                data-target="#Modalkonfirmasisetuju-{{ $item->id_opname }}">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-datatable" type="button"
                                                data-toggle="modal"
                                                data-target="#Modalkonfirmasitolak-{{ $item->id_opname }}">
                                                <i class="fas fa-times"></i>
                                            </a>
                                            {{-- <a href="{{ route('po-status', $item->id_po) }}?status=Not Approved"
                                            class="btn btn-danger btn-datatable" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Tolak Data">
                                            <i class="fas fa-times"></i>
                                            </a> --}}
                                            @elseif($item->approve == 'Not Approved')
                                            <span class="badge badge-danger">{{ $item->approve }}
                                                @elseif($item->approve == 'Approved')
                                                <span class="badge badge-success">{{ $item->approve }}
                                                    @else
                                                    <span>
                                                        @endif
                                                    </span>
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

@forelse ($opname as $item)
<div class="modal fade" id="Modalkonfirmasisetuju-{{ $item->id_opname }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Setujui Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('approval-opname-status', $item->id_opname) }}?status=Approved" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan_approval">Masukan Keterangan Setuju</label>
                        <textarea class="form-control" name="keterangan" type="text" id="keterangan_approval"
                            placeholder="Input Keterangan" value="{{ old('keterangan_approval') }}"></textarea>
                    </div>
                    <div class="form-group">Apakah Anda Yakin Menyetujui Opname {{ $item->kode_opname }} pada tanggal
                        {{ $item->tanggal_opname }}?</div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Approve</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse

@forelse ($opname as $item)
<div class="modal fade" id="Modalkonfirmasitolak-{{ $item->id_opname }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Tolak Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('approval-opname-status', $item->id_opname) }}?status=Not Approved" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan_approval">Masukan Keterangan Menolak</label>
                        <textarea class="form-control" name="keterangan_approval" type="text" id="keterangan_approval"
                            placeholder="Input Keterangan" value="{{ old('keterangan_approval') }}"></textarea>
                    </div>
                    <div class="form-group">Apakah Anda Yakin Menolak Data Opname {{ $item->kode_opname }} pada tanggal
                        {{ $item->tanggal_opname }}?</div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Ya! Tolak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse

@endsection
