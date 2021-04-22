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
                <span class="font-weight-500 text-primary">Adi Jaya</span>
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
                <a href="" class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">
                    Tambah Pembelian
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
                                        <td>{{ $item->Pegawai->nama_pegawai ?? '' }}</td>
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
                                            @if($item->approve_po == 'Pending' and $item->approve_ap == 'Pending')
                                            <span class="font-size-300" style="font-size: 12px;">Menunggu Approval</span>
                                            @elseif ($item->approve_po == 'Approved' and $item->approve_ap == 'Pending')
                                            <span class="font-size-300" style="font-size: 12px;">Menunggu Approval</span>
                                            @elseif($item->approve_po == 'Not Approved')
                                            <span class="font-size-300" style="font-size: 12px;">Data diTolak</span> 
                                            @elseif($item->approve_po == 'Approved' and $item->approve_ap == 'Approved')
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

{{-- MODAL TAMBAH --}}
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" data-backdrop="static"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Pembelian</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('Rcv.store') }}" method="POST" id="form1" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="alert alert-danger" id="alertdatakosong" role="alert" style="display:none"> <i
                        class="fas fa-times"></i>
                        Error! Terdapat Data yang Masih Kosong!
                    <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1 mr-1" for="kode_po">Kode Pembelian</label>
                            <input class="form-control" id="kode_po" type="text" name="kode_po"
                                value="{{ $kode_po }}" readonly>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label class="small mb-1 mr-1" for="tanggal_po">Tanggal Pembelian</label><span
                                class="mr-4 mb-3" style="color: red">*</span>
                            <input class="form-control" id="tanggal_po" type="date" name="tanggal_po"
                                placeholder="Input Tanggal Pembelian" value="{{ old('tanggal_po') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1 mr-1" for="kode_po">Pilih Supplier</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <div class="input-group input-group-joined">
                                <input class="form-control" type="text" placeholder="Pilih Supplier"
                                    aria-label="Search" id="detailsupplier">
                                <div class="input-group-append">
                                    <a href="" class="input-group-text" type="button" data-toggle="modal"
                                        data-target="#Modalsupplier">
                                        <i class="fas fa-folder-open"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="small mb-1" for="no_telp">No. Telp</label>
                            <input class="form-control" id="detailnotelp" type="text" name="no_telp"
                                placeholder="" value="{{ old('no_telp') }}" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="small mb-1" for="nama_sales">Nama Sales</label>
                            <input class="form-control" id="detailnamasales" type="text" name="nama_sales"
                                placeholder="" value="{{ old('nama_sales') }}" readonly>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" onclick="submit1()" type="button">Selanjutnya!</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="Modalsupplier" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">Pilih Suppleir</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="border-bottom">
                            <tr class="small text-uppercase text-muted">
                                <th scope="col">Nama Supplier</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nama Sales</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($supplier as $item)
                            <tr id="item-{{ $item->id_supplier }}" class="border-bottom">
                                <td>
                                    <div class="font-weight-bold nama_supplier">{{ $item->nama_supplier }}</div>
                                </td>
                                <td>
                                    <div class="small text-muted d-none d-md-block telephone">{{ $item->telephone }}
                                    </div>
                                </td>
                                <td>
                                    <div class="small text-muted d-none d-md-block alamat_supplier">{{ $item->alamat_supplier }}</div>
                                </td>
                                <td>
                                    <div class="small text-muted d-none d-md-block nama_sales">{{ $item->nama_sales }}</div>
                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-datatable"
                                        onclick="tambahsupplier(event, {{ $item->id_supplier }})" type="button"
                                        data-dismiss="modal">Tambah
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="tex-center">
                                    Data Supplier Kosong
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




<script>
    function tambahsupplier(event, id_supplier) {
        var data = $('#item-' + id_supplier)
        var _token = $('#form1').find('input[name="_token"]').val()
        var nama_supplier = $(data.find('.nama_supplier')[0]).text()
        var no_telp = $(data.find('.telephone')[0]).text()
        var nama_sales = $(data.find('.nama_sales')[0]).text()
        alert('Berhasil Menambahkan Data Supplier')
        // $("#toast").toast("show");
        console.log(nama_sales)

        $('#detailsupplier').val(nama_supplier)
        $('#detailnotelp').val(no_telp)
        $('#detailnamasales').val(nama_sales)
    }

    function submit1() {
        var _token = $('#form1').find('input[name="_token"]').val()
        var nama_supplier = $('#detailsupplier').val()
        var tanggal_po = $('#tanggal_po').val()
        var kode_po = $('#kode_po').val()
        var data = {
            _token: _token,
            nama_supplier: nama_supplier,
            tanggal_po: tanggal_po,
            kode_po: kode_po
        }

        if (nama_supplier == 0 | nama_supplier == '' | tanggal_po == 0 | tanggal_po == '' ) {
            var alert = $('#alertdatakosong').show()
        } else {
            $.ajax({
                method: 'post',
                url: '/inventory/purchase-order',
                data: data,
                success: function (response) {
                    window.location.href = '/inventory/purchase-order/' + response.id_po + '/edit'
                },
                error: function (error) {
                    console.log(error)
                }

            });
        }

    }
    
    
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
   }
</script>


@endsection
