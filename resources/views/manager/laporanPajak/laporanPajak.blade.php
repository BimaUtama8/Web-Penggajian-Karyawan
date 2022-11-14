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
                            <br>
                            <label for="date" class="col-sm-3 col-form-label">Pilih Tahun Laporan</label>
                            <div class="col-sm-12">
                                <div class="input-group date" id="datepicker">
                                    <input type="text" class="form-control" name="tahun">
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-white">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <br>
                            <div class="hstack gap-2 justify-content-end">
                                <button type="submit" class="btn btn-primary" id="add-btn">Download</button>
                            </div>
                            {{-- <select class="form-select mb-3" aria-label="Default select example" name="tahun" required>
                            <option selected disabled>Tahun</option>
                            @foreach ($tahun as $tahun)
                                <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}</option>
                            @endforeach
                            </select> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
<script type="text/javascript">
    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });

</script>
@endpush
@endsection
