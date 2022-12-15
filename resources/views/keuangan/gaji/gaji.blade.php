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
                    <table class="display" id="myTable">
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
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

</script>
@endsection
