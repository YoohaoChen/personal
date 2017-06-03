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
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @yield('style')
    <link rel="Shortcut icon" href="/favicon.ico">
</head>
<body>
<div class="main-body" id="app">
    <header class="header">
        <div class="container">
            <div class="navbar">
                <div class="navbar-header">
                    <a href="{{ route('home') }}">Yoohao</a>
                </div>
                <ul class="navbar-nav nav navbar-right">
                    <li>
                        <form id="logout-form" class="" action="{{ route('logout') }}" method="post">
                        <button type="submit" name="button" class="btn btn-lg btn-logout">退出</button>
                        {{ csrf_field() }}
                    </form>
                </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="" style="height: 1px;">

    </div>
    <div class="container">
        <div class="row">
            <div class="main-navigation pull-left">
                <h3>操作列表</h3>
                <div class="row">
                    <h4>摄影</h4>
                    <ul class="nav">
                        <li><a href="{{ url('admin/album') }}">相册</a></li>
                        <li><a href="#">图集</a></li>
                    </ul>
                </div>
                <div class="row">
                    <h4>吉他</h4>
                    <ul class="nav">
                        <li><a href="#">吉他谱</a></li>
                        <li><a href="#">吉他学习</a></li>
                    </ul>
                </div>
                <div class="row">
                    <h4>编程</h4>
                    <ul class="nav">
                        <li><a href="#">php</a></li>
                        <li><a href="#">web前端</a></li>
                    </ul>
                </div>
                <div class="row">
                    <h4>访问</h4>
                </div>
            </div>
            <div class="main-content pull-right">
                @yield('content')
            </div>
        </div>
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
