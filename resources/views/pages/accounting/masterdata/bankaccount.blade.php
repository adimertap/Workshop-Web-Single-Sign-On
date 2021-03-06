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
                            Master Data Bank Account
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Bank Account
                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">Tambah
                        Account</button>
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
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 80px;">Nama Bank</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 170px;">Nama Account</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 100px;">Jenis Account</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 120px;">Nomor Rekening</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 150px;">Alamat Account</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 75px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($bankaccount as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                            <td>{{ $item->nama_bank }}</td>
                                            <td>{{ $item->nama_account }}</td>
                                            <td>{{ $item->jenis_account }}</td>
                                            <td>{{ $item->nomor_rekening }}</td>
                                            <td>{{ $item->alamat_account }}</td>
                                            <td>
                                                <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modaledit-{{ $item->id_bank_account }}">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable  mr-2" type="button"
                                                    data-toggle="modal"
                                                    data-target="#Modalhapus-{{ $item->id_bank_account }}">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="tex-center">
                                                Data Account Kosong
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


    {{-- MODAL Tambah -------------------------------------------------------------------------------------------}}
    <div class="modal fade" id="Modaltambah" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Account Bank</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('bank-account.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label class="small mb-1">Isikan Form Dibawah Ini</label>
                        <hr>
                        </hr>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_bank">Nama Bank</label>
                            <input class="form-control" name="nama_bank" type="text" id="nama_bank"
                                placeholder="Input Nama Bank" value="{{ old('nama_bank') }}"
                                class="form-control @error('nama_bank') is-invalid @enderror" />
                            @error('nama_bank')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_account">Nama Account</label>
                            <input class="form-control" name="nama_account" type="text" id="nama_account"
                                placeholder="Input Nama Account Bank" value="{{ old('nama_account') }}"
                                class="form-control @error('nama_account') is-invalid @enderror" />
                            @error('nama_account')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="jenis_account">Jenis Account Bank</label>
                            <select name="jenis_account" id="jenis_account" class="form-control"
                                class="form-control @error('jenis_account') is-invalid @enderror">
                                <option value="{{ old('jenis_account')}}">Pilih Jenis Account
                                </option>
                                <option value="Utang">Account Untuk Utang</option>
                                <option value="Piutang">Account Untuk Piutang</option>
                            </select>
                            @error('jenis_account')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="nomor_rekening">Nomor Rekening</label>
                            <input class="form-control" name="nomor_rekening" type="number" id="nomor_rekening"
                                placeholder="Input Nomor Rekening" value="{{ old('nomor_rekening') }}"
                                class="form-control @error('nomor_rekening') is-invalid @enderror" />
                            @error('nomor_rekening')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="alamat_account">Alamat Account</label>
                            <input class="form-control" name="alamat_account" type="text" id="alamat_account"
                                placeholder="Input Alamat Account" value="{{ old('alamat_account') }}"
                                class="form-control @error('alamat_account') is-invalid @enderror" />
                            @error('alamat_account')<div class="text-danger small mb-1">{{ $message }}
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
    @forelse ($bankaccount as $item)
    <div class="modal fade" id="Modaledit-{{ $item->id_bank_account }}" data-backdrop="static" tabindex="-1"
        role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Form of Payment</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('bank-account.update', $item->id_bank_account) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="modal-body">
                        <label class="small mb-1">Isikan Form Dibawah Ini</label>
                        <hr>
                        </hr>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_bank">Nama Bank</label>
                            <input class="form-control" name="nama_bank" type="text" id="nama_bank"
                                value="{{ $item->nama_bank }}"></input>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="nama_account">Nama Account</label>
                            <input class="form-control" name="nama_account" type="text" id="nama_account"
                                value="{{ $item->nama_account }}"></input>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="jenis_account">Jenis Account Bank</label>
                            <select name="jenis_account" id="jenis_account" class="form-control">
                                <option value="{{ $item->jenis_account }}">{{ $item->jenis_account }}
                                </option>
                                <option value="Utang">Account Untuk Utang</option>
                                <option value="Piutang">Account Untuk Piutang</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="nomor_rekening">Nomor Rekening</label>
                            <input class="form-control" name="nomor_rekening" type="number" id="nomor_rekening"
                                value="{{ $item->nomor_rekening }}"></input>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="alamat_account">Alamat Account</label>
                            <input class="form-control" name="alamat_account" type="text" id="alamat_account"
                                value="{{ $item->alamat_account }}"></input>
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
    @forelse ($bankaccount as $item)
    <div class="modal fade" id="Modalhapus-{{ $item->id_bank_account }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('bank-account.destroy', $item->id_bank_account) }}" method="POST"
                    class="d-inline">
                    @csrf
                    @method('delete')
                    <div class="modal-body">Apakah Anda Yakin Menghapus Data Account Bank {{ $item->nama_bank }} atas
                        nama {{ $item->nama_account }} ?</div>
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
    });

</script>

@endsection
