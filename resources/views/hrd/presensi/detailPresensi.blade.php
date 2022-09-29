@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Detail Presensi</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Detail Data Presensi</a></li>
                    <li class="breadcrumb-item active">Detail Presensi</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Detail Data Presensi</h4>
            </div>
            <div class="card-header">
                <table>
                    <tbody>
                        <tr>
                            <th>Jumlah Hari Kerja</th>
                            <th>&nbsp;:&nbsp;</th>
                            <th>{{$jhk}} Hari</th>
                        </tr>
                        <tr>
                            <th>Lembur</th>
                            <th>&nbsp;:&nbsp;</th>
                            <th>{{ $jum_lem }} Jam</th>
                        </tr>
                        <tr>
                            <th>Upah Lembur</th>
                            <th>&nbsp;:&nbsp;</th>
                            <th>Rp {{ number_format($total_upah,2,',','.') }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Masuk</th>
                            <th scope="col">Keluar</th>
                            <th scope="col">Lembur</th>
                            <th scope="col">Uang Lembur</th>
                            <th scope="col">Hari</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($presensi as $presensi)
                        <?php
                    $time           = $presensi['keluar'];
                    $split          = explode(" ", $time);
                    $get_time       = $split[1];
                    $batas_keluar   = strtotime('17:00:00');
                    $keluar         = strtotime($get_time);
                    $diff           = $keluar - $batas_keluar;
                    $total_diff     = $diff / 3600;
                    if($total_diff < 1){
                        $hasil   = floor($total_diff);
                        if($hasil < 0){
                            $hasil = 0;
                        }
                    }else if($diff >= 0){
                        $hasil   = floor($total_diff);
                    }

                    //Upah Sejam
                    $upah_jam = $presensi['gaji'] * 0.00578;
                    //Upah Lembur 1 Jam
                    $upah_perjam = $upah_jam * 1.5;
                    if($hasil < 1){
                        $upah_lembur = 0;
                    }else if($hasil == 1){
                        $upah_lembur = $upah_perjam;
                    }else if($hasil == 2){
                        $upah_lembur= $upah_jam * 2 + $upah_perjam;
                    }else if($hasil > 2){
                        $upah_lembur = ($upah_jam * 2) + ($upah_perjam * $hasil);
                    }

                    $hari =  date('l', strtotime($presensi ['masuk']));
                    switch($hari){
                    case 'Sunday':
                        $hari_ini = "Minggu";
                    break;
            
                    case 'Monday':			
                        $hari_ini = "Senin";
                    break;
            
                    case 'Tuesday':
                        $hari_ini = "Selasa";
                    break;
            
                    case 'Wednesday':
                        $hari_ini = "Rabu";
                    break;
            
                    case 'Thursday':
                        $hari_ini = "Kamis";
                    break;
            
                    case 'Friday':
                        $hari_ini = "Jumat";
                    break;
            
                    case 'Saturday':
                        $hari_ini = "Sabtu";
                    break;
                    
                    default:
                        $hari_ini = "Tidak di ketahui";		
                    break;
                }
                
                ?>
                        <tr>
                            <td>{{ $presensi ['nama'] }}</td>
                            <td>{{ $presensi ['masuk'] }}</td>
                            <td>{{ $presensi ['keluar'] }}</td>
                            <td>{{ $hasil }} Jam</td>
                            <td>Rp {{ number_format($upah_lembur,2,',','.') }}</td>
                            <td>{{ $hari_ini }}</td>
                            <td><span class="badge badge-soft-success">Masuk</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
