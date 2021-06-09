<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Work Order - {{ $cetak_wo->kode_sa }}</title>
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
            <div class="container mt-4">
                <!-- Invoice-->

                <div class="card invoice">
                    <div class="card-header border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                        <div class="row justify-content-between align-items-center mt-2 ">
                            <div class="col-2 col-lg-auto text-center text-lg-left">
                                <!-- Invoice branding-->
                                <img class="invoice-brand-img rounded-circle" src="{{ asset('logo.png') }}" alt="" />
                            </div>
                            <div class="col-5 col-lg-auto text-center text-lg-left">
                                <div class="h2 text-white ">{{ Auth::user()->bengkel->nama_bengkel }}</div>
                                {{ Auth::user()->bengkel->alamat_bengkel }}
                            </div>
                            <div class="col-5 col-lg-auto text-center text-lg-right">
                                <!-- Invoice details-->
                                <div class="h3 text-white ">Work Order</div>
                                {{ $cetak_wo->kode_sa }}
                                <br>
                                {{ $now }}
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>

                        </div>
                    </div>



                    <div class="card-body">
                        <!-- Invoice table-->
                        <div class="row mx-auto col-8 text-center d-flex justify-content-between">
                            <div>
                                <!-- Invoice - sent to info-->
                                <div class="h6 mb-1">Pemilik/Pemakai</div>
                                <div class="small">{{ $cetak_wo->customer_bengkel->nama_customer }}</div>
                                <div class="small">{{ $cetak_wo->customer_bengkel->alamat_customer }}</div>
                                <div class="small">{{ $cetak_wo->customer_bengkel->nohp_customer }}</div>
                            </div>
                            <div>
                                <!-- Invoice - sent from info-->
                                <div class="h6 mb-0">Kendaraan</div>
                                <div class="small">{{ $cetak_wo->kendaraan->nama_kendaraan }}</div>
                                <div class="small">{{ $cetak_wo->kendaraan->merk_kendaraan->merk_kendaraan }}</div>
                                <div class="small">{{ $cetak_wo->kendaraan->jenis_kendaraan->jenis_kendaraan }}</div>
                            </div>
                        </div>

                        <div class="row mt-5">
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
                                        @forelse ($cetak_wo->detail_perbaikan as $item)
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
                                            <th scope="col" colspan="10">Qty</th>
                                            <th class="text-right" scope="col">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Invoice item 1-->
                                        @forelse ($cetak_wo->detail_sparepart as $item)
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
                    <div class="card-footer p-4 p-lg-5 border-top-0">
                        <div class="row">
                            <div class="mx-auto col-8 text-center d-flex justify-content-between">
                                <div class="mb-4">
                                    <!-- Invoice - sent to info-->
                                    <div class="h6 mb-1">Pemilik/Pemakai <br> Kendaraan,</div>
                                    <div class="small mt-10">{{ $cetak_wo->customer_bengkel->nama_customer }}</div>
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
                                <div class="small mb-0">Semua pekerjaan dan pergantian suku cadang yang tertulis pada
                                    Perintah Kerja ini telah disetujui oleh Pemilik/Pemakai Kendaraan <br> Kami tidak
                                    bertanggung jawab atas kehilangan/kerusakan kendaraan atau benda-benda lain yang ada
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
