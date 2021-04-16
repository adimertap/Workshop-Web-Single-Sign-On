@extends('layouts.Admin.adminpayroll')

@section('content')
{{-- HEADER --}}
<main>
    <div class="container mt-5">
        <!-- Custom page header alternative example-->
        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
            <div class="mr-4 mb-3 mb-sm-0">
                <h1 class="mb-0">Penggajian Pegawai</h1>
                <div class="small">
                    <span class="font-weight-500 text-primary">Friday</span>
                    · September 20, 2020 · 12:16 PM
                </div>
            </div>
            <div class="small">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                Bengkel
                <span class="font-weight-500 text-primary">Adi Jaya</span>
                <hr>
                </hr>
            </div>
        </div>
    </div>
</main>

<div class="container-fluid">
    <div class="card mb-4">
        <div class="card card-header-actions">
            <div class="card-header ">List Penggajian
                <a href="" class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#Modaltambah">
                    Tambah Data Gaji
                </a>
            </div>
        </div>
        <div class="card-body ">
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

                {{-- TABLE --}}
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
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 20px;">Tahun</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 40px;">Bulan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 130px;">Nama Pegawai</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 50px;">Jabatan</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 100px;">Gaji diterima</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 50px;">Status diterima</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                            colspan="1" aria-label="Actions: activate to sort column ascending"
                                            style="width: 150px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($gaji as $item)
                                    <tr role="row" class="odd">
                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}</th>
                                        <td>{{ $item->tahun_gaji }}</td>
                                        <td>{{ $item->bulan_gaji}}</td>
                                        <td>{{ $item->Pegawai->nama_pegawai }}</td>
                                        <td>{{ $item->Pegawai->Jabatan->nama_jabatan }}</td>
                                        <td>{{ $item->bulan_gaji }}</td>
                                        <td>{{ $item->bulan_gaji }}</td>
                                        <td>
                                            Tes
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

