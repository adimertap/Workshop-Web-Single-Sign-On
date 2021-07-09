@extends('layouts.Admin.adminaccounting')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Detail Pajak {{ $pajak->kode_pajak }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · Pembayaran · Pajak
                </div>
            </div>
            <div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('pajak.index') }}" class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Detail Pembayaran
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label class="small mb-1" for="kode_pajak">Kode Pajak</label>
                            <input class="form-control form-control-sm" id="kode_pajak" type="text" name="kode_pajak"
                                value="{{ $pajak->kode_pajak }}" readonly />
                        </div>
                        <div class="form-group col-md-7">
                            <label class="small mb-1" for="id_pegawai">Pegawai</label>
                            <input class="form-control form-control-sm" id="id_pegawai" type="text" name="id_pegawai"
                                value="{{ $pajak->Pegawai->nama_pegawai }}" readonly />
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="id_jenis_transaksi">Jenis Transaksi</label>
                        <input class="form-control form-control-sm" id="id_jenis_transaksi" type="text"
                            name="id_jenis_transaksi" value="{{ $pajak->Jenistransaksi->nama_transaksi }}"
                            readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="tanggal_bayar">Tanggal Bayar</label>
                        <input class="form-control form-control-sm" id="tanggal_bayar" type="text" name="tanggal_bayar"
                            value="{{ $pajak->tanggal_bayar }}" readonly />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="deskripsi_pajak">Deskripsi Pajak</label>
                        <input class="form-control form-control-sm" id="deskripsi_pajak" type="text"
                            name="deskripsi_pajak" value="{{ $pajak->deskripsi_pajak }}" readonly></input>
                    </div>
                    <hr class="my-4" />
                    <div class="small mb-2">
                        <span class="font-weight-500 text-primary">Detail</span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex flex-column font-weight-bold">
                                <label class="small text-muted line-height-normal">Status Jurnal
                            </div>
                        </div>
                        <div class="col">
                            <label class="small line-height-normal">:
                                {{ $pajak->status_jurnal }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="d-flex flex-column font-weight-bold">
                                <label class="small text-muted line-height-normal">Total Pembayaran
                            </div>
                        </div>
                        <div class="col">
                            <span class="small line-height-normal text-primary">: Rp. </span>
                            <label class="small line-height-normal">
                                {{ number_format($pajak->total_pajak,0,',','.') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card card-header-actions">
                    <div class="card-header ">Detail Pajak
                    </div>
                </div>
                <div class="card-body">
                    <div class="alert alert-info alert-icon" role="alert">
                        <div class="alert-icon-aside">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <div class="alert-icon-content">
                            <h5 class="alert-heading" class="small">Pajak Info</h5>
                            Detail Pembayaran Pajak
                        </div>
                    </div>

                    @if ($pajak->status_pajak == 'Tidak Terkait')
                        <div class="datatable">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable" id="dataTable"
                                            width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 20px;">No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 230px;">Data Pajak</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 230px;">Nilai Pajak</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                        colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 230px;">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($pajak->detailpajak as $detail)
                                                <tr role="row" class="odd">
                                                    <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                                    </th>
                                                    <td>{{ $detail->data_pajak }}</td>
                                                    <td>Rp. {{ number_format($detail->nilai_pajak,0,',','.') }}</td>
                                                    <td>{{ $detail->keterangan_pajak }}</td>
                                                </tr>
                                                @empty
                                             
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($pajak->status_pajak == 'Terkait Pegawai')
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable" id="dataTable"
                                        width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                        style="width: 100%;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 20px;">No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 250px;">Data Pajak</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 100px;">Nilai Pajak</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 70px;">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">1.</th>
                                                <td>{{ $pajak->Gaji->Jenistransaksi->nama_transaksi }}, {{ $pajak->Gaji->bulan_gaji }}, {{ $pajak->Gaji->tahun_gaji }}</td>
                                                <td>Rp. {{ number_format($pajak->Gaji->grand_total_pph21,0,',','.') }}</td>
                                                <td>{{ $pajak->Gaji->status_pajak }}</td>
                                            </tr>


                                           
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif


                   
                </div>
            </div>
        </div>
    </div>
</div>
</main>

{{-- Script Open Modal Callback --}}
<script>
    $(document).ready(function () {
        $('#validasierror').click();
    });

</script>
@endsection
