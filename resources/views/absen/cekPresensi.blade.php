@extends('layouts.login')

@section('content')
<div class="auth-page-wrapper pt-5">
    <!-- auth page bg -->
    <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
        <div class="bg-overlay"></div>

        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>

    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <div>
                            <a href="index.html" class="d-inline-block auth-logo">
                                <img src="assets/images/logo-light.png" alt="" height="20">
                            </a>
                        </div>
                        <p class="mt-3 fs-15 fw-medium">PT. Surya Globalindo Sejahtera</p>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">

                        @foreach($absensi as $absensi)
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <?php $i=1?>
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <h5>{{ $absensi->nama }}</h5>
                                    {{-- <p class="text-muted">Silahkan Melakukan Presensi</p> --}}
                                </div>
                                <div class="p-2 mt-12">
                                    <div class="mt-12">
                                        <div class="container">
                                            <div class="row">
                                                @if($absensi->keluar == null)
                                                    <div class="col-xs-6">
                                                        <form
                                                            action="{{ route('cek_in',$absensi->id_karyawan) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id_karyawan"
                                                                value="{{ $absensi->id_karyawan }}">
                                                            <button class="btn btn-success w-100 disabled"
                                                                type="submit">Check
                                                                In</button>
                                                        </form>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <form
                                                            action="{{ route('cek_out',$absensi->id_karyawan) }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id_karyawan"
                                                                value="{{ $absensi->id_karyawan }}">
                                                            <button class="btn btn-danger w-100 disabled" type="submit">Check
                                                                Out</button>
                                                        </form>
                                                    </div>
                                            </div>
                                        @else
                                            <div class="col-xs-6">
                                                <form
                                                    action="{{ route('cek_in',$absensi->id_karyawan) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_karyawan"
                                                        value="{{ $absensi->id_karyawan }}">
                                                    <button class="btn btn-success w-100" type="submit">Check
                                                        In</button>
                                                </form>
                                            </div>
                                            <div class="col-xs-6">
                                                <form
                                                    action="{{ route('cek_out',$absensi->id_karyawan) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_karyawan"
                                                        value="{{ $absensi->id_karyawan }}">
                                                    <button class="btn btn-danger w-100 disabled" type="submit">Check
                                                        Out</button>
                                                </form>
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <?php if($i >=1){break;} 
                            $i=$i+1;
                            ?>
            @endforeach
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
</div>
<!-- end row -->
</div>
<!-- end container -->
</div>
<!-- end auth page content -->

<!-- footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <script>
                        document.write(new Date().getFullYear())

                    </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- end Footer -->
</div>
@endsection
