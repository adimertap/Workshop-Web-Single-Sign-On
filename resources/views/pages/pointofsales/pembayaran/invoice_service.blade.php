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
                        <div class="h2 text-white mb-0">{{ $pembayaran_service->kode_penjualan }}</div>
                        Bengkel
                    </div>
                    <div class="col-12 col-lg-auto text-center text-lg-right">
                        <!-- Invoice details-->
                        <div class="h3 text-white">Invoice</div>
                        {{ $pembayaran_service->tanggal }}
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
                                    <th scope="col" colspan="10">List Sparepart</th>
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
                                        <div class="h5 mb-0 font-weight-700">Rp. </div>

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
</main>

@endsection
