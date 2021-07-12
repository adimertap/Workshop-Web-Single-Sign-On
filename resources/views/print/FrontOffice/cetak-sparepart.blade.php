<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cetak Invoice - {{ $cetak_sparepart->kode_penjualan }}</title>
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
            <div class="container col-8 mt-4">
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
                                <div class="h3 text-primary">Invoice Sparepart</div>
                                <span class="text-dark">{{ $cetak_sparepart->kode_penjualan }}</span>
                                <br>
                                <span class="text-dark">{{ $now }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body mt-4">
                        <!-- Invoice table-->
                        <div class="row justify-content-between align-items-center">
                            <div class="col-6 text-lg-left" style="line-height: 1rem">
                                <label class="small font-weight-700">Pembeli Sparepart: </label>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="d-flex flex-column">
                                            <label class="small"> Nama </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">:
                                            {{ $cetak_sparepart->Customer->nama_customer }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small"> Alamat </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $cetak_sparepart->Customer->alamat_customer }}
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small"> Email </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $cetak_sparepart->Customer->email_customer }}
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small">No. Telp. </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $cetak_sparepart->Customer->nohp_customer }} </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0 mt-2">
                                    <thead class="border-bottom">
                                        <tr class="small text-uppercase text-muted">
                                            <th scope="col" colspan="10">List Sparepart</th>
                                            <th scope="col" colspan="10">Qty</th>
                                            <th class="text-right" scope="col">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Invoice item 1-->
                                        @forelse ($cetak_sparepart->Detailsparepart as $item)
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
                    </div>
                    <div class="card-footer p-4 p-lg-5 border-top-0 mt-5">
                        <div class="row">
                            <div class="mx-auto col-8 text-center d-flex justify-content-between">
                                <div class="mb-4">
                                    <!-- Invoice - sent to info-->
                                    <div class="h6 mb-1">Pembeli <br> Sparepart</div>
                                    <div class="small mt-10">{{ $cetak_sparepart->Customer->nama_customer }}</div>
                                    <div class="small">------------------</div>
                                </div>
                                <div class="mb-4">
                                    <!-- Invoice - sent from info-->
                                    <div class="h6 mb-0">Petugas <br> Bengkel</div>
                                    <div class="small mt-10">{{ Auth::user()->pegawai->nama_pegawai }}</div>
                                    <div class="small">------------------</div>
                                </div>
                            </div>


                            <div class="col-lg-6">
                                <!-- Invoice - additional notes-->
                                <div class="small text-muted text-uppercase font-weight-700 mb-2">Keterangan</div>
                                <div class="small mb-0">Semua pembelian suku cadang yang tertulis pada
                                    Invoice ini telah disetujui oleh Pembeli bengkel. <br> Harap periksa kembali suku cadang, <br> Kami tidak
                                    bertanggung jawab atas kehilangan/kerusakan suku cadang atau benda-benda lain yang ada
                                    di kendaraan yang diakibatkan oleh sebab-sebab diluar kekuasaan kami </div>
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