{{-- MODAL TAMBAH --}}
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" data-backdrop="static"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Gaji Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('gaji-pegawai.store') }}" method="POST" id="form1" class="d-inline">
                @csrf
                <div class="modal-body">
                    <label class="small mb-1">Isikan Form Dibawah Ini</label>
                        <div class="alert alert-danger" id="alertdatakosong" role="alert" style="display:none"> <i
                            class="fas fa-times"></i>
                        Error! Terdapat Data yang Masih Kosong!
                        <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <hr>
                    </hr>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="tahun_gaji">Tahun Bayar</label>
                            <input class="form-control" id="tahun_gaji" type="input" name="tanggal_rcv"
                                value="{{ $tahun_bayar }}"
                                class="form-control @error('tahun_gaji') is-invalid @enderror" />
                            @error('tahun_gaji')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="small mb-1" for="bulan_gaji">Bulan</label>
                            <select name="bulan_gaji" id="bulan_gaji" class="form-control"
                                class="form-control @error('bulan_gaji') is-invalid @enderror">
                                <option value="{{ old('bulan_gaji')}}">Pilih Bulan Gaji</option>
                                <option value="Januari">Januari</option>
                                <option value="Februari">Februari</option>
                                <option value="Maret">Maret</option>
                                <option value="April">April</option>
                                <option value="Mei">Mei</option>
                                <option value="Juni">Juni</option>
                                <option value="Juli">Juli</option>
                                <option value="Agustus">Agustus</option>
                                <option value="September">September</option>
                                <option value="Oktober">Oktober</option>
                                <option value="November">November</option>
                                <option value="Desember">Desember</option>
                            </select>
                            @error('bulan_gaji')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label class="small mb-1" for="nama_pegawai">Pilih Pegawai</label>
                            <div class="input-group input-group-joined">
                                <input class="form-control" type="text" placeholder="Pilih Pegawai" aria-label="Search"
                                    id="detailpegawai">
                                <div class="input-group-append">
                                    <a href="" class="input-group-text" type="button" data-toggle="modal"
                                        data-target="#Modalpegawai">
                                        <i class="fas fa-folder-open"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="small mb-1" for="id_jabatan">Jabatan</label>
                            <input class="form-control" id="detailjabatan" type="text" name="id_jabatan" placeholder=""
                                value="{{ old('id_jabatan') }}"
                                class="form-control @error('id_jabatan') is-invalid @enderror" readonly />
                            @error('id_jabatan')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="small mb-1" for="id_gaji_pokok">Gaji Pokok</label>
                            <input class="form-control" id="detailgajipokok" type="text" name="id_gaji_pokok"
                                placeholder="" value="{{ old('id_gaji_pokok') }}"
                                class="form-control @error('id_gaji_pokok') is-invalid @enderror" readonly />
                            @error('id_gaji_pokok')<div class="text-danger small mb-1">{{ $message }}
                            </div> @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" onclick="submit1()" type="button">Selanjutnya!</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="Modalpegawai" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title">Pilih Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="border-bottom">
                            <tr class="small text-uppercase text-muted">
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Gaji Pokok</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pegawai as $item)
                            <tr id="item-{{ $item->id_pegawai }}" class="border-bottom">
                                <td>
                                    <div class="font-weight-bold nama_pegawai">{{ $item->nama_pegawai }}</div>
                                </td>
                                <td>
                                    <div class="small text-muted d-none d-md-block nama_jabatan">{{ $item->jabatan->nama_jabatan }}</div>
                                </td>
                                <td>
                                    @if ($item->jabatan->gajipokok == '')
                                    <div class="small text-muted d-none d-md-block">Tidak ada data
                                        <a href="{{ route('gaji-pokok.index') }}"
                                            class="btn btn-light btn-sm btn-datatable" type="button">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                    @else
                                    <div class="small text-muted d-none d-md-block gaji_pokok">Rp.{{ number_format($item->jabatan->gajipokok->besaran_gaji,2,',','.') }}</div>
                                    @endif

                                </td>
                                <td>
                                    <button class="btn btn-success btn-sm btn-datatable"
                                        onclick="tambahpo(event, {{ $item->id_pegawai }})" type="button"
                                        data-dismiss="modal">Tambah
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="tex-center">
                                    Tidak ada Data Pegawai
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
</main>

<script>
    function tambahpo(event, id_pegawai) {
        var data = $('#item-' + id_pegawai)
        var _token = $('#form1').find('input[name="_token"]').val()
        var nama_pegawai = $(data.find('.nama_pegawai')[0]).text()
        var nama_jabatan = $(data.find('.nama_jabatan')[0]).text()
        var gaji_pokok = $(data.find('.gaji_pokok')[0]).text()

        $('#detailpegawai').val(nama_pegawai)
        $('#detailjabatan').val(nama_jabatan)
        $('#detailgajipokok').val(gaji_pokok)
    }

    function submit1() {
        var _token = $('#form1').find('input[name="_token"]').val()
        var bulan_gaji = $('#bulan_gaji').val()
        var tahun_gaji = $('#tahun_gaji').val()
        var nama_pegawai = $('#detailpegawai').val()
        var gaji_pokok = $('#detailgajipokok').val()

        var data = {
            _token: _token,
            bulan_gaji: bulan_gaji,
            tahun_gaji: tahun_gaji,
            nama_pegawai: nama_pegawai,
        }

        if (gaji_pokok == 0 | gaji_pokok == '' | bulan_gaji == 0 | bulan_gaji == '' | tahun_gaji == 0 | tahun_gaji == 'Pilih Bulan Gaji' | nama_pegawai == 0 | nama_pegawai == '') {
            var alert = $('#alertdatakosong').show()
        } else {

            $.ajax({
                method: 'post',
                url: "/payroll/gaji-pegawai",
                data: data,
                success: function (response) {
                    window.location.href = '/payroll/gaji-pegawai/' + response.id_gaji_pegawai + '/edit'
                },
                error: function (error) {
                    console.log(error)
                }

            });
        }

    }

</script>

@endsection
