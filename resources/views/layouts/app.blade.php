<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEAL Logistics</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
</head>
<body>

    @include('layouts.nav')

    <main>
        @yield('content')
    </main>

    @includeIf('layouts.footer')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    
    <!--<script src="{{ asset('js/aos.js') }}"></script>-->
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        //AOS.init({
        //    duration: 1500,
        //    once: true
        //});
    </script>

    @stack('scripts')

</body>
</html>