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
            System Bengkel
        </a>
        <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i
                data-feather="menu"></i></button>
        <div class="small">
            <i class="fa fa-cogs" aria-hidden="true"></i>
            Bengkel
            <span class="font-weight-500 text-primary">Adi Jaya</span>
        </div>
        </form>
        <ul class="navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown no-caret mr-3 d-md-none">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search"></i></a>
                <!-- Dropdown - Search-->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--fade-in-up"
                    aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100">
                        <div class="input-group input-group-joined input-group-solid">
                            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                                aria-describedby="basic-addon2" />
                            <div class="input-group-append">
                                <div class="input-group-text"><i data-feather="search"></i></div>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts"
                    href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><i data-feather="bell"></i></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownAlerts">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="mr-2" data-feather="bell"></i>
                        Pemberitahuan
                    </h6>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 29, 2019</div>
                            <div class="dropdown-notifications-item-content-text">This is an alert message. It's nothing
                                serious, but it requires your attention.</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <div class="dropdown-notifications-item-icon bg-info"><i data-feather="bar-chart"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 22, 2019</div>
                            <div class="dropdown-notifications-item-content-text">A new monthly report is ready. Click
                                here to view!</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <div class="dropdown-notifications-item-icon bg-danger"><i
                                class="fas fa-exclamation-triangle"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 8, 2019</div>
                            <div class="dropdown-notifications-item-content-text">Critical system failure, systems
                                shutting down.</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <div class="dropdown-notifications-item-icon bg-success"><i data-feather="user-plus"></i></div>
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">December 2, 2019</div>
                            <div class="dropdown-notifications-item-content-text">New user request. Woody has requested
                                access to the organization.</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-footer" href="#!">View All Alerts</a>
                </div>
            </li>
            <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages"
                    href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false"><i data-feather="mail"></i></a>
                <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up"
                    aria-labelledby="navbarDropdownMessages">
                    <h6 class="dropdown-header dropdown-notifications-header">
                        <i class="mr-2" data-feather="mail"></i>
                        Message Center
                    </h6>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <img class="dropdown-notifications-item-img"
                            src="https://source.unsplash.com/vTL_qy03D1I/60x60" />
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                            <div class="dropdown-notifications-item-content-details">Emily Fowler · 58m</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-item" href="#!">
                        <img class="dropdown-notifications-item-img"
                            src="https://source.unsplash.com/4ytMf8MgJlY/60x60" />
                        <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-text">Lorem ipsum dolor sit amet,
                                consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                            <div class="dropdown-notifications-item-content-details">Diane Chambers · 2d</div>
                        </div>
                    </a>
                    <a class="dropdown-item dropdown-notifications-footer" href="#!">Read All Messages</a>
                </div>
            </li>
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
                            <div class="dropdown-user-details-name">Adi Merta Pratama</div>
                            <div class="dropdown-user-details-email">adimertap@gmail.com</div>
                        </div>
                    </h6>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('dashboardpegawai') }}">
                        <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                        Account
                    </a>
                    <a class="dropdown-item" href="#!">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <hr>
    <main>
        <div class="container mt-10">
            <!-- Custom page header alternative example-->
            <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                <div class="mr-4 mb-3 mb-sm-0">
                    <h1 class="mb-0">Dashboard Bengkel</h1>
                    <div class="small">
                        <span class="font-weight-500 text-primary">Welcome</span>
                        · Page · Bengkel
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="container">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <h5 class="alert-heading">Informasi, Simak dengan Baik</h5>
            Getting Started, Seluruh panduan kami berikan pada link berikut <a class="alert-link" href="javascript:void(0);">Panduan Pengguaan Sistem</a>
        </div>
    </div>
    

    <div class="container">
        <div class="row">
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 1-->
                <a class="card lift h-100" href="{{ route('dashboardfrontoffice') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Front Office<i class="mdi mdi-office-building-marker-outline:"></i></h5>
                                <div class="text-muted">Pengelolaan Office Bengkel</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/browser-stats-pana.svg"
                                alt="..." style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 2-->
                <a class="card lift h-100" href="{{ route('dashboardservice') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Service</h5>
                                <div class="text-muted">Pengelolaan Service Bengkel</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/processing-pana.svg"
                                alt="..." style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 3-->
                <a class="card lift h-100" href="{{ route('dashboardpointofsales') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Point Of Sales</h5>
                                <div class="text-muted">Pengelolaan Penjualan Bengkel</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/windows-pana.svg" alt="..."
                                style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 3-->
                <a class="card lift h-100" href="{{ route('dashboardaccounting') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Marketplace</h5>
                                <div class="text-muted">Marketplace Bengkel</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/windows-pana.svg" alt="..."
                                style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    {{-- BARIS 2 --}}
    <div class="container">
        <div class="row">
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 1-->
                <a class="card lift h-100" href="{{ route('dashboardinventory') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Inventory</h5>
                                <div class="text-muted">Pengelolaan Persediaan Barang</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/ilustrasi/inventoryilustration.jpg" alt="..."
                                style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 2-->
                <a class="card lift h-100" href="{{ route('dashboardpegawai') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Kepegawaian</h5>
                                <div class="text-muted">Pengelolaan Human Resources</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/windows-pana.svg" alt="..."
                                style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 3-->
                <a class="card lift h-100" href="{{ route('dashboardpayroll') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Payroll</h5>
                                <div class="text-muted">Pengelolaan Gaji Pegawai</div>
                            </div>
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/processing-pana.svg"
                            alt="..." style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-4 col-xl-3 mb-4">
                <!-- Dashboard example card 3-->
                <a class="card lift h-100" href="{{ route('dashboardaccounting') }}">
                    <div class="card-body d-flex justify-content-center flex-column">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="mr-3">
                                <h5>Accounting</h5>
                                <div class="text-muted">Pengelolaan Keuangan Bengkel</div>
                            </div>
                            
                            <img class="card-img-top" src="/backend/src/assets/img/freepik/browser-stats-pana.svg"
                            alt="..." style="width: 5rem;">
                        </div>
                    </div>
                </a>
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('/backend/dist/assets/demo/date-range-picker-demo.js')}}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="{{ url('/backend/dist/assets/demo/datatables-demo.js') }}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

</body>

</html>
