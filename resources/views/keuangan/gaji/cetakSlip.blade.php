@extends('layouts.app')
@section('content')
@if ($jhk < 1)
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Gaji</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('show_gaji') }}">Data Gaji</a></li>
                    <li class="breadcrumb-item active">Gaji</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php 
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
                    ?>
                <h4 class="card-title mb-0">Detail Data Gaji Bulan {{ $bulan_ini }} Tahun {{ $tahun }}</h4>
            </div>
            <div class="card-body">
                {{-- <form action="{{ route('edit_gaji') }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }} --}}
                    <div id="customerList">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            Tidak Ada Data
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <a href="{{ route('show_gaji') }}"><button class="btn btn-light" type="submit">Close</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@else
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Gaji</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('show_gaji') }}">Data Gaji</a></li>
                    <li class="breadcrumb-item active">Gaji</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php 
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
                    ?>
                <h4 class="card-title mb-0">Detail Data Gaji Bulan {{ $bulan_ini }} Tahun {{ $tahun }}</h4>
            </div>
            <div class="card-body">
                {{-- <form action="{{ route('edit_gaji') }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }} --}}
                    <div id="customerList">
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless mb-0">
                                    @foreach ($karyawan as $data)
                                    <thead>
                                        <input type="hidden" name="id_karyawan" value="{{ $data->id_karyawan }}">
                                        <input type="hidden" name="bulan" value="{{ $bulan }}">
                                        <input type="hidden" name="tahun" value="{{ $tahun }}">
                                        <tr>
                                            <th>Nama</th>
                                            <th>:</th>
                                            <th>{{ $data->nama }}</th>
                                        </tr>
                                        <tr>
                                            <th>NPWP</th>
                                            <th>:</th>
                                            <th>{{ $status_npwp }}</th>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Masuk</th>
                                            <th>:</th>
                                            <th>{{ $data->tanggal_masuk }}</th>
                                        </tr>
                                        <tr>
                                            <th>Jabatan</th>
                                            <th>:</th>
                                            <th>{{ $data->nama_jabatan }}</th>
                                        </tr>
                                        <tr>
                                            <th>Tanggungan</th>
                                            <th>:</th>
                                            <th>{{ $data->tanggungan }} Tanggungan</th>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <th>:</th>
                                            <th>{{ $data->status }}</th>
                                        </tr>
                                        <tr>
                                            <th>Penghasilan 1 Tahun</th>
                                            <th>:</th>
                                            <th>Rp {{ number_format($penghasilan_setahun,2,',','.') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Gaji Pokok</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($data->gaji,2,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lembur</td>
                                            <td>:</td>
                                            <td>{{ $hasil }} Jam</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Hari Kerja</td>
                                            <td>:</td>
                                            <td>{{$jhk}} Hari</td>
                                        </tr>
                                        <tr>
                                            <td>Total Tunjangan Makan</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($ht_makan,2,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total Tunjangan Transportasi</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($ht_transportasi,2,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Upah Lembur</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($total_upah,2,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Penghasilan Bruto</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($penghasilan_bruto,2,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Biaya Jabatan</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($ht_jabatan,2,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jaminan Hari Tua</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($ht_jht,2,',','.')}}</td>
                                        </tr>
                                        <tr>
                                            <td>Jaminan Pensiun</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($ht_jp,2,',','.')}}</td>
                                        </tr>
                                    <tfoot>
                                        <tr>
                                            <td>Penghasilan Bersih</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($penghasilan_bersih,2,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pajak Penghasilan 1 Tahun</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($pph,2,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pajak Penghasilan 1 Bulan</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($pph_bulan,2,',','.')}}</td>
                                        </tr>
                                    </tfoot>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <a href="{{ route('show_gaji') }}"><button class="btn btn-light" type="submit">Close</button></a>
                            <!-- <form method="POST" action="{{route('print_out')}}">
                            @csrf
                            @foreach ($karyawan as $data)
                            <input type="hidden" name="nama" value="{{$data->nama}}">
                            <input type="hidden" name="nip" value="{{$data->nip}}">
                            <input type="hidden" name="jabatan" value="{{$data->nama_jabatan}}">
                            <input type="hidden" name="gapok" value="{{$data->gaji}}">
                            <input type="hidden" name="bulan" value="{{$bulan}}">
                            @endforeach
                            <button class="btn btn-primary" type="submit">Request Validasi Slip</button>
                        </form> -->
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
</div>
@endif
@endsection
