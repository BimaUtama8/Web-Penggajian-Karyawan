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
                        <a href="{{ route('show_karyawan') }}" class="nav-link">
                            <i class="mdi mdi-account-multiple"></i><span>Data Karyawan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('show_jabatan') }}" class="nav-link">
                            <i class="mdi mdi-book-edit"></i><span>Data Jabatan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/presensi" class="nav-link">
                            <i class="mdi mdi-calendar-account"></i><span>Rekap Presensi</span>
                        </a>
                    </li>
                @elseif (Auth::user()->level == 'keuangan')
                    <li class="menu-title"><span>Keuangan</span></li>
                    <li class="nav-item">
                        <a href="{{ route('show_jabatan_keuangan') }}" class="nav-link">
                            <i class="mdi mdi-book-edit"></i><span>Data Jabatan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('index_iuran') }}" class="nav-link">
                            <i class="mdi mdi-cash-minus"></i><span>Data Iuran</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('index_gaji') }}" class="nav-link">
                            <i class="mdi mdi-account-cash"></i><span>Data Gaji</span>
                        </a>
                    </li>
                @elseif (Auth::user()->level == 'manager')
                    <li class="menu-title"><span>Manager</span></li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="mdi mdi-text-box-check"></i><span>Validasi Slip Gaji</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="mdi mdi-archive"></i><span>Laporan Gaji Karyawan</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <i class="mdi mdi-archive"></i><span>Laporan Pajak Penghasilan Karyawan</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>