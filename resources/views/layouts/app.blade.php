<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title',config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <livewire:styles />
    @stack('styles')
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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
    <script>
        window.addEventListener('closeModal', event => {
            $("#add-deadline").modal('hide'); 
            $("#departmentModal").modal('hide'); 
            $("#new-user").modal('hide'); 
            $("#taskModal").modal('hide'); 
            $("#updateTaskModal").modal('hide'); 
        })
    </script>
    @stack('scripts')
</body>

</html>
