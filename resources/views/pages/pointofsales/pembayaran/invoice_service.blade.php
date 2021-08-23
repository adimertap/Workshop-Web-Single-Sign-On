@extends('layouts.Admin.adminpointofsales')

@section('content')
{{-- HEADER --}}
<main>
    <!-- Main page content-->
    <div class="container mt-4">
        <!-- Invoice-->
        <div class="card invoice">
            <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                <div class="row justify-content-between align-items-center">
                    <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                        <!-- Invoice branding-->
                        <img class="invoice-brand-img rounded-circle mb-4" src="/image/services.png" style="color:"
                            lt="" />
                        <div class="h2 text-white mb-0">{{ $pembayaran_service->kode_sa }}</div>
                        Bengkel
                    </div>
                    <div class="col-12 col-lg-auto text-center text-lg-right">
                        <!-- Invoice details-->
                        <div class="h3 text-white">Invoice</div>
                        {{ $pembayaran_service->date }}
                    </div>
                </div>
            </div>
            <div class="card-body mt-3 mb-0 p-md-5">
                <!-- Invoice table-->
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <thead class="border-bottom">
                                <tr class="small text-uppercase text-muted">
                                    <th scope="col" colspan="10">List Jasa Perbaikan</th>
                                    <th class="text-right" scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Invoice item 1-->
                                @forelse ($pembayaran_service->detail_perbaikan as $item)
                                <tr class="border-bottom">
                                    <td colspan="10">
                                        <div class="font-weight-bold">{{ $item->nama_jenis_perbaikan }}</div>
                                    </td>
                                    <td class="text-right font-weight-bold">Rp.
                                        {{ number_format($item->pivot->total_harga,0,',','.') }}</td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0 mt-5">
                            <thead class="border-bottom">
                                <tr class="small text-uppercase text-muted">
                                    <th scope="col" colspan="10">List Sparepart</th>
                                    <th scope="col" colspan="10">Jumlah</th>
                                    <th class="text-right" scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Invoice item 1-->
                                @forelse ($pembayaran_service->detail_sparepart as $item)
                                <tr class="border-bottom">
                                    <td colspan="10">
                                        <div class="font-weight-bold">{{ $item->nama_sparepart }}</div>
                                    </td>
                                    <td colspan="10">
                                        <div class="font-weight-bold">{{ $item->pivot->jumlah }}</div>
                                    </td>
                                    <td class="text-right font-weight-bold">Rp.
                                        {{ number_format($item->pivot->total_harga,0,',','.') }}</td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-borderless center col-6 mt-3 mx-auto">
                            <thead>
                            <tbody>
                                <!-- Invoice subtotal-->
                                <tr>
                                    <td class="pb-0">
                                        <div class="text-uppercase small font-weight-700 text-muted">Subtotal:</div>
                                    </td>
                                    <td class="text-right pb-0">
                                        <div class="h5 mb-0 font-weight-700">Rp.
                                            {{ number_format($pembayaran_service->total_bayar,2,',','.') }}</div>

                                    </td>
                                    <td hidden=""><input type="text" class="nilai-subtotal2-td" name="subtotal"
                                            value="{{ $pembayaran_service->total_bayar }}"></td>
                                    <td hidden=""><input type="text" class="temp" name="temp"
                                            value="{{ $pembayaran_service->total_bayar }}"></td>
                                </tr>
                                <tr>
                                    <td class="pb-0">
                                        <span
                                            class="diskon-td text-uppercase small font-weight-700 text-muted">Diskon</span>
                                        <br>
                                        <a href="#" class="ubah-diskon-td text-uppercase small font-weight-300">Ubah
                                            diskon</a>
                                        <a href="#" class="simpan-diskon-td text-uppercase small font-weight-300"
                                            hidden="">Simpan</a>
                                    </td>
                                    <td class="text-right pb-0 d-flex justify-content-end mt-2">
                                        <input type="number" class="form-control diskon-input mr-2 col-4" min="0"
                                            max="100" name="diskon" value="0" hidden="" id="laporan_diskon">
                                        <span class="nilai-diskon-td mr-1 h5 mb-0 font-weight-700">0</span>
                                        <span class="h5 mb-0 font-weight-700">%</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pb-0">
                                        <span class="ppn-td text-uppercase small font-weight-700 text-muted">PPN</span>
                                        <br>
                                        <a href="#" class="ubah-ppn-td text-uppercase small font-weight-300">Ubah
                                            PPN</a>
                                        <a href="#" class="simpan-ppn-td text-uppercase small font-weight-300"
                                            hidden="">Simpan</a>
                                    </td>
                                    <td class="text-right pb-0 d-flex justify-content-end mt-2">
                                        <input type="number" class="form-control ppn-input mr-2 col-4" id="laporan_ppn"
                                            min="0" max="100" name="ppn" value="0" hidden="">
                                        <span class="nilai-ppn-td mr-1 h5 mb-0 font-weight-700">0</span>
                                        <span class="h5 mb-0 font-weight-700">%</span>
                                    </td>
                                </tr>
                                <!-- Invoice total-->
                                <tr>
                                    <td class="pb-0">
                                        <div class="text-uppercase small font-weight-700 text-muted">Total Tagihan:
                                        </div>
                                    </td>
                                    <td class="text-right pb-0">
                                        <div class="h5 mb-0 font-weight-700 text-green nilai-total1-td">Rp.
                                            {{ number_format($pembayaran_service->total_bayar,2,',','.') }}
                                        </div>
                                    </td>
                                    <td class="text-right pb-0" hidden=""><input type="text" class="nilai-total2-td"
                                            name="total" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="pb-0">
                                        <hr>
                                        <div class="text-uppercase small font-weight-700 mt-4">Nominal Bayar:
                                        </div>
                                    </td>
                                    <td>
                                        <hr>
                                        <div class="text-right pb-0 input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">Rp.</div>
                                            </div>
                                            <input type="text" onkeyup="validasi_bayar(this.value)" id="nominalBayar"
                                                class="form-control number-input input-notzero bayar-input" name="bayar"
                                                placeholder="Masukkan nominal bayar">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <table class="table table-borderless center mt-1 col-4 mx-auto">
                            <tr>
                                <td class="text-right">
                                    <button class="btn btn-bayar btn-outline-success btn-block" id="validasibayar"
                                        data-toggle="modal" data-target="#modal_success" style="display: none"
                                        type="button">Bayar Sekarang</button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <div class="card-footer p-4 p-lg-5 border-top-0">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Invoice - sent to info-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">To</div>
                        <div class="h6 mb-1">{{ $pembayaran_service->customer_bengkel->nama_customer }}</div>
                        <div class="small">{{ $pembayaran_service->customer_bengkel->alamat_customer }}</div>
                        <div class="small">{{ $pembayaran_service->customer_bengkel->nohp_customer }}</div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Invoice - sent from info-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">From</div>
                        <div class="h6 mb-0">{{ $pembayaran_service->bengkel->nama_bengkel }}</div>
                        <div class="small">{{ $pembayaran_service->bengkel->alamat_bengkel }}</div>
                        <div class="small">{{ $pembayaran_service->bengkel->nohp_bengkel }}</div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Invoice - additional notes-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                        <div class="small mb-0">Harap periksa Invoice {{ $pembayaran_service->kode_sa }} sebelum
                            melakukan pembayaran!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_success" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('pembayaranservice.store') }}" method="POST" id="form1">
                    @csrf
                    <div class="modal-body bg-grey">
                        <div class="row">
                            <div class="col-12 text-center mb-4">
                                <img src="{{ asset('gif/success4.gif') }}" style="width: 60%">
                                <h4 class="transaction-success-text">Transaksi Berhasil</h4>
                            </div>
                            <div class="col-12">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span class="d-block little-td">Kode Transaksi</span>
                                            <span id="laporan_kode_penjualan"
                                                class="d-block font-weight-bold">{{ $pembayaran_service->kode_sa }}</span>
                                        </td>
                                        <td>
                                            <span class="d-block little-td">Tanggal</span>
                                            <span id="laporan_tanggal"
                                                class="d-block font-weight-bold">{{ $pembayaran_service->date }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="d-block little-td">Kasir</span>
                                            <span id="laporan_kasir"
                                                class="d-block font-weight-bold">{{ Auth::user()->pegawai->nama_pegawai }}</span>
                                        </td>
                                        <td>
                                            <span class="d-block little-td">Total Tagihan</span>
                                            <div id="totalModal"
                                                class="h5 mb-0 font-weight-600 text-primary nilai-total-modal">Rp.
                                                {{ number_format($pembayaran_service->total_bayar,2,',','.') }}</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="d-block little-td">Total Diskon</span>
                                            <div id="totalDiskon"
                                                class="h5 mb-0 font-weight-600 text-primary nilai-total-modal"></div>
                                        </td>
                                        <td>
                                            <span class="d-block little-td">Total PPN</span>
                                            <div id="totalPPN"
                                                class="h5 mb-0 font-weight-600 text-primary nilai-total-modal"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="d-block little-td">Nominal Bayar</span>
                                            <div id="bayarModal"
                                                class="h5 mb-0 font-weight-400 text-green nilai-total-modal"> Rp.
                                                {{ number_format($pembayaran_service->total_bayar,2,',','.') }}</div>
                                        </td>
                                        <td>
                                            <span class="d-block little-td">Kembalian</span>
                                            <div id="kembaliModal"
                                                class="h5 mb-0 font-weight-400 text-danger nilai-total-modal"> Rp.
                                                {{ number_format($pembayaran_service->total_bayar,2,',','.') }}</div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-sm btn-primary"
                            onclick="tambah_invoice({{ $pembayaran_service->id_service_advisor }})">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main>

<script>
    function tambah_invoice(id_service_advisor) {
        var _token = $('#form1').find('input[name="_token"]').val()
        var kode = $('#laporan_kode_penjualan').html()
        var tanggal = $('#laporan_tanggal').html()
        var total_tagihan = $('#totalModal').html()
        var split_total_tagihan = total_tagihan.split('Rp.')[1].replace(',', '').replace(',', '')
            .trim()

        var total_diskon = $('#totalDiskon').html()
        var total_ppn = $('#totalPPN').html()
        var total_bayar = $('#bayarModal').html()
        var split_total_bayar = total_bayar.split('Rp.')[1].replace(',', '').replace(',', '')
            .trim()

        var total_kembalian = $('#kembaliModal').html()
        var split_total_kembalian = total_kembalian.split('Rp.')[1].replace(',', '').replace(',', '')
            .trim()
        
        console.log(split_total_tagihan, split_total_bayar, split_total_kembalian)

        // console.log(_token, kode, tanggal, total_tagihan, total_diskon, total_ppn, total_bayar, total_kembalian)


        var data = {
            _token: _token,
            kode_penjualan: kode,
            tanggal: tanggal,
            total_tagihan: split_total_tagihan,
            diskon: total_diskon,
            ppn: total_ppn,
            nominal_bayar: split_total_bayar,
            kembalian: split_total_kembalian
        }

        $.ajax({
            method: 'put',
            url: '/pos/pembayaranservice/' + id_service_advisor,
            data: data,
            success: function (response) {
                    window.location.href = '/pos/laporanservice/',
                    // console.log(response)
                    alert('Pembayaran telah berhasil')
            },
            error: function (error) {
                console.log(error)
            }

        });
    }

    function diskon() {
        var temp = parseInt($('input[name=temp]').val());
        var diskon = parseInt($('input[name=diskon]').val());
        var total = temp - (temp * diskon / 100);
        console.log(temp);
        console.log(diskon);
        console.log(total);

        // $('.nilai-total1-td').html('Rp. ' + parseInt(total).toLocaleString());
        $('.nilai-total1-td').html('Rp. ' + parseInt(total).toLocaleString());
        $('.temp').val(total);
        $('.nilai-total2-td').val(total);
    }

    function ppn() {
        var temp = parseInt($('input[name=temp]').val());
        var ppn = parseInt($('input[name=ppn]').val());
        var totalppn = temp + (temp * ppn / 100);
        console.log(temp);
        console.log(ppn);
        console.log(totalppn);
        $('.nilai-total1-td').html('Rp. ' + parseInt(totalppn).toLocaleString());
        $('.temp').val(totalppn);
        $('.nilai-total2-td').val(totalppn);
    }

    function validasi_bayar(nominal_bayar) {
        console.log(nominal_bayar);
        var total = $('.temp').val();
        console.log(total);
        if (nominal_bayar >= parseInt(total)) {
            console.log('boleh bayar')
            $('#validasibayar').show();
        } else {
            console.log('gaboleh')
            $('#validasibayar').hide();
        }
    }

    $(document).on('click', '#validasibayar', function (e) {
        var total = $('.temp').val();
        $('#totalModal').html('Rp. ' + parseInt(total).toLocaleString());
        var bayar = $('#nominalBayar').val();
        $('#bayarModal').html('Rp. ' + parseInt(bayar).toLocaleString());
        var kembali = parseInt(bayar) - parseInt(total);
        $('#kembaliModal').html('Rp. ' + parseInt(kembali).toLocaleString());
        var diskon = $('#laporan_diskon').val();
        $('#totalDiskon').html(diskon);
        var ppn = $('#laporan_ppn').val();
        $('#totalPPN').html(ppn);
    });

    $(document).on('click', '.ubah-diskon-td', function (e) {
        e.preventDefault();
        $('.diskon-input').prop('hidden', false);
        $('.nilai-diskon-td').prop('hidden', true);
        $('.simpan-diskon-td').prop('hidden', false);
        $(this).prop('hidden', true);
    });

    $(document).on('click', '.simpan-diskon-td', function (e) {
        e.preventDefault();
        $('.diskon-input').prop('hidden', true);
        $('.nilai-diskon-td').prop('hidden', false);
        $('.ubah-diskon-td').prop('hidden', false);
        $(this).prop('hidden', true);
        diskon();
    });

    $(document).on('input', '.diskon-input', function () {
        $('.nilai-diskon-td').html($(this).val());
        if ($(this).val().length > 0) {
            $(this).removeClass('is-invalid');
        } else {
            $(this).addClass('is-invalid');
        }
    });


    $(document).on('click', '.ubah-ppn-td', function (e) {
        e.preventDefault();
        $('.ppn-input').prop('hidden', false);
        $('.nilai-ppn-td').prop('hidden', true);
        $('.simpan-ppn-td').prop('hidden', false);
        $(this).prop('hidden', true);
    });

    $(document).on('click', '.simpan-ppn-td', function (e) {
        e.preventDefault();
        $('.ppn-input').prop('hidden', true);
        $('.nilai-ppn-td').prop('hidden', false);
        $('.ubah-ppn-td').prop('hidden', false);
        $(this).prop('hidden', true);
        ppn();
    });

    $(document).on('input', '.ppn-input', function () {
        $('.nilai-ppn-td').html($(this).val());
        if ($(this).val().length > 0) {
            $(this).removeClass('is-invalid');
        } else {
            $(this).addClass('is-invalid');
        }
    });

    $(document).on('input', '.bayar-input', function () {
        if ($(this).val().length > 0) {
            $(this).removeClass('is-invalid');
            $('.nominal-error').prop('hidden', true);
        } else {
            $(this).addClass('is-invalid');
        }
    });

    $(document).on('click', '.btn-bayar', function () {
        var total = parseInt($('.nilai-total2-td').val());
        var bayar = parseInt($('.bayar-input').val());
        if (bayar >= total) {
            $('.nominal-error').prop('hidden', true);
        } else {
            if (isNaN(bayar)) {
                $('.bayar-input').valid();
            } else {
                $('.nominal-error').prop('hidden', false);
            }
        }
    });

</script>

@endsection
