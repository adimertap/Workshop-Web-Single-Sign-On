@extends('layouts.Admin.adminsinglesignon')

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
                            Catatan Progress Adim
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
            <div class="card-header ">List Progress</div>
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
                                            style="width: 50px;">Modul</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 120px;">Catatan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 90px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            style="width: 90px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($note as $item)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->modul }}</td>
                                        <td>{{ $item->catatan }}</td>
                                        <td>
                                            @if($item->status == 'Sudah Selesai')
                                            <span class="badge badge-success">
                                                @elseif($item->status == 'Belum diKerjakan')
                                                <span class="badge badge-danger">
                                                    @elseif($item->status == 'On Progress')
                                                    <span class="badge badge-secondary">
                                                        @else
                                                        <span>
                                                            @endif
                                                            {{ $item->status }}
                                                        </span>
                                        </td>
                                        <td>
                                            @if($item->status == 'On Progress')
                                            <a href="" class="btn btn-success btn-datatable" type="button"
                                                data-toggle="modal"
                                                data-target="#Modalkonfirmasisetuju-{{ $item->id_catatan }}">
                                                <i class="fas fa-check"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-datatable" type="button"
                                                data-toggle="modal"
                                                data-target="#Modalkonfirmasitolak-{{ $item->id_catatan }}">
                                                <i class="fas fa-times"></i>
                                            </a>
                                            @elseif($item->status == 'Belum diKerjakan')
                                            <span class="badge badge-danger">
                                                @elseif($item->approve_po == 'Sudah Selesai')
                                                <span class="badge badge-success">
                                                    @else
                                                    <span>
                                                        @endif
                                                        {{ $item->status }}
                                                    </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="tex-center">
                                            Data catatan Kosong
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
{{-- 
@forelse ($po as $item)
<div class="modal fade" id="Modalkonfirmasisetuju-{{ $item->id_po }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Setujui Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('po-status', $item->id_po) }}?status=Approved" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan_owner">Masukan Keterangan Setuju</label>
                        <textarea class="form-control" name="keterangan_owner" type="text" id="keterangan_owner"
                            placeholder="Input Keterangan" value="{{ old('keterangan_owner') }}"></textarea>
                    </div>
                    <div class="form-group">Apakah Anda Yakin Menyetujui Pembelian {{ $item->kode_po }} pada tanggal
                        {{ $item->tanggal_po }}?</div>
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

@forelse ($po as $item)
<div class="modal fade" id="Modalkonfirmasitolak-{{ $item->id_po }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Tolak Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('po-status', $item->id_po) }}?status=Not Approved" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan_owner">Masukan Keterangan Menolak</label>
                        <textarea class="form-control" name="keterangan_owner" type="text" id="keterangan_owner"
                            placeholder="Input Keterangan" value="{{ old('keterangan_owner') }}"></textarea>
                    </div>
                    <div class="form-group">Apakah Anda Yakin Menolak Data Pembelian {{ $item->kode_po }} pada tanggal
                        {{ $item->tanggal_po }}?</div>
                </div>

                <div class="modal-footer ">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Ya! Tolak</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse --}}

@endsection
