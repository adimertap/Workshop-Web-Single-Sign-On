@extends('layouts.Admin.adminaccounting')

@section('content')
{{-- HEADER --}}
<main>
    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
        <div class="container">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon" style="color: white"><i class="fas fa-hand-holding-usd"></i>
                            </div>
                            <div class="page-header-subtitle" style="color: white">Tambah Data Pembayaran Pajak Gaji
                            </div>
                        </h1>
                        <div class="small">
                            <span class="font-weight-500">Pajak</span>
                            · Tambah · Data · Gaji
                        </div>
                    </div>
                    <div class="col-12 col-xl-auto">
                        <a href="{{ route('pajak.index') }}" class="btn btn-sm btn-light text-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger" id="alertpajakkosong" role="alert" style="display:none"> <i
                    class="fas fa-times"></i>
                Error! Terdapat Data Kosong!
                <button class="close" type="button" onclick="$(this).parent().hide()" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    </header>

    <div class="container mt-n10">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header ">Formulir Pajak
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pajak-pegawai', $pajak->id_pajak) }}" id="form1" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="kode_pajak">Kode Pajak</label>
                                    <input class="form-control" id="kode_pajak" type="text" name="kode_pajak"
                                        placeholder="Input Kode Pajak" value="{{ $pajak->kode_pajak }}" readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="status_jurnal">Status Jurnal</label>
                                    <input class="form-control" id="status_jurnal" type="text" name="status_jurnal"
                                        value="Pending" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="id_pegawai">Pegawai</label>
                                    <input class="form-control" id="id_pegawai" type="text" name="id_pegawai"
                                        placeholder="Input Kode Receiving" value="{{ Auth::user()->pegawai->nama_pegawai }}"
                                        readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1 mr-1" for="id_jenis_transaksi">Pilih Jenis
                                        Transaksi</label><span class="mr-4 mb-3" style="color: red">*</span>
    
                                    <select class="form-control" name="id_jenis_transaksi" id="id_jenis_transaksi"
                                        class="form-control @error('id_jenis_transaksi') is-invalid @enderror">
                                        <option value="{{ $pajak->Jenistransaksi->id_jenis_transaksi }}">
                                            {{ $pajak->Jenistransaksi->nama_transaksi }}</option>
                                        @foreach ($jenis_transaksi as $item)
                                        <option value="{{ $item->id_jenis_transaksi }}">{{ $item->nama_transaksi }}
                                        </option>
                                        @endforeach
                                    </select>
    
                                </div>
                            </div>
                            
                            <div class="form-row">
                                
    
                                <div class="form-group col-md-6">
                                    <label class="small mb-1 mr-1" for="tanggal_bayar">Tanggal Pembayaran</label><span class="mr-4 mb-3" style="color: red">*</span>
                                    <input class="form-control" id="tanggal_bayar" type="date" name="tanggal_bayar"
                                        placeholder="Input Tanggal Receive" value="{{ $pajak->tanggal_bayar }}"
                                        class="form-control @error('tanggal_bayar') is-invalid @enderror" />
                                    @error('tanggal_bayar')<div class="text-danger small mb-1">{{ $message }}
                                    </div> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                                            <label class="small mb-1" for="total_pajak">Nominal Pajak</label>
                                        </div>
                                        <div class="col-12 col-lg-auto text-center text-lg-right">
                                            <div class="small text-lg-right">
                                                <span class="font-weight-500 text-primary">IDR: </span>
                                                <span id="detailnominalpajak">Rp.{{ number_format($pajak->Gaji->grand_total_pph21,2,',','.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group input-group-joined">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Rp.
                                            </span>
                                        </div>
                                        <input class="form-control" id="total_pajak" type="number" name="total_pajak"
                                            placeholder="Input Nominal Pajak" value="{{ $pajak->Gaji->grand_total_pph21 }}">
                                    </div>
                                </div>
                                
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="deskripsi_pajak">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi_pajak" type="text" name="deskripsi_pajak"
                                    placeholder="Deskripsi Pembayaran"
                                    class="form-control @error('deskripsi_pajak') is-invalid @enderror">{{ $pajak->deskripsi_pajak }}</textarea>
                                @error('deskripsi_pajak')<div class="text-danger small mb-1">{{ $message }}
                                </div> @enderror
                            </div>
                            
                           
                            <div class="form-group text-right">
                                <hr>
                                <a href="{{ route('pajak.index') }}" class="btn btn-sm btn-light">Kembali</a>
                                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
                            </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card card-header-actions">
                        <div class="card-header ">Detail Pajak Pegawai
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pajak.store') }}" id="form1" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="tahun_gaji">Tahun Gaji</label>
                                    <input class="form-control" id="tahun_gaji" type="text" name="tahun_gaji"
                                        placeholder="Input Kode Pajak" value="{{ $pajak->Gaji->tahun_gaji }}"
                                        readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" for="bulan_gaji" >Bulan Gaji</label>
                                    <input class="form-control" id="bulan_gaji" type="text" name="bulan_gaji"
                                        value="{{ $pajak->Gaji->bulan_gaji }}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" >Status Dana</label>
                                    <input class="form-control"  type="text"
                                        placeholder="Input Kode Receiving" value="{{ $pajak->Gaji->status_dana }}"
                                        readonly />
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="small mb-1" >Status Jurnal</label>
                                    <input class="form-control"  type="text" 
                                        placeholder="Input Kode Receiving" value="{{ $pajak->Gaji->status_jurnal }}"
                                        readonly />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" >Jenis Transaksi</label>
                                <input class="form-control"  type="text"
                                    placeholder="Input Kode Receiving"
                                    value="{{ $pajak->Gaji->Jenistransaksi->nama_transaksi }}" readonly />
                            </div>


                            <div class="form-group">
                                <label class="small mb-1" >Deskripsi</label>
                                <textarea class="form-control"  type="text" 
                                    placeholder="Deskripsi Pembayaran" readonly>{{ $pajak->Gaji->keterangan }}</textarea>
                               
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
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
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" 
                    type="submit">Ya Sudah!</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#nilai_pajak').on('input', function () {
            var nominal = $(this).val()
            var nominal_fix = new Intl.NumberFormat('id', {
                style: 'currency',
                currency: 'IDR'
            }).format(nominal)

            $('#detailnominalpajak').html(nominal_fix);
        })

      

    });

</script>

@endsection
