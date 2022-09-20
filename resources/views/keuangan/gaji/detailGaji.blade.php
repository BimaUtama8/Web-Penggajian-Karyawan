@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0 font-size-18">Gaji</h4>
          <div class="page-title-right">
              <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Data Gaji</a></li>
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
              <h4 class="card-title mb-0">Data Gaji</h4>
          </div>
          <div class="card-body">
            <div id="customerList">
            <table>
                @foreach($karyawan as $data)
                <thead>
                <tr>
                    <th>Nama</th>
                    <th>:</th>
                    <th>{{ $data->nama }}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ $data->nama_jabatan }}</td>
                </tr>
                <tr>
                    <td>Tunjangan Makan</td>
                    <td>:</td>
                    <td>Rp {{ number_format($data->tunjangan_makan,2,',','.') }}</td>
                </tr>
                <tr>
                    <td>Tunjangan Transportasi</td>
                    <td>:</td>
                    <td>Rp {{ number_format($data->tunjangan_transportasi,2,',','.') }}</td>
                </tr>
                <tr>
                    <td>Gaji</td>
                    <td>:</td>
                    <td>Rp {{ number_format($data->gaji,2,',','.') }}</td>
                </tr>
                <tr>
                    <td>JHT</td>
                    <td>:</td>
                    <td>Rp {{ number_format($data->gaji * ($jht['nilai']/100),2,',','.')}}</td>
                </tr>
                <tr>
                    <td>JP</td>
                    <td>:</td>
                    <td>Rp {{ number_format($data->gaji * ($jp['nilai']/100),2,',','.')}}</td>
                </tr>
                <tr>
                    <td>Jumlah Hari Kerja</td>
                    <td>:</td>
                    <td>{{$jhk}} Hari</td>
                </tr>
                <tr>
                    <td>Jumlah Jam Kerja</td>
                    <td>:</td>
                    <td></td>
                </tr>
                </tbody>
                @endforeach
            </table>
            </div>
        </div>
      </div>
  </div>
</div>
@endsection