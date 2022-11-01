@extends('layouts.app')
@section('content')
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
                {{-- <?php 
                    switch ($slip->bulan) {
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
                <h4 class="card-title mb-0">Detail Data Gaji</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('simpan_validasi') }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div id="customerList">
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                @foreach ($slip as $slip)
                                <thead>
                                    <input type="hidden" name="id_gaji" value="{{ $slip->id_gaji }}">
                                    <tr>
                                        <th>Nama</th>
                                        <th>:</th>
                                        <th>{{ $slip->nama }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        <td>{{ $slip->nama_jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <td>Tanggungan</td>
                                        <td>:</td>
                                        <td>{{ $slip->tanggungan }} Tanggungan</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>:</td>
                                        <td>{{ $slip->status }}</td>
                                    </tr>
                                    <tr>
                                        <td>Gaji Pokok</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($slip->gaji,2,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lembur</td>
                                        <td>:</td>
                                        <td>{{ $slip->lembur }} Jam</td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Hari Kerja</td>
                                        <td>:</td>
                                        <td>{{ $slip->jumlah_hari }} Hari</td>
                                    </tr>
                                    <tr>
                                        <td>Total Tunjangan Makan</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($slip->total_tmakan,2,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Total Tunjangan Transportasi</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($slip->total_ttransportasi,2,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Upah Lembur</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($slip->upah_lembur,2,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Penghasilan Bruto</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($slip->penghasilan_bruto,2,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Jabatan</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($slip->biaya_jabatan,2,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jaminan Hari Tua</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($slip->jaminan_ht,2,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <td>Jaminan Pensiun</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($slip->jaminan_p,2,',','.')}}</td>
                                    </tr>
                                <tfoot>
                                    <tr>
                                        <td>Penghasilan Bersih</td>
                                        <td>:</td>
                                        <td>Rp {{ number_format($slip->penghasilan_bersih,2,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pajak Penghasilan 1 Tahun</td>
                                        <td>:</td>
                                        <td>@if ($slip->pajak_penghasilan < 0)
                                            Tidak Kena Pajak
                                            @else
                                            Rp {{ number_format($slip->pajak_penghasilan,2,',','.')}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pajak Penghasilan 1 Bulan</td>
                                        <td>:</td>
                                        <td>
                                            @if ($slip->pajak_penghasilan < 0)
                                            Tidak Kena Pajak
                                            @else
                                            Rp {{ number_format($slip->pajak_penghasilan/12,2,',','.')}}
                                        @endif
                                        </td>
                                    </tr>
                                </tfoot>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                {{-- <form method="POST" action="{{route('print_out')}}">
                                @csrf
                                @foreach ($karyawan as $data)
                                <input type="hidden" name="nama" value="{{$data->nama}}">
                                <input type="hidden" name="nip" value="{{$data->nip}}">
                                <input type="hidden" name="jabatan" value="{{$data->nama_jabatan}}">
                                <input type="hidden" name="gapok" value="{{$data->gaji}}">
                                <input type="hidden" name="bulan" value="{{$bulan}}">
                                @endforeach

                                </form> --}}
                                @if ($slip->status_slip == 1)
                                <button class="btn btn-primary" type="submit">Validasi Slip</button>
                                @else
                                <button class="btn btn-primary" type="submit" disabled>Telah Di Validasi</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
