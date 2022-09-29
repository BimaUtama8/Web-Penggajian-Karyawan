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
                <h4 class="card-title mb-0">Detail Data Gaji</h4>
            </div>
            <div class="card-body">
                <div id="customerList">
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Informasi Penghasilan Karyawan</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    @foreach ($karyawan as $data)
                                    <tr>
                                        <th class="ps-0" scope="row">Nama :</th>
                                        <td class="text-muted">{{ $data->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Jabatan :</th>
                                        <td class="text-muted">{{ $data->nama_jabatan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Tanggungan :</th>
                                        <td class="text-muted">{{ $data->tanggungan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Status :</th>
                                        <td class="text-muted">{{ $data->status }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Gaji Pokok :</th>
                                        <td class="text-muted">Rp {{ number_format($data->gaji,2,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Lembur :</th>
                                        <td class="text-muted">{{ $hasil }} Jam</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Jumlah Hari Kerja :</th>
                                        <td class="text-muted">{{$jhk}} Hari</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Tunjangan Makan * ({{($jhk)}}) :</th>
                                        <td class="text-muted">Rp {{ number_format($ht_makan,2,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Tunjangan Transportasi * ({{($jhk)}}) :</th>
                                        <td class="text-muted">Rp {{ number_format($ht_transportasi,2,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Upah Lembur :</th>
                                        <td class="text-muted">Rp </td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <th class="ps-0" scope="row">Penghasilan Bruto {{$jhk}} Hari Kerja :</th>
                                        <td class="text-muted">Rp {{ number_format($penghasilan_bruto,2,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Biaya Jabatan :</th>
                                        <td class="text-muted">Rp {{ number_format($ht_jabatan,2,',','.') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Jaminan Hari Tua :</th>
                                        <td class="text-muted">Rp {{ number_format($ht_jht,2,',','.')}}</td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Jaminan Pensiun :</th>
                                        <td class="text-muted">Rp {{ number_format($ht_jp,2,',','.')}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <th class="ps-0" scope="row">Penghasilan Bersih {{$jhk}} Hari Kerja :</th>
                                        <td class="text-muted">Rp {{ number_format($penghasilan_bersih,2,',','.') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Pajak Penghasilan (1 Tahun) :</th>
                                        <td class="text-muted">
                                            @if ($pph == 'Tidak Kena Pajak')
                                            {{ $pph }}
                                            @else
                                            Rp {{ number_format($pph,2,',','.')}}</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th class="ps-0" scope="row">Pajak Penghasilan (1 Bulan) :</th>
                                        <td class="text-muted">
                                            @if ($pph == 'Tidak Kena Pajak')
                                            {{ $pph_bulan }}
                                            @else
                                            Rp {{ number_format($pph_bulan,2,',','.')}}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="submit" class="btn btn-primary" id="add-btn">Cetak Slip</button>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
