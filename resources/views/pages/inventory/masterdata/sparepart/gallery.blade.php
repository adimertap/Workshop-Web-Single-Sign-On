@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Sparepart {{ $sparepart->nama_sparepart }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · Sparepart · Marketplace
                </div>
            </div>
            <div>
                <i class="fa fa-cogs" aria-hidden="true"></i>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Detail Sparepart</div>
                <div class="card-body">
                    <div class="form-group">
                        <label class="small mb-1" for="kode_sparepart">Kode Sparepart</label>
                        <input class="form-control form-control-sm" id="kode_sparepart" type="text"
                            name="kode_sparepart" value="{{ $sparepart->kode_sparepart }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="nama_sparepart">Nama Sparepart</label>
                        <input class="form-control form-control-sm" id="nama_sparepart" type="text"
                            name="nama_sparepart" value="{{ $sparepart->nama_sparepart }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_jenis_spareprat">Jenis Sparepart</label>
                        <input class="form-control form-control-sm" id="id_jenis_spareprat" type="text"
                            name="id_jenis_spareprat" value="{{ $sparepart->jenissparepart->jenis_sparepart }}"
                            readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_merk">Merk Sparepart</label>
                        <input class="form-control form-control-sm" id="id_merk" type="text" name="id_merk"
                            value="{{ $sparepart->Merksparepart->merk_sparepart }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_konversi">Satuan </label>
                        <input class="form-control form-control-sm" id="id_konversi" type="text" name="id_konversi"
                            value="{{ $sparepart->Konversi->satuan }}" readonly />
                    </div>
                    <hr class="my-4" />
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card card-header-actions">
                    <div class="card-header ">List Gallery
                        <a href="{{ route('gallery.create') }}" class="btn btn-primary"> Tambah Foto</a>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="alert alert-info alert-icon" role="alert">
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <div class="alert-icon-aside">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="alert-icon-content" class="small">
                            <h5 class="alert-heading" class="small">Marketplace Info</h5>
                            Foto Sparepart terpajang pada marketplace
                        </div>
                    </div>
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
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 20px;">
                                                    No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 200px;">Foto</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Salary: activate to sort column ascending"
                                                    style="width: 40px;">
                                                    Default</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                                    style="width: 80px;">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($gallery as $item)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                                </th>
                                                <td>
                                                    <img src="{{ url($item->photo) }}" alt="" style="width: 200px"/>
                                                </td>
                                                <td>{{ $item->is_default ? 'Ya' : 'Tidak' }}</td>
                                                <td>
                                                    <a href="" class="btn btn-secondary btn-datatable" type="button">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('gallery.edit', $item->id_gallery) }}"
                                                        class="btn btn-primary btn-datatable">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-datatable" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modalhapus-{{ $item->id_gallery }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="tex-center">
                                                    Foto Sparepart Kosong
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

</main>

@forelse ($gallery as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_gallery }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('gallery.destroy', $item->id_gallery) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Foto Sparepart
                    {{ $item->sparepart->nama_sparepart }}?</div>
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

{{-- Script Open Modal Callback --}}
<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

</script>
@endsection
