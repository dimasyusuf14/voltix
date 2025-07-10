<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">

</head>

<body class="bg-blue-50 font-sans">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
         
        @include('admin.layouts.sidebar')


        <!-- Main Content -->
        <main class="flex-1 p-6">
            <!-- Topbar -->
            @include('admin.layouts.topbar')
            @yield('content')
        </main>
    </div>
</body>

</html>
