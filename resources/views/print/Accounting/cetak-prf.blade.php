<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cetak PRF {{ $prf->kode_prf }}</title>
    <link href="{{ url('backend/dist/css/styles.css')}}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href={{ url('favicon.png')}} />

    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ url('/node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
</head>

<body>
    <div>
        <main>
            <div class="container col-lg-8 mt-5">
                <div class="card invoice">
                    <div class="card-header border-bottom-0 bg-gradient-light-to-secondary text-white-50">
                        <div class="row justify-content-between align-items-center mt-2 ">
                            <div class="col-2 text-center text-lg-left">
                                <img class="invoice-brand-img rounded-circle" src="{{ asset('logo.png') }}" alt="" />
                            </div>
                            <div class="col-5 text-center text-lg-left">
                                <div class="h2 text-primary">{{ Auth::user()->bengkel->nama_bengkel }}</div>
                                <span class="text-dark">{{ Auth::user()->bengkel->alamat_bengkel }}</span>
                            </div>
                            <div class="col-5 text-right">
                                <div class="h3 text-primary">Payment Requisition Form</div>
                                <span class="text-dark">{{ $prf->kode_prf }}</span>
                                <br>
                                <span class="text-dark">{{ $now }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="ml-5">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-6 text-lg-left" style="line-height: 1rem">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="d-flex flex-column font-weight-bold">
                                                <label class="small"> Jenis Transaksi </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="small">: {{ $prf->Jenistransaksi->nama_transaksi }} </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="d-flex flex-column font-weight-bold">
                                                <label class="small">Tanggal Prf </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="small">: {{ $prf->tanggal_prf }} </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="font-weight-bold">
                                                <label class="small">Tanggal Bayar </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="small">: {{ $prf->tanggal_bayar }} </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="d-flex flex-column font-weight-bold">
                                                <label class="small">Keperluan Prf </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="small">: {{ $prf->keperluan_prf }} </label>
                                        </div>
                                    </div>
                                </div>

                                {{-- KANAN --}}
                                <div class="col-6 text-lg-left" style="line-height: 1rem">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="d-flex flex-column font-weight-bold">
                                                <label class="small">Supplier </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="small">: {{ $prf->Supplier->nama_supplier }} </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="d-flex flex-column font-weight-bold">
                                                <label class="small">No Rek. Supplier </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="small">: {{ $prf->Supplier->rekening_supplier }} </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="font-weight-bold">
                                                <label class="small "> Grand total </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="small">: {{ $prf->grand_total }} </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="font-weight-bold">
                                                <label class="small"> Metode Pembayaran </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="small">: {{ $prf->FOP->nama_fop }} </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="datatable">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="hover" id="example" width="100%" cellspacing="0" role="grid"
                                                aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center" style="width: 20px;">No</th>
                                                        <th class="text-center" style="width: 80px;">Kode Invoice
                                                        </th>
                                                        <th class="text-center" style="width: 80px;">Kode PO</th>
                                                        <th class="text-center" style="width: 80px;">Kode Rcv</th>
                                                        <th class="text-center" style="width: 20px;">Tanggal Invoice
                                                        </th>
                                                        <th class="text-center" style="width: 20px;">Tenggat Invoice
                                                        </th>
                                                        <th class="text-center" style="width: 80px;">Total Harga
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{--  --}}
                                                    @forelse ($prf->Detailprf as $detail)
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">
                                                            {{ $loop->iteration}}</th>
                                                        <td>{{ $detail->kode_invoice }}</td>
                                                        <td>{{ $detail->PO->kode_po }}</td>
                                                        <td>{{ $detail->Rcv->kode_rcv }}</td>
                                                        <td>{{ $detail->tanggal_invoice }}</td>
                                                        <td>{{ $detail->tenggat_invoice }}</td>
                                                        <td class="text-center">Rp.
                                                            {{ number_format($detail->total_pembayaran,2,',','.') }}
                                                        </td>

                                                    </tr>
                                                    @empty

                                                    @endforelse
                                                    <tr>
                                                        <hr>
                                                        <td colspan="6" class="text-center font-weight-500">
                                                            Grand Total
                                                        </td>
                                                        <td class="text-center">
                                                            Rp.{{ number_format($prf->grand_total,2,',','.') }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        </hr>


                        @forelse ($prf->Detailprf as $item)
                        <div class="font-weight-bold mb-2 ml-2 mt-2">
                            <label class="small"> NOMOR INVOICE : <b>{{ $item->kode_invoice }} </b></label>
                        </div>
                        <div class="col-lg-12">
                            <div class="datatable">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="hover" id="example" width="100%" cellspacing="0" role="grid"
                                                aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center" style="width: 20px;">No</th>
                                                        <th class="text-center" style="width: 80px;">Kode Rcv
                                                        </th>
                                                        <th class="text-center" style="width: 80px;">Sparepart</th>
                                                        <th class="text-center" style="width: 80px;">Jenis</th>
                                                        <th class="text-center" style="width: 20px;">Merk</th>
                                                        <th class="text-center" style="width: 20px;">Qty</th>
                                                        <th class="text-center" style="width: 80px;">Harga</th>
                                                        <th class="text-center" style="width: 80px;">Total Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($item->Detailinvoice as $invoice)
                                                    <tr id="sparepart-{{ $item->id_sparepart }}" role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">
                                                            {{ $loop->iteration}}</th>
                                                        <td class="text-center">
                                                            {{ $invoice->kode_sparepart }}</td>
                                                        <td class="text-center">
                                                            {{ $invoice->nama_sparepart }}</td>
                                                        <td class="text-center">
                                                            {{ $invoice->Merksparepart->Jenissparepart->jenis_sparepart }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $invoice->Merksparepart->merk_sparepart }}
                                                        </td>
                                                        <td class="text-center">{{ $invoice->pivot->qty_rcv }}
                                                        </td>
                                                        <td class="text-center">
                                                            Rp.{{ number_format($invoice->pivot->harga_item,2,',','.') }}
                                                        </td>
                                                        <td class="text-center">
                                                            Rp.{{ number_format($invoice->pivot->total_harga,2,',','.') }}
                                                        </td>
                                                    </tr>
                                                    @empty

                                                    @endforelse
                                                </tbody>
                                                <tr>
                                                    <td colspan="7" class="text-center font-weight-500">
                                                        Total Harga
                                                    </td>
                                                    <td class="text-center">Rp.
                                                        {{ number_format($item->total_pembayaran,2,',','.') }}
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        </hr>
                    </div>


                    @empty

                    @endforelse



                    {{-- <div class="card-footer p-8 p-lg-10 mt-2 border-top-0 bg-white">
                        <div class="row">
                            <div class="mx-auto col-9 text-center d-flex justify-content-between">

                                <div class="mb-10">

                                    <div class="h6 mb-0">Staff Akuntan</div>
                                    <div class="small mt-10">{{ $invoice->Supplier->nama_supplier }}
                                    </div>
                                </div>
                                <div class="mb-4">
                                    {{ date('j F, Y', strtotime($now)) }}
                                    <div class="h6 mb-0">Owner</div>
                                    <div class="small mt-10">{{ $invoice->Pegawai->nama_pegawai }}</div>
                                </div>
                            </div>

                        </div>
                    </div> --}}
        </main>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous">
        </script>
        <script src="{{ url('/backend/dist/js/scripts.js')}}"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous">
        </script>
        <script src="{{ url('/backend/dist/assets/demo/datatables-demo.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ url('/backend/dist/assets/demo/datatables-demo.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous">
        </script>

</body>

</html>

<script type="text/javascript">
    window.print();

</script>
