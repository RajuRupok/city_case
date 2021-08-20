<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    {{-- CSRF Token--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{--  Page Title  --}}
    <title> City Corporation | @yield('page_title') </title>


    @include('layouts.city_corporation.partials.stylesheet')
</head>

<body>
    <div class="app">
        <div class="main-wrapper main-wrapper-1">
            {{-- Top Nav --}}
            @include('layouts.city_corporation.partials.topnav')

            {{-- Side Nav --}}
            @include('layouts.city_corporation.partials.sidenav')

            {{-- Main Content START --}}
            <div class="main-content">

                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @elseif (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif


                <ul class="breadcrumb breadcrumb-style ">
                    <li class="breadcrumb-item">
                        <a href="{{ route('city_corporation.dashboard.index') }}"><i class="fas fa-home"></i></a>
                    </li>
                    @yield('breadcrumb_section')
                </ul>

                @yield('main_content')
            </div>
            {{-- Main Content END --}}

            {{-- Footer --}}
            @include('layouts.city_corporation.partials.footer')
        </div>
    </div>

    {{-- Sweet Alert --}}
    @include('sweetalert::alert')


    @include('layouts.city_corporation.partials.scripts')

</body>
</html>
