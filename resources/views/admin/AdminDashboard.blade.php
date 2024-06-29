<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Panel Kontrol </title>

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
    <style>
       
    </style>
</head>

<body>
    <!-- TAM - KAPSAYICI -->
    <div class="main-wrapper">

        <!-- SOL - SIDEBAR -->
        @include('admin.body.Sidebar')
        <!-- SAG - SAYFA KAPSAYICI -->
        <div class="page-wrapper">

            <!-- ÜST - NAVBAR -->
            @include('admin.body.Header')
            
            <div class="page-content">
            <!-- ORTA - ICERIK BOLUMU - DEGISKEN -->
            @yield('admin')
            </div>
            <!-- ALT - FOOTER -->
            @include('admin.body.Footer')
            

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