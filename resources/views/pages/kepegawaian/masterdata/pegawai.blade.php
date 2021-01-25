@extends('layouts.Admin.adminpegawai')

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
                            Master Data Pegawai
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
</main>
{{-- MAIN PAGE CONTENT --}}

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card card-header-actions">
            <div class="card-header">List Pegawai
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahpegawai">Tambah
                    Data Pegawai</button>
            </div>
        </div>
        <div class="card-body">
            <div class="datatable">
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
                                            aria-label="Name: activate to sort column descending" style="width: 10px;">
                                            No</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 100px;">NIP</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 200px;">Nama Pegawai</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 100px;">Nama Panggilan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 90px;">Jabatan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 60px;">Jenis Kelamin</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 90px;">No Telephone</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            style="width: 100px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">1</td>
                                        <td>1990299182</td>
                                        <td>I Putu Adi Merta Pratama</td>
                                        <td>Adim</td>
                                        <td>Pegawai</td>
                                        <td>Laki-Laki</td>
                                        <td>081246602400</td>
                                        <td>
                                            <button class="btn btn-secondary btn-datatable "><i
                                                    class="fas fa-eye"></i></button>
                                            <button class="btn btn-primary btn-datatable"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-datatable "><i
                                                    class="fas fa-trash"></i></i></button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">2</td>
                                        <td>1990299182</td>
                                        <td>I Putu Adi Merta Pratama</td>
                                        <td>Adim</td>
                                        <td>Pegawai</td>
                                        <td>Laki-Laki</td>
                                        <td>081246602400</td>
                                        <td>
                                            <button class="btn btn-secondary btn-datatable "><i
                                                    class="fas fa-eye"></i></button>
                                            <button class="btn btn-primary btn-datatable"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-datatable "><i
                                                    class="fas fa-trash"></i></i></button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">3</td>
                                        <td>1990299182</td>
                                        <td>I Putu Adi Merta Pratama</td>
                                        <td>Adim</td>
                                        <td>Pegawai</td>
                                        <td>Laki-Laki</td>
                                        <td>081246602400</td>
                                        <td>
                                            <button class="btn btn-secondary btn-datatable "><i
                                                    class="fas fa-eye"></i></button>
                                            <button class="btn btn-primary btn-datatable"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-datatable "><i
                                                    class="fas fa-trash"></i></i></button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">4</td>
                                        <td>1990299182</td>
                                        <td>I Putu Adi Merta Pratama</td>
                                        <td>Adim</td>
                                        <td>Pegawai</td>
                                        <td>Laki-Laki</td>
                                        <td>081246602400</td>
                                        <td>
                                            <button class="btn btn-secondary btn-datatable "><i
                                                    class="fas fa-eye"></i></button>
                                            <button class="btn btn-primary btn-datatable"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-datatable "><i
                                                    class="fas fa-trash"></i></i></button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">5</td>
                                        <td>1990299182</td>
                                        <td>I Putu Adi Merta Pratama</td>
                                        <td>Adim</td>
                                        <td>Pegawai</td>
                                        <td>Laki-Laki</td>
                                        <td>081246602400</td>
                                        <td>
                                            <button class="btn btn-secondary btn-datatable "><i
                                                    class="fas fa-eye"></i></button>
                                            <button class="btn btn-primary btn-datatable"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-datatable "><i
                                                    class="fas fa-trash"></i></i></button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td class="sorting_1">6</td>
                                        <td>1990299182</td>
                                        <td>I Putu Adi Merta Pratama</td>
                                        <td>Adim</td>
                                        <td>Pegawai</td>
                                        <td>Laki-Laki</td>
                                        <td>081246602400</td>
                                        <td>
                                            <button class="btn btn-secondary btn-datatable "><i
                                                    class="fas fa-eye"></i></button>
                                            <button class="btn btn-primary btn-datatable"><i
                                                    class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-datatable "><i
                                                    class="fas fa-trash"></i></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
