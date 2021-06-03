@extends('layouts.Admin.adminaccounting')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Purchasing Requisition Form</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal }}· <span id="clock">12:16 PM</span> 
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
            <div class="card-header ">Data Pembayaran Inventory
                <a href="" class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">
                    Tambah Pembayaran
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
                @if(session('messagejurnal'))
                <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                    {{ session('messagejurnal') }}
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
                                            style="width: 20px;">Kode</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 90px;">Supplier</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 100px;">Total Bayar</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 40px;">Status PRF</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 40px;">Status Bayar</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 40px;">Status Jurnal</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            style="width: 90px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($prf as $item)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                        <td>{{ $item->kode_prf }}</td>
                                        <td>{{ $item->Supplier->nama_supplier }}</td>
                                        <td>Rp {{ number_format($item->grand_total,2,',','.') }}</td>
                                        <td class="text-center">
                                            @if($item->status_prf == 'Approved')
                                            <span class="badge badge-success">
                                                @elseif($item->status_prf == 'Not Approved')
                                                <span class="badge badge-danger">
                                                    @elseif($item->status_prf == 'Pending')
                                                    <span class="badge badge-secondary">
                                                        @else
                                                        <span>
                                                            @endif
                                                            {{ $item->status_prf }}
                                                        </span>
                                        </td>
                                        <td class="text-center"> @if($item->status_prf == 'Pending' and $item->status_bayar == 'Belum Dibayar')
                                            <span class="font-size-300" style="font-size: 12px;">Menunggu
                                                Persetujuan..</span>
                                            @elseif ($item->status_prf == 'Approved' and $item->status_bayar == 'Belum Dibayar')
                                            <a href="" class="btn btn-primary btn-xs" type="button"
                                                data-toggle="modal"
                                                data-target="#Modalbayar-{{ $item->id_prf }}">
                                                Bayar
                                            </a>
                                            @elseif ($item->status_bayar == 'Sudah Dibayar')
                                            <span class="badge badge-warning">  <i class="fa fa-check mr-1"></i>{{ $item->tanggal_bayar }}
                                            @elseif($item->status_prf == 'Not Approved')
                                            <span class="font-size-300" style="font-size: 12px;">Data diTolak</span>
                                            @else
                                            <span>
                                                @endif
                                            </span>
                                        <td>
                                            @if($item->status_bayar == 'Belum Dibayar' and $item->status_jurnal == 'Belum Diposting')
                                                <span class="font-size-200" style="font-size: 12px;">Menunggu
                                                    Pembayaran..</span>
                                            @elseif ($item->status_bayar == 'Sudah Dibayar' and $item->status_jurnal == 'Belum Diposting')
                                            <a href="" class="btn btn-danger btn-xs" type="button"
                                                data-toggle="modal"
                                                data-target="#Modaljurnal-{{ $item->id_prf }}">
                                                Posting?
                                            </a>
                                            @elseif ($item->status_jurnal == 'Sudah Diposting' )
                                                <span class="badge badge-secondary">{{ $item->status_jurnal }}
                                            @else
                                            <span>
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            @if($item->status_bayar == 'Belum Dibayar' and $item->status_jurnal == 'Belum Diposting')
                                            <a href="{{ route('prf.show', $item->id_prf) }}"
                                                class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="" class="btn btn-primary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-datatable" type="button"
                                                data-toggle="modal" data-target="#Modalhapus-{{ $item->id_prf }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            @elseif ($item->status_bayar == 'Sudah Dibayar' and $item->status_jurnal == 'Sudah Diposting')
                                            <a href="{{ route('prf.show', $item->id_prf) }}"
                                                class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                data-placement="top" title="" data-original-title="Detail">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            @else
                                            @endif
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Data Pembayaran Kosong
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

