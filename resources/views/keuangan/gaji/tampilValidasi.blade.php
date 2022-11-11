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
                        <div class="col-sm-auto">
                            <div>
                                <a href="{{ route("show_req") }}"><button type="button" class="btn btn-light add-btn" ></i>Close</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="demo">
                            <thead class="table-light">
                                <tr>
                                    {{-- <th class="sort" data-sort="npwp">NPWP</th> --}}
                                    <th class="sort" data-sort="nk">Nama Karyawan</th>
                                    <th class="sort" data-sort="nj">Nama Jabatan</th>
                                    <th class="sort" data-sort="tm">Tanggal Masuk</th>
                                    <th class="sort" data-sort="gaji">Gaji Bersih</th>    
                                    <th class="sort" data-sort="status">Status</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @foreach ($data as $kar)
                                <tr>
                                    {{-- <td class="npwp">{{ $kar ['npwp'] }}</td> --}}
                                    <td class="nk">{{ $kar ['nama'] }}</td>
                                    <td class="nj">{{ $kar ['nama_jabatan'] }}</td>
                                    <td class="tm">{{ $kar ['tanggal_masuk'] }}</td>
                                    <td class="gaji">Rp {{ number_format($kar ['penghasilan_bersih'],2,',','.') }}</td>
                                    <td class="status">
                                        @if ($kar['status_slip'] == 0 || $data['status_slip'] == null)
                                            <span class="badge badge-soft-danger">Belum Validasi</span>
                                        @elseif($kar['status_slip'] == 1)
                                            <span class="badge badge-soft-warning">Pending</span>
                                        @else
                                            <span class="badge badge-soft-success">Telah Di Validasi</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
