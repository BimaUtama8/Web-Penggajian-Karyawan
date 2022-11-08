@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0 font-size-18">Laporan Pajak Tahunan</h4>
          <div class="page-title-right">
              <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Laporan Pajak Tahunan</a></li>
                  <li class="breadcrumb-item active">Laporan Pajak Tahunan</li>
              </ol>
          </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title mb-0">Laporan Pajak Tahunan</h4>
          </div>
          <div class="card-body">
            <div id="customerList">
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('print_pajak') }}" method="POST">
                        @csrf
                        <select class="form-select mb-3" aria-label="Default select example" name="tahun" required>
                            <option selected disabled>Tahun</option>
                            @foreach ($tahun as $tahun)
                                <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                            @endforeach 
                        </select>
                        <div class="hstack gap-2 justify-content-end">
                            <button type="submit" class="btn btn-primary" id="add-btn">Download</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>
@endsection