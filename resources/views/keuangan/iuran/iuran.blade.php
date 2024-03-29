@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0 font-size-18">Iuran</h4>
          <div class="page-title-right">
              <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Data Iuran</a></li>
                  <li class="breadcrumb-item active">Iuran</li>
              </ol>
          </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title mb-0">Data Iuran</h4>
          </div>
          <div class="card-body">
            <div id="customerList">
            <div class="row g-4 mb-3">
                </div>
                <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table align-middle table-nowrap" id="customerTable">
                        <thead class="table-light">
                            <tr>
                                <th class="sort" data-sort="namak">Nama Karyawan</th>
                                <th class="sort" data-sort="namajabatan">Nama Jabatan</th>
                                <th class="sort" data-sort="gaji">Gaji</th>
                                <th class="sort" data-sort="jht">Jaminan Hari Tua</th>
                                <th class="sort" data-sort="jp">Jaminan Pensiun</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @foreach ($karyawan as $kar)                            
                            <tr>
                                <td class="nama">{{ $kar ['nama'] }}</td>
                                <td class="namajabatan">{{ $kar ['nama_jabatan'] }}</td>
                                <td class="gaji">Rp {{ number_format($kar ['gaji'],2,',','.') }}</td>
                                <td class="jht">Rp {{ number_format($kar ['gaji'] * ($jht['nilai']/100),2,',','.') }}</td>
                                <td class="jp">Rp {{ number_format($kar ['gaji'] * ($jp['nilai']/100),2,',','.') }}</td>
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
</div>
@endsection