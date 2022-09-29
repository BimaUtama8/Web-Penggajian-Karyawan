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
                <form action="{{ route('sortir_gaji', $data->id_jabatan) }}" method="POST">
                @csrf
                    <div id="customerList">
                        <div class="row g-4 mb-3">
                    </div>
                    <select class="form-select mb-3" aria-label="Default select example" name="bulan"
                        onchange="this.form.submit()">
                        <option selected disabled>Bulan</option>
                        @foreach ($masuk as $masuk)
                        <option value="{{ $masuk->bulan }}">{{ $masuk->bulan }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="submit" class="btn btn-primary" id="add-btn">Sort</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
