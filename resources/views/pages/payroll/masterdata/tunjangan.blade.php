@extends('layouts.Admin.adminpayroll')

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
                            Master Data Tunjangan
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Tunjangan
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">Tambah
                        Data Tunjangan</button>
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
                                                style="width: 30px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 220px;">Nama Tunjangan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 200px;">Besaran Tunjangan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 130px;">Keterangan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tunjangan as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->nama_tunjangan }}</td>
                                            <td>Rp. {{ number_format($item->jumlah_tunjangan,2,',','.') }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaledit-{{ $item->id_tunjangan }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable  mr-2" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapus-{{ $item->id_tunjangan }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="tex-center">
                                                Data Tunjangan Kosong
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


    {{-- MODAL Tambah -------------------------------------------------------------------------------------------}}
    <div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Tunjangan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('tunjangan.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="small mb-1">Isikan Form Dibawah Ini</label>
                        <hr></hr>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_tunjangan">Nama Tunjangan</label>
                            <input class="form-control" name="nama_tunjangan" type="text" id="nama_tunjangan"
                                placeholder="Input Nama Tunjangan" value="{{ old('nama_tunjangan') }}"
                                class="form-control @error('nama_tunjangan') is-invalid @enderror" />
                            @error('nama_tunjangan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                    <label class="small mb-1" for="jumlah_tunjangan">Besaran Tunjangan</label>
                                </div>
                                <div class="col-12 col-lg-auto text-center text-lg-right">
                                    <div class="small text-lg-right">
                                        <span class="font-weight-500 text-primary">Nominal : </span>
                                        <span id="detailtunjangan"></span>
                                    </div>
                                </div>
                            </div>
                            <input class="form-control" name="jumlah_tunjangan" type="number" id="jumlah_tunjangan"
                                placeholder="Input Besaran Tunjangan" value="{{ old('jumlah_tunjangan') }}"
                                class="form-control @error('jumlah_tunjangan') is-invalid @enderror" />
                            @error('jumlah_tunjangan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="keterangan">Keterangan</label>
                            <input class="form-control" name="keterangan" type="text" id="keterangan"
                                placeholder="Input Keterangan" value="{{ old('keterangan') }}"
                                class="form-control @error('keterangan') is-invalid @enderror" />
                            @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>

                    {{-- Validasi Error --}}
                    @if (count($errors) > 0)
                    @endif

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="Submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL EDIT -------------------------------------------------------------------------------------------}}
    @forelse ($tunjangan as $item)
    <div class="modal fade" id="Modaledit-{{ $item->id_tunjangan }}" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Tunjangan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('tunjangan.update', $item->id_tunjangan) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <label class="small mb-1">Isikan Form Dibawah Ini</label>
                        <hr>
                        </hr>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_tunjangan">Nama Tunjangan</label>
                            <input class="form-control" name="nama_tunjangan" type="text" id="nama_tunjangan"
                                value="{{ $item->nama_tunjangan }}"></input>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="jumlah_tunjangan">Besaran Tunjangan</label>
                            <input class="form-control" name="jumlah_tunjangan" type="number" id="jumlah_tunjangan"
                                value="{{ number_format($item->jumlah_tunjangan,0,',','.') }}"></input>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="keterangan">Keterangan</label>
                            <input class="form-control" name="keterangan" type="text" id="keterangan"
                                value="{{ $item->keterangan }}"></input>
                        </div>
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

    {{-- MODAL DELETE ------------------------------------------------------------------------------}}
    @forelse ($tunjangan as $item)
    <div class="modal fade" id="Modalhapus-{{ $item->id_tunjangan }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger-soft">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('tunjangan.destroy', $item->id_tunjangan) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <div class="modal-body">Apakah Anda Yakin Menghapus Data Tunjangan {{ $item->nama_tunjangan }} ?
                    </div>
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
</main>
{{-- Callback Modal Jika Validasi Error --}}
@if (count($errors) > 0)
<button id="validasierror" style="display: none" type="button" data-toggle="modal" data-target="#Modaltambah">Open
    Modal</button>
@endif

{{-- Script Open Modal Callback --}}
<script>
    $(document).ready(function () {
        $('#validasierror').click();

        $('#jumlah_tunjangan').on('input', function () {
            var nominal = $(this).val()
            var nominal_fix = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(nominal)

            $('#detailtunjangan').html(nominal_fix);
        })
    });
</script>

@endsection
