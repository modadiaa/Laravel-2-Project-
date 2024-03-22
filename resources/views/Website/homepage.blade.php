<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="@yield('optionn')">
    <meta name="keywords" content="@yield('keyword')">

    @foreach (\App\Models\Setting::all() as $setting => $sett)
     <title> {{ $sett->title }} |  @yield('title')</title>
    @endforeach
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    @if (App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.css')}}" >
        <link rel="stylesheet" href="{{ asset('assets/site/css/style.css')}}" rel="stylesheet">
    @else
        <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap-rtl.css')}}" >
        <link rel="stylesheet" href="{{ asset('assets/site/css/style-rtl.css')}}" rel="stylesheet">

    @endif
    <link href="{{ asset('assets/site/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/site/css/owl.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/site/css/light.css')}}" rel="stylesheet">
    @if (App::getLocale() == 'en')
    @else
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    @endif
    @yield('css')
</head>
    <body style="">




    @yield('content')




    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/site/js/wow.min.js')}}"></script>
    <script src="{{asset('assets/site/js/easing.min.js')}}"></script>
    <script src="{{asset('assets/site/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/site/js/counterup.min.js')}}"></script>
    <script src="{{asset('assets/site/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/site/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/site/js/lightbox.min.js')}}"></script>
    <script src="{{asset('assets/site/js/main.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
    @endif

    @yield('js')
    </body>

</html>
