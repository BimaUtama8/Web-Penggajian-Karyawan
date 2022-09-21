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
                <th scope="col">Hari</th>
                <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($presensi as $presensi)
                    <tr>
                    <td>{{ $presensi ['nama'] }}</td>
                    <td>{{ $presensi ['masuk'] }}</td>
                    <td>{{ $presensi ['keluar'] }}</td>
                    <td></td>
                    <td>{{ date('l', strtotime($presensi ['masuk'])) }}</td>
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