@section('layouts.sidebar')
<div class="app-menu navbar-menu">
    <div class="navbar-brand-box">
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('home/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('home/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('home/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('home/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                @if(Auth::user()->level == 'hrd')
                    <li class="menu-title"><span>HRD</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index">
                            <i data-feather="home" class="icon-dual"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMaster" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMaster">
                            <i data-feather="users" class="icon-dual"></i> <span>Data Master</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMaster">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="/karyawan" class="nav-link">Data Karyawan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/jabatan" class="nav-link">Jabatan</a>
                                </li>
                                <li class="nav-item">
                                    <a href="/presensi" class="nav-link">Rekap Presensi</a>
                                </li>
                        </div>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" style="color: white" href="{{ route('logout') }}">   
                            <span>Logout</span>
                        </a>
                    </li>
                @elseif (Auth::user()->level == 'keuangan')
                    <li class="menu-title"><span>Keuangan</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index">
                            <i data-feather="home" class="icon-dual"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link">
                            <i class="mdi mdi-account-cash"></i><span>Data Gaji</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/gaji" class="nav-link">Data Iuran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" style="color: white" href="{{ route('logout') }}">   
                            <span>Logout</span>
                        </a>
                    </li>
                @elseif (Auth::user()->level == 'manager')
                    <li class="menu-title"><span>Manager</span></li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index">
                            <i data-feather="home" class="icon-dual"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/gaji" class="nav-link">Validasi Slip Gaji</a>
                    </li>
                    <li class="nav-item">
                        <a href="/gaji" class="nav-link">Laporan Gaji Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a href="/gaji" class="nav-link">Laporan Pajak Penghasilan Karyawan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger" style="color: white" href="{{ route('logout') }}">   
                            <span>Logout</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>