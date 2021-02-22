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
                            Tambah Data Pembelian Sparepart
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('purchaseorder') }}"
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
                            <div class="wizard-step-text-name">Formulir Purchase Order</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard2-tab" href="#wizard2" data-toggle="tab" role="tab"
                        aria-controls="wizard2" aria-selected="true">
                        <div class="wizard-step-icon">2</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Detail Foto </div>
                            <div class="wizard-step-text-details">Formulir Detail Identitas</div>
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
                                <h3 class="text-primary">Sparepart</h3>
                                <h5 class="card-title">Input Formulir Sparepart</h5>
                                <form action="{{ route('sparepart.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_sparepart">Kode Sparepart</label>
                                            <input class="form-control" id="kode_sparepart" type="text"
                                                name="kode_sparepart" placeholder="Input Kode Sparepart"
                                                class="form-control @error('kode_sparepart') is-invalid @enderror" />
                                            @error('kode_sparepart')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="nama_sparepart">Nama Sparepart</label>
                                            <input class="form-control" id="nama_sparepart" type="text"
                                                name="nama_sparepart" placeholder="Input Nama Sparepart"
                                                class="form-control @error('nama_sparepart') is-invalid @enderror" />
                                            @error('nama_sparepart')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_jenis_sparepart">Jenis Sparepart</label>
                                            <select class="form-control" name="id_jenis_sparepart"
                                                class="form-control @error('id_jenis_sparepart') is-invalid @enderror"
                                                id="id_jenis_sparepart">
                                                <option>Pilih Jenis</option>
                                                @foreach ($jenis_sparepart as $item)
                                                <option value="{{ $item->id_jenis_sparepart }}">
                                                    {{ $item->jenis_sparepart }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_jenis_sparepart')<div class="text-danger small mb-1">
                                                {{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_merk">Merk Sparepart</label>
                                            <select class="form-control" name="id_merk" id="id_merk"
                                                class="form-control @error('id_merk') is-invalid @enderror">
                                                <option>Pilih Merk</option>
                                                @foreach ($merk_sparepart as $item)
                                                <option value="{{ $item->id_merk }}">{{ $item->merk_sparepart }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_merk')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_konversi">Konversi Satuan</label>
                                            <select class="form-control" name="id_konversi" id="id_konversi"
                                                class="form-control @error('id_konversi') is-invalid @enderror">
                                                <option>Pilih Satuan</option>
                                                @foreach ($konversi as $item)
                                                <option value="{{ $item->id_konversi }}">{{ $item->satuan }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_konversi')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_rak">Tempat Rak</label>
                                            <select class="form-control" name="id_rak" id="id_rak"
                                                class="form-control @error('id_rak') is-invalid @enderror">
                                                <option>Pilih Rak</option>
                                                @foreach ($rak as $item)
                                                <option value="{{ $item->id_rak }}">{{ $item->nama_rak }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_rak')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="stock">Stock</label>
                                            <input class="form-control" id="stock" type="text"
                                                name="stock" placeholder="Input Stock Sparepart"
                                                class="form-control @error('stock') is-invalid @enderror" />
                                            @error('stock')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="stock_min">Stock Min</label>
                                            <input class="form-control" id="stock_min" type="text"
                                                name="stock_min" placeholder="Input Nama Sparepart"
                                                class="form-control @error('stock_min') is-invalid @enderror" />
                                            @error('stock_min')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('masterdatasparepart') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary">Next</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane py-5 py-xl-5 fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-6 col-xl-8">
                                <h3 class="text-primary">Step 2</h3>
                                <h5 class="card-title">Input Formulir Berikut</h5>
                                <div class="form-group">
                                    <label class="small mb-1" for="photo">Foto Sparepart</label>
                                    <input class="form-control" id="photo" type="file" name="photo[]"
                                        value="{{ old('photo') }}" accept="image/*" multiple="multiple" 
                                        class="form-control @error('photo') is-invalid @enderror">
                                    @error('photo')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                <div class="form-group">
                                    <label class="small mb-1" for="keterangan">Keterangan Marketplace</label>
                                    <textarea class="form-control" name="keterangan" id="keterangan" cols="20" rows="10"
                                        placeholder="Input Keterangan" value="{{ old('keterangan') }}"
                                        class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                                    @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                <hr class="my-4" />
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('masterdatasparepart') }}" class="btn btn-light">Kembali</a>
                                    <button class="btn btn-primary" type="Submit">Submit</button>
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
