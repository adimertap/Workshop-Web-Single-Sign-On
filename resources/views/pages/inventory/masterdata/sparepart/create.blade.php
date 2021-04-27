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
                            Tambah Data Sparepart
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('sparepart.index') }}"
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
                            <div class="wizard-step-text-name">Formulir Sparepart</div>
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
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_sparepart">Kode Sparepart</label>
                                            <input class="form-control" id="kode_sparepart" type="text"
                                                name="kode_sparepart" placeholder="Input Kode Sparepart"
                                                value="{{ $kode_sparepart }}" readonly />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="nama_sparepart">Nama Sparepart</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="nama_sparepart" type="text"
                                                name="nama_sparepart" placeholder="Input Nama Sparepart"
                                                value="{{ old('nama_sparepart') }}"
                                                class="form-control @error('nama_sparepart') is-invalid @enderror" />
                                            @error('nama_sparepart')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_jenis_sparepart">Pilih Jenis Sparepart</label><span class="mr-4 mb-3"
                                            style="color: red">*</span>
                                            <div class="input-group input-group-joined">
                                                <div class="input-group-append">
                                                    <a href="" class="btn btn-sm btn-secondary" type="button" data-toggle="modal"
                                                        data-target="#Modaljenis">
                                                        Tambah
                                                    </a>
                                                </div>
                                                <select class="form-control" name="id_jenis_sparepart" id="id_jenis_sparepart"
                                                    class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                                    <option>Pilih Jenis</option>
                                                @foreach ($jenis_sparepart as $item)
                                                <option value="{{ $item->id_jenis_sparepart }}">
                                                    {{ $item->jenis_sparepart }}
                                                </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_merk">Merk Sparepart</label><span class="mr-4 mb-3" style="color: red">*</span>
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
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="id_konversi">Konversi Satuan</label><span class="mr-4 mb-3" style="color: red">*</span>
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
                                            <label class="small mb-1 mr-1" for="id_rak">Tempat Rak</label><span class="mr-4 mb-3" style="color: red">*</span>
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
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="stock">Stock</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="stock" type="number" name="stock"
                                                placeholder="Input Stock Sparepart" value="{{ old('stock') }}""
                                                class=" form-control @error('stock') is-invalid @enderror" />
                                            @error('stock')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1 mr-1" for="stock_min">Stock Minimum</label><span class="mr-4 mb-3" style="color: red">*</span>
                                            <input class="form-control" id="stock_min" type="number" name="stock_min"
                                                placeholder="Input Nama Sparepart" value="{{ old('stock_min') }}""
                                                class=" form-control @error('stock_min') is-invalid @enderror" />
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



<div class="modal fade" id="Modaljenis" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Jenis Sparepart</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('jenis-sparepart.store') }}" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="jenis_sparepart">Jenis Sparepart</label>
                        <input class="form-control" name="jenis_sparepart" type="text" id="jenis_sparepart"
                            placeholder="Input Jenis Sparepart" value="{{ old('jenis_sparepart') }}"></input>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="fungsi">Fungsi</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <select name="fungsi" id="fungsi" class="form-control"
                            class="form-control @error('fungsi') is-invalid @enderror">
                            <option value="{{ old('fungsi')}}"> Pilih Fungsi</option>
                            <option value="MOBIL">Mobil</option>
                            <option value="MOTOR">Motor</option>
                        </select>
                        @error('fungsi')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan">Keterangan</label>
                        <textarea class="form-control" name="keterangan" type="text" id="keterangan"
                            placeholder="Masukan Keterangan" value="{{ old('keterangan') }}"
                            class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                        @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Tambah</button>
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
