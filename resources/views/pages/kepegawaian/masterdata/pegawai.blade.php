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
                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#tambahpegawai">Tambah Data Pegawai</button>
                    </div>
                </div>
                    <div class="card-body">
                        <div class="datatable">
                            {{-- SHOW ENTRIES --}}
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="dataTable_length">
                                <label>Show 
                                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">5</option>
                                        <option value="25">10</option>
                                        <option value="50">25</option>
                                        <option value="100">50</option>
                                    </select> entries
                                </label>
                            </div>
                        </div>
                <div class="row"><div class="col-sm-12">
                    <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 10px;">No</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">NIP</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 200px;">Nama Pegawai</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 100px;">Nama Panggilan</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 90px;">Jabatan</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 60px;">Jenis Kelamin</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 90px;">No Telephone</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 100px;">Actions</th></tr>
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
                                    <button class="btn btn-secondary btn-datatable "><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-primary btn-datatable"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-datatable "><i class="fas fa-trash"></i></i></button>
                                </td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">2</td>
                                <td>1990299182</td>
                                <td>I Putu Adi Merta Pratama</td>
                                <td>Adim</td>
                                <td>Pegawai</td>
                                <td>Laki-Laki</td>
                                <td>081246602400</td>
                                <td>
                                    <button class="btn btn-secondary btn-datatable "><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-primary btn-datatable"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-datatable "><i class="fas fa-trash"></i></i></button>
                                </td>
                            </tr><tr role="row" class="odd">
                                <td class="sorting_1">3</td>
                                <td>1990299182</td>
                                <td>I Putu Adi Merta Pratama</td>
                                <td>Adim</td>
                                <td>Pegawai</td>
                                <td>Laki-Laki</td>
                                <td>081246602400</td>
                                <td>
                                    <button class="btn btn-secondary btn-datatable "><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-primary btn-datatable"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-datatable "><i class="fas fa-trash"></i></i></button>
                                </td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">4</td>
                                <td>1990299182</td>
                                <td>I Putu Adi Merta Pratama</td>
                                <td>Adim</td>
                                <td>Pegawai</td>
                                <td>Laki-Laki</td>
                                <td>081246602400</td>
                                <td>
                                    <button class="btn btn-secondary btn-datatable "><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-primary btn-datatable"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-datatable "><i class="fas fa-trash"></i></i></button>
                                </td>
                            </tr><tr role="row" class="odd">
                                <td class="sorting_1">5</td>
                                <td>1990299182</td>
                                <td>I Putu Adi Merta Pratama</td>
                                <td>Adim</td>
                                <td>Pegawai</td>
                                <td>Laki-Laki</td>
                                <td>081246602400</td>
                                <td>
                                    <button class="btn btn-secondary btn-datatable "><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-primary btn-datatable"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-datatable "><i class="fas fa-trash"></i></i></button>
                                </td>
                            </tr><tr role="row" class="even">
                                <td class="sorting_1">6</td>
                                <td>1990299182</td>
                                <td>I Putu Adi Merta Pratama</td>
                                <td>Adim</td>
                                <td>Pegawai</td>
                                <td>Laki-Laki</td>
                                <td>081246602400</td>
                                <td>
                                    <button class="btn btn-secondary btn-datatable "><i class="fas fa-eye"></i></button>
                                    <button class="btn btn-primary btn-datatable"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-danger btn-datatable "><i class="fas fa-trash"></i></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 10 entries</div></div>
                        <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="dataTable_previous">
                                <a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
                    
  {{-- MODAL TAMBAH PEGAWAI --}}
  <div class="modal fade" id="tambahpegawai" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="tambahpegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahpegawai">Tambah Pegawai Bengkel</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form>
                        <h6>Lengkapi Data Berikut</h6>
                    <hr></hr>
                    <!-- Form Group (username)-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputUsername">Nama Lengkap Pegawai</label>
                            <input class="form-control" id="inputUsername" type="text" placeholder="Masukan Nama Lengkap" >
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputLastName">Nomor Induk Pegawai</label>
                            <input class="form-control" id="inputLastName" type="text" placeholder="NIP Pegawai" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputLastName">Jabatan</label>
                            <select class="form-control">
                                <option>Default select</option>
                            </select>
                        </div>
                    </div>
                    <!-- Form Row-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputFirstName">Nama Panggilan</label>
                            <input class="form-control" id="inputFirstName" type="text" placeholder="Masukan Nama Panggilan" >
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputOrgName">Tempat Lahir</label>
                            <input class="form-control" id="inputOrgName" type="text" placeholder="Masukan Tempat Lahir" >
                        </div>
                       
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputLocation">Tanggal Lahir</label>
                            <input class="form-control" id="inputLocation" type="text" placeholder="Masukan Tanggal Lahir" >
                        </div>
                    </div>
                    <!-- Form Row        -->
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputOrgName">Jenis Kelamin</label>
                            <select class="form-control">
                                <option>Default select</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputLocation">Agama</label>
                            <select class="form-control">
                                <option>Default select</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputLocation">No Telephone</label>
                            <input class="form-control" id="inputLocation" type="text" placeholder="No Telephone Pegawai" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputOrgName">Status Perkawinan</label>
                            <select class="form-control">
                                <option>Default select</option>
                            </select>
                        </div>
                       
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputLocation">Golongan Darah</label>
                            <select class="form-control">
                                <option>Default select</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputLocation">Jumlah Tanggungan</label>
                            <input class="form-control" id="inputLocation" type="text" placeholder="Jumlah Tanggungan Pegawai" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Email address</label>
                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Masukan Email Pegawai" >
                    </div>
                    <!-- Form Row-->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="inputPhone">Kota Asal</label>
                            <select class="form-control">
                                <option>Default select</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="inputPhone">Pendidikan Terakhir</label>
                            <input class="form-control" id="inputPhone" type="tel" placeholder="Pendidikan Terakhir Pegawai" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputEmailAddress">Alamat Lengkap</label>
                        <input class="form-control" id="inputEmailAddress" type="email" placeholder="Alamat Pegawai" >
                    </div>
                    <hr></hr>
                        <h6>Set Username dan Password</h6>
                    <hr></hr>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputFirstName">Username Pegawai</label>
                            <input class="form-control" id="inputFirstName" type="text" placeholder="Masukan Username" >
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="inputOrgName">Password Pegawai</label>
                            <input class="form-control" id="inputOrgName" type="text" placeholder="Masukan Password Pegawai" >
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Tambah</button></div>
        </div>
    </div>
</main>
        
        
@endsection