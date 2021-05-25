@extends('layouts.Admin.adminfrontoffice')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="shopping-cart"></i></div>
                            Pelayanan Service
                        </h1>
                        <div class="page-header-subtitle">Data Pelayanan Service pada Bengkel</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">Pelayanan Service
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
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Kode SA</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Nama Customer</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Kendaraan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Pitstop</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Mekanik</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Tanggal</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Actions: activate to sort column ascending"
                                                style="width: 77px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pelayanan as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->kode_sa}}</td>
                                            <td>{{$item->kendaraan->nama_kendaraan}}</td>
                                            <td>{{$item->customer_bengkel->nama_customer}}</td>
                                            <td>-</td>
                                            <td>{{$item->mekanik->nama_pegawai}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>
                                                @if ($item->status == 'menunggu')
                                                <span class="badge badge-danger"> Menunggu </span>
                                                @else
                                                <span class="badge badge-success"> Dikerjakan </span>
                                                @endif



                                            </td>
                                            <td>

                                                <a href="" class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Detail">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @if ($item->status == 'menunggu')

                                                <a href="" class="btn btn-success btn-datatable" data-placement="top"
                                                    title="" data-original-title="Kerjakan" data-toggle="modal"
                                                    data-target="#Modaltambah-{{ $item->id_service_advisor }}">
                                                    <i class="fa fa-tools"></i>
                                                </a>
                                                <a href="" class="btn btn-primary btn-datatable" data-toggle="tooltip"
                                                    data-placement="top" title="" data-original-title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="" class="btn btn-danger btn-datatable" type="button"
                                                    data-toggle="modal" data-original-title="Hapus"
                                                    data-target="#Modalhapus-">
                                                    <i class="fas fa-trash"></i>
                                                </a>
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

    @forelse ($pelayanan as $item)
    {{-- MODAL Tambah -------------------------------------------------------------------------------------------}}
    <div class="modal fade" id="Modaltambah-{{ $item->id_service_advisor }}" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kendaraan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('abc',$item->id_service_advisor) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label class="small mb-1">Pilih Pitstop</label>
                        <hr>
                        </hr>
                        <div class="form-group col-12">
                            <label class="small mb-1" for="pitstop">Pitstop</label>
                            <select class="form-control" name="pitstop">
                                <option value="" holder>Pilih Pitstop</option>
                                @foreach ($pitstop as $item)
                                <option value="{{ $item->id_pitstop }}">
                                    {{ $item->nama_pitstop }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="Submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @empty

    @endforelse

</main>


@endsection
