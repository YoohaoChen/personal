@extends('layouts.app')

@section('title', 'Home')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
@endsection

@section('content')
    <div class="main-body">
        <div class="container">
            <div class="row">
                <div class="main-page">
                    <div class="main-navigation">
                        <div class="main-menu">
                            <div class="menu-container">
                                <div class="block-keep-ratio block-keep-ratio-2-1 home block-width-full">
                                    <a href="#" class="block-keep-ratio_content main-menu-link">
                                        <span class="main-menu-link-text">Home</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-container">
                                <div class="block-keep-ratio block-keep-ratio-1-1 pull-left block-width-half about-me">
                                    <a href="#" class="main-menu-link block-keep-ratio_content about">
                                        <i class="glyphicon glyphicon-user main-menu-link-icon"></i>
                                        <span class="main-menu-link-text">
                                            About Me
                                        </span>
                                    </a>
                                </div>
                                <div class="block-keep-ratio block-keep-ratio-1-1 pull-right block-width-half contact-main">
                                    <a href="#" class="main-menu-link block-keep-ratio_content contact">
                                        <i class="glyphicon glyphicon-envelope main-menu-link-icon"></i>
                                        <span class="main-menu-link-text">
                                            About Me
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-container">
                                <div class="block-keep-ratio photography-main block-keep-ratio-1-1 block-width-full">
                                    <a href="#" class="photography main-menu-link block-keep-ratio_content">
                                        <span class="main-menu-link-text">Photography</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-container">
                                <div class="block-keep-ratio block-width-half block-keep-ratio-1-1 pull-left guitar-main">
                                    <a href="#" class="main-menu-link block-keep-ratio_content guitar">
                                        <span class="main-menu-link-text">Guitar</span>
                                    </a>
                                </div>
                                <div class="block-keep-ratio block-width-half block-keep-ratio-1-1 pull-right program-main">
                                    <a href="#" class="main-menu-link block-keep-ratio_content program">
                                        <span class="main-menu-link-text">Program</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-main">
                        <div class="row margin-b-30">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="banner-main-home">
                                    <div class="banner-main-home-text">
                                        <div class="heading">
                                            <h1>ACCORD</h1>
                                            <p class="text-uppercase">Proin gravida nibhISI</p>
                                        </div>
                                        <div class="desc">
                                            <p>This is free Bootstrap v3.3.6 website theme brought to you by templatemo. Feel free to use it. Please tell your friends about it. Images are provided by <a rel="nofollow" href="http://unsplash.com" target="_parent">Unsplash</a> (free photo website). Icons are from Smashing Magazine.</p>
                                            <button type="button" class="">SAGITIS SELIT</button>
                                        </div>
                                    </div>
                                    <img src="{{ asset('images/home-img-1.png') }}" alt="Image" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="row margin-b-30">
                            <div class="col-md-6"></div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="row text-right">
                <p class="copyright">CopyRight &copy; <a href="http://yoohao.paibei.online">yoohao</a> 版权所有</p>
            </footer>
        </div>
    </div>
@endsection

@section('javascript')
    @parent
    <script>
    </script>
@endsection