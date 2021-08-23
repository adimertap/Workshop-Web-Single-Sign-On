<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cetak Invoice Service</title>
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
                             
                                <div class="h3 text-primary">Invoice Penjualan Service</div>
                               
                                <br>
                                <span class="text-dark">{{ $now }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row justify-content-between align-items-center mb-4">
                            <div class="col-6 text-lg-left" style="line-height: 1rem">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small font-weight-500"> Kode Service </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small font-weight-500">: {{ $laporan->penerimaan_service->kode_sa }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small"> Customer </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $laporan->penerimaan_service->customer_bengkel->nama_customer }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small">Tanggal Service</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $laporan->penerimaan_service->date }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small line-height-normal"> Kendaraan </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $laporan->penerimaan_service->kendaraan->nama_kendaraan }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small line-height-normal"> Plat Kendaraan </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $laporan->penerimaan_service->plat_kendaraan }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex flex-column font-weight-bold">
                                            <label class="small line-height-normal"> Keluhan </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $laporan->penerimaan_service->keluhan_kendaraan }} </label>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6 text-lg-left" style="line-height: 1rem">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="font-weight-bold">
                                            <label class="small">Tanggal Invoice </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: {{ $laporan->tanggal_laporan }} </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="font-weight-bold">
                                            <label class="small "> Total Tagihan </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: Rp.{{ number_format( $laporan->total_tagihan,2,',','.') }}</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="font-weight-bold">
                                            <label class="small"> Diskon </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: Rp.{{ number_format( $laporan->diskon,2,',','.') }}</label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="font-weight-bold">
                                            <label class="small"> Nominal Bayar </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: Rp.{{ number_format( $laporan->nominal_bayar,2,',','.') }}</label> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="font-weight-bold">
                                            <label class="small"> Kembalian </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="small">: Rp.{{ number_format( $laporan->kembalian,2,',','.') }} </label> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 text-center" >
                            <div class="datatable" >
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="hover" id="example" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center" style="width: 20px;">No</th>
                                                        <th class="text-center" style="width: 150px;">Kode Perbaikan</th>
                                                        <th class="text-center" style="width: 150px;">Nama Perbaikan</th>
                                                        <th class="text-center" style="width: 150px;">Jenis Perbaikan</th>
                                                        <th class="text-center" style="width: 60px;">Harga</th>
                                                        <th class="text-center" style="width: 90px;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    @forelse ($laporan->penerimaan_service->detail_perbaikan as $detail)
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                                        </th>
                                                        <td >{{ $detail->kode_jenis_perbaikan }}</td>
                                                        <td >{{ $detail->nama_jenis_perbaikan }}</td>
                                                        <td class="text-center">{{ $detail->group_jenis_perbaikan }}</td>
                                                        <td class="text-center">{{ $detail->harga_jenis_perbaikan }}</td>
                                                        <td class="text-center">Rp.{{ number_format($detail->pivot->total_harga,2,',','.') }}</td>
                                                    </tr>
                                                    @empty
                                                   
                                                    @endforelse
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center mt-5" >
                            <div class="datatable" >
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="hover" id="example" width="100%"
                                                cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="text-center" style="width: 20px;">No</th>
                                                        <th class="text-center" style="width: 150px;">Sparepart</th>
                                                        <th class="text-center" style="width: 150px;">Merk</th>
                                                        <th class="text-center" style="width: 60px;">Qty</th>
                                                        <th class="text-center" style="width: 90px;">Harga</th>
                                                        <th class="text-center" style="width: 100px;">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                    @forelse ($laporan->penerimaan_service->detail_sparepart as $details)
                                                    <tr role="row" class="odd">
                                                        <th scope="row" class="small" class="sorting_1">{{ $loop->iteration}}
                                                        </th>
                                                        <td >{{ $details->nama_sparepart }}</td>
                                                        <td class="text-center">{{ $details->Merksparepart->merk_sparepart }}</td>
                                                        <td class="text-center">{{ $details->pivot->jumlah }}</td>
                                                        <td class="text-center">Rp.{{ number_format($details->pivot->harga,2,',','.') }}
                                                        </td>
                                                        <td class="text-center">Rp.{{ number_format($details->pivot->total_harga,2,',','.') }}
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
                        </div>
                    </div>
                    <div class="card-footer p-4 p-lg-5 border-top-0 bg-white">
                        <div class="row">
                            <div class="mx-auto col-9 text-center d-flex justify-content-between">
                                <div class="mb-4">
                                    
                                </div>
                                <div class="mb-4">
                                  
                                    <div class="h6 mb-0">Staff </div>
                                    <div class="small mt-10">{{ $laporan->Pegawai->nama_pegawai }}</div>
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
