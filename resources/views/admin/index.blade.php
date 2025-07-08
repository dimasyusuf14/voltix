<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SB Admin</title>
    <!-- CSS -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css_admin/sb-admin-2.min.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('admin.layouts.sidebar') <!-- Buat file sidebar.blade.php -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.layouts.topbar') <!-- Buat file topbar.blade.php -->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js_admin/sb-admin-2.min.js') }}"></script>
</body>

</html>
