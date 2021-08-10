<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Service System</title>
    <link href="{{ url('backend/dist/css/styles.css')}}" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('logo.png') }}">
    <link rel="stylesheet" href="{{ url('/node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="icon" type="image/x-icon" href={{ url('logo.png')}} />
    <script data-search-pseudo-elements defer
        src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.27.0/feather.min.js" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ url('/node_modules/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    {{-- <link rel="stylesheet" type="text/css" href="{{ url('/data_tables/datatables.css') }}">
    <script type="text/javascript" charset="utf8" src="{{ url('/data_tables/datatables.js') }}"></script> --}}



</head>

<body class="nav-fixed">
    <nav class="topnav navbar navbar-expand shadow navbar-light bg-white" id="sidenavAccordion">
        <a class="navbar-brand" href="{{ route('dashboardservice')}}">
            <i class="fas fa-cog mr-2"></i>
            Service System
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
                @if (Auth::user()->Pegawai->jenis_kelamin == 'Laki-Laki')

                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"><img class="img-fluid"
                    src="/backend/src/assets/img/freepik/profiles/profile-6.png" />
                </a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="/backend/src/assets/img/freepik/profiles/profile-6.png" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{ Auth::user()->pegawai->nama_pegawai }}</div>
                        <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                    </div>
                </h6>


                @elseif (Auth::user()->Pegawai->jenis_kelamin == 'Perempuan')

                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false"><img class="img-fluid"
                    src="/backend/src/assets/img/freepik/profiles/profile-5.png" /></a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownUserImage">
                    <h6 class="dropdown-header d-flex align-items-center">
                        <img class="dropdown-user-img" src="/backend/src/assets/img/freepik/profiles/profile-5.png" />
                        <div class="dropdown-user-details">
                            <div class="dropdown-user-details-name">{{ Auth::user()->pegawai->nama_pegawai }}</div>
                            <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                        </div>
                    </h6>
                
                @endif
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('dashboardsso') }}">
                        <div class="dropdown-item-icon"><i data-feather="columns"></i></div>
                        Dashboard SSO
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
                        <a class="nav-link" href="{{route('dashboardservice')}}">
                            <div class="nav-link-icon"><i class="fas fa-warehouse"></i></div>
                            Dashboard
                        </a>

                        {{-- Service Advisor --}}
                        {{-- Service Advisor --}}
                        @if (Auth::user()->role == 'admin_service_advisor' || Auth::user()->role == 'owner')
                        <div class="sidenav-menu-heading">Service Advisor</div>
                        <a class="nav-link collapsed" href="{{route('penerimaanservice.index')}}" aria-expanded="false"
                            aria-controls="collapseUtilities">
                            <div class="nav-link-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            Penerimaan Service
                        </a>
                        <a class="nav-link collapsed" href="{{route('penerimaanservice.create')}}" aria-expanded="false"
                        aria-controls="collapseUtilities">
                        <div class="nav-link-icon">
                            <i class="fas fa-book-open"></i>
                        </div>
                        Booking Service
                    </a>
                        @endif

                        @if (Auth::user()->role == 'admin_service_instructor' || Auth::user()->role == 'owner')
                        {{-- FRONTOFFICE SYSTEM --}}
                        <div class="sidenav-menu-heading">Service System</div>

                        <a class="nav-link collapsed" href="{{route('stoksparepart.index')}}" aria-expanded="false"
                            aria-controls="collapseUtilities">
                            <div class="nav-link-icon">
                                <i class="fas fa-cubes"></i>
                            </div>
                            Stok Sparepart
                        </a>

                        <a class="nav-link collapsed" href="{{route('jadwalmekanik.index')}}" aria-expanded="false"
                            aria-controls="collapseUtilities">
                            <div class="nav-link-icon">
                                <i class="fas fa-user"></i>
                            </div>
                            Jadwal Mekanik
                        </a>

                        {{-- Inventory --}}
                        <a class="nav-link collapsed" href="{{route('pengerjaanservice.index')}}" aria-expanded="false"
                            aria-controls="collapsePages">
                            <div class="nav-link-icon"><i class="fas fa-cogs"></i></div>
                            Pengerjaan Service
                        </a>
                        @endif

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
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>



</body>

</html>
