<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Bantu Rumah - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo-bg.png') }}">

    <!-- App css -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/4555ee8635.js" crossorigin="anonymous"></script>

</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <div class="content-page">
            <div class="content">

                <!-- Topbar Start -->
                @include('admin.layout.header')
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">
                    
                    <div class="page-wrapper">
                        @include('admin.layout.sidebar')
                        <!-- end left-sidebar-->

                        <div class="page-content">
                            <div class="card m-b-30">
                                    <div class="card-body">
                                        @yield('content')
                                    </div>
                                </div>
                        </div>

                    </div>
                    <!-- end page-wrapper-->

                </div>

            </div>
            <!-- content -->
            <!-- Footer Start -->
            @include('admin.layout.footer')
            <!-- end Footer -->

        </div>
        
    </div>
    <!-- END wrapper -->

    <!-- bundle -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>