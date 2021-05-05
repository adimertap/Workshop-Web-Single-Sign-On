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
                        <img class="invoice-brand-img rounded-circle mb-4" src="/image/services.png" style="color:"lt="" />
                        <div class="h2 text-white mb-0">Kode PKB-001</div>
                        Bengkel
                    </div>
                    <div class="col-12 col-lg-auto text-center text-lg-right">
                        <!-- Invoice details-->
                        <div class="h3 text-white">Invoice</div>
                        #29301
                        <br />
                        January 1, 2020
                    </div>
                </div>
            </div>
            <div class="card-body p-4 p-md-5">
                <!-- Invoice table-->
                <div class="row">
                    
                    
                </div>
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <thead class="border-bottom">
                            <tr class="small text-uppercase text-muted">
                                <th scope="col">Jenis Service</th>
                                <th class="text-right" scope="col">Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Invoice item 1-->
                            <tr class="border-bottom">
                                <td>
                                    <div class="font-weight-bold">SB Admin Pro</div>
                                    <div class="small text-muted d-none d-md-block">A professional UI toolkit for designing admin dashboards and web applications</div>
                                </td>
                                <td class="text-right font-weight-bold">12</td>
                            </tr>
                            <!-- Invoice subtotal-->
                            <tr>
                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Subtotal:</div></td>
                                <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700">$,1925.00</div></td>
                            </tr>
                            <!-- Invoice tax column-->
                            <tr>
                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Tax (7%):</div></td>
                                <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700">$134.75</div></td>
                            </tr>
                            <!-- Invoice total-->
                            <tr>
                                <td class="text-right pb-0" colspan="3"><div class="text-uppercase small font-weight-700 text-muted">Total Amount Due:</div></td>
                                <td class="text-right pb-0"><div class="h5 mb-0 font-weight-700 text-green">$2059.75</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer p-4 p-lg-5 border-top-0">
                <div class="row">
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Invoice - sent to info-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">To</div>
                        <div class="h6 mb-1">Company Name</div>
                        <div class="small">1234 Company Dr.</div>
                        <div class="small">Yorktown, MA 39201</div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                        <!-- Invoice - sent from info-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">From</div>
                        <div class="h6 mb-0">Start Bootstrap</div>
                        <div class="small">5678 Company Rd.</div>
                        <div class="small">Yorktown, MA 39201</div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Invoice - additional notes-->
                        <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                        <div class="small mb-0">Payment is due 15 days after receipt of this invoice. Please make checks or money orders out to Company Name, and include the invoice number in the memo. We appreciate your business, and hope to be working with you again very soon!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
