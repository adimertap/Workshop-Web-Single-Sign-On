@extends('layouts.Admin.admininventory')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon" style="color: white"><i class="fas fa-dolly-flatbed"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Tambah Data Opname</div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Stock Opname</span>
                            · Tambah · Data
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('Opname') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="container mt-n10">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="nav nav-pills nav-justified flex-column flex-xl-row nav-wizard" id="cardTab" role="tablist">
                    <!-- Wizard navigation item 1-->
                    <a class="nav-item nav-link active" id="wizard1-tab" href="#wizard1" data-toggle="tab" role="tab"
                        aria-controls="wizard1" aria-selected="true">
                        <div class="wizard-step-icon">1</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Formulir Opname</div>
                            <div class="wizard-step-text-details">Lengkapi formulir berikut</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard2-tab" href="#wizard2" data-toggle="tab" role="tab"
                        aria-controls="wizard2" aria-selected="true">
                        <div class="wizard-step-icon">2</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Detail Sparepart Opname</div>
                            <div class="wizard-step-text-details">Formulir Detail Sparepart</div>
                        </div>
                    </a>
                    <a class="nav-item nav-link" id="wizard3-tab" href="#wizard3" data-toggle="tab" role="tab"
                        aria-controls="wizard3" aria-selected="true">
                        <div class="wizard-step-icon">3</div>
                        <div class="wizard-step-text">
                            <div class="wizard-step-text-name">Konfirmasi Opname</div>
                            <div class="wizard-step-text-details">Notification and account options</div>
                        </div>
                    </a>

                </div>
            </div>

            {{-- CARD 1 --}}
            <div class="card-body">
                <div class="tab-content" id="cardTabContent">
                    <!-- Wizard tab pane item 1-->
                    <div class="tab-pane py-2 py-xl-2 fade show active" id="wizard1" role="tabpanel"
                        aria-labelledby="wizard1-tab">
                        <div class="row justify-content-center">
                            <div class="col-xxl-6 col-xl-9">
                                <h3 class="text-primary">Step 1</h3>
                                <h5 class="card-title">Input Formulir Opname</h5>
                                <form action="{{ route('Opname.store') }}" id="form1" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="kode_opname">Kode Opname</label>
                                            <input class="form-control" id="kode_opname" type="text" name="kode_opname"
                                                placeholder="Input Kode Opname" value="{{ old('kode_opname') }}"
                                                class="form-control @error('kode_opname') is-invalid @enderror" />
                                            @error('kode_opname')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="id_pegawai">Pegawai</label>
                                            <select class="form-control" name="id_pegawai" id="id_pegawai"
                                                class="form-control @error('id_supplier') is-invalid @enderror">
                                                <option>Pilih Pegawai</option>
                                                @foreach ($pegawai as $item)
                                                <option value="{{ $item->id_pegawai }}">{{ $item->nama_pegawai }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('id_pegawai')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="approve">Approval</label>
                                            <input class="form-control" id="approve" type="text" name="approve"
                                                value="Pending" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="small mb-1" for="tanggal_opname">Tanggal Opname</label>
                                            <input class="form-control" id="tanggal_opname" type="date"
                                                name="tanggal_opname" placeholder="Input Tanggal Opname"
                                                value="{{ old('tanggal_opname') }}"
                                                class="form-control @error('tanggal_opname') is-invalid @enderror" />
                                            @error('tanggal_opname')<div class="text-danger small mb-1">{{ $message }}
                                            </div> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="keterangan">Keterangan</label>
                                        <textarea class="form-control" id="keterangan" type="text" name="keterangan"
                                            placeholder="Input Keterangan Opname" value="{{ old('keterangan') }}"
                                            class="form-control @error('keterangan') is-invalid @enderror"> </textarea>
                                        @error('keterangan')<div class="text-danger small mb-1">{{ $message }}
                                        </div> @enderror
                                    </div>
                                    <hr class="my-4" />
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('Opname') }}" class="btn btn-light">Kembali</a>
                                        <button class="btn btn-primary">Next</button>
                                    </div>
                            </div>
                        </div>
                    </div>

                    {{-- CARD 2 --}}
                    <div class="tab-pane fade" id="wizard2" role="tabpanel" aria-labelledby="wizard2-tab">
                        <div class="card card-icon">
                            <div class="row no-gutters">
                                <div class="col-auto card-icon-aside bg-primary">
                                    <i class="fa fa-cogs" style="color: white"></i>
                                </div>
                                <div class="col">
                                    <div class="card-body py-5">
                                        <h3 class="text-primary">Step 2</h3>
                                        <h5 class="card-title">Pilih Sparepart yang akan dibeli</h5>
                                        <div class="datatable">
                                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <table class="table table-bordered table-hover dataTable"
                                                            id="dataTable" width="100%" cellspacing="0" role="grid"
                                                            aria-describedby="dataTable_info" style="width: 100%;">
                                                            <thead>
                                                                <tr role="row">
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="dataTable" rowspan="1"
                                                                        colspan="1" aria-sort="ascending"
                                                                        aria-label="Name: activate to sort column descending"
                                                                        style="width: 20px;">No</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="dataTable" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Position: activate to sort column ascending"
                                                                        style="width: 80px;">Kode</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="dataTable" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Position: activate to sort column ascending"
                                                                        style="width: 180px;">Nama Sparepart</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="dataTable" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Office: activate to sort column ascending"
                                                                        style="width: 70px;">Jenis Sparepart</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="dataTable" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Start date: activate to sort column ascending"
                                                                        style="width: 70px;">Merk</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="dataTable" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Salary: activate to sort column ascending"
                                                                        style="width: 40px;">Satuan</th>
                                                                    <th class="sorting" tabindex="0"
                                                                        aria-controls="dataTable" rowspan="1"
                                                                        colspan="1"
                                                                        aria-label="Actions: activate to sort column ascending"
                                                                        style="width: 100px;">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($sparepart as $item)
                                                                <tr role="row" class="odd">
                                                                    <th scope="row" class="small" class="sorting_1">
                                                                        {{ $loop->iteration}}</th>
                                                                    <td>{{ $item->kode_sparepart }}</td>
                                                                    <td>{{ $item->nama_sparepart }}</td>
                                                                    <td>{{ $item->Jenissparepart->jenis_sparepart }}
                                                                    </td>
                                                                    <td>{{ $item->Merksparepart->merk_sparepart }}</td>
                                                                    <td>{{ $item->Konversi->satuan }}</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-success btn-datatable"
                                                                            type="button" data-toggle="modal"
                                                                            data-target="#Modaltambah-{{ $item->id_sparepart }}">
                                                                            <i class="fas fa-plus"></i>
                                                                        </a>
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
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="wizard3" role="tabpanel" aria-labelledby="wizard3-tab">
                        <div class="alert alert-danger" id="alertsparepartkosong" role="alert" style="display:none"> <i
                                class="fas fa-times"></i>
                            Anda belum memasukan sparepart!
                            <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <h3 class="text-primary">Step 3</h3>
                        <h5 class="card-title">Konfirmasi Jumlah Retur Sparepart</h5>
                        <div class="datatable">
                            <div id="dataTable_wrapperr" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-bordered table-hover dataTable" id="dataTable"
                                            width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 20px;">
                                                        No</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 40px;">
                                                        Kode Sparepart</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 120px;">Sparepart</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 80px;">
                                                        Merk Sparepart</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 70px;">
                                                        Jumlah diterima</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 50px;">
                                                        Satuan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Start date: activate to sort column ascending"
                                                        style="width: 100px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-light" type="button">Previous</button>
                            <button class="btn btn-primary" type="button" data-toggle="modal"
                                data-target="#Modalsumbit">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="Modalsumbit" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success-soft">
                <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi Form Pembelian</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="form-group">Apakah Form yang Anda inputkan sudah benar?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="button"
                        onclick="tambahsparepart(event,{{ $sparepart }})">Ya!Sudah</button>
                </div>
            </div>
        </div>
    </div>
