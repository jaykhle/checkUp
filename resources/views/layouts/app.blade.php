<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>checkUp - @yield('title')</title>

    @include('partials._stylesheets')
    @yield('stylesheets')
</head>
<body>
    @include('partials._navbar')
    <div id="app">
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        @yield('content') 
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('partials._scripts')
    @yield('scripts')
</body>
</html>
