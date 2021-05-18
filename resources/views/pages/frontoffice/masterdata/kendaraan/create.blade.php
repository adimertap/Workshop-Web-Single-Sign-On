@extends('layouts.Admin.adminfrontoffice')

@section('content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-cog"></i></div>
                            Tambah Data Kendaraan
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('kendaraan.index') }}"
                            class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                    <!-- Wizard navigation item 1-->
                    <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-toggle="tab" role="tab"
                        aria-controls="wizard1" aria-selected="true">
                        <div class="wizard-step-icon"><i class="fas fa-plus"></i></div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Formulir Kendaraan</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <!-- Wizard tab pane item 1-->
                    <div class="tab-pane py-2 py-xl-2 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-6 col-xl-9">
                                <h3 class="text-primary">Kendaraan</h3>
                                <h5 class="card-title">Input Formulir Kendaraan</h5>
                                <form action="{{ route('kendaraan.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_kendaraan">Kode Kendaraan</label>
                                            <input class="form-control" id="kode_kendaraan" type="text"
                                                name="kode_kendaraan" placeholder="Input Kode Kendaraan"
                                                value="{{ $kode_kendaraan }}" readonly />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="nama_kendaraan">Nama
                                                Kendaraan</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="nama_kendaraan" type="text"
                                                name="nama_kendaraan" placeholder="Input Nama kendaraan"
                                                value="{{ old('nama_kendaraan') }}"
                                                class="form-control @error('nama_kendaraan') is-invalid @enderror" />
                                            @error('nama_kendaraan')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_jenis_kendaraan">Pilih Jenis
                                                kendaraan</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <div class="input-group input-group-joined">
                                                <div class="input-group-append">
                                                    <a href="" class="btn btn-sm btn-secondary" type="button"
                                                        data-toggle="modal" data-target="#ModalTambahJenis">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </div>
                                                <select class="form-control" name="id_jenis_kendaraan"
                                                    id="id_jenis_kendaraan"
                                                    class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                                    <option>Pilih Jenis</option>
                                                    @foreach ($jenis_kendaraan as $item)
                                                    <option value="{{ $item->id_jenis_kendaraan }}">
                                                        {{ $item->jenis_kendaraan }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('id_jenis_kendaraan')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_merk_kendaraan">Merk
                                                Kendaraan</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <div class="input-group input-group-joined">
                                                <div class="input-group-append">
                                                    <a href="" class="btn btn-sm btn-secondary" type="button"
                                                        data-toggle="modal" data-target="#ModalTambahMerk">
                                                        <i class="fas fa-plus"></i>
                                                    </a>
                                                </div>
                                                <select class="form-control" name="id_merk_kendaraan"
                                                    id="id_merk_kendaraan"
                                                    class="form-control @error('id_merk_kendaraan') is-invalid @enderror">
                                                    <option>Pilih Merk</option>
                                                    @foreach ($merk_kendaraan as $item)
                                                    <option value="{{ $item->id_merk_kendaraan }}">
                                                        {{ $item->merk_kendaraan }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            @error('id_merk_kendaraan')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('kendaraan.index') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary" type="Submit">Submit</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

{{-- Modal Tambah Jenis --}}
<div class="modal fade" id="ModalTambahJenis" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Kendaraan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('jenis-kendaraan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1" for="jenis_kendaraan">Jenis Kendaraan <span
                                style="color: red">*</span> </label>
                        <input class="form-control" name="jenis_kendaraan" type="text" id="jenis_kendaraan"
                            placeholder="Input Jenis Kendaraan" value="{{ old('jenis_kendaraan') }}"
                            class="form-control @error('jenis_kendaraan') is-invalid @enderror">
                        @error('jenis_kendaraan')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan">Keterangan</label>
                        <input class="form-control" name="keterangan" type="text" id="keterangan"
                            placeholder="Input Nama Kendaraan" value="{{ old('keterangan') }}"
                            class="form-control @error('keterangan') is-invalid @enderror">
                        @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
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

{{-- Modal Tambah Merk --}}
<div class="modal fade" id="ModalTambahMerk" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Merk Kendaraan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('merk-kendaraan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1" for="kode_merk_kendaraan">Kode Merk</label>
                        <input class="form-control" name="kode_merk_kendaraan" type="text" id="kode_merk_kendaraan"
                            placeholder="Input Kode Merk" value="{{ $kode_merk_kendaraan }}" readonly>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="merk_kendaraan">Merk Kendaraan <span style="color: red">*</span>
                        </label>
                        <input class="form-control" name="merk_kendaraan" type="text" id="merk_kendaraan"
                            placeholder="Input Merk Kendaraan" value="{{ old('merk_kendaraan') }}"
                            class="form-control @error('merk_kendaraan') is-invalid @enderror">
                        @error('merk_kendaraan')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_jenis_kendaraan">Jenis Kendaraan</label>
                        <select class="form-control" name="id_jenis_kendaraan"
                            class="form-control @error('id_jenis_kendaraan') is-invalid @enderror"
                            id="id_jenis_kendaraan">
                            <option>Pilih Jenis</option>
                            @foreach ($jenis_kendaraan as $item)
                            <option value="{{ $item->id_jenis_kendaraan }}">
                                {{ $item->jenis_kendaraan }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_jenis_kendaraan')<div class="text-danger small mb-1">{{ $message }}
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

<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

</script>
@endsection
