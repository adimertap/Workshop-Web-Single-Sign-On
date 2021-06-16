@extends('layouts.Admin.adminpegawai')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Detail Pegawai </h1>
                <div class="small">
                   {{ $item->nama_pegawai }} · Jabatan {{ $item->jabatan->nama_jabatan }}
                </div>
            </div>
            <div class="col-12 col-xl-auto mb-3">
                <a href="{{ route('masterdatapegawai') }}" class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Profile</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile rounded-circle mb-2"
                            src="/backend/src/assets/img/freepik/profiles/profile-6.png" alt="">
                        <div class="small font-italic text-muted mb-4">Profile Pegawai</div>
                        <div class="font-weight-500 text-primary">{{ $item->nama_pegawai }}</div>
                        <span class="small text-muted line-height-normal">{{ $item->nama_panggilan }} · {{ $item->jabatan->nama_jabatan }}</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card card-header-actions mb-4 card-waves">
                    <div class="card-header">Profile Lengkap Pegawai
                        <a href="{{ route('pegawai.edit', $item->id_pegawai) }}"
                            class="btn btn-sm btn-primary">
                            Edit Data
                        </a>
                    </div>

                    {{-- CARD 1 --}}
                    <div class="card-body">
                        <div class="tab-content" id="cardTabContent">
                            <!-- Wizard tab pane item 1-->
                            <div class="tab-pane py-2 py-xl-2 fade show active" id="wizard1" role="tabpanel"
                                aria-labelledby="wizard1-tab">
                                <div class="row justify-content-center">
                                    <div class="col-xxl-6 col-xl-10">
                                        <h5 class="card-title">Formulir Pegawai</h5>
                                        @if(session('messageberhasil'))
                                        <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                                            {{ session('messageberhasil') }}
                                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        @endif
                                        <form>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">Nama Lengkap
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->nama_pegawai }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">NIK Pegawai
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->nik_pegawai }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">NPWP Pegawai
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->npwp_pegawai }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">Nama
                                                            Panggilan
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->nama_panggilan }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">Jabatan
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->jabatan->nama_jabatan }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">Jenis Kelamin
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->jenis_kelamin }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">Tempat Lahir
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->tempat_lahir }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">Tanggal Lahir
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->tanggal_lahir }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">Telepon
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->no_telp }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">Agama
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->agama }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">Alamat
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->alamat }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">Kota Asal
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->kota_asal }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="d-flex flex-column font-weight-bold">
                                                        <label class="small text-muted line-height-normal">Tanggal Masuk
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label class="small text-muted line-height-normal">:
                                                        {{ $item->tanggal_masuk }}
                                                </div>
                                            </div>
                                        </form>
                                    </div>
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
