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
                            TRANSAKSI
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">LIST TRANSAKSI
                </div>
            </div>
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
                    @if(session('messagehapus'))
                    <div class="alert alert-danger" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messagehapus') }}
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
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 30px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Kode Transaksi</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Tanggal</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 200px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($transaksi as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->code_transaksi }}</td>
                                            <td>{{ $item->created_at}}</td>
                                            <td>{{ $item->transaksi_status }}</td>

                                            <td>
                                                <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaledit-{{ $item->id_transaksi_online }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="tex-center">
                                                Data Transaksi Kosong
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

{{-- MODAL EDIT -------------------------------------------------------------------------------------------}}
@forelse ($transaksi as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_transaksi_online }}" data-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">{{ $item->code_transaksi }} </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('transaksi-marketplace-update',$item->id_transaksi_online) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body row">
                    <div class="col-6">
                        <label class="small mb-1">Data Transaksi</label>
                        <hr>
                        </hr>
                        <div class="form-group">
                            <label class="small" for="kode_merk">Nama Pembeli</label>
                            <input class="form-control" type="text" id="kode_merk" value="{{ $item->User->nama_user}}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="small" for="kode_merk">Tanggal Pembelian</label>
                            <input class="form-control" type="text" id="kode_merk" value="{{ $item->created_at }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="small" for="kode_merk">Alamat</label>
                            <input class="form-control" type="text" id="kode_merk"
                                value="{{ $item->alamat_penerima }}, {{ $item->Desa->name }}, {{ $item->Desa->Kecamatan->name }}, {{ $item->Desa->Kecamatan->Kabupaten->name }},{{ $item->Desa->Kecamatan->Kabupaten->Provinsi->name }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="small" for="kode_merk">No Hp</label>
                            <input class="form-control" type="text" id="kode_merk" value="{{ $item->nohp_penerima }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="small" for="kode_merk">Kurir Pengiriman</label>
                            <input class="form-control" type="text" id="kode_merk" value="{{ $item->kurir_pengiriman }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label class="small" for="kode_merk">Status</label>
                            <input class="form-control" type="text" id="kode_merk" name="transaksi_status" value="{{ $item->transaksi_status }}"
                                readonly>
                        </div>

                        <div class="form-group">
                            <label class="small mr-1" for="merk_sparepart">Resi</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <input class="form-control" name="resi" type="text" id="jawaban_faq"
                                value="{{ $item->resi }}" required/>
                        </div>

                    </div>
                    <div class="col-6">
                        <label class="small mb-1">Data Sparepart</label>
                        <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                            cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-sort="ascending" aria-label="Name: activate to sort column descending"
                                        style="width: 30px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 80px;">
                                        Nama Sparepart</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 150px;">
                                        Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($item->Detailtransaksi as $sparepart)
                                <tr role="row" class="odd">
                                    <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                    <td>{{ $sparepart->nama_sparepart }}</td>
                                    <td>{{ $sparepart->pivot->jumlah_produk }}</td>

                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="tex-center">
                                        Data Sparepart Kosong
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="Submit">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse


</main>

{{-- Callback Modal Jika Validasi Error --}}
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
