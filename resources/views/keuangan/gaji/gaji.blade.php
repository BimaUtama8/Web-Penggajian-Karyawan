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
                    <div class="row g-4 mb-3">
                    </div>
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="demo">
                            <thead class="table-light">
                                <tr>
                                    {{-- <th class="sort" data-sort="npwp">NPWP</th> --}}
                                    <th class="sort" data-sort="nk">Nama Karyawan</th>
                                    <th class="sort" data-sort="nj">Nama Jabatan</th>
                                    <th class="sort" data-sort="tm">Tanggal Masuk</th>
                                    <th class="sort" data-sort="gaji">Gaji</th>                                    
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($karyawan as $kar)
                                <tr>
                                    {{-- <td class="npwp">{{ $kar ['npwp'] }}</td> --}}
                                    <td class="nk">{{$kar ['nama'] }}</td>
                                    <td class="nj">{{$kar ['nama_jabatan'] }}</td>
                                    <td class="tm">{{ $kar ['tanggal_masuk'] }}</td>
                                    <td class="gaji">Rp {{ number_format($kar ['gaji'],2,',','.') }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a href="{{ route('show_detail_gaji', $kar['id_karyawan'])}}"
                                                    class="btn btn-sm btn-success edit-item-btn">Detail</a>
                                            </div>
                                            {{-- <div class="slip">
                                                <a href="#" class="btn btn-sm btn-primary edit-item-btn" disabled>Cetak Slip
                                                    Gaji</a>
                                            </div> --}}
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#25a0e2,secondary:#00bd9d" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                    orders for you search.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
