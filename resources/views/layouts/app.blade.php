<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@include('includes.helpers.css')
</head>
<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

@include('includes.topbar')

@include('includes.sidebar')



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        @yield('content')

        <footer class="footer text-right">
            2015 © Inventory
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->



</div>
<!-- END wrapper -->


@include('includes.helpers.js')

</body>
</html>
