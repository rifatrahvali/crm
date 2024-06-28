<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Panel Giriş </title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css {{ asset('') }} -->
    <link rel="stylesheet" href="{{ asset('/assets/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('/assets/vendors/flatpickr/flatpickr.min.css') }} ">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('/assets/css/demo1/style.css') }}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.png') }}" />

    {{-- TOAST --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
</head>

<body>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div class="page-content d-flex align-items-center justify-content-center">

                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <div class="auth-side-wrapper">
                                        <img src="{{ asset('upload/image.png')}}" width="298px" height="500px" alt="" srcset="">
                                    </div>
                                </div>
                                <div class="col-md-8 ps-md-0 mt-4">
                                    <div class="auth-form-wrapper px-4 py-5">
                                        <a href="#" class="noble-ui-logo d-block mb-2">CRM<span>APP</span></a>
                                        <h5 class="text-muted fw-normal mb-4">CRMAPP'a Hoşgeldiniz.</h5>
                                        <form class="forms-sample" method="post" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="login" class="form-label">Email & Kullanıcı Adı &
                                                    Telefon</label>
                                                <input type="text" class="form-control" name="login" id="login" required
                                                    placeholder="Email & Kullanıcı Adı & Telefon"
                                                    value="{{ old('login') }}">
                                                <span style="color:red">{{ $errors->first('login') }}</span>
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Parola</label>
                                                <input type="password" class="form-control" name="password"
                                                    id="password" required autocomplete="current-password"
                                                    placeholder="Parola">
                                                <span style="color:red">{{ $errors->first('password') }}</span>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input type="checkbox" class="form-check-input" id="authCheck">
                                                <label class="form-check-label" for="authCheck">
                                                    Hesabı Hatırla
                                                </label>
                                            </div>
                                            <div class="d-flex">
                                                <button type="submit"
                                                    class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                    <i class="btn-icon-prepend" data-feather="log-in"></i>
                                                    Giriş
                                                </button>
                                                <a href="#" class="d-block btn-icon-text mb-2 mb-md-0 ms-2 btn btn-outline-secondary">
                                                    <i class="btn-icon-prepend" data-feather="file-plus"></i>
                                                    Kayıt Ol
                                                </a>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- core:js -->
    <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src=" {{ asset('assets/vendors/flatpickr/flatpickr.min.js') }} "></script>
    <script src=" {{ asset('assets/vendors/apexcharts/apexcharts.min.js') }} "></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src=" {{ asset('/assets/vendors/feather-icons/feather.min.js') }} "></script>
    <script src=" {{ asset('/assets/js/template.js') }} "></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('/assets/js/dashboard-light.js') }}"></script>
    <!-- End custom js for this page -->

    {{-- tostr --}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    @if (Session::has('message'))
    <script>
        toastr.options={
                   "progressBar":true,
                   "closeButton":true,
               }
               toastr.success(" {{ Session::get('message') }} ");
    </script>
    @endif

</body>

</html>