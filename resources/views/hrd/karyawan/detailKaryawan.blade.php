@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Karyawan</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('show_gaji') }}">Detail Data Karyawan</a></li>
                    <li class="breadcrumb-item active">Karyawan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                {{-- <?php 
                    switch ($bulan) {
                        case '01':
                            $bulan_ini = "Januari";
                        break;
                        case '02':
                            $bulan_ini = "Februari";
                        break;
                        case '03':
                            $bulan_ini = "Maret";
                        break;
                        case '04':
                            $bulan_ini = "April";
                        break;
                        case '05':
                            $bulan_ini = "Mei";
                        break;
                        case '06':
                            $bulan_ini = "Juni";
                        break;
                        case '07':
                            $bulan_ini = "Juli";
                        break;
                        case '08':
                            $bulan_ini = "Agustus";
                        break;
                        case '09':
                            $bulan_ini = "September";
                        break;
                        case '10':
                            $bulan_ini = "Oktober";
                        break;
                        case '11':
                            $bulan_ini = "November";
                        break;
                        case '12':
                            $bulan_ini = "Desember";
                        break;
                        default:
                            $bulan_ini = "Tidak di ketahui";		
                        break;
                    }
                    ?> --}}
                {{-- <h4 class="card-title mb-0">Detail Data Gaji Bulan {{ $bulan_ini }} Tahun {{ $tahun }}</h4> --}}
            </div>
            <div class="card-body">
                <div id="customerList">
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                @foreach ($karyawan as $karyawan)
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>:</th>
                                        <th>{{ $karyawan->nama }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        <td>{{ $karyawan->nama_jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td>Jl. {{ $karyawan->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tempat Lahir</td>
                                        <td>:</td>
                                        <td>{{ $karyawan->tempat_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal Lahir</td>
                                        <td>:</td>
                                        <td>{{ $karyawan->tanggal_lahir }}</td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>:</td>
                                        <td>{{ $karyawan->agama }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gaji</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($karyawan->gaji,2,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Kelamin</td>
                                        <td>:</td>
                                        <td>{{ $karyawan->kelamin }}</td>
                                    </tr>
                                    <tr>
                                        <td>Telepon</td>
                                        <td>:</td>
                                        <td>{{ $karyawan->telepon }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggungan</td>
                                        <td>:</td>
                                        <td>{{ $karyawan->tanggungan }} Tanggungan</td>
                                    </tr>
                                    <tr>
                                        <td>Status Pernikahan</td>
                                        <td>:</td>
                                        <td>{{ $karyawan->status }}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <a href="{{ route('show_karyawan') }}"><button type="button" class="btn btn-light">Close</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
