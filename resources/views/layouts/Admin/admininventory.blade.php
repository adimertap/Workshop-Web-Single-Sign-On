<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Inventory System</title>
    <link href="{{ url('backend/dist/css/styles.css')}}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('image/favicon.png') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href={{ url('backend/dist/assets/img/favicon.png')}} />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ url('/node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>

</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <a class="navbar-brand" href="{{ route('dashboardinventory')}}">
            <i class="fas fa-boxes mr-3"></i>
            Inventory System
        </a>
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i
                data-feather="menu"></i></button>
        <div class="small">
            <i class="fa fa-cogs" aria-hidden="true"></i>
            Bengkel
            <span class="font-weight-500 text-primary">{{ Auth::user()->bengkel->nama_bengkel}}</span>
        </div>
        </form>
        <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown no-caret mr-2 dropdown-user">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                    href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><img class="img-fluid"
                        src="/backend/src/assets/img/freepik/profiles/profile-6.png" /></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="/backend/src/assets/img/freepik/profiles/profile-6.png" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">{{ Auth::user()->pegawai->nama_pegawai }}</div>
                            <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#!">
                        <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                        Account
                    </a>
                    <a class="dropdown-item" href="{{ route('dashboardsso') }}">
                        <div class="dropdown-item-icon"> <i class="fas fa-cubes"></i></div>
                        Menu SSO
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    {{-- Side Bar Content --}}
    {{-- Layout --}}
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">

                        {{-- DASHBOARD --}}
                        {{-- Dashboard Side Bar--}}
                        <div class="sidenav-menu-heading">Dashboard</div>
                        <a class="nav-link" href="{{ route('dashboardinventory')}}">
                            <div class="nav-link-icon"><i class="fas fa-warehouse"></i></div>
                            Dashboard
                        </a>

                        @if (Auth::user()->role == 'admin_gudang' || Auth::user()->role == 'owner')
                        {{-- MASTER DATA --}}
                        {{-- Master Data Side Bar --}}
                        <div class="sidenav-menu-heading">Master Data</div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                            data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                            <div class="nav-link-icon"><i class="fas fa-database"></i></div>
                            Master Data
                            <div class="sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                                <a class="nav-link" href="{{ route('sparepart.index')}}">
                                    Sparepart
                                </a>
                                <a class="nav-link" href="{{ route('merk-sparepart.index')}}">
                                    Merk Sparepart
                                </a>
                                <a class="nav-link" href="{{ route('jenis-sparepart.index')}}">
                                    Jenis Sparepart
                                </a>
                                <a class="nav-link" href="{{ route('supplier.index')}}">
                                    Supplier
                                </a>
                                <a class="nav-link" href="{{ route('hargasparepart.index')}}">
                                    Harga Sparepart
                                </a>
                                <a class="nav-link" href="{{ route('rak.index')}}">
                                    Rak
                                </a>
                                <a class="nav-link" href="{{ route('konversi.index')}}">
                                    Konversi
                                </a>
                                <a class="nav-link" href="{{ route('kemasan.index')}}">
                                    Kemasan
                                </a>
                            </nav>
                        </div>
                        @endif

                        {{-- INVENTORY SYSTEM --}}
                        {{-- Inventory System Side Bar --}}
                        <div class="sidenav-menu-heading">Inventory System</div>

                        @if (Auth::user()->role == 'admin_gudang' || Auth::user()->role == 'owner')
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                            data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                            <div class="nav-link-icon">
                                <i class="fas fa-cubes"></i>
                            </div>
                            Kelola Stock
                            <div class="sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>


                        <div class="collapse" id="collapseUtilities" data-parent="#accordionSidenav" style="">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('Opname.index') }}">
                                    Stock Opname
                                </a>
                                <a class="nav-link" href="{{ route('Kartu-gudang.index') }}">
                                    Kartu Gudang
                                </a>
                            </nav>
                        </div>
                        @endif

                        @if (Auth::user()->role == 'admin_purchasing' || Auth::user()->role == 'owner')
                        {{-- Inventory --}}
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                            data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Purchasing
                            <div class="sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapsePages" data-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                                <a class="nav-link " href="{{ route('purchase-order.index') }}">
                                    Purchase Order
                                </a>
                            </nav>
                        </div>
                        @endif

                        @if (Auth::user()->role == 'admin_gudang' || Auth::user()->role == 'owner')
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                            data-target="#collapseComponents" aria-expanded="false" aria-controls="collapseComponents">
                            <div class="nav-link-icon"><i class="fas fa-box-open"></i></div>
                            Receiving
                            <div class="sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseComponents" data-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav">
                                <a class="nav-link " href="{{ route('Rcv.index') }}">
                                    Receiving
                                </a>
                                <a class="nav-link" href="{{ route('retur.index') }}">
                                    Retur Pembelian
                                </a>
                            </nav>
                        </div>
                        @endif

                        @if (Auth::user()->role == 'admin_accounting' || Auth::user()->role == 'owner')
                        {{-- MANAJEMEN ASET --}}
                        {{-- Manajemen Aset Side Bar --}}
                        <div class="sidenav-menu-heading">Approval</div>
                        <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse"
                            data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="nav-link-icon"><i data-feather="check-square"></i></div>
                            Approval Data
                            <div class="sidenav-collapse-arrow">
                                <i class="fas fa-angle-down">
                                </i></div>
                        </a>
                        @endif
                        <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                            <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                @if (Auth::user()->role == 'owner')
                                <a class="nav-link" href="{{ route('approval-po.index') }}">
                                    Purchase Order
                                </a>
                                <a class="nav-link" href="{{ route('approval-opname.index') }}">
                                    Stock Opname
                                </a>
                                @if (Auth::user()->role == 'admin_accounting' || Auth::user()->role == 'owner')
                                <a class="nav-link " href="{{ route('approval-po-ap.index') }}">
                                    Purchase Order AP
                                </a>
                                @endif
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>

                {{-- USER ROLE Side Bar --}}
                <div class="sidenav-footer">
                    <div class="sidenav-footer-content">
                        <div class="sidenav-footer-subtitle">User Role:</div>
                        <div class="sidenav-footer-title">{{ Auth::user()->role_name }}</div>
                    </div>
                </div>
            </nav>
        </div>


        <div id="layoutSidenav_content">

            {{-- MASTER CONTENT --}}
            {{-- Konten di dalam Masing-Masing Fitur --}}
            @yield('content')


            {{-- FOOTER --}}
            <footer class="footer mt-auto footer-light">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 text-center">Copyright &copy; 2021 BengkelKuy</div>
                    </div>
                </div>
            </footer>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('/backend/dist/assets/demo/chart-pie-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

















</body>

</html>
