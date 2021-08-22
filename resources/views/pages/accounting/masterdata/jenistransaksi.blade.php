@extends('layouts.Admin.adminaccounting')

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
                            Master Data Jenis Transaksi
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Jenis Transaksi
                    {{-- <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                        data-target="#Modaltambah">Tambah Jenis Transaksi</button> --}}
                </div>
            </div>
            <div class="card-body">

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
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 30px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 300px;">Jenis Transaksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($jenis_transaksi as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">
                                                {{ $loop->iteration}}</th>
                                            <td>{{ $item->nama_transaksi }}</td>
                                           
                                                {{-- <a href="{{ route('jenis-transaksi.show', $item->id_jenis_transaksi) }}" class="btn btn-secondary btn-xs" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Set Debet & Kredit">
                                                    Set Akun
                                                </a> --}}
                                                {{-- <a href="" class="btn btn-primary btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaledit-{{ $item->id_jenis_transaksi }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapus-{{ $item->id_jenis_transaksi }}">
                                                    <i class="fas fa-trash"></i>
                                                </a> --}}
                                           
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

{{-- MODAL SET AKUN --}}
{{-- <div class="modal fade" id="Modalsetakun" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Penentuan Akun dan Jenis Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('penentuan-akun.store') }}" id="form1" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="id_jenis_transaksi">Jenis Transaksi</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <select class="form-control" name="id_jenis_transaksi"
                            class="form-control @error('id_jenis_transaksi') is-invalid @enderror"
                            id="id_jenis_transaksi">
                            <option>Pilih Jenis Transaksi</option>
                            @foreach ($jenis_transaksi as $item)
                            <option value="{{ $item->id_jenis_transaksi }}">
                                {{ $item->nama_transaksi }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_jenis_transaksi')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="id_akun">Akun Debet</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <select class="form-control" name="id_akun"
                            class="form-control @error('id_akun') is-invalid @enderror" id="id_akun_debet">
                            <option>Pilih Akun Debet</option>
                            @foreach ($akun as $item)
                            <option value="{{ $item->id_akun }}">
                                {{ $item->nama_akun }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_akun')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="id_akun">Akun Kredit</label><span class="mr-4 mb-3"
                            style="color: red">*</span>
                        <select class="form-control" name="id_akun"
                            class="form-control @error('id_akun') is-invalid @enderror" id="id_akun_kredit">
                            <option>Pilih Akun Kredit</option>
                            @foreach ($akun as $item)
                            <option value="{{ $item->id_akun }}">
                                {{ $item->nama_akun }}
                            </option>
                            @endforeach
                        </select>
                        @error('id_akun')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                </div>
               
                @if (count($errors) > 0)
                @endif

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="submit1(event,{{ $akun }})" type="button">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}

{{-- MODAL Tambah -------------------------------------------------------------------------------------------}}
<div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Jenis Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('jenis-transaksi.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_transaksi">Jenis Transaksi</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="nama_transaksi" type="text" id="nama_transaksi"
                            placeholder="Input Jenis Transaksi" value="{{ old('nama_transaksi') }}"
                            class="form-control @error('nama_transaksi') is-invalid @enderror" />
                        @error('nama_transaksi')<div class="text-danger small mb-1">{{ $message }}
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

{{-- MODAL EDIT -------------------------------------------------------------------------------------------}}
@forelse ($jenis_transaksi as $item)
<div class="modal fade" id="Modaledit-{{ $item->id_jenis_transaksi }}" data-backdrop="static" tabindex="-1"
    role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Jenis Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('jenis-transaksi.update', $item->id_jenis_transaksi) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="nama_transaksi">Jenis Transaksi</label><span
                            class="mr-4 mb-3" style="color: red">*</span>
                        <input class="form-control" name="nama_transaksi" type="text" id="nama_transaksi"
                            value="{{ $item->nama_transaksi }}" required></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="Submit">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty

@endforelse

{{-- MODAL DELETE ------------------------------------------------------------------------------}}
@forelse ($jenis_transaksi as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_jenis_transaksi }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('jenis-transaksi.destroy', $item->id_jenis_transaksi) }}" method="POST"
                class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body">Apakah Anda Yakin Menghapus Data Jenis Transaksi {{ $item->nama_transaksi }} ?
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


</main>
{{-- Callback Modal Jika Validasi Error --}}
@if (count($errors) > 0)
<button id="validasierror" style="display: none" type="button" data-toggle="modal" data-target="#Modaltambah">Open
    Modal</button>
@endif

{{-- Script Open Modal Callback --}}
<script>
    $(document).ready(function () {
        $('#validasierror').click();
        var tablercv = $('#dataTableAkun').DataTable()
    });

    function submit1(event, akun) {
        event.preventDefault()
        var _token = $('#form1').find('input[name="_token"]').val()
        var dataform2 = []

        for (var i = 0; i < akun.length; i++) {
            var jenis_transaksi = $('#id_jenis_transaksi').val()
            var debet = $('#id_akun_debet').val()
            var kredit = $('#id_akun_kredit').val()

            var id_akun = akun[i].id_akun
            var obj = {
                // id_bengkel: id_bengkel,
                id_akun: debet,
                id_jenis_transaksi: jenis_transaksi,
            }
            console.log(obj)
            // dataform2.push(obj)
        }



        // var data = {
        //     _token: _token,
        //     nama_supplier: nama_supplier,
        //     tanggal_po: tanggal_po,
        //     kode_po: kode_po
        // }

        // if (tanggal_po == 0 | tanggal_po == '') {
        //     $('#alerttanggal').show()
        // }else if (nama_supplier == 0 | nama_supplier =='')
        //     $('#alertsupplier').show()
        // else {
        //     $.ajax({
        //         method: 'post',
        //         url: '/inventory/purchase-order',
        //         data: data,
        //         success: function (response) {
        //             window.location.href = '/inventory/purchase-order/' + response.id_po + '/edit'
        //         },
        //         error: function (error) {
        //             console.log(error)
        //         }

        //     });
        // }

    }

</script>

@endsection
