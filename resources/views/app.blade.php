<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>E-surat dpmd</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('sbadmin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    @livewireStyles
</head>

<body class="sb-nav-fixed">
    @if (auth()->check())
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">E-Surat DMPD</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                    class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                {{-- <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                        aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                            class="fas fa-search"></i></button>
                </div> --}}
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li> --}}
                        <li><a class="dropdown-item" href="{{ url('logout', []) }}" wire:click="logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    @endif
    <div id="layoutSidenav">
        @auth
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{ url('/', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            @if (auth()->user()->role == 'admin')
                                <a class="nav-link" href="{{ url('akun', []) }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Akun
                                </a>
                            @endif
                            @if (auth()->user()->role != 'admin')
                                <div class="sb-sidenav-menu-heading">Interface</div>
                                <a class="nav-link" href="{{ url('surat-masuk', []) }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Surat Masuk
                                </a>
                                <a class="nav-link" href="{{ url('surat-keluar', []) }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Surat Keluar
                                </a>
                            @endif

                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="{{ url('logout', []) }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-off"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{ auth()->user()->nama }}
                    </div>
                </nav>
            </div>
        @endauth
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>

        </div>
    </div>
    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('sbadmin/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('sbadmin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('sbadmin/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('sbadmin/js/datatables-simple-demo.js') }}"></script>
</body>

</html>
