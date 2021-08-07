@extends('layouts.Admin.adminmarketplace')

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
                            Sparepart
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid">
        <div class="card mb-4">
            {{-- <div class="card card-header-actions">
                @if ($keuangan->first()->status == 'PENDING')
                <div class="card-header ">Saldo = Rp. {{ $saldo }}
            <a href="#" class="btn btn-sm btn-primary"> Penarikan dalam Proses</a>
        </div>
        @else
        <div class="card-header ">Saldo = Rp. {{ $saldo }}
            <a href="" class="btn btn-danger btn-datatable  mr-2" type="button" data-toggle="modal"
                data-target="#Modaltambah">Tarik Saldo
            </a>
        </div>
        @endif

    </div> --}}
    <div class="card-body">
        <div class="datatable">
            @if(session('messageberhasil'))
            <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                {{ session('messageberhasil') }}
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            @endif
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 10%;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 10%;">
                                        Nama Sparepart</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 10%;">
                                        Keterangan</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 10%;">
                                        Merk</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 10%;">
                                        Berat</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 10%;">
                                        Harga</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 10%;">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sparepart as $item)
                                <tr role="row" class="odd">
                                    <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                    <td>{{ $item->nama_sparepart }}</td>
                                    <td>{{ $item->keterangan}}</td>
                                    <td>{{ $item->Merksparepart->merk_sparepart}}</td>
                                    <td>{{ $item->berat_sparepart}}</td>
                                    <td>{{ $item->harga_market}}</td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                            data-toggle="modal" data-target="#Modaledit-{{ $item->id_sparepart }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <div class="modal fade" id="Modaledit-{{ $item->id_sparepart }}"
                                            data-backdrop="static" tabindex="-1" role="dialog"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-light">
                                                        <h5 class="modal-title" id="staticBackdropLabel">
                                                            {{ $item->nama_sparepart }} </h5>
                                                        <button class="close" type="button" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">×</span></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('sparepart-marketplace-update',$item->id_sparepart) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="modal-body">
                                                                <label class="small mb-1">Data Sparepart</label>
                                                                <hr>
                                                                </hr>
                                                                <div class="form-group">
                                                                    <label class="small mr-1"
                                                                        for="berat_sparepart">Berat Sparepart </label><span
                                                                        class="mr-4 mb-3" style="color: red">* dalam gram</span>
                                                                    <input class="form-control" name="berat_sparepart" type="number"
                                                                        id="berat_sparepart" value="{{ $item->berat_sparepart }}" required/>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="small mr-1"
                                                                        for="harga_sparepart">Harga Sparepart</label><span
                                                                        class="mr-4 mb-3" style="color: red">*</span>
                                                                    <input class="form-control" name="harga_market" type="number"
                                                                        id="berat_sparepart" value="{{ $item->harga_market }}" required />
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button"
                                                                data-dismiss="modal">Close</button>
                                                            <button class="btn btn-primary" type="Submit">Ubah</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="tex-center">
                                        Data Barang Kosong
                                    </td>
                                </tr>
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

{{-- Callback Modal Jika Validasi Error --}}
@if (count($errors) > 0)
<button id="validasierror" style="display: none" type="button" data-toggle="modal" data-target="#Modaltambah">Open
    Modal</button>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous"></script>
<script src="{{ asset('assets/select2.js') }}"></script>

{{-- Script Open Modal Callback --}}
<script>
    $(document).ready(function () {
        $('#validasierror').click();
        KTSelect2.init();

    });

</script>

@endsection
