<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/Dashboard/dashboard.css" />
    @stack('styles')
    <title> @yield('title') </title>
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <x-sidebar/>

        <!-- Main Content -->
        @yield('content')
    </div>
</body>
@stack('scripts')

</html>
