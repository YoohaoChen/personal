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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    @yield('style')
    <link rel="Shortcut icon" href="/favicon.ico">
</head>
<body>
<div class="main-body">
    <header class="header">
        <div class="container">
            <div class="pull-left">
                <span style="color: black;">Yoohao</span>
            </div>
            <div class="pull-right">
                <ul class="nav nav-tabs">
                    <li>
                        @if (!Auth::guest())
                            <a href="{{ url('admin/index') }}">{{ Auth::user()->name }}</a>
                        @endif
                    </li>
                    <li><a href="{{ route('home') }}">首页</a></li>
                    <li><a href="{{ route('photography') }}">摄影</a></li>
                    <li><a href="{{ route('guitar') }}">吉他</a></li>
                    <li><a href="{{ route('program') }}">编程</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container">
        @yield('content')
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <span class="pull-left about">
                    <a href="{{ route('about') }}">About Me</a>
                </span>
                <span class="pull-right copy-right">CopyRight &copy; <a href="{{ route('home') }}">yoohao</a> 版权所有</span>
            </div>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('javascript')
</body>
</html>
