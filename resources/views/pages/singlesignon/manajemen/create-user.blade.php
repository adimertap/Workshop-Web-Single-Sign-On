@extends('layouts.Admin.adminsinglesignon')

@section('content')

<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-cog"></i></div>
                            Tambah Data Pengguna
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('manajemen-user.index') }}"
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
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Formulir Pengguna</div>
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
                                <h3 class="text-primary">Pengguna</h3>
                                <h5 class="card-title">Input Formulir Pengguna</h5>
                                <form action="{{ route('manajemen-user.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label class="small mb-1 mr-1" for="id_pegawai">Nama Pegawai</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <div class="input-group input-group-joined">
                                                <select class="form-control" name="id_pegawai" id="id_pegawai"
                                                    class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                                    <option>Pilih Pegawai</option>
                                                    @foreach ($pegawai as $item)
                                                    <option value="{{ $item->id_pegawai }}">
                                                        {{ $item->nama_pegawai }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('id_pegawai')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="username">Username</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="username" type="text" name="username"
                                                placeholder="Input Username" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="email">Email</label><span
                                                class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="email" type="email" name="email"
                                                placeholder="Input Email" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Input Password" name="password" required
                                                autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password-confirm" class="d-block">Password Confirmation</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                placeholder="Konfirmasi Password" name="password_confirmation" required
                                                autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <label class="small">Pilih Aplikasi yang Tersedia!</label>
                                        <br>
                                        <div class="form-group ml-3">
                                            @foreach ($role as $item)
                                            <input type="checkbox" name="role[]" value="{{ $item->id_role }}">
                                            <label for="role[]"> {{ $item->role }}</label><br>
                                            @endforeach
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('manajemen-user.index') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary" type="Submit">Simpan</button>
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
