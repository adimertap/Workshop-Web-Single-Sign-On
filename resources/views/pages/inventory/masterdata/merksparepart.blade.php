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
                            Master Data Merk Sparepart
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

                <!-- Illustrations -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pengajuan</h6>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 10rem;"
                                src="/backend/src/assets/img/freepik/tambahdata.png" alt="">
                        </div>
                        <div class=" m-0 font-weight-bold text-primary" style="text-align: center">Pengajuan Tambah Data
                        </div>


                        <hr class="my-2">
                        <p class="small" style="text-align: center">Anda ingin menambahkan Merk Sparepart yang tidak
                            terdaftar?
                            klik tombol <b>pengajuan</b>.  </p>
                        <div class="text-center">
                            <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                            data-target="#Modaltambah">
                            Ajukan Merk
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-arrow-right ml-1">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </button>
                        </div>
                       
                    </div>


                </div>
            </div>
            <div class="col-lg-9">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header">List Merk Sparepart
                            {{-- <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                                data-target="#Modaltambah">Tambah
                                Merk</button> --}}
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
                                        <table class="table table-bordered table-hover dataTable" id="dataTable"
                                            width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 30px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 80px;">Kode Merk</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 150px;">Jenis Sparepart</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 200px;">Merk Sparepart</th>
                                                    {{-- <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Actions</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($merksparepart as $item)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">
                                                        {{ $loop->iteration}}</th>
                                                    <td>{{ $item->kode_merk }}</td>
                                                    <td>{{ $item->jenissparepart->jenis_sparepart }}</td>
                                                    <td>{{ $item->merk_sparepart }}</td>
                                                    {{-- <td>
                                                <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                    data-toggle="modal" data-target="#Modaledit-{{ $item->id_merk }}">
                                                    <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-datatable  mr-2" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modalhapus-{{ $item->id_merk }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    </td> --}}
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
{{-- MODAL Tambah -------------------------------------------------------------------------------------------}}
<div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Merk Sparepart</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('merk-sparepart.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1" for="kode_merk">Kode Merk</label>
                        <input class="form-control" name="kode_merk" type="text" id="kode_merk"
                            placeholder="Input Kode Merk" value="{{ $kode_merk }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="id_jenis_sparepart">Jenis Sparepart</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <select class="form-control" name="id_jenis_sparepart"
                            class="form-control @error('id_jenis_sparepart') is-invalid @enderror"
                            id="id_jenis_sparepart">
                            <option>Pilih Jenis</option>
                            @foreach ($jenis_sparepart as $item)
                            <option value="{{ $item->id_jenis_sparepart }}">
                                {{ $item->jenis_sparepart }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_jenis_sparepart')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="merk_sparepart">Merk Sparepart</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="merk_sparepart" type="text" id="merk_sparepart"
                            placeholder="Input Merk" value="{{ old('merk_sparepart') }}"
                            class="form-control @error('merk_sparepart') is-invalid @enderror"></input>
                        @error('merk_sparepart')<div class="text-danger small mb-1">{{ $message }}
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

{{-- MODAL EDIT -------------------------------------------------------------------------------------------}}
@forelse ($merksparepart as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_merk }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Merk Sparepart</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('merk-sparepart.update',$item->id_merk) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small" for="kode_merk">Kode Merk</label>
                        <input class="form-control" name="kode_merk" type="text" id="kode_merk"
                            value="{{ $item->kode_merk }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="id_jenis_sparepart">Jenis Sparepart</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <select class="form-control" name="id_jenis_sparepart" id="id_jenis_sparepart" required>
                            <option value="{{ $item->jenissparepart->id_jenis_sparepart }}">
                                {{ $item->jenissparepart->jenis_sparepart }}</option>
                            @foreach ($jenis_sparepart as $items)
                            <option value="{{ $items->id_jenis_sparepart }}">
                                {{ $items->jenis_sparepart }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="small mr-1" for="merk_sparepart">Merk Sparepart</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="merk_sparepart" type="text" id="merk_sparepart"
                            value="{{ $item->merk_sparepart }}"
                            class="form-control @error('merk_sparepart') is-invalid @enderror" required></input>
                        @error('merk_sparepart')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

{{-- MODAL DELETE ------------------------------------------------------------------------------}}
@forelse ($merksparepart as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_merk }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('merk-sparepart.destroy', $item->id_merk) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Merk {{ $item->merk_sparepart }}?</div>
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
