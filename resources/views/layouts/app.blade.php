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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iview.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    @yield('style')
    <link rel="Shortcut icon" href="/favicon.ico">
</head>
<body>
<div id="app">
    <header id="header" class="header">
        <div class="container">
            <div class="pull-left">
                <span style="color: black;">Yoohao</span>
            </div>
            <div class="pull-right">
                <i-menu mode="horizontal" v-on:on-select="menuChange">
                    @if(!Auth::guest())
                        <Menu-item name="user">
                            <Icon type="person"></Icon>
                            {{ Auth::user()->name }}
                        </Menu-item>
                    @endif
                    <Menu-item name="home">
                        <Icon type="ios-home"></Icon>
                        Home
                    </Menu-item>
                    <Menu-item name="photography">
                        <Icon type="camera"></Icon>
                        摄影
                    </Menu-item>
                    <Menu-item name="music">
                        <Icon type="music-note"></Icon>
                        音乐
                    </Menu-item>
                    <Menu-item name="program">
                        <Icon type="code"></Icon>
                        编程
                    </Menu-item>
                </i-menu>
            </div>
        </div>
    </header>
    @yield('content')
    <Back-top></Back-top>
    <div id="footer" class="footer">
        <div class="container">
            <Row>
                <i-col span="12">
                    <a href="{{ route('about') }}">About Me</a>
                </i-col>
                <i-col span="12">
                    CopyRight &copy; <a href="{{ route('home') }}">yoohao</a> 版权所有
                </i-col>
            </Row>
        </div>
    </div>
    <Back-top></Back-top>
</div>
<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
    <!-- Scripts -->
    @yield('javascript')
</body>
</html>
