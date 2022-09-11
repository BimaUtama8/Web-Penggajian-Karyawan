@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Iuran</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Update Data Iuran</a></li>
                    <li class="breadcrumb-item active">Iuran</li>
                </ol>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Data Iuran</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <label for="customername-field" class="form-label">Jaminan Hari Tua</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="jht" name="jht" placeholder="" value="{{$jht['nilai']}}">
                            <label for="firstnamefloatingInput">Masukkan Jaminan Hari Tua</label>
                        </div>
                        <br>
      
                        <label for="customername-field" class="form-label">Jaminan Pensiun</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="jp" name="jp" placeholder="" value="{{$jp['nilai']}}">
                            <label for="alamatfloatingInput">Masukkan Jaminan Pensiun</label>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <a href="{{ route('show_karyawan') }}"><button type="button" class="btn btn-light">Close</button></a>
                            <button type="submit" class="btn btn-primary" id="add-btn">Update Iuran</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection