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
                    <span class="font-weight-500 text-primary">{{ $today }}</span>
                    · Tanggal {{ $tanggal }} · <span id="clock">12:16 PM</span>
                </div>
            </div>
            <div class="small">
                <i class="fa fa-cogs" aria-hidden="true"></i>
                Bengkel
                <span class="font-weight-500 text-primary">{{ Auth::user()->bengkel->nama_bengkel}}</span>
                <hr>
                </hr>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card card-header-actions">
                <div class="card-header ">List Penggajian
                    <a href="" class="btn btn-sm btn-primary" type="button" data-toggle="modal"
                        data-target="#Modaltambah">
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
                    @if(session('messagebayar'))
                    <div class="alert alert-success" role="alert"> <i class="fas fa-check"></i>
                        {{ session('messagebayar') }}
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
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 20px;">
                                                No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 20px;">Tahun</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending"
                                                style="width: 40px;">Bulan</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 100px;">Total Gaji</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Office: activate to sort column ascending"
                                                style="width: 100px;">Total Tunjangan</th>
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
                                            <td>Rp. {{ number_format($item->grand_total_gaji,2,',','.') }}</td>
                                            <td>Rp. {{ number_format($item->grand_total_tunjangan,2,',','.') }}</td>
                                            <td> @if($item->status_diterima == 'Belum Dibayarkan')
                                                <span class="badge badge-danger">
                                                    @elseif($item->status_diterima == 'Dibayarkan')
                                                    <span class="badge badge-success">
                                                        @else
                                                        <span>
                                                            @endif
                                                            {{ $item->status_diterima }}
                                                        </span>
                                            <td>
                                                @if($item->status_diterima == 'Belum Dibayarkan' and $item->status_dana == 'Dana Telah Diberikan')
                                                    <a href="" class="btn btn-success btn-datatable" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modalbayar-{{ $item->id_gaji_pegawai }}">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                    <a href="{{ route('cetak-slip-gaji', $item->id_gaji_pegawai) }}" target="_blank" class="btn btn-teal btn-datatable" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Cetak Slip">
                                                        <i class="fas fa-print"></i></i>
                                                    </a>
                                                    <a href="{{ route('gaji-pegawai.show', $item->id_gaji_pegawai) }}"
                                                        class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Detail Slip">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('gaji-pegawai-edit', $item->id_gaji_pegawai) }}" class="btn btn-primary btn-datatable" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Edit Slip">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-datatable" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modalhapus-{{ $item->id_gaji_pegawai }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                @elseif ($item->status_diterima == 'Belum Dibayarkan' and
                                                $item->status_dana =='Dana Belum Cair')
                                                    <a href="{{ route('cetak-slip-gaji', $item->id_gaji_pegawai) }}" target="_blank" class="btn btn-teal btn-datatable" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Cetak Slip">
                                                        <i class="fas fa-print"></i></i>
                                                    </a>
                                                    <a href="{{ route('gaji-pegawai.show', $item->id_gaji_pegawai) }}"
                                                        class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Detail Slip">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('gaji-pegawai-edit', $item->id_gaji_pegawai) }}" class="btn btn-primary btn-datatable" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Edit Slip">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-datatable" type="button"
                                                        data-toggle="modal"
                                                        data-target="#Modalhapus-{{ $item->id_gaji_pegawai }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                @elseif ($item->status_diterima == 'Dibayarkan' and $item->status_dana == 'Dana Telah Diberikan')
                                                    <a href="{{ route('cetak-slip-gaji', $item->id_gaji_pegawai) }}" target="_blank" class="btn btn-teal btn-datatable" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Cetak Slip">
                                                        <i class="fas fa-print"></i></i>
                                                    </a>
                                                    <a href="{{ route('gaji-pegawai.show', $item->id_gaji_pegawai) }}"
                                                        class="btn btn-secondary btn-datatable" data-toggle="tooltip"
                                                        data-placement="top" title="" data-original-title="Detail Slip">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                
                                                @else
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
</main>

{{-- MODAL TAMBAH --}}
<div class="modal fade" id="Modaltambah" tabindex="-1" role="dialog" data-backdrop="static"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
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
                    <div class="alert alert-danger" id="alertdatakosong" role="alert" style="display:none"><i class="far fa-times-circle"></i>
                        <span class="small">Error! Terdapat Data yang Masih Kosong!</span> 
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
                    <div class="form-group">
                        <label class="small mb-1 mr-1" for="id_jenis_transaksi">Pilih Jenis
                            Transaksi</label><span class="mr-4 mb-3" style="color: red">*</span>
                        <div class="input-group input-group-joined">
                            <div class="input-group-append">
                                <a href="" class="btn btn-sm btn-secondary" type="button" data-toggle="modal"
                                    data-target="#Modaltransaksi">
                                    Tambah
                                </a>
                            </div>
                            <select class="form-control" name="id_jenis_transaksi" id="id_jenis_transaksi"
                                class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                <option>Pilih Jenis Transaksi</option>
                                @foreach ($jenis_transaksi as $transaksi)
                                <option value="{{ $transaksi->id_jenis_transaksi }}">
                                    {{ $transaksi->nama_transaksi }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_jenis_transaksi')<div class="text-danger small mb-1">{{ $message }}
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

@forelse ($gaji as $item)
<div class="modal fade" id="Modalbayar-{{ $item->id_gaji_pegawai }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Pembayaran Gaji Pegawai</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('gaji-pegawai-status', $item->id_gaji_pegawai) }}?status=Dibayarkan" method="POST"
                class="d-inline">
                @csrf
                <div class="modal-body text-center">Apakah Anda Yakin untuk Melakukan Pembayaran Gaji Pegawai bulan
                    {{ $item->bulan_gaji }}, tahun {{ $item->tahun_gaji }} Sebesar Rp.
                    {{ number_format($item->grand_total_gaji,2,',','.') }} ?</div>
                <div class="modal-footer ">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@empty
@endforelse

@forelse ($gaji as $item)
<div class="modal fade" id="Modalhapus-{{ $item->id_gaji_pegawai }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger-soft">
                <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi Hapus Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('gaji-pegawai.destroy', $item->id_gaji_pegawai) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <div class="modal-body text-center">Apakah Anda Yakin Menghapus Data Pembayaran Gaji Pegawai bulan
                    {{ $item->bulan_gaji }}, tahun {{ $item->tahun_gaji }}?</div>
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

<div class="modal fade" id="Modaltransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data Jenis Transaksi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span></button>
            </div>
            <form action="{{ route('jenis-transaksi.store') }}" method="POST" class="d-inline">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="small mb-1" for="nama_transaksi">Jenis Transaksi</label>
                        <textarea class="form-control" name="nama_transaksi" type="text" id="nama_transaksi"
                            placeholder="Input Jenis Transaksi" value="{{ old('nama_transaksi') }}"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                    <button class="btn btn-success" type="submit">Ya! Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    function submit1() {
        var _token = $('#form1').find('input[name="_token"]').val()
        var bulan_gaji = $('#bulan_gaji').val()
        var tahun_gaji = $('#tahun_gaji').val()
        var id_jenis_transaksi = $('#id_jenis_transaksi').val()

        var data = {
            _token: _token,
            bulan_gaji: bulan_gaji,
            tahun_gaji: tahun_gaji,
            id_jenis_transaksi: id_jenis_transaksi
        }

        if (tahun_gaji == 0 | tahun_gaji == '' | bulan_gaji == 0 | bulan_gaji ==
            'Pilih Bulan Gaji' | id_jenis_transaksi == 0 | id_jenis_transaksi == '' | id_jenis_transaksi == 'Pilih Jenis Transaksi') {
            $('#alertdatakosong').show()
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
                    alert(error.responseJSON.message)
                }
            });
        }
    }    

    setInterval(displayclock, 500);

    function displayclock() {
        var time = new Date()
        var hrs = time.getHours()
        var min = time.getMinutes()
        var sec = time.getSeconds()
        var en = 'AM';

        if (hrs > 12) {
            en = 'PM'
        }

        if (hrs > 12) {
            hrs = hrs - 12;
        }

        if (hrs == 0) {
            hrs = 12;
        }

        if (hrs < 10) {
            hrs = '0' + hrs;
        }

        if (min < 10) {
            min = '0' + min;
        }

        if (sec < 10) {
            sec = '0' + sec;
        }

        document.getElementById('clock').innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
    }

</script>

@endsection
