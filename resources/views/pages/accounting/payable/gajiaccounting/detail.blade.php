@extends('layouts.Admin.adminaccounting')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon" style="color: white"><i class="fas fa-wallet"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Detail Gaji  Bulan {{ $gaji->bulan_gaji }}, Tahun {{ $gaji->tahun_gaji }}

                            </div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Gaji Pegawai</span>
                           
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('gaji-accounting.index') }}"
                            class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-n10">

        <div class="card mb-4">
            <div class="card-header">Detail Gaji Pegawai</div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label class="small mb-1" for="tahun_gaji">Tahun Gaji</label>
                        <input class="form-control" id="tahun_gaji" type="text" name="tahun_gaji"
                            placeholder="Input Tahun Gaji" value="{{ $gaji->tahun_gaji }}" readonly />
                    </div>
                    <div class="form-group col-md-2">
                        <label class="small mb-1" for="tahun_gaji">Bulan Gaji</label>
                        <input class="form-control" id="tahun_gaji" type="text" name="tahun_gaji"
                            placeholder="Input Tahun Gaji" value="{{ $gaji->bulan_gaji }}" readonly />
                    </div>
                    <div class="form-group col-md-2">
                        <label class="small mb-1" for="bulan_gaji">Jumlah Pegawai</label>
                        <input class="form-control" id="tahun_gaji" type="text" name="tahun_gaji"
                            placeholder="Input Tahun Gaji" value="{{ $jumlah_pegawai }}" readonly />
                    </div>
                    <div class="form-group col-md-6">
                        <label class="small mb-1" for="keterangan">Keterangan</label>
                        <input class="form-control" id="keterangan" type="text" name="keterangan"
                            placeholder="Keterangan Pembayaran" value="{{ $gaji->keterangan }}" readonly></input>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label class="small mb-1" for="gaji_diterima">Total Gaji Keseluruhan</label>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gray-200">
                                    Rp.
                                </span>
                            </div>
                            <input class="form-control" id="gaji_diterima" type="text" name="gaji_diterima"
                                placeholder="Keterangan Pembayaran"
                                value="{{ number_format($gaji->grand_total_gaji,2,',','.') }}"
                                class="form-control @error('keterangan') is-invalid @enderror" readonly>
                            @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small mb-1" for="gaji_diterima">Total Tunjangan</label>
                        <div class="input-group input-group-joined">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-gray-200">
                                    Rp.
                                </span>
                            </div>
                            <input class="form-control" id="gaji_diterima" type="text" name="gaji_diterima"
                                placeholder="Keterangan Pembayaran"
                                value="{{ number_format($gaji->grand_total_tunjangan,2,',','.') }}"
                                class="form-control @error('keterangan') is-invalid @enderror" readonly>
                            @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small mb-1" for="tahun_gaji">Status Dana</label>
                        <input class="form-control" id="tahun_gaji" type="text" name="tahun_gaji"
                            placeholder="Input Tahun Gaji" value="{{ $gaji->status_dana }}" readonly />
                    </div>
                    <div class="form-group col-md-3">
                        <label class="small mb-1" for="tahun_gaji">Status Pembayaran</label>
                        <input class="form-control" id="tahun_gaji" type="text" name="tahun_gaji"
                            placeholder="Input Tahun Gaji" value="{{ $gaji->status_diterima }}" readonly />
                    </div>
                </div>
               
               
                {{-- <div class="form-group text-right">
                    <hr>
                    <a href="{{ route('gaji-pegawai.index') }}" class="btn btn-sm btn-light ">Kembali</a>
                </div> --}}
            </div>
        </div>
    </div>


    <div class="container">
        <div class="card card-collapsable">
            <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button" aria-expanded="true"
                aria-controls="collapseCardExample">Detail Gaji Pegawai
                <div class="card-collapsable-arrow">
                    <i class="fas fa-chevron-down"></i>
                </div>
            </a>
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
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
                                                    style="width: 20px;">
                                                    No</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 80px;">
                                                    Pegawai</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 80px;">
                                                    Jabatan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 80px;">
                                                    Gaji Pokok</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 90px;">
                                                    Total Tunjangan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 120px;">
                                                    Total Keseluruhan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                                    style="width: 60px;">
                                                    Tunjangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($gaji->Detailpegawai as $item)
                                            <tr role="row" class="odd">
                                                <th scope="row" class="small" class="sorting_1">
                                                    {{ $loop->iteration}}.</th>
                                                <td>{{ $item->nama_pegawai }}</td>
                                                <td>{{ $item->Jabatan->nama_jabatan }}</td>
                                                <td>Rp {{ number_format($item->Jabatan->Gajipokok->besaran_gaji,2,',','.') }}</td>
                                                <td>Rp {{ number_format($item->pivot->total_tunjangan,2,',','.') }}</td>
                                                <td>Rp {{ number_format($item->pivot->total_gaji,2,',','.') }}</td>
                                                <td class="text-center">
                                                    <a href="" class="btn btn-secondary btn-xs" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modaltunjangan-{{ $item->id_pegawai }}">
                                                        Lihat Tunjangan
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                                
                                            @endforelse

                                        </tbody>
                                        <tr>
                                            <td colspan="4" class="text-center font-weight-500">
                                                Grand Total
                                            </td>
                                            <td colspan="1" class="font-weight-500">
                                                <span>Rp. </span><span>{{ number_format($gaji->grand_total_tunjangan,2,',','.') }}</span>
                                            </td>
                                            <td colspan="2" class="font-weight-500">
                                                <span>Rp. </span><span>{{ number_format($gaji->grand_total_gaji,2,',','.') }}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@forelse ($gaji->Detailpegawai as $item)
<div class="modal fade" id="Modaltunjangan-{{ $item->id_pegawai }}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Detail Tunjangan Pegawai {{ $item->nama_pegawai }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableDetailInvoice"
                                    width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                    style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 60px;">Nama Tunjangan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Besaran Tunjangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item->Detailtunjangan as $tunjangan)
                                        <tr  role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $tunjangan->nama_tunjangan }}</td>
                                            <td>Rp.{{ number_format($tunjangan->jumlah_tunjangan,2,',','.') }}</td>
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
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@empty
    
@endforelse




<script>
    $(document).ready(function () {
        var table = $('#dataTabletunjangan').DataTable()
    });

</script>

@endsection
