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
                            <div class="page-header-icon"><i data-feather="database"></i></div>
                            Master Data Jenis Perbaikan
                        </h1>
                        <div class="page-header-subtitle">List data jenis perbaikan yang dapat dilayani oleh bengkel</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Jenis Perbaikan
                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#Modaltambah">Tambah
                        Data</button>
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
                                                style="width: 20px;">Kode Jenis Perbaikan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Nama Jenis Perbaikan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Group Jenis Perbaikan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Harga</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($jenisperbaikan as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->kode_jenis_perbaikan }}</td>
                                            <td>{{ $item->nama_jenis_perbaikan }}</td>
                                            <td>{{ $item->group_jenis_perbaikan }}</td>
                                            <td>Rp. {{ number_format($item->harga_jenis_perbaikan) }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                    data-toggle="modal" data-target="#Modaledit-{{ $item->id_jenis_perbaikan }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable  mr-2" type="button"
                                                    data-toggle="modal" data-target="#Modalhapus-{{ $item->id_jenis_perbaikan }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">
                                                Data Jenis Perbaikan Kosong
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
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Jenis Perbaikan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('jenis-perbaikan.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="small mb-1">Isikan Form Dibawah Ini</label>
                        <hr>
                        </hr>
                        <div class="form-group">
                            <label class="small mb-1" for="kode_jenis_perbaikan">Kode Jenis Perbaikan</label>
                            <input class="form-control" name="kode_jenis_perbaikan" type="text" id="kode_jenis_perbaikan"
                                placeholder="Input Kode Jenis Perbaikan" value="{{ $kode_jenis_perbaikan }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_jenis_perbaikan">Nama Jenis Perbaikan <span style="color: red">*</span> </label>
                            <input class="form-control" name="nama_jenis_perbaikan" type="text" id="nama_jenis_perbaikan"
                                placeholder="Input Nama Jenis Perbaikan" value="{{ old('nama_jenis_perbaikan') }}"
                                class="form-control @error('nama_jenis_perbaikan') is-invalid @enderror">
                            @error('nama_jenis_perbaikan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="group_jenis_perbaikan">Group Jenis Perbaikan</label>
                            <select class="form-control" name="group_jenis_perbaikan"
                                class="form-control @error('group_jenis_perbaikan') is-invalid @enderror"
                                id="group_jenis_perbaikan">
                                <option value="{{ old('group_jenis_perbaikan') }}">Pilih Group Perbaikan</option>
                                <option value="Service Ringan">Service Ringan</option>
                                <option value="Service Berat">Service Berat</option>
                            </select>
                            @error('group_jenis_perbaikan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        
                        <div class="form-group">
                            <label class="small mb-1" for="harga_jenis_perbaikan">Harga Perbaikan <span style="color: red">*</span></label>
                            <input class="form-control" name="harga_jenis_perbaikan" type="text" id="harga_jenis_perbaikan"
                                placeholder="Input Harga Perbaikan" value="{{ old('harga_jenis_perbaikan') }}"
                                class="form-control @error('harga_jenis_perbaikan') is-invalid @enderror">
                            @error('harga_jenis_perbaikan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
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

    {{-- MODAL EDIT --}}
    @forelse ($jenisperbaikan as $item)
    <div class="modal fade" id="Modaledit-{{ $item->id_jenis_perbaikan }}" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Jenis Perbaikan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('jenis-perbaikan.update', $item->id_jenis_perbaikan) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <label class="small mb-1">Isikan Form Dibawah Ini</label>
                        <hr>
                        </hr>
                        <div class="form-group">
                            <label class="small" for="kode_jenis_perbaikan">Kode Merk</label>
                            <input class="form-control" name="kode_jenis_perbaikan" type="text" id="kode_jenis_perbaikan"
                                value="{{ $item->kode_jenis_perbaikan }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_jenis_perbaikan">Nama Jenis Perbaikan</label>
                            <input class="form-control" name="nama_jenis_perbaikan" type="text" id="nama_jenis_perbaikan"
                                value="{{ $item->nama_jenis_perbaikan }}" placeholder="Input Nama Jenis Perbaikan">
                            @error('nama_jenis_perbaikan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="group_jenis_perbaikan">Group Jenis Perbaikan</label>
                            <select name="group_jenis_perbaikan" id="group_jenis_perbaikan" class="form-control">
                                <option value="{{ $item->group_jenis_perbaikan }}">{{ $item->group_jenis_perbaikan }}</option>
                                <option value="Motor">Motor</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Sepeda">Sepeda</option>
                            </select>
                            @error('group_jenis_perbaikan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="harga_jenis_perbaikan">Harga Jenis Perbaikan</label>
                            <input class="form-control" name="harga_jenis_perbaikan" type="text" id="harga_jenis_perbaikan"
                                value="{{ $item->harga_jenis_perbaikan }}" placeholder="Input Harga Jenis Perbaikan">
                            @error('harga_jenis_perbaikan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
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

    {{-- MODAL DELETE --}}
    @forelse ($jenisperbaikan as $item)
    <div class="modal fade" id="Modalhapus-{{ $item->id_jenis_perbaikan }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('jenis-perbaikan.destroy', $item->id_jenis_perbaikan) }}" method="POST" class="d-inline">
                    @csrf
                    @method('delete')
                    <div class="modal-body">Apakah Anda Yakin Menghapus Data Perbaikan {{ $item->nama_jenis_perbaikan }}?</div>
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
    });

</script>


@endsection
