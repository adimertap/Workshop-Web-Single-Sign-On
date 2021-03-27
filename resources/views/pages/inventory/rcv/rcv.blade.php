@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Penerimaan Pembelian Sparepart</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Friday</span>
                    · September 20, 2020 · 12:16 PM
                </div>
            </div>
            <div class="small">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                Bengkel
                <span class="font-weight-500 text-primary">Adi Jaya</span>
                <hr>
                </hr>
            </div>
        </div>
    </div>
</main>
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card card-header-actions h-100">
            <div class="card-header">
                Daftar Pembelian Yang Belum Datang
            </div>
            <div class="card-body">
                <div class="timeline timeline-xs">
                    <!-- Timeline Item 1-->
                    @forelse ($po as $item)
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">New</div>
                            <div class="timeline-item-marker-indicator bg-green"></div>
                        </div>
                        <div class="timeline-item-content">
                            Pembelian Baru! {{ $item->tanggal_po }}
                            <a class="font-weight-bold text-dark" href="{{ route('purchase-order.show',$item->id_po) }}"
                                data-toggle="tooltip" data-placement="top" title=""
                                data-original-title="Cek Detail Pembelian">Order {{ $item->kode_po }}</a>
                            Pada Supplier {{ $item->Supplier->nama_supplier }}
                        </div>
                    </div>
                    @empty
                    <div class="timeline-item">
                        <div class="timeline-item-marker">
                            <div class="timeline-item-marker-text">Empty</div>
                            <div class="timeline-item-marker-indicator bg-red"></div>
                        </div>
                        <div class="timeline-item-content">
                            Sementara Tidak ada Data Pembelian
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card card-header-actions">
            <div class="card-header">List Penerimaan
                <a href="" class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">
                    Tambah Penerimaan
                </a>
            </div>
        </div>
        <div class="card-body ">
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
                                            aria-label="Name: activate to sort column descending" style="width: 20px;">
                                            No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 80px;">Kode Rcv</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 100px;">Pegawai</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 100px;">Supplier</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 50px;">Nomor Do</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 40px;">Tanggal</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            style="width: 90px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rcv as $item)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                        <td>{{ $item->kode_rcv }}</td>
                                        <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                        <td>{{ $item->Supplier->nama_supplier }}</td>
                                        <td>{{ $item->no_do }}</td>
                                        <td>{{ $item->tanggal_rcv }}</td>
                                        <td>
                                            <a href="{{ route('Rcv.show', $item->id_rcv) }}"
                                                class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="" class="btn btn-primary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-datatable" type="button"
                                                data-toggle="modal" data-target="#Modalhapus-{{ $item->id_rcv }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <a href="" class="btn btn-info btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Cetak Data Rcv">
                                                <i class="fas fa-print"></i></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="tex-center">
                                            Data Penerimaan Kosong
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

{{-- MODAL TAMBAH --}}
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" data-backdrop="static"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Penerimaan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('Rcv.store') }}" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="small text-muted d-none d-md-block"><span
                        id="detailkodepo"></span></div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="kode_po">Kode PO</label>
                            <div class="input-group input-group-joined">
                                <input class="form-control" type="text" placeholder="Masukan Kode PO"
                                    aria-label="Search"  id="detailkodepo">
                                <div class="input-group-append">
                                    <a href="" class="input-group-text" type="button" data-toggle="modal"
                                        data-target="#Modalpo">
                                        <i class="fas fa-folder-open"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="no_do">Perusahaan</label>
                            <input class="form-control" id="no_do" type="text" name="no_do"
                                placeholder="Input Nama Perusahaan" value="{{ old('no_do') }}"
                                class="form-control @error('no_do') is-invalid @enderror" />
                            @error('no_do')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="no_do">Nomor DO</label>
                            <input class="form-control" id="no_do" type="text" name="no_do"
                                placeholder="Input Nomor Delivery" value="{{ old('no_do') }}"
                                class="form-control @error('no_do') is-invalid @enderror" />
                            @error('no_do')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="tanggal_rcv">Tanggal Receive</label>
                            <input class="form-control" id="tanggal_rcv" type="date" name="tanggal_rcv"
                                placeholder="Input Tanggal Receive" value="{{ old('tanggal_rcv') }}"
                                class="form-control @error('tanggal_rcv') is-invalid @enderror" />
                            @error('tanggal_rcv')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <a href="{{ route('Rcv.create') }}" class="btn btn-success" type="submit">
                        Selanjutnya!
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- MODAL PO --}}
<div class="modal fade" id="Modalpo" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">Pilih Kode Pembelian/ PO</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="border-bottom">
                            <tr class="small text-uppercase text-muted">
                                <th scope="col">Kode PO</th>
                                <th scope="col">Supplier</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($po as $item)
                            <tr id="item-{{ $item->id_po }}" class="border-bottom">
                                <td class="kode_sparepart">
                                    <div class="font-weight-bold">{{ $item->kode_po }}</div>
                                </td>
                                <td class="nama_supplier">
                                    <div class="small text-muted d-none d-md-block">{{ $item->Supplier->nama_supplier }}
                                    </div>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-datatable"
                                        onclick="tambahpo(event, {{ $item->id_po }})" type="button"
                                        data-dismiss="modal">Tambah
                                    </button>
                                </td>
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
        </div>
    </div>
</div>


{{-- MODAL HAPUS --}}
@forelse ($rcv as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_rcv }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('Rcv.destroy', $item->id_rcv) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Penerimaan {{ $item->kode_rcv }} pada tanggal
                    {{ $item->tanggal_rcv }}?</div>
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

<script>
    function tambahpo(event, id_po) {
        var data = $('#item-' + id_po)
        var kode_po = $(data.find('.kode_po')[0]).text()
        var nama_supplier = $(data.find('.nama_supplier')[0]).text()
        alert('Berhasil Menambahkan Data PO')

        console.log(kode_po);
    }
    

</script>





@endsection
