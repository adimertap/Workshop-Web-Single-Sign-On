@extends('layouts.Admin.adminsinglesignon')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-check"></i></div>
                            Catatan Progress
                        </h1>
                        <div class="page-header-subtitle">Catatan Harian Adim </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container mt-n10">
        <div class="col-xxl-4 col-xl-12 mb-4">
            <div class="card card-waves h-100">
                <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
                    <div class="row align-items-center">
                        <div class="col-xl-8 col-xxl-12">
                            <div class="text-center px-4 mb-4 mb-xl-0 mb-xxl-4">
                                <h1 class="text-primary">Selamat Datang di Catatan Harian Adim!</h1>
                                <p class="text-gray-700 mb-0">Selamat Bekerja Semangat! Cepetin Ujian Proposal Kamu
                                    adalah beban Keluarga</p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid"
                                src="/backend/src/assets/img/freepik/at-work-pana.svg" style="max-width: 26rem;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Catatan Progress TA
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                        data-target="#Modaltambah">Tambah
                        Catatan</button>
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
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">
                                                No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Tanggal</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 70px;">Modul</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 220px;">Catatan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 60px;">Progress</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 40px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 70px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($note as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->modul }}</td>
                                            <td>{{ $item->catatan }}</td>
                                            <td>@if($item->status == 'On Progress')
                                                {{ $item->progress }}%
                                                @elseif($item->status == 'Sudah Selesai')
                                                <span class="badge badge-success">
                                                    @else
                                                    <span>
                                                        @endif
                                                        {{ $item->status }}
                                                    </span>
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
                                                <a href="" class="btn btn-primary btn-datatable" type="button"
                                                    data-toggle="modal" data-target="#Modaledit-{{ $item->id_catatan }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapus-{{ $item->id_catatan }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                @elseif($item->status == 'Sudah Selesai')
                                                <a href="" class="btn btn-danger btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapus-{{ $item->id_catatan }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                @else
                                                <span>
                                                    @endif

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

{{-- MODAL KONFIRMASI --}}
@forelse ($note as $item)
<div class="modal fade" id="Modalkonfirmasisetuju-{{ $item->id_catatan }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Selesaikan Progress</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('status-catatan', $item->id_catatan) }}?statuspengerjaan=Sudah Selesai" method="POST"
                class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">Apakah Anda Sudah Menyelesaikan Progress Modul {{ $item->modul }} tanggal
                        {{ $item->tanggal }} ?</div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Sudah Selesai</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse


{{-- MODAL TAMBAH --}}
<div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Catatan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('Note-adim.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="tanggal">Tanggal Progress</label>
                        <input class="form-control" name="tanggal" type="date" id="tanggal" placeholder="Input Tanggal"
                            value="{{ old('tanggal') }}" class="form-control @error('tanggal') is-invalid @enderror">
                        @error('tanggal')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="modul">Pilih Modul yang dikerjakan</label>
                        <select name="modul" id="modul" class="form-control">
                            <option value="Accounting">Accounting</option>
                            <option value="Inventory">Inventory</option>
                            <option value="Kepegawaian">Kepegawaian</option>
                            <option value="Payroll">Payroll</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="catatan">Catatan Progress</label>
                        <textarea class="form-control" name="catatan" type="text" id="catatan"
                            placeholder="Masukan Keterangan" value="{{ old('catatan') }}"
                            class="form-control @error('catatan') is-invalid @enderror"></textarea>
                        @error('catatan')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="On Progress">On Progress</option>
                                <option value="Sudah Selesai">Sudah Selesai</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="progress">Berapa Persen Progress</label>
                            <input class="form-control" name="progress" type="number" id="progress" placeholder="%"
                                value="{{ old('progress') }}"
                                class="form-control @error('progress') is-invalid @enderror"></input>
                            @error('progress')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="Submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- MODAL DELETE --}}
@forelse ($note as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_catatan }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('Note-adim.destroy', $item->id_catatan) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Catatan Tanggal {{ $item->tanggal }}?</div>
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

@forelse ($note as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_catatan }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Progress</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('Note-adim.update', $item->id_catatan) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="progress">Berapa Persen Progress</label>
                        <input class="form-control" name="progress" type="number" id="progress" placeholder="%"
                            value="{{ $item->progress }}"
                            class="form-control @error('progress') is-invalid @enderror"></input>
                        @error('progress')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="Submit">Ubah</button>
                    </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

@endsection
