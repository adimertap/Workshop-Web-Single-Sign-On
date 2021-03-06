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
                            <div class="page-header-icon"><i class="fas fa-warehouse"></i></div>
                            Master Data Harga Sparepart
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- TABEL --}}
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Master Harga
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">Atur
                        Harga Sparepart</button>
                </div>
            </div>
            <div class="card-body">
                <div class="datatable">
                    {{-- SHOW ENTRIES --}}
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 100px;">Merk Sparepart</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 140px;">Supplier</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 50px;">Harga Beli</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 50px;">Harga Jual</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 60px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($harga as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->Sparepart->nama_sparepart }}</td>
                                            <td>{{ $item->Sparepart->Merksparepart->merk_sparepart }}</td>
                                            <td>{{ $item->supplier->nama_supplier }}</td>
                                            <td>Rp. {{ number_format($item->harga_beli,0,',','.') }}</td>
                                            <td>Rp. {{ number_format($item->harga_jual,0,',','.') }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                    data-toggle="modal" data-target="#Modaledit-{{ $item->id_harga }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable  mr-2" type="button"
                                                    data-toggle="modal" data-target="#Modalhapus-{{ $item->id_harga }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <td colspan="7" class="tex-center">
                                            Data Harga Sparepart Kosong
                                        </td>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

{{-- MODAL TAMBAH -------------------------------------------------------------------------------------}}
<div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Harga Sparepart</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <label class="small mb-1">Isikan Form Dibawah Ini</label>
                <hr>
                </hr>
                <form action="{{ route('hargasparepart.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="id_sparepart">Sparepart</label>
                            <select class="form-control" name="id_sparepart" id="id_sparepart"
                            class="form-control @error('id_sparepart') is-invalid @enderror">
                                <option> Pilih Sparepart</option>
                                @foreach ($sparepart as $item)
                                <option value="{{ $item->id_sparepart }}">{{ $item->nama_sparepart }}</option>
                                @endforeach
                            </select>
                            @error('id_sparepart')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="id_merk">Merk Sparepart</label>
                            <select class="form-control" name="id_merk" id="id_merk" readonly>
                                @foreach ($sparepart as $item)
                                <option value="{{ $item->id_merk }}">{{ $item->nama_merk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_supplier">Supplier</label>
                        <select class="form-control" name="id_supplier" id="id_supplier"
                        class="form-control @error('id_supplier') is-invalid @enderror">
                            <option> Pilih Supplier</option>
                            @foreach ($supplier as $item)
                            <option value="{{ $item->id_supplier }}">{{ $item->nama_supplier }}</option>
                            @endforeach
                        </select>
                        @error('id_supplier')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="harga_beli"> Harga Beli </label>
                        <input class="form-control" name="harga_beli" type="number" id="harga_beli"
                            placeholder="Input Harga Beli" value="{{ old('harga_beli') }}"
                            class="form-control @error('harga_beli') is-invalid @enderror">
                            @error('harga_beli')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="harga_jual"> Atur Harga Jual </label>
                        <input class="form-control" name="harga_jual" type="number" id="harga_jual"
                            placeholder="Input Harga Jual" value="{{ old('harga_jual') }}"
                            class="form-control @error('harga_jual') is-invalid @enderror">
                            @error('harga_jual')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                    </div>
                    {{-- Validasi Error --}}
                    @if (count($errors) > 0)
                    @endif
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="Submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- MODAL EDIT ------------------------------------------------------------------------}}
@forelse ($harga as $item)
    <div class="modal fade" id="Modaledit-{{ $item->id_harga }}" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Harga Sparepart</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('hargasparepart.update', $item->id_harga) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <label class="small mb-1">Isikan Form Dibawah Ini</label>
                        <hr>
                        </hr>
                        <div class="form-group">
                            <label class="small mb-1" for="harga_beli"> Harga Beli </label>
                            <input class="form-control" name="harga_beli" type="number" id="harga_beli"
                                value="{{ $item->harga_beli }}">
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="harga_jual"> Atur Harga Jual </label>
                            <input class="form-control" name="harga_jual" type="number" id="harga_jual"
                                value="{{ $item->harga_jual }}">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-primary" type="Submit">Ubah</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@empty

@endforelse

@forelse ($harga as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_harga }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('hargasparepart.destroy', $item->id_harga) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Harga Sparepart?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Ya! Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse


@if (count($errors) > 0)
<button id="validasierror" style="display: none" type="button" data-toggle="modal" data-target="#Modaltambah">Open
    Modal</button>
@endif

{{-- Script Open Modal Callback --}}
<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

</script>

@endsection
