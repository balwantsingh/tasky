<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('includes.styles')
    <livewire:styles />
</head>

<body>
    <div id="app">
        
        <x-layouts.navbar />

        <main>
            @yield('content')
        </main>
    </div>

    <livewire:scripts />
    <!-- Scripts -->
    @include('includes.scripts')
</body>

</html>
