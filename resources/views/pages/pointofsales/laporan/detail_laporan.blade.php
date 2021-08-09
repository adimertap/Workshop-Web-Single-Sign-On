@extends('layouts.Admin.adminpointofsales')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Detail Laporan {{ $service->tanggal_laporan }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Detail</span>
                    · Laporan · Service
                </div>
            </div>
            <div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('laporanservice.index') }}"
                        class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header">Detail Laporan
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="small mb-1" for="tanggal">Tanggal Laporan</label>
                    <input class="form-control form-control-sm" id="tanggal" type="text" name="tanggal"
                        value="{{ $service->tanggal_laporan }}" readonly />
                </div>
                <div class="form-group col-md-4">
                    <label class="small mb-1" for="tanggal">Kode Service</label>
                    <input class="form-control form-control-sm" id="tanggal" type="text" name="tanggal"
                        value="{{ $service->penerimaan_service->kode_sa }}" readonly />
                </div>
                <div class="form-group col-md-4">
                    <label class="small mb-1" for="tanggal">Customer</label>
                    <input class="form-control form-control-sm" id="tanggal" type="text" name="tanggal"
                        value="{{ $service->penerimaan_service->customer_bengkel->nama_customer }}" readonly />
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card card-header-actions">
            <div class="card-header ">List Sparepart</div>
        </div>
        <div class="card-body">
            <div class="datatable">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover dataTable" id="dataTableSparepart"
                                width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 20px;">
                                            No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 20px;">
                                            Kode</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 100px;">
                                            Nama Sparepart</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 70px;">
                                            Jenis Sparepart</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 70px;">
                                            Merk</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 40px;">
                                            Satuan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 80px;">
                                            Harga Jual</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 20px;">
                                            Quantity</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 80px;">
                                            Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($service->penerimaan_service->detail_sparepart as $detail)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                        </th>
                                        <td>{{ $detail->kode_sparepart }}</td>
                                        <td>{{ $detail->nama_sparepart }}</td>
                                        <td>{{ $detail->jenissparepart->jenis_sparepart }}</td>
                                        <td>{{ $detail->merksparepart->merk_sparepart }}</td>
                                        <td>{{ $detail->konversi->satuan }}</td>
                                        <td>Rp. {{ number_format($detail->pivot->harga,0,',','.') }}</td>
                                        <td>{{ $detail->pivot->jumlah }}</td>
                                        <td>Rp. {{ number_format($detail->pivot->total_harga,0,',','.') }}</td>
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

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card card-header-actions">
            <div class="card-header ">List Perbaikan</div>
        </div>
        <div class="card-body">
            <div class="datatable">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered table-hover dataTable" id="dataTablePerbaikan"
                                width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 20px;">
                                            No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 20px;">
                                            Kode Perbaikan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 100px;">
                                            Nama Jasa</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 70px;">
                                            Jenis Jasa</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 70px;">
                                            Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($service->penerimaan_service->detail_perbaikan as $detail)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                        </th>
                                        <td>{{ $detail->kode_jenis_perbaikan }}</td>
                                        <td>{{ $detail->nama_jenis_perbaikan }}</td>
                                        <td>{{ $detail->group_jenis_perbaikan }}</td>
                                        <td>Rp. {{ number_format($detail->harga_jenis_perbaikan,0,',','.') }}</td>
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

<script>
      $(document).ready(function () {

        $('#dataTablePerbaikan').DataTable()
        $('#dataTableSparepart').DataTable()

      });
</script>

@endsection
