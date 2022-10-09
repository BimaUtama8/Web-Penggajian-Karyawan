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
                <h4 class="card-title mb-0">Detail Data Gaji Bulan</h4>
            </div>
            <div class="card-body">
                <div id="customerList">
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('hitung_gaji') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_karyawan" value="{{ $id_kar }}">
                            <select class="form-select mb-3" aria-label="Default select example" name="bulan" required>
                                <option selected disabled>Bulan</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                            <select class="form-select mb-3" aria-label="Default select example" name="tahun" required>
                                <option selected disabled>Tahun</option>
                                @foreach ($tahun as $tahun)
                                <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                                @endforeach
                            </select>
                            <div class="hstack gap-2 justify-content-end">
                                <a href="{{ route('show_gaji') }}"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button></a>
                                <button type="submit" class="btn btn-primary" id="add-btn">Lanjutkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
