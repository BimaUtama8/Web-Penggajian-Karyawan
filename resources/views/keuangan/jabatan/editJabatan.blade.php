@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Jabatan</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Update Data Jabatan</a></li>
                    <li class="breadcrumb-item active">Jabatan</li>
                </ol>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Data Jabatan</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('store_edit_jabatan_keuangan', $data->id_jabatan) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <label for="jabatannama-field" class="form-label">Nama Jabatan</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="namajabatan" name="namajabatan" placeholder="" value="{{ $data->nama_jabatan }}" disabled>
                            <label for="namajabatanfloatingInput">Nama Jabatan</label>
                        </div>
                        <br>
      
                        <label for="makantunjangan-field" class="form-label">Tunjangan Makan</label>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="tunjanganmakan" name="tunjanganmakan" placeholder="" value="{{ $data->tunjangan_makan }}">
                            <label for="tunjanganmakanfloatingInput">Masukkan Tunjangan Makan</label>
                        </div>
                        <br>

                        <label for="makantunjangan-field" class="form-label">Tunjangan Transportasi</label>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="tunjangantransport" name="tunjangantransportasi" placeholder="" value="{{ $data->tunjangan_transportasi }}">
                            <label for="tunjangantransportfloatingInput">Masukkan Tunjangan Transport</label>
                        </div>
                        <br>

                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <a href="{{ route('show_jabatan_keuangan') }}"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button></a>
                            <button type="submit" class="btn btn-primary" id="add-btn">Update Jabatan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection