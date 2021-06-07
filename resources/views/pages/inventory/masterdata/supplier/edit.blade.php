@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i class="fas fa-cog"></i></div>
                            Edit Data Supplier
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('supplier.index') }}"
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
                            <div class="wizard-step-text-name">Formulir Supplier</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- CARD 1 --}}
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <!-- Wizard tab pane item 1-->
                    <div class="tab-pane py-2 py-xl-2 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-6 col-xl-9">
                                <h3 class="text-primary">Supplier {{ $supplier->nama_supplier }}</h3>
                                <h5 class="card-title">Input Formulir Supplier</h5>
                                <form action="{{ route('supplier.update',$supplier->id_supplier) }}" method="POST">
                                    @method('PUT')
                                    @csrf

                                    {{-- VALIDASI --}}
                                    @if (count($errors) > 0)
                                    @endif

                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_supplier">Kode Supplier</label>
                                            <input class="form-control" name="kode_supplier" type="text"
                                                id="kode_supplier" placeholder="Input Kode Supplier"
                                                value="{{ $supplier->kode_supplier }}" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="nama_supplier">Nama Supplier</label>
                                            <input class="form-control" name="nama_supplier" type="text"
                                                id="nama_supplier" placeholder="Input Nama Supplier"
                                                value="{{ $supplier->nama_supplier }}"
                                                class="form-control @error('nama_supplier') is-invalid @enderror"></input>
                                            @error('nama_supplier')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="nama_sales">Nama Sales</label>
                                            <input class="form-control" name="nama_sales" type="text" id="nama_sales"
                                                placeholder="Input Nama Sales" value="{{ $supplier->nama_sales }}"
                                                class="form-control @error('nama_sales') is-invalid @enderror">
                                            @error('nama_sales')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="email">Email</label>
                                            <input class="form-control" name="email" type="text" id="email"
                                                placeholder="Input Email Supplier" value="{{ $supplier->email }}"
                                                class="form-control @error('email') is-invalid @enderror"></input>
                                            @error('email')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="telephone">Telephone</label>
                                            <input class="form-control" name="telephone" type="number" id="telephone"
                                                placeholder="Input Nomor Telephone" value="{{ $supplier->telephone }}"
                                                class="form-control @error('telephone') is-invalid @enderror">
                                            @error('telephone')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="rekening_supplier">Nomor Rekening</label>
                                            <input class="form-control" name="rekening_supplier" type="number"
                                                id="rekening_supplier" placeholder="Input Nomor Rekening"
                                                value="{{ $supplier->rekening_supplier }}"
                                                class="form-control @error('rekening_supplier') is-invalid @enderror"></input>
                                            @error('rekening_supplier')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="alamat_supplier">Alamat Supplier</label>
                                            <input class="form-control" name="alamat_supplier" type="text"
                                                id="alamat_supplier" placeholder="Input Alamat Supplier"
                                                value="{{ $supplier->alamat_supplier }}"
                                                class="form-control @error('alamat_supplier') is-invalid @enderror">
                                            @error('alamat_supplier')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_pos">Kode Pos</label>
                                            <input class="form-control" name="kode_pos" type="number" id="kode_pos"
                                                placeholder="Input Kode Pos" value="{{ $supplier->kode_pos }}"
                                                class="form-control @error('kode_pos') is-invalid @enderror"></input>
                                            @error('kode_pos')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('supplier.index') }}"
                                            class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary" type="Submit">Ubah</button>
                                    </div>
                                </form>
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
