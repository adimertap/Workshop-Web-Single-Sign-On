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
                            Master Data Supplier
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- TABEL --}}
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Supplier
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">Tambah
                        Supplier</button>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable">

                    {{-- Message --}}
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
                                                style="width: 50px;">Kode</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 120px;">Nama Supplier</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 60px;">Telephone</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 70px;">Email</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Nama Sales</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 60px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($supplier as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->kode_supplier }}</td>
                                            <td>{{ $item->nama_supplier }}</td>
                                            <td>{{ $item->telephone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->nama_sales }}</td>
                                            <td>
                                                <a href="" class="btn btn-secondary btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaldetail-{{ $item->id_supplier }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="" class="btn btn-primary btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaledit-{{ $item->id_supplier }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapus-{{ $item->id_supplier }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="tex-center">
                                                Data Supplier Kosong
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


{{-- MODAL TAMBAH SUPPLIER -----------------------------------------------------------------------}}
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLg" aria-hidden="true"
    aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Supplier</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('supplier.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
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
                    <hr>
                    </hr>
                    @endif

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="kode_supplier">Kode Supplier</label>
                            <input class="form-control" name="kode_supplier" type="text" id="kode_supplier"
                                placeholder="Input Kode Supplier" value="{{ old('kode_supplier') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="nama_supplier">Nama Supplier</label>
                            <input class="form-control" name="nama_supplier" type="text" id="nama_supplier"
                                placeholder="Input Nama Supplier" value="{{ old('nama_supplier') }}"></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="nama_sales">Nama Sales</label>
                            <input class="form-control" name="nama_sales" type="text" id="nama_sales"
                                placeholder="Input Nama Sales" value="{{ old('nama_sales') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="email">Email</label>
                            <input class="form-control" name="email" type="text" id="email"
                                placeholder="Input Email Supplier" value="{{ old('email') }}"></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="telephone">Telephone</label>
                            <input class="form-control" name="telephone" type="number" id="telephone"
                                placeholder="Input Nomor Telephone" value="{{ old('telephone') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="rekening_supplier">Nomor Rekening</label>
                            <input class="form-control" name="rekening_supplier" type="number" id="rekening_supplier"
                                placeholder="Input Nomor Rekening" value="{{ old('rekening_supplier') }}"></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="alamat_supplier">Alamat Supplier</label>
                            <input class="form-control" name="alamat_supplier" type="text" id="alamat_supplier"
                                placeholder="Input Alamat Supplier" value="{{ old('alamat_supplier') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="kode_pos">Kode Pos</label>
                            <input class="form-control" name="kode_pos" type="number" id="kode_pos"
                                placeholder="Input Kode Pos" value="{{ old('kode_pos') }}"></input>
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

{{-- MODAL EDIT ----------------------------------------------------------------------------------------------}}
@forelse ($supplier as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_supplier }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLg" aria-hidden="true" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Supplier</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('supplier.update', $item->id_supplier) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="kode_supplier">Kode Supplier</label>
                            <input class="form-control" name="kode_supplier" type="text" id="kode_supplier"
                                placeholder="Input Kode Supplier" value="{{ $item->kode_supplier }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="nama_supplier">Nama Supplier</label>
                            <input class="form-control" name="nama_supplier" type="text" id="nama_supplier"
                                placeholder="Input Nama Supplier" value="{{ $item->nama_supplier }}"></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="nama_sales">Nama Sales</label>
                            <input class="form-control" name="nama_sales" type="text" id="nama_sales"
                                placeholder="Input Nama Sales" value="{{ $item->nama_sales }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="email">Email</label>
                            <input class="form-control" name="email" type="text" id="email"
                                placeholder="Input Email Supplier" value="{{ $item->email }}"></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="telephone">Telephone</label>
                            <input class="form-control" name="telephone" type="number" id="telephone"
                                placeholder="Input Nomor Telephone" value="{{ $item->telephone }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="rekening_supplier">Nomor Rekening</label>
                            <input class="form-control" name="rekening_supplier" type="number" id="rekening_supplier"
                                placeholder="Input Nomor Rekening" value="{{ $item->rekening_supplier }}"></input>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="alamat_supplier">Alamat Supplier</label>
                            <input class="form-control" name="alamat_supplier" type="text" id="alamat_supplier"
                                placeholder="Input Alamat Supplier" value="{{ $item->alamat_supplier }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="kode_pos">Kode Pos</label>
                            <input class="form-control" name="kode_pos" type="number" id="kode_pos"
                                placeholder="Input Kode Pos" value="{{ $item->kode_pos }}"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="Submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

{{-- MODAL DELETE --}}
@forelse ($supplier as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_supplier }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('supplier.destroy', $item->id_supplier) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Supplier {{ $item->nama_supplier }} ?</div>
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

{{-- MODAL DETAIL --}}
@forelse ($supplier as $item)
<div class="modal fade" id="Modaldetail-{{ $item->id_supplier }}" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Detail Supplier</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
            </div>
            <form>
                @csrf
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center flex-shrink-0 mr-3">
                            <div class="avatar avatar-xl mr-3 bg-gray-200"><img class="avatar-img img-fluid"
                                    src="/backend/src/assets/img/freepik/profiles/profile-6.png" alt=""></div>
                            <div class="d-flex flex-column font-weight-bold">
                                <a class="text-dark line-height-normal mb-1">{{ $item->nama_supplier }}</a>
                                <a></a>
                                <div class=" small text-muted line-height-normal">{{ $item->email }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    </hr>
                    <form>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Kode Supplier
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ $item->kode_supplier }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Nama Sales
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ $item->nama_sales }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Nomor Telephone
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ $item->telephone }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Alamat Supplier
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ $item->alamat_supplier }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Kode Pos
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ $item->kode_pos }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column font-weight-bold">
                                    <label class="small text-muted line-height-normal">Nomor Rekening
                                </div>
                            </div>
                            <div class="col">
                                <label class="small text-muted line-height-normal">: {{ $item->rekening_supplier }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@empty

@endforelse


</main>
@if (count($errors) > 0)
<button id="validasierror" style="display: none" type="button" data-toggle="modal" data-target="#Modaltambah">
    Open Modal</button>
@endif

{{-- Script Open Modal Callback --}}
<script>
    $(document).ready(function () {
        $('#validasierror').click();
        // $('#dataTable').DataTable();
    });

</script>

@endsection
