@extends('layouts.Admin.adminfrontoffice')

@section('content')
{{-- HEADER --}}
<header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
    <div class="container">
        <div class="page-header-content pt-4">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto mt-4">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="users"></i></div>
                        Data Customer Bengkel
                    </h1>
                    <div class="page-header-subtitle">Data pelanggan yang pernah dilayani oleh bengkel</div>
                </div>
            </div>
        </div>
    </div>
</header>

{{-- MAIN PAGE CONTENT --}}

<div class="container-fluid mt-n10">
    <div class="card mb-4">
        <div class="card card-header-actions">
            <div class="card-header">List Customer Bengkel
                <button class="btn btn-primary btn-sm" type="button" data-toggle="modal"
                    data-target="#Modaltambah">Tambah
                    Data</button>
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
                {{-- SHOW ENTRIES --}}
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
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 20px;">
                                            Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 20px;">
                                            Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 20px;">
                                            No. Telp</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 20px;">
                                            Alamat</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            style="width: 77px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($customer as $item)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                        <td>{{ $item->nama_customer }}</td>
                                        <td>{{ $item->email_customer }}</td>
                                        <td>{{ $item->nohp_customer }}</td>
                                        <td>{{ $item->alamat_customer }}</td>
                                        <td>
                                            <a href="" class="btn btn-primary btn-datatable  mr-2" type="button"
                                                data-toggle="modal"
                                                data-target="#Modaledit-{{ $item->id_customer_bengkel }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-datatable  mr-2" type="button"
                                                data-toggle="modal"
                                                data-target="#Modalhapus-{{ $item->id_customer_bengkel }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center">
                                            Tidak ada customer terdaftar
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
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Customer</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('jeniskendaraan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                    <hr>
                    </hr>
                    <div class="form-group">
                        <label class="small mb-1" for="nama_customer">Nama Customer <span style="color: red">*</span>
                        </label>
                        <input class="form-control" name="nama_customer" type="text" id="nama_customer"
                            placeholder="Input Nama Customer" value="{{ old('nama_customer') }}"
                            class="form-control @error('nama_customer') is-invalid @enderror">
                        @error('nama_customer')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="email_customer">Email Customer <span style="color: red">*</span>
                        </label>
                        <input class="form-control" name="email_customer" type="email" id="email_customer"
                            placeholder="Input Email Customer" value="{{ old('email_customer') }}"
                            class="form-control @error('email_customer') is-invalid @enderror">
                        @error('email_customer')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="nohp_customer">No. Telp Customer <span style="color: red">*</span>
                        </label>
                        <input class="form-control" name="nohp_customer" type="text" id="nohp_customer"
                            placeholder="Input No. Telp Customer" value="{{ old('nohp_customer') }}"
                            class="form-control @error('nohp_customer') is-invalid @enderror">
                        @error('nohp_customer')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="small mb-1" for="alamat_customer">Alamat</label>
                        <input class="form-control" name="alamat_customer" type="text" id="alamat_customer"
                            placeholder="Input Alamat Customer" value="{{ old('alamat_customer') }}"
                            class="form-control @error('alamat_customer') is-invalid @enderror">
                        @error('alamat_customer')<div class="text-danger small mb-1">{{ $message }}
                        </div> @enderror
                    </div>
                </div>
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
