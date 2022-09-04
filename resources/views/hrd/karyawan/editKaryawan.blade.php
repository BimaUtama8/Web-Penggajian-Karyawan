@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Karyawan</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Update Data Karyawan</a></li>
                    <li class="breadcrumb-item active">Karyawan</li>
                </ol>
            </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Data Karyawan</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('store_edit_karyawan', $data->id_karyawan) }}" method="POST">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <label for="customername-field" class="form-label">Nama Karyawan</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="namakaryawan" name="namakaryawan" placeholder="" value="{{ $data->nama }}">
                            <label for="firstnamefloatingInput">Masukkan Nama Karyawan</label>
                        </div>
                        <br>
      
                        <label for="customername-field" class="form-label">Alamat</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="" value="{{ $data->alamat }}">
                            <label for="alamatfloatingInput">Masukkan  Alamat</label>
                        </div>
                        <br>

                        <label for="customername-field" class="form-label">Tempat Lahir</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="" value="{{ $data->tempat_lahir }}">
                            <label for="tempatlahirfloatingInput">Masukkan Tempat Lahir</label>
                        </div>
                        <br>

                        
                        <label for="customername-field" class="form-label">Tanggal Lahir</label>
                        <div class="form-floating">
                            <input type="date" class="form-control" id="tgl_lahir" name="tanggal_lahir" placeholder="" value="{{ $data->tanggal_lahir }}">
                            <label for="tgllahirfloatingInput">Masukkan Tanggal Lahir</label>
                        </div>
                        <br>

                        <label for="agama-field" class="form-label">Agama</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="agama">
                            <option value="{{ $data->agama }}">{{ $data->agama }}</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Hindhu">Hindhu</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Katolik">Katolik</option>
                        </select>
                        
                        <label for="customername-field" class="form-label">Gaji</label>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="gaji" name="gaji" placeholder="" value="{{ $data->gaji }}">
                            <label for="gajifloatingInput">Masukkan Gaji</label>
                        </div>
                        <br>

                        <label for="customername-field" class="form-label">Jenis Kelamin</label>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="jekel" id="flexRadioDefault1" value="Laki-Laki">
                            <label class="form-check-label" for="flexRadioDefault1">Laki-Laki</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jekel" id="flexRadioDefault2" value="Perempuan">
                            <label class="form-check-label" for="flexRadioDefault2">Perempuan</label>
                        </div>
                        <br>
                        
                        <label for="customername-field" class="form-label">Telepon</label>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="telepon" id="telepon" placeholder="" value="{{ $data->telepon }}">
                            <label for="teleponfloatingInput">Masukkan Telepon</label>
                        </div>
                        <br>

                        <label for="agama-field" class="form-label">Tanggungan</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="tanggungan">
                            <option value="{{ $data->tanggungan }}">{{ $data->tanggungan }}</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>

                        <label for="agama-field" class="form-label">Status Pernikahan</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="status">
                            <option value="{{ $data->status }}">{{ $data->status }}</option>
                            <option value="Menikah">Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                        </select>

                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <a href="{{ route('show_karyawan') }}"><button type="button" class="btn btn-light">Close</button></a>
                            <button type="submit" class="btn btn-primary" id="add-btn">Update Karyawan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection