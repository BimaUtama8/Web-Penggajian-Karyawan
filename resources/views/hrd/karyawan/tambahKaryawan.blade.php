@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Karyawan</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tambah Data Karyawan</a></li>
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
                <form>
                    <div class="modal-body">
      
                        <div class="mb-3" id="modal-id" style="display: none;">
                            <label for="id-field" class="form-label">ID</label>
                            <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                        </div>
      
                        <div class="mb-3">
                            <label for="customername-field" class="form-label">ID Karyawan</label>
                            <input type="text" id="customername-field" class="form-control" name="id" placeholder="{{ $kode_nip }}"
                                disabled />
                        </div>

                        <label for="customername-field" class="form-label">Jabatan</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="jabatan">
                            <option selected disabled>Jabatan</option>
                            @foreach ($option_jabatan as $item)
                             <option value="{{ $item->ID_JABATAN }}">{{ $item->NAMA_JABATAN }}</option>
                            @endforeach
                            
                        </select>
      
                        <label for="customername-field" class="form-label">Nama Karyawan</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="namakaryawan" name="namakaryawan" placeholder="Masukkan Nama Karyawan">
                            <label for="firstnamefloatingInput">Masukkan Nama Karyawan</label>
                        </div>
                        <br>
      
                        <label for="customername-field" class="form-label">Alamat</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat">
                            <label for="alamatfloatingInput">Masukkan  Alamat</label>
                        </div>
                        <br>

                        <label for="customername-field" class="form-label">Tempat Lahir</label>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                            <label for="tempatlahirfloatingInput">Masukkan Tempat Lahir</label>
                        </div>
                        <br>

                        
                        <label for="customername-field" class="form-label">Tanggal Lahir</label>
                        <div class="form-floating">
                            <input type="date" class="form-control" id="tgl_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir">
                            <label for="tgllahirfloatingInput">Masukkan Tanggal Lahir</label>
                        </div>
                        <br>

                        <label for="agama-field" class="form-label">Agama</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="agama">
                            <option selected disabled>Agama</option>
                            <option value="1">Islam</option>
                            <option value="2">Kristen</option>
                            <option value="3">Hindhu</option>
                            <option value="4">Konghucu</option>
                            <option value="5">Buddha</option>
                            <option value="6">Katolik</option>
                        </select>

                        
                        <label for="customername-field" class="form-label">Gaji</label>
                        <div class="form-floating">
                            <input type="number" class="form-control" id="gaji" name="gaji" placeholder="Masukkan Gaji">
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
                            <input type="number" class="form-control" name="telepon" id="telepon" placeholder="Masukkan Telepon">
                            <label for="teleponfloatingInput">Masukkan Telepon</label>
                        </div>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <a href="/karyawan"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button></a>
                            <button type="submit" class="btn btn-primary" id="add-btn">Add Karyawan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection