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
                            <div class="page-header-subtitle" style="color: white">Edit Data Pembayaran Gaji Pegawai
                            </div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Gaji Pegawai</span>
                            · Edit · Data
                            <span class="font-weight-500 text-primary" id="id_bengkel"
                                style="display:none">{{ Auth::user()->bengkel->id_bengkel}}</span>
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('gaji-pegawai.index') }}"
                            class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger" id="alertdatakosong" role="alert" style="display:none"> <i
                class="fas fa-times"></i>
            Error! Terdapat Data yang Masih Kosong!
            <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        </div>
    </header>

    <div class="container mt-n10">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Detail Formulir Pegawai</div>
                    <div class="card-body">
                        <form action="{{ route('gaji-pegawai.update', $gaji->id_gaji_pegawai) }}" id="form1"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1 mr-1" for="tahun_gaji">Tahun Gaji</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="tahun_gaji" type="text" name="tahun_gaji"
                                        placeholder="Input Tahun Gaji" value="{{ $gaji->tahun_gaji }}" />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1 mr-1" for="bulan_gaji">Bulan Gaji</label><span
                                        class="mr-4 mb-3" style="color: red">*</span>
                                    <select name="bulan_gaji" id="bulan_gaji" class="form-control"
                                        class="form-control @error('bulan_gaji') is-invalid @enderror">
                                        <option value="{{ $gaji->bulan_gaji }}">{{ $gaji->bulan_gaji }}</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                    @error('bulan_gaji')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="id_jenis_transaksi">Pilih Jenis
                                    Transaksi</label><span class="mr-4 mb-3" style="color: red">*</span>
                                <div class="input-group input-group-joined">
                                    <div class="input-group-append">
                                        <a href="" class="btn btn-sm btn-secondary" type="button" data-toggle="modal"
                                            data-target="#Modaltransaksi">
                                            Tambah
                                        </a>
                                    </div>
                                    <select class="form-control" name="id_jenis_transaksi" id="id_jenis_transaksi"
                                        class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                        <option value="{{ $gaji->Jenistransaksi->id_jenis_transaksi }}">{{ $gaji->Jenistransaksi->nama_transaksi }}</option>
                                        @foreach ($jenis_transaksi as $transaksi)
                                        <option value="{{ $transaksi->id_jenis_transaksi }}">
                                            {{ $transaksi->nama_transaksi }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('id_jenis_transaksi')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="gaji_diterima">Total Tunjangan</label>
                                <div class="input-group input-group-joined">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-gray-200">
                                            Rp.
                                        </span>
                                    </div>
                                    <input class="form-control" id="total_tunjangan" type="text" name="gaji_diterima"
                                        placeholder="Keterangan Pembayaran" value="{{ $gaji->grand_total_tunjangan !=  null ? $gaji->grand_total_tunjangan : 0 }}"
                                        class="form-control @error('keterangan') is-invalid @enderror" readonly>
                                    @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="gaji_diterima">Total Gaji Keseluruhan</label>
                                <div class="input-group input-group-joined">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-gray-200">
                                            Rp.
                                        </span>
                                    </div>
                                    <input class="form-control" id="gaji_diterima" type="text" name="gaji_diterima"
                                        placeholder="Keterangan Pembayaran" value="{{ $gaji->grand_total_gaji !=  null ? $gaji->grand_total_gaji : 0 }}"
                                        class="form-control @error('keterangan') is-invalid @enderror" readonly>
                                    @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="pph21">Total PPh21 Pegawai</label>
                                <div class="input-group input-group-joined">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-gray-200">
                                            Rp.
                                        </span>
                                    </div>
                                    <input class="form-control" id="total_pph21" type="text" name="total_pph21"
                                        placeholder="Keterangan Pembayaran" value="{{ $gaji->grand_total_pph21 !=  null ? $gaji->grand_total_pph21 : 0 }}"
                                        class="form-control @error('keterangan') is-invalid @enderror" readonly>
                                    @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" type="text" name="keterangan"
                                    placeholder="Keterangan Pembayaran" value="{{ $gaji->keterangan }}"
                                    class="form-control @error('keterangan') is-invalid @enderror"></textarea>
                                @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group text-right">
                                <hr>
                                <a href="{{ route('laporanabsensi') }}" target="_blank" class="btn btn-secondary btn-sm" type="button" >
                                    Cek Absensi Pegawai
                                </a>
                                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                                    data-target="#Modalsumbit">Simpan</button>
                            </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card card-collapsable">
                    <a class="card-header" href="#collapseCardExample" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="collapseCardExample"> Pilih Pegawai
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
                                                            style="width: 150px;">
                                                            Nama Pegawai</th>
                                                        {{-- <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 80px;">
                                                            NPWP Pegawai</th> --}}
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 80px;">
                                                            Jabatan</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 100px;">
                                                            Gaji Pokok</th>
                                                        <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Position: activate to sort column ascending"
                                                            style="width: 50px;">
                                                            Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($pegawai as $item)
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                        <td id="nama_pegawai-{{ $item->id_pegawai }}">{{ $item->nama_pegawai}}</td>
                                                        <td id="jabatan-{{ $item->id_pegawai }}">{{ $item->Jabatan->nama_jabatan}}</td>
                                                        <td id="gajipokok-{{ $item->id_pegawai }}">
                                                            @if ($item->Jabatan->Gajipokok == null | $item->Jabatan->Gajipokok == '' )
                                                                <button class="btn btn-xs btn-primary" type="button" data-toggle="modal"
                                                                data-target="#Modaltambahgajipokok">Tambah Gaji Pokok</button>
                                                            @else Rp.{{ number_format($item->Jabatan->Gajipokok->besaran_gaji,2,',','.') }}
                                                                
                                                            @endif

                                                        </td>
                                                        {{-- <td id="gajipokok-{{ $item->id_pegawai }}">Rp.{{ number_format($item->Jabatan->Gajipokok->besaran_gaji,2,',','.') }} --}}
                                                        </td>
                                                        <td>
                                                            @if ($item->Jabatan->Gajipokok == null | $item->Jabatan->Gajipokok =='')
                                                                <span class="small">Belum Ada Gaji Pokok</span>
                                                            @else
                                                            <button id="{{ $item->id_pegawai }}-button" class="btn btn-success btn-xs" type="button" data-toggle="modal"
                                                                data-target="#Modaltambah-{{ $item->id_pegawai }}">
                                                                Tambah
                                                            </button>
                                                            @endif
                                                            
                                                        </td>
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
                <p></p>
            </div>
        </div>
        <div class="card">
            <div class="card card-header-actions">
                <div class="card-header">
                    Detail Gaji Pegawai
                    {{-- <a href="" class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                        data-target="#Modaltambahtunjangan">
                        Tambah Tunjangan
                    </a> --}}
                </div>
                <div class="card-body">
                    <div class="datatable">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-bordered table-hover dataTable"
                                        id="dataTableKonfirmasi" width="100%" cellspacing="0" role="grid"
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
                                                    style="width: 150px;">
                                                    Nama Pegawai</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 50px;">
                                                    Jabatan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 100px;">
                                                    Gaji Pokok</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 80px;">
                                                    Total Tunjangan</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 120px;">
                                                    Total Gaji</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 80px;">
                                                    Total PPh21</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 50px;">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id='konfirmasi'>
                                            @forelse ($gaji->Detailpegawai as $item)
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}.</th>
                                                        <td><span id="pegawai-{{ $item->id_pegawai }}">{{ $item->nama_pegawai}}</span></td>
                                                        
                                                        
                                                       
                                                        <td id="jabatan-{{ $item->id_pegawai }}">{{ $item->Jabatan->nama_jabatan}}</td>
                                                        <td id="gajipokok-{{ $item->id_pegawai }}">Rp.{{ number_format($item->Jabatan->Gajipokok->besaran_gaji,2,',','.') }}</td>
                                                        <td>Rp&nbsp;{{ number_format($item->pivot->total_tunjangan,2,',','.') }}</td>
                                                        <td>Rp&nbsp;{{ number_format($item->pivot->total_gaji,2,',','.') }}</td>
                                                        <td>Rp&nbsp;{{ number_format($item->pivot->total_pph21,2,',','.') }}</td>
                                                        <td>
                                                           
                                                            
                                                        </td>
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
    </div>
</main>

@forelse ($pegawai as $items)
<div class="modal fade" id="Modaltambah-{{ $items->id_pegawai }}" data-backdrop="static" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-light">
            <h5 class="modal-title" id="staticBackdropLabel">Pilih Tunjangan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
            <div class="alert alert-info alert-icon" role="alert">
                <div class="alert-icon-aside">
                    <i class="far fa-check-square"></i>
                </div>
                <div class="alert-icon-content">
                    <h6 class="alert-heading">Tunjangan {{ $items->nama_pegawai }}</h6>
                    Pilih tunjangan dengan cara mencentang pada bagian pilih
                </div>
            </div>
            <div class="form-group">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable"
                                    id="dataTablesemuatunjangan" width="100%" cellspacing="0" role="grid"
                                    aria-describedby="dataTable_info" style="width: 100%;">
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
                                                Tunjangan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 180px;">
                                                Jumlah</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 180px;">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tunjangan-{{ $items->id_pegawai }}">
                                        @forelse ($tunjangan as $item)
                                        <tr id="item-{{ $item->id_tunjangan }}" role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">
                                                {{ $loop->iteration}}</th>
                                            <td class="nama_tunjangan">{{ $item->nama_tunjangan }}</td>
                                            <td class="jumlah_tunjangan">Rp {{ number_format($item->jumlah_tunjangan,2,',','.') }}</td>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <input class="checktunjangan" id="customCheck1-{{ $item->id_tunjangan }}" type="checkbox" />
                                                    <label class="" for="customCheck1">Pilih</label>
                                                </div>  
                                            </td>
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
        <div class="modal-footer">
            <button class="btn btn-primary btn-sm text-right"
            onclick="tambahtunjangan(event, {{ $items->id_pegawai }})"
            type="button" data-dismiss="modal">Tambah Tunjangan</button>
        </div>
    </div>
</div>
</div>

@empty
    
@endforelse



<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Pembayaran Gaji</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group text-center">Apakah Form yang Anda inputkan sudah benar?</div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary"
                    onclick="tambahgaji(event,{{ $tunjangan }},{{ $gaji->id_gaji_pegawai }})">Ya!Sudah</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Modaltransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
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


<div class="modal fade" id="Modaltambahgajipokok" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Gaji Pokok</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('gaji-pokok.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="id_jabatan">Pilih Jabatan</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <select class="form-control" name="id_jabatan" id="id_jabatan"
                            class="form-control @error('id_jabatan') is-invalid @enderror">
                            <option>Pilih Jabatan</option>
                            @foreach ($jabatan as $item)
                            <option value="{{ $item->id_jabatan }}">{{ $item->nama_jabatan }}</option>
                            @endforeach
                        </select>
                        @error('id_jabatan')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                <label class="small mb-1 mr-1" for="besaran_gaji">Besaran Gaji</label><span class="mr-4 mb-3" style="color: red">*</span>
                            </div>
                            <div class="col-12 col-lg-auto text-center text-lg-right">
                                <div class="small text-lg-right">
                                    <span class="font-weight-500 text-primary">Nominal : </span>
                                    <span id="detailbesarangaji"></span>
                                </div>
                            </div>
                        </div>
                        <input class="form-control" name="besaran_gaji" type="number" id="besaran_gaji"
                            placeholder="Input Besaran Gaji" value="{{ old('besaran_gaji') }}"
                            class="form-control @error('besaran_gaji') is-invalid @enderror" />
                        @error('besaran_gaji')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                </div>

                {{-- Validasi Error --}}
                @if (count($errors) > 0)
                @endif

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="Submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>



<template id="template_delete_button">
    <button class="btn btn-danger btn-datatable" onclick="hapusgaji(this)" type="button">
        <i class="fas fa-trash"></i>
    </button>
    {{-- <button class="btn btn-primary btn-datatable" onclick="editgaji(this)" type="button">
        <i class="fas fa-edit"></i>
    </button> --}}
</template>

<template id="template_add_button">
    <button class="btn btn-success btn-datatable" type="button" data-toggle="modal" data-target="#Modaltambahtunjangan">
        <i class="fas fa-plus"></i>
    </button>
</template>

<script>

    function tambahtunjangan(event, id_pegawai){
        var tbody = $(`#tunjangan-${id_pegawai}`)
        var tunjangan = 0
        var check = tbody.find('.checktunjangan').each(function(index, element){
            var value = $(element).is(':checked')
            if(value == true){
                var tr = $(element).parent().parent().parent()
                var td = $(tr).find('.jumlah_tunjangan')[0]
                var jumlah = $(td).html()
                var splitjumlah = jumlah.split('Rp')[1].replace('.', '').replace('.', '').replace(',00', '').trim()
                
                tunjangan = tunjangan + parseInt(splitjumlah)
            } 
        })

        var nama_pegawai = $(`#nama_pegawai-${id_pegawai}`).html()
        var jabatan = $(`#jabatan-${id_pegawai}`).html()
        var gajipokok = $(`#gajipokok-${id_pegawai}`).html()
        console.log(gajipokok)
        var totalgaji = parseInt(gajipokok.split('Rp.')[1].replace('.', '').replace('.','').replace(',00', '').trim()) + tunjangan
        console.log(totalgaji)

        var table = $('#dataTableKonfirmasi').DataTable()
        var row = $(`#pegawai-${id_pegawai}`).parent().parent()
        table.row(row).remove().draw();

        var totaltambahtunjangan = $('#gaji_diterima').val()
        var jumlahfix = totalgaji + parseInt(totaltambahtunjangan)
        $('#gaji_diterima').val(jumlahfix)

        var totalgajipokok = $('#total_gaji').val()
        var splitgajipokok = parseInt(gajipokok.split('Rp.')[1].replace('.', '').replace('.', '').replace(',00', '').trim())
        var jumlahfix2 = splitgajipokok + parseInt(totalgajipokok)

        $('#total_gaji').val(jumlahfix2)

        var totaltunjangan = $('#total_tunjangan').val()
        var jumlahfix3 = tunjangan + parseInt(totaltunjangan)
        $('#total_tunjangan').val(jumlahfix3)

        var pph = 0
        if(totalgaji > 4500000){
            var pph21 = totalgaji * 5 
            var pph21fix = pph21 / 100

            var totalpph21 = $('#total_pph21').val()
            var jumlahpph21 = pph21fix + parseInt(totalpph21)
            $('#total_pph21').val(jumlahpph21)

            alert('Berhasil Menambahkan Pegawai dan Tunjangan')

            $('#dataTableKonfirmasi').DataTable().row.add([
            nama_pegawai, `<span id=pegawai-${id_pegawai}>${nama_pegawai}</span>`, jabatan, gajipokok,   new Intl.NumberFormat('id', {
            style: 'currency',
            currency: 'IDR'
            }).format(tunjangan), 
            new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(totalgaji),
            new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(pph21fix),
            ]).draw();
        }else{

            alert('Berhasil Menambahkan Pegawai dan Tunjangan')

            $('#dataTableKonfirmasi').DataTable().row.add([
            nama_pegawai, `<span id=pegawai-${id_pegawai}>${nama_pegawai}</span>`, jabatan, gajipokok,   new Intl.NumberFormat('id', {
            style: 'currency',
            currency: 'IDR'
            }).format(tunjangan), 
            new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(totalgaji),
            new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(pph),
            ]).draw();
        }
    }

    // function edittunjangan (event,id_pegawai){
    //     var tbody = $(`#tunjangan-${id_pegawai}`)
    //     var tunjangan = 0
    //     var check = tbody.find('.checktunjangan').each(function(index, element){
    //         var value = $(element).is(':checked')
    //         if(value == true){
    //             var tr = $(element).parent().parent().parent()
    //             var td = $(tr).find('.jumlah_tunjangan')[0]
    //             var jumlah = $(td).html()
    //             var splitjumlah = jumlah.split('Rp')[1].replace('.', '').replace(',00', '').trim()
               
    //             tunjangan = tunjangan + parseInt(splitjumlah)
    //             console.log(tunjangan)
    //         }
    //     })
    //     // Pengurangan Tunjangan
    //     var totaltunjangan = $('#total_tunjangan').val()
    //     var splittunjangan = parseInt(totaltunjangan) - tunjangan
    //     console.log(splittunjangan)
        
    //     $('#total_tunjangan').val(splittunjangan)
    // }


    function tambahgaji(event, tunjangan, id_gaji_pegawai) {
        event.preventDefault()
        var form1 = $('#form1')
        var tahun_gaji = form1.find('input[name="tahun_gaji"]').val()
        var bulan_gaji = $('#bulan_gaji').val()
        var id_jenis_transaksi = $('#id_jenis_transaksi').val()
        var grand_total_gaji = $('#gaji_diterima').val()
        var grand_total_tunjangan = $('#total_tunjangan').val()
        var grand_total_pph21 = $('#total_pph21').val()
        var id_bengkel = $('#id_bengkel').text()
        var keterangan = form1.find('textarea[name="keterangan"]').val()
        var _token = form1.find('input[name="_token"]').val()
        var pegawai = []
        var tunjangan = []

        var datapegawai = $('#konfirmasi').children()
        for (let index = 0; index < datapegawai.length; index++) {
            var children = $(datapegawai[index]).children()
            var td = children[1]
            var span = $(td).children()[0]

            var id_pegawai = $(span).attr('id')
            var id = id_pegawai.split('pegawai-')[1]
            var tes1 = $($(td).parent().children())
            var total_tunjangan = $($(td).parent().children()[4]).html().split('Rp')[1].replace('&nbsp;','').replace('.','').replace('.', '').replace(',00', '').trim()
            var total_gaji = $($(td).parent().children()[5]).html().split('Rp')[1].replace('&nbsp;','').replace('.','').replace('.', '').replace(',00', '').trim()
            var total_pph21 = $($(td).parent().children()[6]).html().split('Rp')[1].replace('&nbsp;','').replace('.','').replace('.', '').replace(',00', '').trim()

            pegawai.push({
                id_pegawai: id,
                id_bengkel: id_bengkel,
                total_tunjangan: total_tunjangan,
                total_gaji: total_gaji,
                total_pph21: total_pph21
            })

            console.log(pegawai)

            var tbody = $(`#tunjangan-${id}`)
            var check = tbody.find('.checktunjangan').each(function(index, element){
                var value = $(element).is(':checked')
                if(value == true){
                    var tr = $(element).parent().parent().parent()
                    var id_tunjangan = $(tr).attr('id').split('item-')[1]

                    tunjangan.push({
                        id_pegawai: id,
                        id_tunjangan: id_tunjangan,
                        id_bengkel: id_bengkel
                    })
                    
                }

            })
        }

        if (id_jenis_transaksi == 'Pilih Jenis Transaksi' | id_jenis_transaksi == '' | tahun_gaji == '' | bulan_gaji == '') {
            var alert = $('#alertdatakosong').show()
        } else {
            var data = {
                _token: _token,
                tahun_gaji: tahun_gaji,
                bulan_gaji: bulan_gaji,
                id_jenis_transaksi: id_jenis_transaksi,
                grand_total_gaji: grand_total_gaji,
                grand_total_tunjangan: grand_total_tunjangan,
                grand_total_pph21: grand_total_pph21,
                keterangan: keterangan,
                pegawai: pegawai,
                tunjangan: tunjangan
                // tunjangan: dataform2
            }
            console.log(data)

            $.ajax({
                method: 'put',
                url: '/payroll/gaji-pegawai/' + id_gaji_pegawai,
                data: data,
                success: function (response) {
                    window.location.href = '/payroll/gaji-pegawai'

                },
                error: function (response) {
                    console.log(response)
                }
            });
        }
    }



    // function tambahtunjangan(event, id_tunjangan) {
    //     var data = $('#item-' + id_tunjangan)
    //     var nama_tunjangan = $(data.find('.nama_tunjangan')[0]).text()
    //     var jumlah_tunjangan = $(data.find('.jumlah_tunjangan')[0]).text()
    //     var template = $($('#template_delete_button').html())

    //     // GAJI DITERIMA
    //     var totaltambahtunjangan = $('#gaji_diterima').val()
    //     var splittunjangan = jumlah_tunjangan.split('Rp')[1].replace('.', '').replace(',00', '').trim()
    //     var jumlahfix = parseInt(splittunjangan) + parseInt(totaltambahtunjangan)
    //     $('#gaji_diterima').val(jumlahfix)

    //     // TUNJANGAN
    //     var totaltunjangan = $('#totaltunjangan2').html()
    //     var totalfix = parseInt(splittunjangan) + parseInt(totaltunjangan)
    //     console.log(totalfix)
    //     $('#totaltunjangan2').html(totalfix)

    //     var table = $('#dataTabletunjangan').DataTable()
    //     var row = $(`#${$.escapeSelector(nama_tunjangan.trim())}`).parent().parent()
    //     table.row(row).remove().draw();

    //     $('#dataTabletunjangan').DataTable().row.add([
    //         nama_tunjangan, `<span id=${id_tunjangan}>${nama_tunjangan}</span>`, jumlah_tunjangan,
    //     ]).draw();

    //     // TABLE TAB 3
    //     var table2 = $('#dataTabletunjangankonfirmasi').DataTable()
    //     var row2 = $(`#${$.escapeSelector(nama_tunjangan.trim())}`).parent().parent()
    //     table2.row(row2).remove().draw();

    //     $('#dataTabletunjangankonfirmasi').DataTable().row.add([
    //         `<span id=${nama_tunjangan}>${nama_tunjangan}</span>`, jumlah_tunjangan,
    //     ]).draw();
    // }

    function editgaji(element){
        var table = $('#dataTablekonfirmasi').DataTable()
        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        var children = $(row).children()[1]
        var kode = $($(children).children()[0]).attr('id')
        var id = kode.split('pegawai-')[1]
        $(`#${id}-button`).trigger('click');


    }
   

    function hapusgaji(element) {
        var table = $('#dataTableKonfirmasi').DataTable()

        // Akses Parent Sampai <tr></tr>
        var row = $(element).parent().parent()
        table.row(row).remove().draw();
        alert('Data Tunjangan Berhasil di Hapus')
        // draw() Reset Ulang Table
        var table = $('#dataTable').DataTable()
        var table2 = $('#dataTabletunjangankonfirmasi').DataTable()

        // Akses Parent Sampai <tr></tr>
        var row2 = $(element).parent().parent()

        // Pengurangan Total Gaji Pokok
        var totalgajipokok = $('#total_gaji').val()
        var gajipokok = $(row2.children()[3]).html()
        var splitgajipokok = parseInt(totalgajipokok) - parseInt(gajipokok.split('Rp.')[1].replace('.', '').replace('.','').replace(',00', '').trim())
        $('#total_gaji').val(splitgajipokok)

        // Pengurangan Tunjangan
        var totaltunjangan = $('#total_tunjangan').val()
        var tunjangan = $(row2.children()[4]).html()
        var splittunjangan = parseInt(totaltunjangan) - parseInt(tunjangan.split('Rp')[1].replace('&nbsp;','').replace('.', '').replace(',00', '').trim())
        console.log(splittunjangan)
        $('#total_tunjangan').val(splittunjangan)

        var totalpph21 = $('#total_pph21').val()
        var pph21 = $(row2.children()[6]).html()
        var splitpph = parseInt(totalpph21) - parseInt(pph21.split('Rp')[1].replace('&nbsp;','').replace('.', '').replace(',00', '').trim())
        console.log(splitpph)
        $('#total_pph21').val(splitpph)
 
        // Pengurangan Grand Total Keseluruhan
        var grandtotal = $('#gaji_diterima').val()
        var grand = $(row2.children()[5]).html()
        var splitgrand = parseInt(grandtotal) - parseInt(grand.split('Rp')[1].replace('&nbsp;','').replace('.','').replace('.', '').replace(',00', '').trim())
        console.log(grand)
        $('#gaji_diterima').val(splitgrand)    
    }

    $(document).ready(function () {

        $('#besaran_gaji').on('input', function () {
            var nominal = $(this).val()
            var nominal_fix = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(nominal)

            $('#detailbesarangaji').html(nominal_fix);
        })
        
        var table_pegawai = $('#dataTablePegawai').DataTable({
            "pageLength": 5,
            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, ]
            ]
        })
    
        var table2 = $('#dataTableAbsensi').DataTable()
        // var table = $('#dataTablesemuatunjangan').DataTable()
        var template = $('#template_delete_button').html()
        $('#dataTableKonfirmasi').DataTable({
            "columnDefs": [{
                    "targets": -1,
                    "data": null,
                    "defaultContent": template
                },
                {
                    "targets": 0,
                    "data": null,
                    'render': function (data, type, row, meta) {
                        return meta.row + 1
                    }
                }
            ]
        });
    });

</script>

@endsection
