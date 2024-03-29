@extends('layouts.app')
@section('content')
@if (session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Validasi Slip Gaji</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Validasi Slip Gaji</a></li>
                    <li class="breadcrumb-item active">Validasi Slip Gaji</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Validasi Slip Gaji</h4>
            </div>
            <div class="card-body">
                        <table class="display" id="myTable">
                            <thead class="table-light">
                                <tr>
                                    <th class="sort" data-sort="nama">Nama Karyawan</th>
                                    <th class="sort" data-sort="namajabatan">Nama Jabatan</th>
                                    <th class="sort" data-sort="gaji">Bulan</th>
                                    <th class="sort" data-sort="tahun">Tahun</th>
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($data as $data)
                                <tr>
                                    <td class="nama">{{ $data['nama'] }}</td>
                                    <td class="namajabatan">{{ $data['nama_jabatan'] }}</td>
                                    <td class="bulan"><?php 
                                    switch ($data['bulan']) {
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
                                    ?>{{ $bulan_ini }}</td>
                                    <td class="tahun">{{ $data['tahun'] }}</td>
                                    <td class="status">
                                        @if ($data['status_slip'] == 1)
                                            <span class="badge badge-soft-success">Lunas</span>
                                        @else
                                            <span class="badge badge-soft-danger">Belum Lunas</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a href="{{ route('detail_slip', $data->id_gaji) }}" class="btn btn-sm btn-success edit-item-btn">Detail</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
@endsection
