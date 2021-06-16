@extends('layouts.Admin.adminpegawai')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-user"></i></div>
                            Tambah Data Pegawai
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('masterdatapegawai') }}"
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
                            <div class="wizard-step-text-name">Identitas</div>
                            <div class="wizard-step-text-details">Formulir Identitas Diri</div>
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
                            <div class="col-xxl-6 col-xl-10">
                                @if(session('messageberhasil'))
                                <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                                    {{ session('messageberhasil') }}
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                @endif
                                <h3 class="text-primary">Master Pegawai</h3>
                                <h5 class="card-title">Input Formulir Data Diri Pegawai</h5>
                                <form action="{{ route('pegawai.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="small mb-1 mr-1" for="nama_pegawai">Nama Lengkap</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                        <input class="form-control" id="nama_pegawai" type="text"
                                            name="nama_pegawai" placeholder="Input Nama Lengkap" value="{{ old('nama_pegawai') }}"
                                            class="form-control @error('nama_pegawai') is-invalid @enderror" />
                                        @error('nama_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="nama_panggilan">Nama
                                                Panggilan</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="nama_panggilan" type="text"
                                                name="nama_panggilan" placeholder="Input Nama Panggilan" value="{{ old('nama_panggilan') }}"
                                                class="form-control @error('nama_panggilan') is-invalid @enderror" />
                                            @error('nama_panggilan')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="nik_pegawai">NIK Pegawai</label><span
                                            class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="nik_pegawai" type="text"
                                                name="nik_pegawai" placeholder="Input NIK Pegawai" value="{{ old('nik_pegawai') }}"
                                                class="form-control @error('nik_pegawai') is-invalid @enderror"/>
                                            @error('nik_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="npwp_pegawai">NPWP</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="npwp_pegawai" type="text"
                                                name="npwp_pegawai" placeholder="Input NPWP Pegawai" value="{{ old('npwp_pegawai') }}"
                                                class="form-control @error('npwp_pegawai') is-invalid @enderror" />
                                            @error('npwp_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="id_jabatan">Jabatan</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <select class="form-control" name="id_jabatan" id="id_jabatan" value="{{ old('id_jabatan') }}"
                                                class="form-control @error('id_jabatan') is-invalid @enderror">
                                                <option>Pilih Jabatan</option>
                                                @foreach ($jabatan as $item)
                                                <option value="{{ $item->id_jabatan }}">{{ $item->nama_jabatan }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_jabatan')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="tempat_lahir">Tempat Lahir</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="tempat_lahir" type="text"
                                                name="tempat_lahir" placeholder="Input Tempat Lahir" value="{{ old('tempat_lahir') }}"
                                                class="form-control @error('tempat_lahir') is-invalid @enderror" />
                                            @error('tempat_lahir')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="tanggal_lahir">Tanggal
                                                Lahir</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="tanggal_lahir" type="date"
                                                name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                                class="form-control @error('tanggal_lahir') is-invalid @enderror" />
                                            @error('tanggal_lahir')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="jenis_kelamin">Jenis
                                                Kelamin</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" value="{{ old('jenis_kelamin') }}"
                                                class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                                <option value="{{ old('jenis_kelamin')}}"> Pilih Jenis Kelamin</option>
                                                <option value="Laki-Laki">Laki Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            @error('jenis_kelamin')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="no_telp">Phone number</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="no_telp" name="no_telp" type="number"
                                                placeholder="+62" value="{{ old('no_telp') }}"
                                                class="form-control @error('no_telp') is-invalid @enderror" />
                                            @error('no_telp')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="agama">Agama</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="agama" id="agama" class="form-control" value="{{ old('agama') }}"
                                                class="form-control @error('agama') is-invalid @enderror">
                                                <option value="{{ old('agama')}}"> Pilih Agama</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Konghucu">Konghucu</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Protestan">Protestan</option>
                                            </select>
                                            @error('agama')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="pendidikan_terakhir">Pendidikan
                                                Terakhir</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control" value="{{ old('pendidikan_terakhir') }}"
                                                class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
                                                <option value="{{ old('pendidikan_terakhir')}}">Pilih Pendidikan
                                                    Terakhir</option>
                                                <option value="SLTP">SLTP</option>
                                                <option value="SLTA">SLTA</option>
                                                <option value="STM/SMK">STM/SMK</option>
                                                <option value="DIPLOMA">Diploma</option>
                                                <option value="SARJANA">Sarjana</option>
                                                <option value="PASCA SARJANA">Pasca Sarjana</option>
                                            </select>
                                            @error('pendidikan_terakhir')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="tanggal_masuk">Tanggal Masuk</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" name="tanggal_masuk" id="tanggal_masuk" type="date" value="{{ old('tanggal_masuk') }}"
                                                class="form-control @error('tanggal_masuk') is-invalid @enderror" />
                                            @error('tanggal_masuk')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label class="small mb-1 mr-1" for="kota_asal">Kota Asal</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" name="kota_asal" id="kota_asal" type="text"
                                                placeholder="Input Kota Asal" value="{{ old('kota_asal') }}"
                                                class="form-control @error('kota_asal') is-invalid @enderror" />
                                            @error('kota_asal')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="small mb-1 mr-1" for="alamat">Alamat Lengkap</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" name="alamat" id="alamat" type="text"
                                                placeholder="Input Alamat Lengkap" value="{{ old('alamat') }}"
                                                class="form-control @error('alamat') is-invalid @enderror" />
                                            @error('alamat')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('pegawai.index') }}" class="btn btn-light" type="button">Kembali</a>
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

@endsection
