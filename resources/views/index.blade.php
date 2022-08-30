<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('login/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('login/img/favicon.png') }}">
    <title>
      Login Penggajian
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('login/css/material-dashboard.css?v=3.0.2') }}" rel="stylesheet" />
</head>
<body>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                </div>
              </div>
              @foreach ($errors->all() as $error)
                        <div class="card card-login card-hidden alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">×</button> 
                            <strong>{{ $error }}</strong>
                        </div>
                        @endforeach
              <div class="card-body">
                <form role="form" action="" method="POST" class="text-start">
                  @csrf
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label"></label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label"></label>
                    <input type="password" name="password" class="form-control">
                  </div>

                  {{-- <div class="input-group input-group-static mb-3">
                    <label for="kategori" class="ms-0">Level</label>
                    <select class="form-control" id="kategori">
                      <option value="" selected disabled>&nbsp;&nbsp;Choose Option</option>
                      <option value="HRD">&nbsp;&nbsp;HRD</option>
                      <option value="keuangan">&nbsp;&nbsp;Keuangan</option>
                    </select>
                  </div> --}}
                
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="{{ asset('login/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('login/js/core/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('login/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('login/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('login/js/plugins/chartjs.min.js') }}"></script>
</body>
</html>
  