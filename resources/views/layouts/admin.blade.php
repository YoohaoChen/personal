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
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/iview.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    @yield('style')
    <link rel="Shortcut icon" href="{{ url('/favicon.ico') }}">
</head>
<body>
<div class="main-body" id="app">
    <header class="header" id="header">
        <div class="container">
            <div class="pull-left">
                <a href="{{ route('home') }}">Yoohao</a>
            </div>
            <div class="logout-box pull-right">
                <i-form ref="logoutForm" method="post" action="{{ route('logout') }}">
                    <div class="logout-box"><i-button type="primary" html-type="submit">退出</i-button></div>
                </i-form>
            </div>
        </div>
    </header>
    <div class="" style="height: 1px;">

    </div>
    <div class="container main-content">
        <Row>
            <i-col span="6">
                <i-menu v-on:on-select="selectMenuItem">
                    <Submenu name="1">
                        <template slot="title">
                            <Icon type="camera"></Icon>
                            摄影
                        </template>
                        <Menu-item name="album">相册</Menu-item>
                        <Menu-item name="1-2">图集</Menu-item>
                    </Submenu>
                    <Submenu name="2">
                        <template slot="title">
                            <Icon type="music-note"></Icon>
                            吉他
                        </template>
                        <Menu-item name="2-1">相册</Menu-item>
                        <Menu-item name="2-2">图集</Menu-item>
                    </Submenu>
                    <Submenu name="3">
                        <template slot="title">
                            <Icon type="code"></Icon>
                            编程
                        </template>
                        <Menu-item name="3-1">相册</Menu-item>
                        <Menu-item name="3-2">图集</Menu-item>
                    </Submenu>
                </i-menu>
            </i-col>
            <i-col span="18">@yield('content')</i-col>
        </Row>
    </div>
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
</div>

<!-- Scripts -->

@yield('javascript')
</body>
</html>
