@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Presensi</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data Presensi</a></li>
                    <li class="breadcrumb-item active">Presensi</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Data Presensi</h4>
            </div>
            <div class="card-body">
                <div id="customerList">
                    <div class="row g-4 mb-3">
                    </div>
                    <table class="display" id="myTable">
                        <thead class="table-light">
                            <tr>
                                <th class="sort" data-sort="nk">Nama Karyawan</th>
                                <th class="sort" data-sort="ak">Alamat Karyawan</th>
                                <th class="sort" data-sort="action">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach ($karyawan as $kar)
                            <tr>
                                <td class="nk">{{ $kar ['nama'] }}</td>
                                <td class="ak">{{ $kar ['alamat'] }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="edit">
                                            {{-- {{ route('show_detail_presensi', $kar['id_karyawan'])}} --}}
                                            <a href="{{ route('show_pilih_detail', $kar['id_karyawan']) }}"
                                                class="btn btn-sm btn-success edit-item-btn">Detail</a>
                                        </div>
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
