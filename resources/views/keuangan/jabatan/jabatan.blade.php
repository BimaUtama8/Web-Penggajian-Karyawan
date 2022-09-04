@extends('layouts.app')
@section('content')
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
                      <div class="col-sm-auto">
                          <div>
                              <a href="{{ route("tambah_jabatan_keuangan") }}"><button type="button" class="btn btn-primary add-btn" ><i class="ri-add-line align-bottom me-1"></i> Update</button></a>
                          </div>
                      </div>
                      <div class="col-sm">
                          <div class="d-flex justify-content-sm-end">
                              <div class="search-box ms-2">
                                  <input type="text" class="form-control search" placeholder="Search...">
                                  <i class="ri-search-line search-icon"></i>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="table-responsive table-card mt-3 mb-1">
                      <table class="table align-middle table-nowrap" id="customerTable">
                          <thead class="table-light">
                              <tr>
                                  <th scope="col" style="width: 50px;">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" id="checkAll"
                                              value="option">
                                      </div>
                                  </th>
                                  <th class="sort" data-sort="namajabatan">Nama Jabatan</th>
                                  <th class="sort" data-sort="tunjanganmakan">Tunjangan Makan</th>
                                  <th class="sort" data-sort="tunjangantransport">Tunjangan Transportasi</th>
                                  <th class="sort" data-sort="action">Action</th>
                              </tr>
                          </thead>
                          <tbody class="list form-check-all">
                            @foreach ($jabatan as $jabatan)                            
                              <tr>
                                  <th scope="row">
                                      <div class="form-check">
                                          <input class="form-check-input" type="checkbox" name="chk_child"
                                              value="option1">
                                      </div>
                                  </th>
                                  <td class="id" style="display:none;"><a href="javascript:void(0);"
                                          class="fw-medium link-primary">#VZ2101</a></td>
                                  <td class="namajabatan">{{ $jabatan ['nama_jabatan'] }}</td>
                                  <td class="tunjanganmakan">{{ $jabatan ['tunjangan_makan'] }}</td>
                                  <td class="tunjangantransport">{{ $jabatan ['tunjangan_transportasi'] }}</td>
                                  <td>
                                      <div class="d-flex gap-2">
                                          <div class="edit">
                                              <button class="btn btn-sm btn-primary edit-item-btn"
                                                  data-bs-toggle="modal" data-bs-target="#showModal">Edit</button>
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

<!-- MODAL -->
{{-- <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header bg-light p-3">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"id="close-modal"></button>
          </div>
          <form>
              <div class="modal-body">

                  <div class="mb-3" id="modal-id" style="display: none;">
                      <label for="id-field" class="form-label">ID</label>
                      <input type="text" id="id-field" class="form-control" placeholder="ID" readonly />
                  </div>

                  <div class="mb-3">
                      <label for="customername-field" class="form-label">NIP</label>
                      <input type="text" id="customername-field" class="form-control" placeholder="Enter Nip"
                          required />
                  </div>

                  <div class="mb-3">
                      <label for="email-field" class="form-label">Nama Karyawan</label>
                      <input type="email" id="email-field" class="form-control" placeholder="Enter Nama Karyawan"
                          required />
                  </div>

                  <div class="mb-3">
                      <label for="phone-field" class="form-label">Telepon</label>
                      <input type="text" id="phone-field" class="form-control" placeholder="Enter No.Telepon"
                          required />
                  </div>

                  <div class="mb-3">
                      <label for="date-field" class="form-label">Tanggal Lahir</label>
                      <input type="date" id="date-field" class="form-control" placeholder="Select Tanggal Lahir" required />
                  </div>

                  <div class="mb-3">
                    <label for="date-field" class="form-label">Alamat</label>
                    <input type="text" id="date-field" class="form-control" placeholder="Enter Alamat" required />
                </div>

                  <div>
                      <label for="status-field" class="form-label">Status</label>
                      <select class="form-control" data-trigger name="status-field" id="status-field">
                          <option value="">Status</option>
                          <option value="Active">Active</option>
                          <option value="Block">Block</option>
                      </select>
                  </div>
              </div>
              <div class="modal-footer">
                  <div class="hstack gap-2 justify-content-end">
                      <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary" id="add-btn">Add Customer</button>
                      <button type="button" class="btn btn-primary" id="edit-btn">Update</button>
                  </div>
              </div>
          </form>
      </div>
  </div>
</div> --}}

{{-- <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                  id="btn-close"></button>
          </div>
          <div class="modal-body">
              <div class="mt-2 text-center">
                  <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                      colors="primary:#25a0e2,secondary:#00bd9d" style="width:100px;height:100px"></lord-icon>
                  <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                      <h4>Are you sure ?</h4>
                      <p class="text-muted mx-4 mb-0">Are you sure you want to remove this record ?</p>
                  </div>
              </div>
              <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                  <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn w-sm btn-primary" id="delete-record">Yes, Delete It!</button>
              </div>
          </div>
      </div>
  </div>
</div> --}}
@endsection