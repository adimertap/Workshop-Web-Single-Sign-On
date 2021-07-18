<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cetak Kartu Gudang {{ $sparepart->nama_sparepart }}</title>
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
                                <div class="h3 text-primary">Kartu Gudang</div>
                                <span class="text-dark">{{ $sparepart->nama_sparepart }}</span>
                                <br>
                                <span class="text-dark">{{ $now }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-6 text-lg-left" style="line-height: 1rem">
                                <label class="small font-weight-700">Kartu Gudang: </label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small font-weight-500"> Nama Sparepart </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="text-primary small">: {{ $sparepart->nama_sparepart }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small"> Jenis Sparepart </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $sparepart->Jenissparepart->jenis_sparepart }}
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small">Merk Sparepart </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $sparepart->Merksparepart->merk_sparepart }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small">Jumlah Stock </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $sparepart->stock }} </label>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 mt-4">
                           
                                <table id="example" class="cell-border" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th colspan="3" class="text-center">Transaksi</th>
                                            <th colspan="3" class="text-center">Jumlah</th>
                                            <th colspan="1" class="text-center">Saldo</th>
                                            <th colspan="1" class="text-center">Harga</th>
                                        </tr>
                                        <tr role="row">
                                            <th class="text-center" style="width: 10px;">No</th>
                                            <th class="text-center" style="width: 120px;">Tanggal Transaksi
                                            </th>
                                            <th class="text-center" style="width: 120px;">Kode Transaksi
                                            </th>
                                            <th class="text-center" style="width: 30px;">Masuk</th>
                                            <th class="text-center" style="width: 30px;">Keluar</th>
                                            <th class="text-center" style="width: 20px;">Satuan</th>
                                            <th class="text-center" style="width: 30px;">Saldo</th>
                                            <th class="text-center" style="width: 130px;">Beli / Jual</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($kartu_gudang as $item)
                                        <tr role="row" class="odd">
                                            <th scope="row" class="small" class="sorting_1">
                                                {{ $loop->iteration}}</th>
                                            <td class="text-center">{{ $item->tanggal_transaksi }}
                                            </td>
                                            <td class="text-center">{{ $item->kode_transaksi }}</td>
                                            <td class="text-center">{{ $item->jumlah_masuk }}
                                            </td>
                                            <td class="text-center">{{ $item->jumlah_keluar }}
                                            </td>
                                            <td class="text-center">{{ $item->Sparepart->Konversi->satuan }}</td>
                                            <td class="text-center">{{ $item->saldo_akhir }}</td>
                                            <td class="text-center">Rp.{{ number_format($item->harga_beli,2,',','.')}}
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
