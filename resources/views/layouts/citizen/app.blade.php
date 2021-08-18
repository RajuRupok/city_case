<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="fixed">
    <head>
        @include('layouts.citizen.partials.header')
    </head>
    <body class="main-body">
        @include('layouts.citizen.partials.navbar')

        <main id="main">
            @yield('content')
        </main>

        @include('layouts.citizen.partials.script')

        {{-- Sweet Alert --}}
        @include('sweetalert::alert')
    </body>
</html>
