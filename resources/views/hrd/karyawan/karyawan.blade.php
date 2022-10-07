@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0 font-size-18">Karyawan</h4>
          <div class="page-title-right">
              <ol class="breadcrumb m-0">
                  <li class="breadcrumb-item"><a href="javascript: void(0);">Data Karyawan</a></li>
                  <li class="breadcrumb-item active">Karyawan</li>
              </ol>
          </div>
      </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
      <div class="card">
          <div class="card-header">
              <h4 class="card-title mb-0">Data Karyawan</h4>
          </div><!-- end card header -->

          <div class="card-body">
              <div id="customerList">
                  <div class="row g-4 mb-3">
                      <div class="col-sm-auto">
                          <div>
                              <a href="{{ route("tambah_karyawan") }}"><button type="button" class="btn btn-primary add-btn" ><i class="ri-add-line align-bottom me-1"></i> Add</button></a>
                          </div>
                      </div>
                  </div>

                  <div class="table-responsive table-card mt-3 mb-1">
                      <table class="table align-middle table-nowrap" id="customerTable">
                          <thead class="table-light">
                              <tr>
                                  {{-- <th class="sort" data-sort="nip">ID Karyawan</th> --}}
                                  <th class="sort" data-sort="nama">Nama Karyawan</th>
                                  <th class="sort" data-sort="alamat">Alamat</th>
                                  <th class="sort" data-sort="telepon">Telepon</th>
                                  <th class="sort" data-sort="tempat_lahir">Tempat Lahir</th>
                                  <th class="sort" data-sort="tanggal_lahir">Tanggal Lahir</th>
                                  <th class="sort" data-sort="action">Action</th>
                              </tr>
                          </thead>
                          <tbody class="list form-check-all">
                            @foreach ($karyawan as $karyawan)                            
                              <tr>
                                  {{-- <td class="nip">{{ $karyawan ['id_karyawan'] }}</td> --}}
                                  <td class="nama">{{ $karyawan ['nama'] }}</td>
                                  <td class="alamat">{{ $karyawan ['alamat'] }}</td>
                                  <td class="telepon">{{ $karyawan ['telepon'] }}</td>
                                  <td class="tempat_lahir">{{ $karyawan ['tempat_lahir'] }}</td>
                                  <td class="tanggal_lahir">{{ $karyawan ['tanggal_lahir'] }}</td>
                                  <td>
                                      <div class="d-flex gap-2">
                                          <div class="edit">
                                              <a href="{{ route('edit_karyawan', $karyawan->id_karyawan) }}" class="btn btn-sm btn-primary edit-item-btn">Edit</a>
                                          </div>
                                          <div class="remove">
                                              <a href="{{ route('hapus_karyawan', $karyawan->id_karyawan) }}" class="btn btn-sm btn-danger remove-item-btn">Delete</a>
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