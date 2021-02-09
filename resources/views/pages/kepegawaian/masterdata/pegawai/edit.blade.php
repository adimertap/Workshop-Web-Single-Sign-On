@extends('layouts.Admin.adminpegawai')

@section('content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-warehouse"></i></div>
                            Edit Data Pegawai
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('pegawai.index') }}"
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
                        <div class="wizard-step-icon"><i class="fas fa-user"></i></div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Ubah Data Indentitas Pegawai </div>
                            <div class="wizard-step-text-details">{{ $item->nama_lengkap }} | {{ $item->jabatan->nama_jabatan }}</div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- CARD 1 --}}
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <!-- Wizard tab pane item 1-->
                    <div class="tab-pane py-5 py-xl-5 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-6 col-xl-8">
                                @if(session('messageberhasil'))
                                <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                                    {{ session('messageberhasil') }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                @endif
                                <h3 class="text-primary">Ubah Data </h3>
                                <h5 class="card-title">Input Formulir Identitas Diri</h5>
                                <form action="{{ route('pegawai.update', $item->id_pegawai) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="nama_lengkap">Nama Lengkap</label>
                                            <input class="form-control" id="nama_lengkap" type="text"
                                                name="nama_lengkap" value="{{ $item->nama_lengkap }}" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="nama_panggilan">Nama Panggilan</label>
                                            <input class="form-control" id="nama_panggilan" type="text"
                                                name="nama_panggilan" value="{{ $item->nama_panggilan }}" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_jabatan">Jabatan</label>
                                            <select class="form-control" name="id_jabatan" id="id_jabatan">
                                                <option value="{{ $item->jabatan->nama_jabatan }}">{{ $item->jabatan->nama_jabatan }}</option>
                                                @foreach ($jabatan as $item)
                                                    <option value="{{ $item->id_jabatan }}">{{ $item->nama_jabatan }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <option value="{{ $item->jenis_kelamin }}">{{ $item->jenis_kelamin }}</option>
                                                <option value="Laki-Laki">Laki Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="tempat_lahir">Tempat Lahir</label>
                                            <input class="form-control" id="tempat_lahir" type="text"
                                                name="tempat_lahir" value="{{ $item->tempat_lahir }}" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="tanggal_lahir">Tanggal Lahir</label>
                                            <input class="form-control" id="tanggal_lahir" type="date"
                                                name="tanggal_lahir" value="{{ $item->tanggal_lahir }}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control" id="email" type="email" name="email"
                                            value="{{ $item->email }}" />
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="no_telp">Phone number</label>
                                            <input class="form-control" id="no_telp" name="no_telp" type="number"
                                                value="{{ $item->no_telp }}" />
                                        </div>
                                        <div class="form-group col-md-6 mb-0">
                                            <label class="small mb-1" for="agama">Agama</label>
                                            <select name="agama" id="agama" class="form-control">
                                                <option value="{{ $item->agama }}"></option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Protestan">Protestan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="status_perkawinan">Status Perkawinan</label>
                                            <select name="status_perkawinan" id="status_perkawinan" class="form-control">
                                                <option value="{{ $item->status_perkawinan }}"></option>
                                                <option value="lajang">Lajang</option>
                                                <option value="Sudah Menikah">Sudah Menikah</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="pendidikan_terakhir">Pendidikan
                                                Terakhir</label>
                                            <select name="pendidikan_terakhir" id="pendidikan_terakhir"
                                                class="form-control">
                                                <option value="{{ $item->pendidikan_terakhir }}"></option>
                                                <option value="SLTP">SLTP</option>
                                                <option value="SLTA">SLTA</option>
                                                <option value="STM/SMK">STM/SMK</option>
                                                <option value="DIPLOMA">Diploma</option>
                                                <option value="SARJANA">Sarjana</option>
                                                <option value="PASCA SARJANA">Pasca Sarjana</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kota_asal">Kota Asal</label>
                                            <input class="form-control" name="kota_asal" id="kota_asal" type="text"
                                                placeholder="Masukan Kota Asal" value="{{ $item->kota_asal }}"/>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="tanggal_masuk">Tanggal Masuk</label>
                                            <input class="form-control" name="tanggal_masuk" id="tanggal_masuk" type="date"
                                                value="{{ $item->tanggal_masuk }}" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="small mb-1" for="alamat">Alamat Lengkap</label>
                                            <input class="form-control" name="alamat" id="alamat" type="text"
                                                value="{{ $item->alamat }}" />
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-light" type="button">Previous</button>
                                        <button class="btn btn-primary" type="Submit">Submit</button>
                                    </div>
                                </form>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

</script>

@endsection