@forelse ($prf as $item)
<div class="modal fade" id="Modalbayar-{{ $item->id_prf }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Tanggal Bayar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('prf-bayar', $item->id_prf) }}?status_bayar=Sudah Dibayar" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="tanggal_bayar">Tanggal Pembayaran</label>
                        <input class="form-control" name="tanggal_bayar" type="date" id="tanggal_bayar"
                            placeholder="Input Tanggal Bayar" value="{{ old('tanggal_bayar') }}"   
                            class="form-control @error('tanggal_bayar') is-invalid @enderror" />
                            @error('tanggal_bayar')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                    </div>
                      {{-- Validasi Error --}}
                    @if (count($errors) > 0)
                    @endif
                </div>
                <div class="modal-footer ">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Bayar</button>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data PRF</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('prf.store') }}" method="POST" id="form1" class="d-inline">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <div class="alert alert-danger" id="alertdatakosong" role="alert" style="display:none"> <i
                            class="fas fa-times"></i>
                        Error! Terdapat Data yang Masih Kosong!
                        <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <hr>
                    </hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="kode_prf">Kode PRF</label>
                            <input class="form-control" id="kode_prf" type="text" name="kode_prf"
                                placeholder="" value="{{ $kode_prf }}"
                                class="form-control @error('kode_prf') is-invalid @enderror" readonly />
                            @error('kode_prf')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="id_jenis_transaksi">Pilih Jenis Transaksi</label><span class="mr-4 mb-3" style="color: red">*</span>
                            <div class="input-group input-group-joined">
                                <div class="input-group-append">
                                    <a href="" class="btn btn-sm btn-secondary" type="button" data-toggle="modal"
                                        data-target="#Modaltransaksi">
                                        Tambah
                                    </a>
                                </div>
                                <select class="form-control" name="id_jenis_transaksi" id="id_jenis_transaksi"
                                    class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                    <option>Pilih Jenis Transaksi</option>
                                    @foreach ($jenis_transaksi as $item)
                                    <option value="{{ $item->id_jenis_transaksi }}">{{ $item->nama_transaksi }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="small" id="alerttransaksi" style="display:none">
                                <span class="font-weight-500 text-danger">Error! Anda Belum Memilih Jenis Transaksi!</span>
                                <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>

                    </div>     
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="id_supplier">Pilih Supplier</label><span class="mr-4 mb-3" style="color: red">*</span>
                            <div class="input-group input-group-joined">
                                <input class="form-control" type="text" placeholder="Pilih Supplier" aria-label="Search"
                                    id="detailsupplier">
                                <div class="input-group-append">
                                    <a href="" class="input-group-text" type="button" data-toggle="modal"
                                        data-target="#Modalsupplier">
                                        <i class="fas fa-folder-open"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="small" id="alertsupplier" style="display:none">
                                <span class="font-weight-500 text-danger">Error! Anda Belum Memilih Supplier!</span>
                                <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="no_telp">Telephone</label>
                            <input class="form-control" id="detailtelp" type="text" name="no_telp" placeholder=""
                                value="{{ old('no_telp') }}"
                                class="form-control @error('no_telp') is-invalid @enderror" readonly />
                            @error('no_telp')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
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
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content ">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">Pilih Supplier</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableSupplier" width="100%"
                                    cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 50px;">Kode</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 120px;">Nama Supplier</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending"
                                                style="width: 60px;">Telephone</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Salary: activate to sort column ascending"
                                                style="width: 70px;">Nama Sales</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Start date: activate to sort column ascending"
                                                style="width: 70px;">No. Rekening</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 60px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($supplier as $item)
                                        <tr id="item-{{ $item->id_supplier }}" role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td class="kode_supplier">{{ $item->kode_supplier }}</td>
                                            <td class="nama_supplier">{{ $item->nama_supplier }}</td>
                                            <td class="telephone">{{ $item->telephone }}</td>
                                            <td class="nama_sales">{{ $item->nama_sales }}</td>
                                            <td class="rekening_supplier">{{ $item->rekening_supplier }}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm"
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
        </div>
    </div>
</div>

<div class="modal fade" id="Modaltransaksi" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Jenis Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('jenis-transaksi.store') }}" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="nama_transaksi">Jenis Transaksi</label>
                        <textarea class="form-control" name="nama_transaksi" type="text" id="nama_transaksi"
                            placeholder="Input Jenis Transaksi" value="{{ old('nama_transaksi') }}"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- MODAL HAPUS --}}
@forelse ($prf as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_prf }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('prf.destroy', $item->id_prf) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body text-center">
                    Apakah Anda Yakin Menghapus Data PRF {{ $item->kode_prf }}, Supplier {{ $item->Supplier->nama_supplier }} ?
                </div>
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


@forelse ($prf as $item)
<div class="modal fade" id="Modaljurnal-{{ $item->id_prf }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Posting Jurnal</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('jurnal-pengeluaran-prf', $item->id_prf) }}" method="POST" class="d-inline">
                @csrf
                <div class="modal-body text-center">Apakah Anda Yakin Memposting Data Invoice <b>{{ $item->kode_prf }} </b>pada tanggal
                    {{ $item->tanggal_prf }}?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Posting</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

@if (count($errors) > 0)
<button id="validasierror" style="display: none" type="button" data-toggle="modal" data-target="#Modalbayar-{{ $item->id_prf }}">Open
    Modal</button>
@endif

<script>
     function tambahsupplier(event, id_supplier) {
        var data = $('#item-' + id_supplier)
        var _token = $('#form1').find('input[name="_token"]').val()
        var nama_supplier = $(data.find('.nama_supplier')[0]).text()
        var telephone = $(data.find('.telephone')[0]).text()

        $('#detailsupplier').val(nama_supplier)
        $('#detailtelp').val(telephone)
    }

    function submit1() {
        var _token = $('#form1').find('input[name="_token"]').val()
        var kode_prf = $('#kode_prf').val()
        var id_jenis_transaksi = $('#id_jenis_transaksi').val()
        var nama_supplier = $('#detailsupplier').val()

        var data = {
            _token: _token,
            kode_prf: kode_prf,
            id_jenis_transaksi: id_jenis_transaksi,
            nama_supplier: nama_supplier,
        }

        if (id_jenis_transaksi == 'Pilih Jenis Transaksi' ) {
            $('#alerttransaksi').show()
        } else if(nama_supplier == '' | nama_supplier == 0 )
            $('#alertsupplier').show()
        else {
            $.ajax({
                method: 'post',
                url: "/accounting/prf",
                data: data,
                success: function (response) {
                    window.location.href = '/accounting/prf/' + response.id_prf + '/edit'
                },
                error: function (error) {
                    console.log(error)
                }

            });
        }

    }


    $(document).ready(function () {
    var tablesupplier = $('#dataTableSupplier').DataTable()
        $('#validasierror').click();

    });


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
