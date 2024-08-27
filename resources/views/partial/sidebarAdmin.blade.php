<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
                <img src="{{ asset('BKK2/assets/img/kaiadmin/logo_light.svg') }}" alt="navbar brand" class="navbar-brand" height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="collapsed">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Data Pengguna -->
                <li class="nav-item">
                    <a data-bs-toggle="collapse" href="#data-pengguna" class="collapsed" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <p>Data Pengguna</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="data-pengguna">
                        <ul class="nav nav-collapse">
                            <!-- Data Alumni -->
                            <li>
                                <a data-bs-toggle="collapse" href="#data-alumni" class="collapsed" aria-expanded="false">
                                    <span class="sub-item">Data Alumni</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="data-alumni">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="{{ route('importdata') }}">
                                                <span class="sub-item">Import Data</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('alumniadmin') }}">
                                                <span class="sub-item">Lihat Data</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <!-- Data Perusahaan -->
                            <li>
                                <a data-bs-toggle="collapse" href="#data-perusahaan" class="collapsed" aria-expanded="false">
                                    <span class="sub-item">Data Perusahaan</span>
                                    <span class="caret"></span>
                                </a>
                                <div class="collapse" id="data-perusahaan">
                                    <ul class="nav nav-collapse">
                                        <li>
                                            <a href="{{ route('tambahdataperusahaan') }}">
                                                <span class="sub-item">Tambah Data</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('perusahaan.index') }}">
                                                <span class="sub-item">Lihat Data</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Akun Pengguna -->
                <li class="nav-item">
                    <a href="{{ route('akunpengguna') }}">
                        <i class="fas fa-user-cog"></i>
                        <p>Akun Pengguna</p>
                    </a>
                </li>

                <!-- Data Loker -->
                <li class="nav-item">
                    <a href="{{ route('lokeradmin') }}">
                        <i class="fas fa-briefcase"></i>
                        <p>Ajuan Loker</p>
                    </a>
                </li>

                   <!-- Data Lamaran -->
                   <li class="nav-item">
                    <a href="{{ route('datalamaranadmin') }}">
                        <i class="fas fa-archive"></i>
                        <p>Data Lamaran</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                </li>

                  <!-- Sign Out -->
                  <li class="nav-item">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>Sign Out</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
