@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Pembelian Sparepart</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal }} · <span id="clock"> 12:16 PM</span>
                </div>
            </div>
            <div class="small">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                Bengkel
                <span class="font-weight-500 text-primary">{{ Auth::user()->bengkel->nama_bengkel}}</span>
                <hr>
                </hr>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card card-header-actions">
            <div class="card-header ">List Pembelian
                <a href="{{ route('purchase-order.create') }}" class="btn btn-sm btn-primary"> Tambah Pembelian</a>
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
                @if(session('messagekirim'))
                <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                    {{ session('messagekirim') }}
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
                                            style="width: 50px;">Kode PO</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 80px;">Pegawai</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 70px;">Supplier</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 50px;">Tanggal</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 20px;">Approve</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 20px;">Approve AP</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 40px;">Cetak & Kirim</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            style="width: 70px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($po as $item)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                        <td>{{ $item->kode_po }}</td>
                                        <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                        <td>{{ $item->Supplier->nama_supplier }}</td>
                                        <td>{{ $item->tanggal_po }}</td>
                                        <td>
                                            @if($item->approve_po == 'Approved')
                                            <span class="badge badge-success">
                                                @elseif($item->approve_po == 'Not Approved')
                                                <span class="badge badge-danger">
                                                    @elseif($item->approve_po == 'Pending')
                                                    <span class="badge badge-secondary">
                                                        @else
                                                        <span>
                                                            @endif
                                                            {{ $item->approve_po }}
                                                        </span>
                                        </td>
                                        <td>
                                            @if($item->approve_ap == 'Approved')
                                            <span class="badge badge-success">
                                                @elseif($item->approve_ap == 'Not Approved')
                                                <span class="badge badge-danger">
                                                    @elseif($item->approve_ap == 'Pending')
                                                    <span class="badge badge-secondary">
                                                        @else
                                                        <span>
                                                            @endif
                                                            {{ $item->approve_ap }}
                                                        </span>
                                        </td>
                                        <td>
                                            @if($item->approve_po == 'Pending')
                                            <span class="font-size-300" style="font-size: 12px;">Menunggu Approval</span>
                                            @elseif($item->approve_po == 'Not Approved')
                                            <span class="font-size-300" style="font-size: 12px;">Data diTolak</span> 
                                            @elseif($item->approve_po == 'Approved')
                                                <a href="" class="btn btn-primary btn-datatable" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Cetak PO">
                                                    <i class="fas fa-print"></i></i>
                                                </a>
                                                <a href="" class="btn btn-dark btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalkirimsupplier-{{ $item->id_po }}">
                                                    <i class="fas fa-share-square"></i>
                                                </a>
                                            @else
                                            <span>
                                                @endif
                                            </span>

                                        </td>
                                        <td>
                                            <a href="{{ route('purchase-order.show', $item->id_po) }}"
                                                class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            
                                            @if($item->approve_po == 'Pending')
                                            <a href="" class="btn btn-primary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-datatable" type="button"
                                                data-toggle="modal" data-target="#Modalhapus-{{ $item->id_po }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            {{-- <a href="{{ route('po-status', $item->id_po) }}?status=Not Approved"
                                            class="btn btn-danger btn-datatable" data-toggle="tooltip"
                                            data-placement="top" title="" data-original-title="Tolak Data">
                                            <i class="fas fa-times"></i>
                                            </a> --}}
                                            @elseif($item->approve_po == 'Not Approved')
                                            <a href="" class="btn btn-primary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-datatable" type="button"
                                                data-toggle="modal" data-target="#Modalhapus-{{ $item->id_po }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @elseif($item->approve_po == 'Approved')
                                            </a>
                                            @else
                                            <span>
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="tex-center">
                                            Data Pembelian Kosong
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

@forelse ($po as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_po }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('purchase-order.destroy', $item->id_po) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Pembelian {{ $item->kode_po }} pada tanggal
                    {{ $item->tanggal_po }}?</div>
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

{{-- MODAL DIKIRIM --}}
@forelse ($po as $item)
<div class="modal fade" id="Modalkirimsupplier-{{ $item->id_po }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Pengiriman Data Pembelian</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('po-status-kirim', $item->id_po) }}?status=Dikirim" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">Pengiriman Data Pembelian pada supplier {{ $item->Supplier->nama_supplier }} dengan kode {{ $item->kode_po }} pada tanggal
                    {{ $item->tanggal_po }}</div>
                <div class="modal-footer ">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse

<script>
    setInterval(displayclock, 500);

   function displayclock() {
       var time = new Date()
       var hrs = time.getHours()
       var min = time.getMinutes()
       var sec = time.getSeconds()
       var en = 'AM';

       if (hrs > 12) {
           en = 'PM'
       }

       if (hrs > 12) {
           hrs = hrs - 12;
       }

       if (hrs == 0) {
           hrs = 12;
       }

       if (hrs < 10) {
           hrs = '0' + hrs;
       }

       if (min < 10) {
           min = '0' + min;
       }

       if (sec < 10) {
           sec = '0' + sec;
       }

       document.getElementById('clock').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
       document.getElementById('clockmodal').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
   }
</script>


@endsection
