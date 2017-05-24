<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    @section('css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @show
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="Shortcut icon" href="/favicon.ico">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    @section('javascript')
        <script src="{{ asset('js/app.js') }}"></script>
    @show
</body>
</html>
