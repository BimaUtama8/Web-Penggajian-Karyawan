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
                    <h5 class="card-title mb-3">Info</h5>
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
                                    <th class="ps-0" scope="row">Tunjangan Makan :</th>
                                    <td class="text-muted">Rp {{ number_format($data->tunjangan_makan,2,',','.') }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Tunjangan Transportasi :</th>
                                    <td class="text-muted">Rp {{ number_format($data->tunjangan_transportasi,2,',','.') }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Gaji Pokok :</th>
                                    <td class="text-muted">Rp {{ number_format($data->gaji,2,',','.') }}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Jaminan Hari Tua :</th>
                                    <td class="text-muted">Rp {{ number_format($data->gaji * ($jht['nilai']/100),2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Jaminan Pensiun :</th>
                                    <td class="text-muted">Rp {{ number_format($data->gaji * ($jp['nilai']/100),2,',','.')}}</td>
                                </tr>
                                <tr>
                                    <th class="ps-0" scope="row">Jumlah Hari Kerja :</th>
                                    <td class="text-muted">{{$jhk}} Hari</td>
                                </tr>                           
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- end card body -->
            </div>
        </div>
      </div>
  </div>
</div>
@endsection