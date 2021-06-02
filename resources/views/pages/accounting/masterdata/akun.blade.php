@extends('layouts.Admin.adminaccounting')

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
                            Master Data Akun
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Bank Account
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                        data-target="#Modalsetakun">Set Akun</button>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable">


                    @if(session('messageberhasilinduk'))
                    <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messageberhasilinduk') }}
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @if(session('messagehapusinduk'))
                    <div class="alert alert-danger" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messagehapusinduk') }}
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
                                        <tr>
                                            <td colspan="5" class="text-center font-weight-500">
                                                Kode Akun
                                            </td>
                                            <td colspan="3" class="text-center font-weight-500">
                                                Akun
                                            </td>
                                            <td colspan="1" class="text-center font-weight-500">

                                            </td>
                                        </tr>
                                        <tr role="row">
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">1</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">2</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">3</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">4</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">5</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 180px;">Nama Akun</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 60px;">Debet</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 60px;">Kredit</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Actions: activate to sort column ascending"
                                                style="width: 50px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($akun as $item)
                                        <tr role="row" class="odd">
                                            @if ($item->level_akun == '1')
                                                <td>{{ $item->level_akun }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            @elseif ($item->level_akun == '2')
                                                <td>{{ $item->kode_akun_induk }}</td>
                                                <td>{{ $item->kode_akun }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            @elseif ($item->level_akun == '3')
                                                <td>{{ $item->super_level_akun }}</td>
                                                <td>{{ $item->kode_akun_induk }}</td>
                                                <td>{{ $item->kode_akun }}</td>
                                                <td></td>
                                                <td></td>
                                            @elseif($item->level_akun == '4')
                                                <td>{{ $item->super_level_akun }}</td>
                                                <td>{{ $item->moderate_level_akun }}</td>
                                                <td>{{ $item->kode_akun_induk }}</td>
                                                <td>{{ $item->kode_akun }}</td>
                                                <td></td>
                                            @elseif ($item->level_akun == '5')
                                                <td>{{ $item->super_level_akun }}</td>
                                                <td>{{ $item->moderate_level_akun }}</td>
                                                <td>{{ $item->kode_akun_induk }}</td>
                                                <td>{{ $item->kode_akun }}</td>
                                                <td>{{ $item->level_akun }}</td>
                                            @endif

                                            <td class="text-center">{{ $item->nama_akun }}</td>
                                            @if ($item->akun_grup == 'Debet')
                                                <td class="text-center"><span class="badge badge-warning">Debet</span></td>
                                                <td></td>
                                            @elseif ($item->akun_grup == 'Kredit')
                                                <td></td>
                                                <td class="text-center"><span class="badge badge-warning">Kredit</span></td>
                                            @endif
                                        </tr>
                                        @empty
                                            
                                        @endforelse
                                        {{-- @forelse ($akuninduk as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">
                                                {{ $loop->iteration}}.</th>
                                            <td class="text-center">{{ $item->kode_akun_induk }}</td>
                                            <td class="text-center">{{ $item->nama_akun_induk }}</td>
                                            <td class="text-center">@if($item->akun_grup_induk == 'Debet')
                                                <span class="badge badge-warning">{{ $item->akun_grup_induk }}
                                                    @else

                                                    @endif
                                            </td>
                                            <td class="text-center">@if($item->akun_grup_induk == 'Kredit')
                                                <span class="badge badge-warning">{{ $item->akun_grup_induk }}
                                                    @else

                                                    @endif
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaleditinduk-{{ $item->id_akun_induk }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable  mr-2" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapusinduk-{{ $item->id_akun_induk }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty --}}
                                        {{-- <tr>
                                            <td colspan="7" class="text-center">
                                                Data Akun Kosong
                                            </td>
                                        </tr>
                                        @endforelse --}}
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


{{-- MODAL --}}
{{-- MODAL Tambah -------------------------------------------------------------------------------------------}}
<div class="modal fade" id="Modalsetakun" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Set Akun</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('akun.store') }}" method="POST">
                @csrf
                <div class="modal-body">
{{--                  
                    <hr>
                    </hr> --}}
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label class="small mb-1" for="id_akun_induk">Akun Induk</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <div class="input-group input-group-joined">
                                <input class="form-control" type="text" placeholder="Pilih Akun Induk" aria-label="Search"
                                    id="id_akun_induk">
                                <div class="input-group-append">
                                    <a href="" class="input-group-text" type="button" data-toggle="modal"
                                        data-target="#ModalAkunInduk">
                                        <i class="fas fa-folder-open"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="small" id="alertsupplier" style="display:none">
                                <span class="font-weight-500 text-danger">Error! Anda Belum Memilih Akun Induk!</span>
                                <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1 mr-1" for="level_akun_induk">Level Akun Induk</label>
                            <input class="form-control" name="level_akun_induk" type="text" id="level_akun_induk"
                                value="{{ old('level_akun_induk') }}"
                                class="form-control @error('level_akun_induk') is-invalid @enderror" readonly />
                            @error('level_akun_induk')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                    <span class="small mb-1 font-weight-500 text-warning">Kode Akun Level 3(111) dan 4(1111) Harus Terdiri dari 2 Karakter Angka!.</span>
                    <div><span class="small mb-1 font-weight-500 text-danger">Contoh 1101 untuk level 3 dan 110101 untuk level 4</span>  </div>
                    <p></p>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label class="small mb-1 mr-1" for="kode_akun_induk">Kode Induk</label>
                            <input class="form-control" name="kode_akun_induk" type="text" id="kode_akun_induk"
                                value="{{ old('kode_akun_induk') }}"
                                class="form-control @error('kode_akun_induk') is-invalid @enderror" readonly />
                            @error('kode_akun_induk')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1 mr-1" for="kode_akun">Kode akun</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <input class="form-control" name="kode_akun" type="text" id="kode_akun"
                                placeholder="Input Kode Akun" value="{{ old('kode_akun') }}"
                                class="form-control @error('kode_akun') is-invalid @enderror" />
                            @error('kode_akun')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1 mr-1" for="kode_akun">Level Akun</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <input class="form-control" name="kode_akun" type="text" id="kode_akun" value="{{ old('kode_akun') }}"
                                class="form-control @error('kode_akun') is-invalid @enderror" readonly/>
                            @error('kode_akun')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                    <span class="small mb-1 font-weight-500 text-primary">Detail Kode Akun: </span>
                    <p></p>
                    <div class="row">

                        <div class="form-group col-md-6">
                            <label class="small mb-1 mr-1" for="nama_akun">Nama akun</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <input class="form-control" name="nama_akun" type="text" id="nama_akun"
                                placeholder="Input Nama Akun" value="{{ old('nama_akun') }}"
                                class="form-control @error('nama_akun') is-invalid @enderror" />
                            @error('nama_akun')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="small mb-1 mr-1" for="akun_grup">Grup Akun</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <select name="akun_grup" id="akun_grup" class="form-control"
                                class="form-control @error('akun_grup') is-invalid @enderror">
                                <option value="{{ old('akun_grup')}}">Pilih Akun Grup
                                </option>
                                <option value="Debet">Debet</option>
                                <option value="Kredit">Kredit</option>
                            </select>
                            @error('akun_grup')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
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
@forelse ($akun as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_akun }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Akun</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('akun.update', $item->id_akun) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="kode_akun">Kode akun</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="kode_akun" type="text" id="kode_akun"
                            value="{{ $item->kode_akun }}"
                            class="form-control @error('kode_akun') is-invalid @enderror" />
                        @error('kode_akun')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_akun">Nama akun</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <input class="form-control" name="nama_akun" type="text" id="nama_akun"
                            value="{{ $item->nama_akun }}"
                            class="form-control @error('nama_akun') is-invalid @enderror" />
                        @error('nama_akun')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="akun_grup">Grup Akun</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <select name="akun_grup" id="akun_grup" class="form-control"
                            class="form-control @error('akun_grup') is-invalid @enderror">
                            <option value="{{ $item->akun_grup }}">{{ $item->akun_grup }}</option>
                            </option>
                            <option value="Debit">Debit</option>
                            <option value="Kredit">Kredit</option>
                        </select>
                        @error('akun_grup')<div class="text-danger small mb-1">{{ $message }}
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


{{-- MODAL DELETE ------------------------------------------------------------------------------}}
@forelse ($akun as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_akun }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('akun.destroy', $item->id_akun) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Akun {{ $item->nama_akun }} ?</div>
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

{{-- MODAL RCV --}}
<div class="modal fade" id="ModalAkunInduk" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl " role="document">
        <div class="modal-content">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">Pilih Akun Induk</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableInduk"
                                    width="100%" cellspacing="0" role="grid"
                                    aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">1</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">2</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">3</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">4</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">5</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 180px;">Nama Akun</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Actions: activate to sort column ascending"
                                                style="width: 50px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        
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

        var tablercv = $('#dataTableInduk').DataTable()
    });

</script>

@endsection
