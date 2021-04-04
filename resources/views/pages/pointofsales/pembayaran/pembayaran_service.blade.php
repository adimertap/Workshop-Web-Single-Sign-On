@extends('layouts.Admin.adminpointofsales')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Kode Transaksi S-20210401</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · Pembayaran · Service
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Detail Transaksi Service
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="small mb-1" for="kode_spt">Kode SPT</label>
                            <input class="form-control form-control-sm" id="kode_spt" type="text" name="kode_opname"
                                value="SPT-001" readonly />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_customer">Nama Customer</label>
                            <input class="form-control form-control-sm" id="nama_customer" type="text" name="nama_customer"
                                value="Angga" readonly />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="kode_mekanik">Nama Mekanik</label>
                            <input class="form-control form-control-sm" id="kode_mekanik" type="text" name="kode_mekanik"
                                value="Made" readonly />
                        </div>
                        <hr class="my-4" />

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card-mb-8">
                    <div class="card-header">Detail Transaksi Service
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="small mb-1" for="kode_spt">Kode SPT</label>
                            <input class="form-control form-control-sm" id="kode_spt" type="text" name="kode_opname"
                                value="SPT-001" readonly />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_customer">Nama Customer</label>
                            <input class="form-control form-control-sm" id="nama_customer" type="text" name="nama_customer"
                                value="Angga" readonly />
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="kode_mekanik">Nama Mekanik</label>
                            <input class="form-control form-control-sm" id="kode_mekanik" type="text" name="kode_mekanik"
                                value="Made" readonly />
                        </div>
                        <hr class="my-4" />
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
