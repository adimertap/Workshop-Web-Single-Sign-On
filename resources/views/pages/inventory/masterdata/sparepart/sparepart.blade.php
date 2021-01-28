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
                            Master Data Sparepart
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header ">List Sparepart
                    <a href="{{ route('sparepart.create') }}" class="btn btn-primary"> Tambah Sparepart</a>
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
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Kode</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 230px;">Nama Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 104px;">Jenis Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 87px;">Merk</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 40px;">Satuan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 80px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($sparepart as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->kode_sparepart }}</td>
                                            <td>{{ $item->nama_sparepart }}</td>
                                            <td>{{ $item->Jenissparepart->jenis_sparepart }}</td>
                                            <td>{{ $item->Merksparepart->merk_sparepart }}</td>
                                            <td>{{ $item->Konversi->satuan }}</td>
                                            <td>
                                                <a href="" class="btn btn-secondary btn-datatable" type="button">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="" class="btn btn-primary btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaledit-{{ $item->id_sparepart }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapus-{{ $item->id_sparepart }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="tex-center">
                                                Data Sparepart Kosong
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

{{-- MODAL TAMBAH SPAREPART -----------------------------------------------------------------------}}
<div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Sparepart</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <label class="small mb-1">Isikan Form Dibawah Ini</label>
                <hr>
                </hr>
                <form action="{{ route('sparepart.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="small mb-1" for="kode_sparepart">Kode Sparepart </label>
                        <input class="form-control" name="kode_sparepart" type="text" id="kode_sparepart"
                            placeholder="Input Kode Sparepart" value="{{ old('kode_sparepart') }}">
                    </div>
                    <div class="form-group ">
                        <label class="small mb-1" for="nama_sparepart">Nama Sparepart</label>
                        <input class="form-control" name="nama_sparepart" type="text" id="nama_sparepart"
                            placeholder="Input Nama Sparepart" value="{{ old('nama_sparepart') }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="id_jenis_sparepart">Jenis Sparepart</label>
                            <select class="form-control" name="id_jenis_sparepart" id="id_jenis_sparepart">
                                @foreach ($jenis_sparepart as $item)
                                    <option value="{{ $item->id_jenis_sparepart }}">{{ $item->jenis_sparepart }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="id_merk">Merk Sparepart</label>
                            <select class="form-control" name="id_merk" id="id_merk">
                                @foreach ($merk_sparepart as $item)
                                    <option value="{{ $item->id_merk }}">{{ $item->merk_sparepart }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_konversi">Satuan</label>
                        <select class="form-control" name="id_konversi" id="id_konversi">
                            @foreach ($konversi as $item)
                                <option value="{{ $item->id_konversi }}">{{ $item->satuan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                 {{-- Validasi Error --}}
                 @if (count($errors) > 0)
                 <div class="alert alert-danger">
                     <strong>Error</strong>
                     <ul>
                         @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                         @endforeach
                     </ul>
                 </div>
                 @endif
                 
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="Submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

@forelse ($sparepart as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_sparepart }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Sparepart</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('sparepart.update', $item->id_sparepart) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1" for="kode_sparepart">Kode Sparepart </label>
                        <input class="form-control" name="kode_sparepart" type="text" id="kode_sparepart"
                            value="{{ $item->kode_sparepart }}">
                    </div>
                    <div class="form-group ">
                        <label class="small mb-1" for="nama_sparepart">Nama Sparepart</label>
                        <input class="form-control" name="nama_sparepart" type="text" id="nama_sparepart"
                            value="{{ $item->nama_sparepart }}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="id_jenis_sparepart">Jenis Sparepart</label>
                            <select class="form-control" name="id_jenis_sparepart" id="id_jenis_sparepart">
                                <option> Pilih Jenis</option>
                                @foreach ($jenis_sparepart as $item)
                                    <option value="{{ $item->id_jenis_sparepart }}">{{ $item->jenis_sparepart }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="id_merk">Merk Sparepart</label>
                            <select class="form-control" name="id_merk" id="id_merk">
                                <option> Pilih Merk</option>
                                @foreach ($merk_sparepart as $item)
                                    <option value="{{ $item->id_merk }}">{{ $item->merk_sparepart }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_konversi">Satuan</label>
                        <select class="form-control" name="id_konversi" id="id_konversi">
                            <option> Pilih Satuan</option>
                            @foreach ($konversi as $item)
                                <option value="{{ $item->id_konversi }}">{{ $item->satuan }}</option>
                            @endforeach
                        </select>
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

@forelse ($sparepart as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_sparepart }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('sparepart.destroy', $item->id_sparepart) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Sparepart {{ $item->nama_sparepart }}?</div>
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
