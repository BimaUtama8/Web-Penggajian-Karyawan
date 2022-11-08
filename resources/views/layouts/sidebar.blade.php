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
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
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
                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="mdi mdi-account-multiple"></i> <span>Data Karyawan</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('show_karyawan') }}" class="nav-link">
                                <span>Kelola Data Karyawan</span>
                            </a>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('show_slip') }}" class="nav-link">
                                <span>Cetak Slip Gaji</span>
                            </a>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('show_jabatan') }}" class="nav-link">
                        <i class="mdi mdi-book-edit"></i><span>Data Jabatan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('show_presensi') }}" class="nav-link">
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
                {{-- <li class="nav-item">
                    <a href="{{ route('show_iuran') }}" class="nav-link">
                        <i class="mdi mdi-cash-minus"></i><span>Data Iuran</span>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="mdi mdi-account-cash"></i> <span>Data Gaji</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('show_gaji') }}" class="nav-link">
                                <span>Hitung Gaji</span>
                            </a>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('show_req') }}" class="nav-link">
                                <span>Request Validasi Gaji</span>
                            </a>
                        </ul>
                    </div>
                </li>
                @elseif (Auth::user()->level == 'manager')
                <li class="menu-title"><span>Manager</span></li>
                <li class="nav-item">
                    <a href="{{ route('validasi_gaji') }}" class="nav-link">
                        <i class="mdi mdi-text-box-check"></i><span>Validasi Slip Gaji</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('laporan_gaji') }}" class="nav-link">
                        <i class="mdi mdi-archive"></i><span>Laporan Gaji Karyawan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarMultilevel">
                        <i class="mdi mdi-account-cash"></i> <span>Laporan Pajak</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarMultilevel">
                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('laporan_bulan') }}" class="nav-link">
                                <span>Pajak Bulanan</span>
                            </a>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <a href="{{ route('laporan_pajak') }}" class="nav-link">
                                <span>Pajak Tahunan</span>
                            </a>
                        </ul>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
