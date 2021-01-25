<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Set dynamic page title -->
        @yield('page-title')
        <!-- Import bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    </head>
    <body>

        <!-- Include Header  -->
        @include('partials.main-header')

        <!-- Main content -->
        <main class="main-content">
            @yield('main-content')
        </main>

        <!-- Include Footer -->
        @include('partials.main-footer')

    </body>
</html>
