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
                            Master Data Akun
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Akun
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                        data-target="#Modalsetakun">Set Akun</button>
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
                                <table class="table table-bordered table-hover dataTable" id="dataTable"
                                    width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                    style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <td colspan="5" class="text-center font-weight-500">
                                                Kode Akun
                                            </td>
                                            <td colspan="3" class="text-center font-weight-500">
                                                Akun
                                            </td>
                                            <td colspan="1" class="text-center font-weight-500">

                                            </td>
                                        </tr>
                                        <tr role="row">
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">1</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">2</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">3</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">4</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">5</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 180px;">Nama Akun</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 60px;">Debet</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 60px;">Kredit</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Actions: activate to sort column ascending"
                                                style="width: 50px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($akun as $item)
                                        <tr role="row" class="odd">

                                            @if ($item->level_akun == '1')
                                                <td>{{ $item->level_akun }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            @elseif ($item->level_akun == '2')
                                                <td>{{ $item->super_level_akun }}</td>
                                                <td>{{ $item->kode_akun }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            @elseif ($item->level_akun == '3')
                                                <td>{{ $item->super_level_akun }}</td>
                                                <td>{{ $item->moderate_level_akun }}</td>
                                                <td>{{ $item->kode_akun }}</td>
                                                <td></td>
                                                <td></td>
                                            @elseif($item->level_akun == '4')
                                                <td>{{ $item->super_level_akun }}</td>
                                                <td>{{ $item->moderate_level_akun }}</td>
                                                <td>{{ $item->kode_akun_induk }}</td>
                                                <td>{{ $item->kode_akun }}</td>
                                                <td></td>
                                            @elseif ($item->level_akun == '5')
                                                <td>{{ $item->super_level_akun }}</td>
                                                <td>{{ $item->moderate_level_akun }}</td>
                                                <td>{{ $item->kode_akun_induk }}</td>
                                                <td>{{ $item->kode_akun }}</td>
                                                <td>{{ $item->kode_akun_terakhir }}</td>
                                            @endif


                                            <td class="text-center">
                                                @if ($item->level_akun == '1' | $item->level_akun == '2')
                                                    <b>{{ $item->nama_akun }} [i]</b>
                                                @else
                                                    {{ $item->nama_akun }}
                                                @endif
                                            
                                            </td>


                                            
                                            {{-- <td class="text-center">{{ $item->nama_akun }}</td> --}}
                                            @if ($item->akun_grup == 'Debet')
                                                <td class="text-center"><span class="badge badge-warning">Debet</span></td>
                                                <td></td>
                                            @elseif ($item->akun_grup == 'Kredit')
                                                <td></td>
                                                <td class="text-center"><span class="badge badge-warning">Kredit</span></td>
                                            @endif

                                            <td class="text-center">
                                                <a href="" class="btn btn-secondary btn-datatable" type="button"
                                                data-toggle="modal" data-target="#Modaldetail-{{ $item->id_akun }}">
                                                <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable" type="button"
                                                data-toggle="modal" data-target="#Modalhapus-{{ $item->id_akun }}">
                                                <i class="fas fa-trash"></i>
                                                </a>
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
</main>


{{-- MODAL --}}
{{-- MODAL Tambah -------------------------------------------------------------------------------------------}}
<div class="modal fade" id="Modalsetakun" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="staticBackdropLabel">Set Akun</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('akun.store') }}" id="form1" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label class="small mb-1" for="akun_induk">Akun Induk</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <div class="input-group input-group-joined">
                                <input class="form-control" name="akun_induk" type="text" placeholder="Pilih Akun Induk" aria-label="Search"
                                    id="detailnamaakun">
                                <div class="input-group-append">
                                    <a href="" class="input-group-text" type="button" data-toggle="modal"
                                        data-target="#ModalAkunInduk">
                                        <i class="fas fa-folder-open"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="small" id="alertsupplier" style="display:none">
                                <span class="font-weight-500 text-danger">Error! Anda Belum Memilih Akun Induk!</span>
                                <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1 mr-1" for="level_akun_induk">Level Akun Induk</label>
                            <input class="form-control" name="level_akun_induk" type="text" id="level_akun_induk"
                                value="{{ old('level_akun_induk') }}"
                                class="form-control @error('level_akun_induk') is-invalid @enderror" readonly />
                            @error('level_akun_induk')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                    <span class="small mb-1 font-weight-500 text-warning">Kode Akun Level 3(111) dan 4(1111) Harus Terdiri dari 2 Karakter Angka!.</span>
                    <div><span class="small mb-1 font-weight-500 text-danger">Contoh 1101 untuk level 3 dan 110101 untuk level 4</span>  </div>
                    <p></p>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label class="small mb-1 mr-1" for="kode_akun_induk">Kode Induk</label>
                            <input class="form-control kode_induk_class" name="kode_akun_induk" type="text" id="kode_akun_induk"
                                value="{{ old('kode_akun_induk') }}"
                                class="form-control @error('kode_akun_induk') is-invalid @enderror" readonly />
                            @error('kode_akun_induk')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1 mr-1" for="kode_akun">Kode akun</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <input class="form-control" name="kode_akun" type="text" id="kode_akun"
                                placeholder="Input Kode Akun" value="{{ old('kode_akun') }}"
                                class="form-control @error('kode_akun') is-invalid @enderror" />
                            @error('kode_akun')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1 mr-1" for="level_akun">Level Akun</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <input class="form-control" name="level_akun" type="text" id="level_akun" value="{{ old('level_akun') }}"
                                class="form-control @error('level_akun') is-invalid @enderror" readonly/>
                            @error('level_akun')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                    <div class="row" style="display:none">
                        <div class="form-group col-md-2">
                            <input class="form-control" name="1" type="text" id="1">
                        </div>
                        <div class="form-group col-md-2">
                            <input class="form-control" name="2" type="text" id="2">
                        </div>
                        <div class="form-group col-md-2">
                            <input class="form-control" name="3" type="text" id="3">
                        </div>
                        <div class="form-group col-md-2">
                            <input class="form-control" name="4" type="text" id="4">
                        </div>
                        <div class="form-group col-md-2">
                            <input class="form-control" name="5" type="text" id="5">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1 mr-1" for="nama_akun">Nama akun</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <input class="form-control" name="nama_akun" type="text" id="nama_akun"
                                placeholder="Input Nama Akun" value="{{ old('nama_akun') }}"
                                class="form-control @error('nama_akun') is-invalid @enderror" />
                            @error('nama_akun')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label class="small mb-1 mr-1" for="akun_grup">Grup Akun</label><span class="mr-4 mb-3"
                                style="color: red">*</span>
                            <select name="akun_grup" id="akun_grup" class="form-control"
                                class="form-control @error('akun_grup') is-invalid @enderror">
                                <option value="{{ old('akun_grup')}}">Pilih Akun Grup
                                </option>
                                <option value="Debet">Debet</option>
                                <option value="Kredit">Kredit</option>
                            </select>
                            @error('akun_grup')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                </div>
                {{-- Validasi Error --}}
                @if (count($errors) > 0)
                @endif

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" onclick="submit1()" type="button">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- MODAL DETAILS ------------------------------------------------------------------------------}}
@forelse ($akun as $item)
<div class="modal fade" id="Modaldetail-{{ $item->id_akun }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Akun</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label class="small mb-1 mr-1">Kode Akun</label>
                            @if ($item->level_akun == '1')
                               <input class="form-control" value="{{ $item->level_akun }}" readonly>
                            @elseif ($item->level_akun == '2')
                                <input class="form-control" value="{{ $item->super_level_akun }}{{ $item->kode_akun }}" readonly>
                            @elseif ($item->level_akun == '3')
                                <input class="form-control" value="{{ $item->super_level_akun }}{{ $item->moderate_level_akun }}{{ $item->kode_akun }}" readonly>
                            @elseif($item->level_akun == '4')
                                <input class="form-control" value="{{ $item->super_level_akun }}{{ $item->moderate_level_akun }}{{ $item->kode_akun_induk }}{{ $item->kode_akun }}" readonly>
                            @elseif ($item->level_akun == '5')
                                <input class="form-control" value="{{ $item->super_level_akun }}{{ $item->moderate_level_akun }}{{ $item->kode_akun_induk }}{{ $item->kode_akun }}{{ $item->kode_akun_terakhir }}" readonly>
                            @endif
                        </div>
                    <div class="form-group col-md-9">
                        <label class="small mb-1 mr-1">Nama Akun</label>
                        <input class="form-control" value="{{ $item->nama_akun }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="small mb-1 mr-1">Grup Akun</label>
                        <input class="form-control" value="{{ $item->akun_grup }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="small mb-1 mr-1">Level Akun</label>
                        <input class="form-control" value="{{ $item->level_akun }}" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@empty

