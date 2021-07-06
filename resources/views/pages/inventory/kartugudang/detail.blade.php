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
                            Detail Kartu Gudang
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <a href="{{ route('Kartu-gudang') }}" class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
</main>

<div class="container-fluid">
    <div class="col-xxl-4 col-xl-12 mb-4">
        <div class="card h-100">
            <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid"
                            src="/backend/src/assets/img/freepik/data-report-pana.svg" style="max-width: 17rem;"></div>
                    <div class="col-xl-8 col-xxl-12">
                        <h2 class="text-primary mb-3" style="font-size: 15pt">{{ $item->nama_sparepart }}</h2>
                        <hr></hr>
                        <span class="font-weight-500 text-gray">Jenis Sparepart</span>
                        {{ $item->Jenissparepart->jenis_sparepart }} ·
                        <span class="font-weight-500 text-gray">Merk Sparepart</span>
                        {{ $item->Merksparepart->merk_sparepart }}
                        <div class="small">
                            <p class="font-weight-500 text-gray">Jumlah Stock · <span class="font-weight-500 text-primary">{{ $item->stock }}</span> </p> 
                           
                            {{-- <span class="font-weight-500 text-gray">Saldo Awal ·</span>
                            Bulan: {{ $tanggal }} ·
                            <span class="font-weight-500 text-gray">Jumlah</span>
                            {{ $item->stock }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card card-header-actions">
            <div class="card-header ">List Transaksi Sparepart</div>
        </div>
        <div class="card-body ">
            <div class="datatable">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%"
                                cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th colspan="3" class="text-center">Transaksi</th>
                                        <th colspan="3" class="text-center">Jumlah</th>
                                        <th colspan="1" class="text-center">Saldo</th>
                                        <th colspan="1" class="text-center">Harga</th>
                                    </tr>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 20px;">
                                            No</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 130px;">Tanggal Transaksi</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 130px;">Kode Transaksi</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 30px;">Masuk</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 30px;">Keluar</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 20px;">Satuan</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 70px;">Saldo</th>
                                        <th class="sorting text-center" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 100px;">Beli / Jual</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kartu_gudang as $item)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                        <td class="text-center">{{ $item->tanggal_transaksi }}</td>
                                        <td class="text-center">{{ $item->kode_transaksi }}</td>
                                        {{-- <td class="text-center">@if ($item->jenis_kartu == 'Receiving')
                                            {{ $item->Rcv->kode_rcv }}
                                            @elseif ($item->jenis_kartu == 'Retur')
                                            {{ $item->Retur->kode_retur }}
                                            @elseif ($item->jenis_kartu =='Online')
                                            {{ $item->TransaksiOnline->code_transaksi }}
                                            @elseif ($item->jenis_kartu == 'Penjualan')
                                            {{ $item->kode_penjualan }}
                                            @elseif ($item->jenis_kartu == 'Service')
                                            {{ $item->kode_service }}
                                            @else
                                        @endif
                                        </td> --}}
                                        <td class="text-center"><span class="badge badge-warning">{{ $item->jumlah_masuk }}</span></td>
                                        <td class="text-center"><span class="badge badge-warning">{{ $item->jumlah_keluar }}</span></td>
                                        <td>{{ $item->Sparepart->Konversi->satuan }}</td>
                                        <td class="text-center">{{ $item->saldo_akhir }}</td>
                                        <td>Rp.{{ number_format($item->harga_beli,2,',','.')}}</td>
                                    </tr>
                                    @empty
                                        
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





@endsection
