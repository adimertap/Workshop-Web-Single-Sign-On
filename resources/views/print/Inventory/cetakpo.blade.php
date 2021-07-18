<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cetak Purchase Order {{ $po->kode_po }}</title>
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

<body >
    <div>
        <main>
            <div class="container col-lg-8 mt-5">
                <!-- Invoice-->

                <div class="card invoice">
                    <div class="card-header border-bottom-0 bg-gradient-light-to-secondary text-white-50">
                        <div class="row justify-content-between align-items-center mt-2 ">
                            <div class="col-2 text-center text-lg-left">
                                <!-- Invoice branding-->
                                <img class="invoice-brand-img rounded-circle" src="{{ asset('logo.png') }}" alt="" />
                            </div>
                            <div class="col-5 text-center text-lg-left">
                                <div class="h2 text-primary">{{ Auth::user()->bengkel->nama_bengkel }}</div>
                                <span class="text-dark">{{ Auth::user()->bengkel->alamat_bengkel }}</span>
                            </div>
                            <div class="col-5 text-right">
                                <!-- Invoice details-->
                                <div class="h3 text-primary">Purchase Order</div>
                                <span class="text-dark">{{ $po->kode_po }}</span>
                                <br>
                                <span class="text-dark">{{ $now }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row justify-content-between align-items-center mb-4">
                            <div class="col-6 text-lg-left" style="line-height: 1rem">
                                <label class="small font-weight-700">Kepada: </label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small font-weight-500"> Supplier </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small font-weight-500">: {{ $po->Supplier->nama_supplier }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small"> No. Telp </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $po->Supplier->telephone }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small">Email </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $po->Supplier->email }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small line-height-normal"> Alamat </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $po->Supplier->alamat_supplier }} </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-lg-left" style="line-height: 1rem">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="font-weight-bold">
                                            <label class="small">Kode PO </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $po->kode_po }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="font-weight-bold">
                                            <label class="small "> Pegawai </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $po->Pegawai->nama_pegawai }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="font-weight-bold">
                                            <label class="small"> Tanggal PO </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="smal">: {{ $po->tanggal_po }} </label> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12" >
                            <div class="datatable" >
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="hover" id="example" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center" style="width: 20px;">No</th>
                                                        <th class="text-center" style="width: 80px;">Sparepart</th>
                                                        <th class="text-center" style="width: 80px;">Merk</th>
                                                        <th class="text-center" style="width: 20px;">Qty</th>
                                                        <th class="text-center" style="width: 20px;">Kemasan</th>
                                                        <th class="text-center" style="width: 30px;">Harga</th>
                                                        <th class="text-center" style="width: 80px;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{--  --}}
                                                    @forelse ($po->Detailsparepart as $detail)
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                                        </th>
                                                        <td >{{ $detail->nama_sparepart }}</td>
                                                        <td class="text-center">{{ $detail->Merksparepart->merk_sparepart }}</td>
                                                        <td class="text-center">{{ $detail->pivot->qty }}</td>
                                                        <td class="text-center">{{ $detail->Kemasan->nama_kemasan }}</td>
                                                        <td class="text-center">Rp.
                                                            {{ number_format($detail->pivot->harga_satuan,2,',','.') }}
                                                        </td>
                                                        <td class="text-center">Rp.
                                                            {{ number_format($detail->pivot->total_harga,2,',','.') }}
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="7" class="text-center">
                                                            Data Sparepart Kosong
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                    <tr>
                                                        <hr>
                                                    <td colspan="6" class="text-center font-weight-500">
                                                        Grand Total
                                                    </td>
                                                    <td class="text-center">
                                                        Rp.{{ number_format($po->grand_total,2,',','.') }}
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
                    <div class="card-footer p-4 p-lg-5 border-top-0 bg-white">
                        <div class="row">
                            <div class="mx-auto col-9 text-center d-flex justify-content-between">
                                <div class="mb-4">
                                    
                                </div>
                                <div class="mb-4">
                                    <!-- Invoice - sent from info-->
                                    <div class="h6 mb-0">Staff Purchasing</div>
                                    <div class="small mt-10">{{ $po->Pegawai->nama_pegawai }}</div>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <!-- Invoice - additional notes-->
                                <div class="small text-muted text-uppercase font-weight-700 mb-2">Keterangan</div>
                                <div class="small mb-0">Purchase Order telah disetujui oleh pemilik bengkel dan akan diteruskan kepada supplier
                                    <br>~ Seluruh pengiriman barang yang dilakukan supplier harus disertakan Faktur dan Kwitansi
                                    <br>~ Barang akan kami kembalikan apabila tidak sesuai pesanan
                                    <br>~ No Purchase Order harus dicantumkan dalam Faktur dan Kwitansi
                                    <br>~ Bila pengiriman barang akan dilaksanakan secara bertahap, 
                                    <br>setiap pengiriman barang harap disertakan photocopy Purchase Order
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ url('/backend/dist/js/scripts.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ url('/backend/dist/assets/demo/datatables-demo.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ url('/backend/dist/assets/demo/datatables-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

</body>

</html>

<script type="text/javascript">
    window.print();

</script>
