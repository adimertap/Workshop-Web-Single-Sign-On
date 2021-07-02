@extends('layouts.Admin.adminservice')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="users"></i></div>
                            Pengerjaan Service
                        </h1>
                        <div class="page-header-subtitle">Data perngerjaan service yang berlangsung di bengkel</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- MAIN PAGE CONTENT --}}

    <div class="container-fluid mt-n10">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header">List Service
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
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">Kode SPK</th>
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
                                        @forelse ($pengerjaan as $item)
                                        @if ($item->status == 'dikerjakan' || $item->status == 'selesai_service')
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->kode_sa}}</td>
                                            <td>{{$item->kendaraan->nama_kendaraan}}</td>
                                            <td>{{$item->customer_bengkel->nama_customer}}</td>
                                            <td>{{ $item->pitstop? $item->pitstop->nama_pitstop:"-" }}</td>
                                            <td>{{$item->mekanik->nama_pegawai}}</td>
                                            <td>{{$item->date}}</td>
                                            <td>
                                                @if ($item->status == 'dikerjakan')
                                                <span class="badge badge-primary"> Dikerjakan </span>
                                                @elseif ($item->status == 'selesai_service')
                                                <span class="badge badge-success"> Selesai Service </span>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="" class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                    data-placement="top" data-original-title="Detail">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                @if ($item->status == 'dikerjakan')
                                                <a href="" class="btn btn-primary btn-datatable ml-1"
                                                    data-toggle="tooltip" data-placement="top"
                                                    data-original-title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a data-target="#ModalSelesai-{{ $item->id_service_advisor }}"
                                                    data-toggle="modal" class="btn btn-success btn-sm mt-1 px-4"
                                                    type="button" style="color: white">
                                                    Selesai
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endif

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

    @forelse ($pengerjaan as $item)
    <div class="modal fade" id="ModalSelesai-{{ $item->id_service_advisor }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success-soft">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Selesai Service</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <form action="{{ route('pengerjaanservice.update', $item->id_service_advisor) }}" method="POST"
                    class="d-inline">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">Selesaikan service  {{ $item->kode_sa }} ?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-success" type="submit">Ya! Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @empty

    @endforelse
</main>


@endsection