@endforelse



{{-- MODAL DELETE ------------------------------------------------------------------------------}}
@forelse ($akun as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_akun }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('akun.destroy', $item->id_akun) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body text-center">Apakah Anda Yakin Menghapus Data Akun <b> {{ $item->nama_akun }}</b> ?</div>
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

{{-- MODAL STORE AKUN INDUK --}}
<div class="modal fade" id="ModalAkunInduk" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl " role="document">
        <div class="modal-content">
            <div class="modal-header bg-light ">
                <h5 class="modal-title">Pilih Akun Induk</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="datatable">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered table-hover dataTable" id="dataTableRcv"
                                    width="100%" cellspacing="0" role="grid"
                                    aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">1</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">2</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">3</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">4</th>
                                                <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">5</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 180px;">Nama Akun</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" style="display:none"
                                                aria-label="Position: activate to sort column ascending"
                                                style="width: 180px;">Level Akun</th>
                                            <th class="sorting text-center" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1"
                                                aria-label="Actions: activate to sort column ascending"
                                                style="width: 50px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($akun as $item)
                                        <tr id="item-{{ $item->id_akun }}" class="border-bottom">
                                            @if ($item->level_akun == '1')
                                                <td class="levelakun1">{{ $item->level_akun }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            @elseif ($item->level_akun == '2')
                                                <td class="kode_akun_induk2">{{ $item->super_level_akun }}</td>
                                                <td class="kode_akun2">{{ $item->kode_akun }}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            @elseif ($item->level_akun == '3')
                                                <td class="super_level_akun3">{{ $item->super_level_akun }}</td>
                                                <td class="kode_induk3">{{ $item->moderate_level_akun }}</td>
                                                <td class="kode_akun3">{{ $item->kode_akun }}</td>
                                                <td></td>
                                                <td></td>
                                            @elseif($item->level_akun == '4')
                                                <td class="super_level_akun4">{{ $item->super_level_akun }}</td>
                                                <td class="moderate_level_akun4">{{ $item->moderate_level_akun }}</td>
                                                <td class="kode_akun_induk4">{{ $item->kode_akun_induk }}</td>
                                                <td class="kode_akun4">{{ $item->kode_akun }}</td>
                                                <td></td>
                                            @elseif ($item->level_akun == '5')
                                                <td class="super_level_akun5">{{ $item->super_level_akun }}</td>
                                                <td class="moderate_level_akun5">{{ $item->moderate_level_akun }}</td>
                                                <td class="kode_akun_induk5">{{ $item->kode_akun_induk }}</td>
                                                <td class="kode_akun_terakhir5">{{ $item->kode_akun_terakhir }}</td>
                                                <td class="kode_akun5">{{ $item->kode_akun }}</td>
                                            @endif

                                            <td class="text-center nama_akun">{{ $item->nama_akun }}</td>
                                            <td class="text-center level_akun_induk" style="display:none">{{ $item->level_akun }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-success btn-xs"
                                                onclick="tambahakun(event, {{ $item->id_akun }})" type="button"
                                                data-dismiss="modal">Tambah
                                                </button>
                                            </td>
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
<script>
     // FUNGSI TAMBAH PO
     function tambahakun(event, id_akun) {
        var data = $('#item-' + id_akun)
        var _token = $('#form1').find('input[name="_token"]').val()
        var level_akun_induk = $(data.find('.level_akun_induk')[0]).text()
        var level_akun =  parseInt(level_akun_induk) + parseInt(1)
        var nama_akun = $(data.find('.nama_akun')[0]).text()
        

        if(level_akun_induk == '1'){
            var levelakun1 = $(data.find('.levelakun1')[0]).text()
            $('#kode_akun_induk').val(levelakun1)
            $('#1').val(levelakun1)
        }else if (level_akun_induk == '2'){
            var kode_akun_induk2 = $(data.find('.kode_akun_induk2')[0]).text()
            var kode_akun2 = $(data.find('.kode_akun2')[0]).text()
            console.log(kode_akun_induk2, kode_akun2)
            $('#kode_akun_induk').val(kode_akun_induk2+kode_akun2)
            $('#1').val(kode_akun_induk2)
            $('#2').val(kode_akun2)
        }else if(level_akun_induk == '3'){
            var super_level_akun3 = $(data.find('.super_level_akun3')[0]).text()
            var kode_induk3 = $(data.find('.kode_induk3')[0]).text()
            var kode_akun3 = $(data.find('.kode_akun3')[0]).text()
            $('#kode_akun_induk').val(super_level_akun3+kode_induk3+kode_akun3)
            $('#1').val(super_level_akun3)
            $('#2').val(kode_induk3)
            $('#3').val(kode_akun3)
        }else if(level_akun_induk == '4'){
            var super_level_akun4 = $(data.find('.super_level_akun4')[0]).text()
            var moderate_level_akun4 = $(data.find('.moderate_level_akun4')[0]).text()
            var kode_akun_induk4 = $(data.find('.kode_akun_induk4')[0]).text()
            var kode_akun4 = $(data.find('.kode_akun4')[0]).text()
            $('#kode_akun_induk').val(super_level_akun4+moderate_level_akun4+kode_akun_induk4+kode_akun4)
            $('#1').val(super_level_akun4)
            $('#2').val(moderate_level_akun4)
            $('#3').val(kode_akun_induk4)
            $('#4').val(kode_akun4)
        }else if(level_akun_induk == '5'){
            var super_level_akun5 = $(data.find('.super_level_akun5')[0]).text()
            var moderate_level_akun5 = $(data.find('.moderate_level_akun5')[0]).text()
            var kode_akun_induk5 = $(data.find('.kode_akun_induk5')[0]).text()
            var kode_akun5 = $(data.find('.kode_akun5')[0]).text()
            var kode_akun_terakhir5 = $(data.find('.kode_akun_terakhir5')[0]).text()
            $('#kode_akun_induk').val(super_level_akun5+moderate_level_akun5+kode_akun_induk5+kode_akun5+kode_akun_terakhir5)
            $('#1').val(super_level_akun5)
            $('#2').val(moderate_level_akun5)
            $('#3').val(kode_akun_induk5)
            $('#4').val(kode_akun5)
            $('#5').val(kode_akun_terakhir5)
        }else{
            alert('Tidak Ditemukan')
        }

        $('#level_akun_induk').val(level_akun_induk)
        $('#level_akun').val(level_akun)
        $('#detailnamaakun').val(nama_akun)
    }

    function submit1() {
        var form = $('#form1')
        var _token = $('#form1').find('input[name="_token"]').val()
        var kode_induk_baru = $('#kode_akun_induk').val()
        var nama_akun_induk = $('#detailnamaakun').val()
        // var nama_akun_induk2 = $('#form1').find('input[name="akun_induk"]').val()
        var kode_akun = $('#form1').find('input[name="kode_akun"]').val()
        var nama_akun = $('#form1').find('input[name="nama_akun"]').val()
        var akun_grup = $('#akun_grup').val()
        var superlevelakun = $('#1').val()
        var moderatelevelakun = $('#2').val()
        var kodeakun = $('#3').val()
        var kodeakuninduk = $('#4').val()
        var kodeakunterakhir = $('#5').val()
        var level_akun = $('#level_akun').val()
        console.log(level_akun)
        var level_akun1 = '1'
        
        if(nama_akun_induk == 'Pilih Akun Induk' | nama_akun_induk == 0 | nama_akun_induk == ''){
            var data = {
                _token: _token,
                kode_akun: kode_akun,
                nama_akun: nama_akun,
                akun_grup: akun_grup,
                super_level_akun: kode_akun,
                level_akun: level_akun1
            }
            console.log(data)
            
            $.ajax({
                method: 'post',
                url: "/accounting/masterdataakun/akun",
                data: data,
                success: function (response) {
                    window.location.href = '/accounting/masterdataakun'
                },
                error: function (error) {
                    console.log(error)
                }

            });
        }else if(level_akun == '2'){
            var data = {
                _token: _token,
                nama_akun: nama_akun,
                akun_grup: akun_grup,
                super_level_akun: superlevelakun,
                kode_akun: kode_akun,
                level_akun: level_akun
            }
            console.log(data)

            $.ajax({
                method: 'post',
                url: "/accounting/masterdataakun/akun",
                data: data,
                success: function (response) {
                    window.location.href = '/accounting/masterdataakun'
                },
                error: function (error) {
                    console.log(error)
                }

            });
        }else if(level_akun == '3'){
            var data = {
                _token: _token,
                nama_akun: nama_akun,
                akun_grup: akun_grup,
                super_level_akun: superlevelakun,
                moderate_level_akun: moderatelevelakun,
                kode_akun: kode_akun,
                level_akun: level_akun
            }
            console.log(data)
            $.ajax({
                method: 'post',
                url: "/accounting/masterdataakun/akun",
                data: data,
                success: function (response) {
                    window.location.href = '/accounting/masterdataakun'
                },
                error: function (error) {
                    console.log(error)
                }

            });
        }else if(level_akun == '4'){
            var data = {
                _token: _token,
                nama_akun: nama_akun,
                akun_grup: akun_grup,
                super_level_akun: superlevelakun,
                moderate_level_akun: moderatelevelakun,
                kode_akun_induk: kodeakun,
                kode_akun: kode_akun,
                level_akun: level_akun
            }
            console.log(data)
            $.ajax({
                method: 'post',
                url: "/accounting/masterdataakun/akun",
                data: data,
                success: function (response) {
                    window.location.href = '/accounting/masterdataakun'
                },
                error: function (error) {
                    console.log(error)
                }

            });
        }else if(level_akun == '5'){
            var data = {
                _token: _token,
                nama_akun: nama_akun,
                akun_grup: akun_grup,
                super_level_akun: superlevelakun,
                moderate_level_akun: moderatelevelakun,
                kode_akun_induk: kodeakun,
                kode_akun: kodeakuninduk,
                kode_akun_terakhir: kode_akun,
                level_akun: level_akun
            }
            console.log(data)
            $.ajax({
                method: 'post',
                url: "/accounting/masterdataakun/akun",
                data: data,
                success: function (response) {
                    window.location.href = '/accounting/masterdataakun'
                },
                error: function (error) {
                    console.log(error)
                }

            });
        }
        

    }

     $(document).ready(function () {
        var tablercv = $('#dataTableRcv').DataTable()
        
    });
</script>

@endsection
