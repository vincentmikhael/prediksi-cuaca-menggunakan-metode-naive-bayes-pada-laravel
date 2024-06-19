<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @include('layouts.header')
    <title>Naive Bayes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>

        .card, .card-body, .card-header{
            border: 0px !important;
        }
        .card{
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }
        .nav-link.active{
            background-color: white !important;
            color: black !important;
        }
    </style>
</head>

<body style="background-color: rgb(244,246,249) !important;" class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper" style="background-color: rgb(244,246,249) !important;">
        <!-- Navbar -->
 
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- footer -->
        @include('layouts.footer')
    </div>
</body>

</html>
