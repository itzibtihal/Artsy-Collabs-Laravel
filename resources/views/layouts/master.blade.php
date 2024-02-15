<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <title>@yield('title', 'ArtsyCollabs')</title>
</head>

<body>

    <div class="container">
        @include('partials.header')


        <!-- Sidebar Section -->
        @include('partials.sidebar')
        <!-- End of Sidebar Section -->


        <!-- Main Content -->
        <main>
            <h1>@yield('page-title', 'Dashboard')</h1>
            @yield('content')
        </main>
        <!-- End of Main Content -->


        <!-- Right Section -->
        @include('partials.right-section')
        <!-- End of Right Section -->
    </div>

    
    
    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>
