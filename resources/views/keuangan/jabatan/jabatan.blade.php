@extends('layouts.app')
@section('content')
@if (session('success_message'))
    <div class="alert alert-success">
        {{ session('success_message') }}
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Jabatan</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data Jabatan</a></li>
                    <li class="breadcrumb-item active">Jabatan</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Data Jabatan</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="customerList">
                    <div class="row g-4 mb-3">
                        {{-- <div class="col-sm-auto">
                            <div>
                                <a href="{{ route("tambah_jabatan_keuangan") }}"><button type="button"
                            class="btn btn-primary add-btn"><i class="ri-add-line align-bottom me-1"></i>
                            Add</button></a>
                    </div>
                </div> --}}
            </div>
            <table class="display" id="myTable">
                <thead class="table-light">
                    <tr>
                        <th class="sort" data-sort="namajabatan">Nama Jabatan</th>
                        <th class="sort" data-sort="tunjanganmakan">Tunjangan Makan</th>
                        <th class="sort" data-sort="tunjangantransport">Tunjangan Transportasi</th>
                        <th class="sort" data-sort="action">Action</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach ($jabatan as $jabatan)
                    <tr>
                        <td class="namajabatan">{{ $jabatan ['nama_jabatan'] }}</td>
                        <td class="tunjanganmakan">Rp {{ number_format($jabatan ['tunjangan_makan'],2,',','.') }}</td>
                        <td class="tunjangantransport">Rp
                            {{ number_format($jabatan ['tunjangan_transportasi'],2,',','.') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <div class="edit">
                                    <a href="{{ route('edit_jabatan_keuangan', $jabatan->id_jabatan) }}"
                                        class="btn btn-sm btn-primary edit-item-btn">Edit</a>
                                </div>
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
@include('sweetalert::alert')
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });

</script>
@endsection
