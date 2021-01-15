<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head />

<body>
    <div id="app">
        <x-header />
        <div class="page-content">
            @yield('content')
        </div>
    </div>
    <x-footer />
</body>

</html>
