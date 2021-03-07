@extends('layouts.Admin.adminfrontoffice')

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
                            Master Data Kendaraan
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
                <div class="card-header">List Kendaraan
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">Tambah
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
                                                style="width: 20px;">Kode Kendaraan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Nama Kendaraan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Jenis Kendaraan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Merk Kendaraan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Actions</th>
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

    {{-- MODAL Tambah -------------------------------------------------------------------------------------------}}
    <div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kendaraan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="#" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="small mb-1">Isikan Form Dibawah Ini</label>
                        <hr>
                        </hr>
                        <div class="form-group">
                            <label class="small mb-1" for="kode_kendaraan">Kode Kendaraan</label>
                            <input class="form-control" name="kode_kendaraan" type="text" id="kode_kendaraan"
                                placeholder="Input Kode Merk" value="Masukkan Kode Kendaraan"
                                class="form-control @error('kode_kendaraan') is-invalid @enderror">
                            @error('kode_kendaraan')<div class="text-danger small mb-1">#
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_kendaraan">Nama Kendaraan</label>
                            <input class="form-control" name="nama_kendaraan" type="text" id="nama_kendaraan"
                                placeholder="Input Kode Merk" value="Masukkan Nama Kendaraan"
                                class="form-control @error('nama_kendaraan') is-invalid @enderror">
                            @error('nama_kendaraan')<div class="text-danger small mb-1">#
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="id_jenis_kendaraan">Jenis Kendaraan</label>
                            <select class="form-control" name="id_jenis_kendaraan"
                                class="form-control @error('id_jenis_kendaraan') is-invalid @enderror"
                                id="id_jenis_kendaraan">
                                <option>Pilih Jenis Kendaraan</option>
                                <option value="#">Motor</option>
                                <option value="#">Mobil</option>
                                <option value="#">Sepeda</option>
                            </select>
                            @error('id_jenis_kendaraan')<div class="text-danger small mb-1">#
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="merk_kendaraan">Merk Kendaraan</label>
                            <input class="form-control" name="merk_kendaraan" type="text" id="merk_kendaraan"
                                placeholder="Input Kode Merk" value="Masukkan Merk Kendaraan"
                                class="form-control @error('merk_kendaraan') is-invalid @enderror">
                            @error('merk_kendaraan')<div class="text-danger small mb-1">
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
</main>


@endsection
