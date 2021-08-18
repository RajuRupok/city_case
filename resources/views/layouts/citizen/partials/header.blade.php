{{-- <!-- Basic --> --}}
<meta charset="UTF-8">
{{-- CSRF Token--}}
<meta name="csrf-token" content="{{ csrf_token() }}">
{{--  Page Title  --}}
<title> City Case Management || @yield('page_title') </title>
{{-- <link rel="shortcut icon" href="{{ asset('frontend/images/icon.png') }}" type="image/x-icon"> --}}

<meta name="keywords" content="Veechi Technologies" />
<meta name="description" content="Veechi Technologies">
<meta name="author" content="Veechi Technologies">

{{-- <!-- Mobile Metas --> --}}
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

@yield('stylesheet_links')

<!-- Template Main CSS File -->
<link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">

<link href="{{ asset('frontend/assets/css/custom.css') }}" rel="stylesheet">


@yield('stylesheet')
