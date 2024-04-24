<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Zircos - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

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