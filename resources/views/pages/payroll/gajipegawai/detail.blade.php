@extends('layouts.Admin.adminpayroll')

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
                            <div class="page-header-subtitle" style="color: white">Detail Gaji
                                {{ $gaji->Pegawai->nama_pegawai }}
                            </div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Gaji Pegawai</span>
                            Bulan {{ $gaji->bulan_gaji }}, Tahun {{ $gaji->tahun_gaji }}
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('gaji-pegawai.index') }}"
                            class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container mt-n10">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Detail Gaji Pegawai</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="tahun_gaji">Tahun Gaji</label>
                                <input class="form-control" id="tahun_gaji" type="text" name="tahun_gaji"
                                    placeholder="Input Tahun Gaji" value="{{ $gaji->tahun_gaji }}" readonly/>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="small mb-1" for="bulan_gaji">Bulan Gaji</label>
                                <input class="form-control" id="tahun_gaji" type="text" name="tahun_gaji"
                                    placeholder="Input Tahun Gaji" value="{{ $gaji->bulan_gaji }}" readonly/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="id_pegawai">Nama Pegawai</label>
                            <input class="form-control" id="id_pegawai" type="text" name="id_pegawai"
                                value="{{ $gaji->Pegawai->nama_pegawai }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="id_jabatan">Jabatan</label>
                            <input class="form-control" id="id_jabatan" type="text" name="id_jabatan"
                                value="{{ $gaji->Pegawai->Jabatan->nama_jabatan }}" readonly>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="gaji_diterima">Total Bayar</label>
                            <div class="input-group input-group-joined">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-gray-200">
                                        Rp.
                                    </span>
                                </div>
                                <input class="form-control" id="gaji_diterima" type="text" name="gaji_diterima"
                                    placeholder="Keterangan Pembayaran"
                                    value="{{ number_format($gaji->gaji_diterima,2,',','.') }}"
                                    class="form-control @error('keterangan') is-invalid @enderror" readonly>
                                @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="keterangan">Keterangan</label>
                            <input class="form-control" id="keterangan" type="text" name="keterangan"
                                placeholder="Keterangan Pembayaran" value="{{ $gaji->keterangan }}" readonly></input>
                        </div>
                        <div class="form-group text-right">
                            <hr>
                            <a href="" class="btn btn-secondary btn-sm" type="button" data-toggle="modal"
                                data-target="#Modalabsensi">
                                Lihat Absensi
                            </a>
                            <a href="{{ route('gaji-pegawai.index') }}" class="btn btn-sm btn-light ">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card card-collapsable">
                    <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="collapseCardExample">Detail Gaji
                        Pokok Pegawai
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
                                                width="100%" cellspacing="0" role="grid"
                                                aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 20px;">
                                                            No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 80px;">
                                                            Jabatan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 180px;">
                                                            Gaji Pokok</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">1</th>
                                                        <td>{{ $gaji->Pegawai->Jabatan->nama_jabatan}}
                                                        </td>
                                                        <td>Rp.{{ number_format($gaji->Pegawai->Jabatan->Gajipokok->besaran_gaji,2,',','.') }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="card">
                    <div class="card card-header-actions">
                        <div class="card-header">
                            Detail Tunjangan Pegawai
                        </div>
                        <div class="card-body">
                            <div class="datatable">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered table-hover dataTable"
                                                id="dataTabletunjangan" width="100%" cellspacing="0" role="grid"
                                                aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Name: activate to sort column descending"
                                                            style="width: 20px;">
                                                            No</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 120px;">
                                                            Tunjangan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 150px;">
                                                            Jumlah</th>
                                                    </tr>
                                                </thead>
                                                <tbody id='konfirmasi'>
                                                    @forelse ($gaji->Detailtunjangan as $item)
                                                    <tr id="item-{{ $item->id_tunjangan }}" role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">
                                                            {{ $loop->iteration}}</th>
                                                        <td class="nama_tunjangan">{{ $item->nama_tunjangan }}</td>
                                                        <td class="jumlah_tunjangan">Rp.
                                                            {{ number_format($item->jumlah_tunjangan,2,',','.') }}</td>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    @endforelse
                                                </tbody>
                                                <tr id="totaltunjangan">
                                                    <td colspan="2" class="text-center font-weight-500">
                                                        Total Tunjangan
                                                    </td>
                                                    <td colspan="2" class="grand_total text-center font-weight-500">
                                                        <span
                                                            id="totaltunjangan2">Rp.{{ number_format($gaji->total_tunjangan,2,',','.') }}</span>
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
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {
        var table = $('#dataTabletunjangan').DataTable()
    });

</script>

@endsection
