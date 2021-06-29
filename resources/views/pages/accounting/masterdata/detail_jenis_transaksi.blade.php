@extends('layouts.Admin.adminaccounting')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Jenis Transaksi {{ $jenis_transaksi->nama_transaksi }}</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Penentuan</span>
                    · Akun · Transaksi
                </div>
                <span class="font-weight-500 text-primary" id="id_bengkel" style="display:none">{{ Auth::user()->bengkel->id_bengkel}}</span>
            </div>
            <div>
                <div class="col-12 col-xl-auto mb-3">
                    <a href="{{ route('jenis-transaksi.index') }}"
                        class="btn btn-sm btn-light text-primary mr-2">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5">
            <div class="card mb-4">
                <div class="card-header">Set Akun Jenis Transaksi</div>
                <form action="{{ route('penentuan-akun.update', $jenis_transaksi->id_jenis_transaksi) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label class="small mb-1" for="kode_sparepart">Nama Transaksi</label>
                            <input class="form-control form-control-sm" id="kode_sparepart" type="text"
                                name="kode_sparepart" value="{{ $jenis_transaksi->nama_transaksi }}" readonly />
                        </div>
                        @if(empty($jenis_transaksi->PenentuanAkun))
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="id_akun">Pilih Akun Debet</label><span class="mr-4 mb-3"
                                    style="color: red">*</span>
                                <select class="form-control" name="id_akun" id="id_akun">
                                    <option>Pilih Akun</option>
                                    @foreach ($akun as $item)
                                    <option value="{{ $item->id_akun }}">{{ $item->nama_akun }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('id_akun')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group">
                                <label class="small mb-1 mr-1" for="id_pasangan_akun">Pilih Akun Kredit</label><span class="mr-4 mb-3"
                                    style="color: red">*</span>
                                <select class="form-control" name="id_pasangan_akun" id="id_pasangan_akun">
                                    <option>Pilih Akun</option>
                                    @foreach ($akun as $item)
                                    <option value="{{ $item->id_akun }}">{{ $item->nama_akun }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('id_akun')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            <div class="form-group  text-right">
                                <button class="btn btn-primary btn-sm" type="Submit">Set Akun</button>
                            </div>
                        @else

                        @endif
                    </div>
                </form>
            </div>
        </div>

        {{-- Card Kanan --}}
        <div class="col-lg-7">
            <div class="card mb-4">
                    <div class="card-header ">List Akun</div>
                <div class="card-body">
                    @if(empty($jenis_transaksi->PenentuanAkun))
                        <div class="alert alert-danger alert-icon" role="alert">
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                            <div class="alert-icon-aside">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="alert-icon-content">
                                <h5 class="alert-heading" class="small">Akun Info</h5>
                                Anda Belum Menginputkan Akun Kredit dan Debet
                            </div>
                        </div>
                    @else
                        <div class="alert alert-success alert-icon" role="alert">
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                            <div class="alert-icon-aside">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="alert-icon-content">
                                <h5 class="alert-heading" class="small">Akun Info</h5>
                                Anda Sudah Menginputkan Akun Kredit dan Debet
                            </div>
                        </div>
                   @endif
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
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 230px;">Akun Debet</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 230px;">Akun Kredit</th>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                    colspan="1" aria-label="Actions: activate to sort column ascending"
                                                    style="width: 40px;">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr role="row" class="odd">
                                                <td>{{ $jenis_transaksi->PenentuanAkun->Akun->nama_akun ?? ''}}</td>
                                                <td>{{ $jenis_transaksi->PenentuanAkun->PasanganAkun->nama_akun ?? ''}}</td>
                                                @if(empty($jenis_transaksi->PenentuanAkun))
                                                <td></td>
                                                @else
                                                <td>
                                                    <a href="" class="btn btn-danger btn-datatable" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modalhapus-{{ $jenis_transaksi->PenentuanAkun }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                                @endif
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
    </div>
</div>
</main>

<script>
   

    function tambahakun( id_jenis_transaksi) {
       
        var form1 = $('#form1')
        var _token = form1.find('input[name="_token"]').val()
        var id_akun = $('#id_akun').val()
        var jenis_akun = $('#jenis_akun').val()
        // console.log(id_jenis_transaksi, id_akun, jenis_akun)

        if (id_akun == 'Pilih Akun' | jenis_akun == 'Pilih Akun Grup'){
            var alert = $('#alertakun').show()
        } else{
            var data = {
                _token: _token,
                id_jenis_transaksi: id_jenis_transaksi,
                id_akun: id_akun,
                jenis_akun: jenis_akun,
            }
            console.log(data)

            $.ajax({
                method: 'post',
                url: '/accounting/penentuan-akun/',
                data: data,
                success: function (response) {
                    window.location.href = '/accounting/jenis-transaksi/' + id_jenis_transaksi
                },
                error: function (response) {
                    console.log(response)
                }
            });
        }
    }

</script>

@endsection
