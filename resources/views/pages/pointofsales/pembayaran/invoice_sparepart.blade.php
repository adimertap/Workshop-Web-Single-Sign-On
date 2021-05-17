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
                        <div class="h2 text-white mb-0">{{ $pembayaran->kode_penjualan }}</div>
                        Bengkel
                    </div>
                    <div class="col-12 col-lg-auto text-center text-lg-right">
                        <!-- Invoice details-->
                        <div class="h3 text-white">Invoice</div>
                        {{ $pembayaran->tanggal }}
                    </div>
                </div>
            </div>
            <div class="card-body p-4 p-md-5">
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
                                @forelse ($pembayaran->Detailsparepart as $item)
                                <tr class="border-bottom">
                                    <td colspan="10">
                                        <div class="font-weight-bold">{{ $item->nama_sparepart }}</div>
                                    </td>
                                    <td class="text-right font-weight-bold">Rp.
                                        {{ number_format($item->pivot->total_harga,0,',','.') }}</td>
                                </tr>
                                @empty

                                @endforelse

                                <!-- Invoice subtotal-->
                                <tr>
                                    <td class="text-right pb-0" colspan="7">
                                        <div class="text-uppercase small font-weight-700 text-muted">Subtotal:</div>
                                    </td>
                                    <td class="text-right pb-0">
                                        <div class="h5 mb-0 font-weight-700">Rp.
                                            {{ number_format($pembayaran->total_bayar,2,',','.') }}</div>
                                    </td>
                                    </td>
                                </tr>
                                <!-- Invoice Discount column-->
                                <tr>
                                    <td class="text-right pb-0" colspan="7">
                                        <div class="text-uppercase small font-weight-700 text-muted">Diskon:</div>
                                    </td>
                                    <td class="text-right pb-0">
                                        <div class="h5 mb-0 font-weight-700">- Rp. 10.000,00</div>
                                    </td>
                                </tr>
                                <!-- Invoice tax column-->
                                <tr>
                                    <td class="text-right pb-0" colspan="7">
                                        <div class="text-uppercase small font-weight-700 text-muted">PPN:</div>
                                    </td>
                                    <td class="text-right pb-0">
                                        <div class="h5 mb-0 font-weight-700">Rp. 10.000,00</div>
                                    </td>
                                </tr>
                                <!-- Invoice total-->
                                <tr>
                                    <td class="text-right pb-0" colspan="7">
                                        <div class="text-uppercase small font-weight-700 text-muted">Total Bayar:
                                        </div>
                                    </td>
                                    <td class="text-right pb-0">
                                        <div class="h5 mb-0 font-weight-700 text-green">Rp. 127.000,00</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div class="card-footer p-4 p-lg-5 border-top-0">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Invoice - sent to info-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">To</div>
                        <div class="h6 mb-1">{{ $pembayaran->Customer->nama_customer }}</div>
                        <div class="small">{{ $pembayaran->Customer->alamat_customer }}</div>
                        <div class="small">{{ $pembayaran->Customer->nohp_customer }}</div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Invoice - sent from info-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">From</div>
                        <div class="h6 mb-0">{{ $pembayaran->Bengkel->nama_bengkel }}</div>
                        <div class="small">{{ $pembayaran->Bengkel->alamat_bengkel }}</div>
                        <div class="small">{{ $pembayaran->Bengkel->nohp_bengkel }}</div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Invoice - additional notes-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                        <div class="small mb-0">Harap periksa Invoice {{ $pembayaran->kode_penjualan }} sebelum
                            melakukan pembayaran!</div>

                        <a href=""
                            class="btn btn-outline-success mt-4 btn-block" type="button">
                            Bayar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
