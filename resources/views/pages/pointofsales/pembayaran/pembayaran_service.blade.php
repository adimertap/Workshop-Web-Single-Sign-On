@extends('layouts.Admin.adminpointofsales')

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
                            Layanan service
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid">
        <div class="col-12">
            <h2 class="text-center">LAYANAN SERVICE</h2>
            <div class="row mt-3">
                <h5>Kode SPT : SPT001</h5>
            </div>
            <div class="row">
                <h5>Nama Customer : Angga</h5>
            </div>
            <div class="row">
                <h5>Nama Mekanik : Adim</h5>
            </div>

            <div class="row mt-4">
                <div class="col-6">
                    <table class="table">
                        <thead>
                            <th>Daftar Service</th>
                            <th>Harga</th>
                        </thead>
                        <tbody>
                            <tr>Ganti Oli</tr>
                            <tr>20000</tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