</div>

@forelse ($sparepart as $item)
<div class="modal fade" id="Modaltambah-{{ $item->id_sparepart }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Sparepart</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="" id="form-{{ $item->id_sparepart }}" method="POST" class="d-inline">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="jumlah_real">Masukan Stock Real</label>
                        <input class="form-control" name="jumlah_real" type="text" id="jumlah_real"
                            placeholder="Input Stock Real" value="{{ old('jumlah_real') }}"></input>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="keterangan_detail">Masukan Keterangan</label>
                        <input class="form-control" name="keterangan_detail" type="text" id="keterangan_detail"
                            placeholder="Input Keterangan" value="{{ old('keterangan_detail') }}"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="button" data-dismiss="modal">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse

<script>
    function tambahsparepart(event, sparepart) {
        event.preventDefault()
        var form1 = $('#form1')
        var kode_opname = form1.find('input[name="kode_opname"]').val()
        var id_pegawai = $('#id_pegawai').val()
        var tanggal_opname = form1.find('input[name="tanggal_opname"]').val()
        var approve = form1.find('input[name="approve"]').val()
        var keterangan = form1.find('input[name="keterangan"]').val()
        var dataform2 = []
        var _token = form1.find('input[name="_token"]').val()

        for (var i = 0; i < sparepart.length; i++) {
            var form = $('#form-' + sparepart[i].id_sparepart)
            var jumlah_real = form.find('input[name="jumlah_real"]').val()
            var keterangan_detail = form.find('input[name="keterangan_detail"]').val()

            if (jumlah_real == 0 | jumlah_real == '') {
                continue
            } else {
                var id_sparepart = sparepart[i].id_sparepart
                var obj = {
                    id_sparepart: id_sparepart,
                    jumlah_real: jumlah_real,
                    keterangan_detail: keterangan_detail
                }
                dataform2.push(obj)
            }
        }

        if (dataform2.length == 0) {
            var alert = $('#alertsparepartkosong').show()
        } else {
            var data = {
                _token: _token,
                kode_opname: kode_opname,
                id_pegawai: id_pegawai,
                tanggal_opname: tanggal_opname,
                approve: approve,
                keterangan: keterangan,
                sparepart: dataform2
            }

            $.ajax({
                method: 'post',
                url: '/inventory/Stockopname/Opname',
                data: data,
            })
        }
    }

    $(document).ready(function () {
        $('#tambahsparepart').click();
    });

</script>


@endsection
