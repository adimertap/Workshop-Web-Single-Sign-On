@extends('layouts.Admin.adminsinglesignon')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <div class="card">
                <div class="card-header">Ganti Password</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session ('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session ('success') }}
                        </div>
                    @endif
                    <form action="{{ route('password.edit') }}" method="POST">
                        @csrf
                        @method("PATCH")
                        <div class="form-group">
                            <label for="old_password">Password Lama</label>
                            <input type="password" name="old_password" id="old_password" placeholder="Input Password Lama" class="form-control  @error('old_password') is-invalid @enderror">
                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password" class="d-block">Password Baru</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Input Password" name="password" autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" placeholder="Input Konfirmasi Password" id="password_confirmation"
                                class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">Ganti Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
