@extends('layouts.Admin.adminpegawai')

@section('content')
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Absensi Pegawai</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Friday</span>
                    · September 20, 2020 · 12:16 PM
                </div>
            </div>
            <div class="small">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                Bengkel
                <span class="font-weight-500 text-primary">Adi Jaya</span>
                <hr>
                </hr>
            </div>
        </div>
    </div>
</main>
<div class="container-fluid">
    <div class="alert alert-danger alert-icon" role="alert">
        <div class="alert-icon-aside">
            <i class="fas fa-calendar-times"></i>
        </div>
        <div class="alert-icon-content">
            <h6 class="alert-heading">Informasi Hari ini!</h6>
            Anda Belum Melakukan Absensi Kepada Pegawai Bengkel
        </div>
    </div>
</div>
<!-- Main page content-->
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-4">

            <!-- Illustrations -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Menu Absensi</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 10rem;"
                            src="/backend/src/assets/img/freepik/absen.png" alt="">
                    </div>
                    <h2 class="m-0 font-weight-bold text-primary" style="text-align: center">Menu Absensi</h2>
                    <p style="text-align: center">Pilih pegawai yang akan dilakukan absensi <a target="_blank"
                            rel="nofollow" href="https://undraw.co/">Daftar Pegawai</a> Klik presensi untuk melakukan
                        absensi kepada pegawai bengkel
                        <div class="text-center">
                            <div class="form-group">
                                <label class="" for="id_pegawai">Pegawai</label>
                                <select class="form-control" name="id_pegawai" id="id_pegawai"
                                    class="form-control @error('id_pegawai') is-invalid @enderror">
                                    <option>Pilih Pegawai</option>
                                    @foreach ($pegawai as $item)
                                    <option value="{{ $item->id_pegawai }}">{{ $item->nama_pegawai }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <hr class="my-4" /> --}}
                        {{-- <div class="d-flex justify-content-between">
                        <button class="btn btn-primary">Presensi Masuk</button>
                        <button class="btn btn-secondary">Presensi Pulang</button>
                    </div> --}}

                </div>
                <button class="btn btn-secondary" type="button" data-toggle="modal"
                data-target="#Modaltambah">Presensi</button>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card card-header-actions">
                    <div class="card-header">Absensi Pegawai
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
                                    <table class="table table-bordered table-hover dataTable" id="dataTable"
                                        width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 20px;">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 120px;">Nama Pegawai</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 120px;">Jabatan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 120px;">Jam Masuk</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 120px;">Jam Pulang</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                                    style="width: 77px;">Keterangan</th>
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
</div>

<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Presensi Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="jumlah_real">Masukan Stock Real</label>
                        <input class="form-control" name="jumlah_real" type="text" id="jumlah_real"
                            placeholder="Input Stock Real" value="{{ old('jumlah_real') }}"></input>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan">Masukan Keterangan</label>
                        <textarea class="form-control" name="keterangan" type="text" id="keterangan"
                            placeholder="Input Keterangan" value="{{ old('keterangan') }}"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit" >Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
