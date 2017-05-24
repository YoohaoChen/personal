@extends('layouts.app')

@section('title', 'Home')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="main-body">
        <div class="container">
            <div class="row">
                <div class="main-page">
                    <div class="main-navigation">
                        <div class="main-menu">
                            <div class="menu-container">
                                <div class="block-keep-ratio block-keep-ratio-2-1 home">
                                    <a href="#">
                                        <span>Home</span>
                                    </a>
                                </div>
                            </div>
                            <div class="menu-container"></div>
                            <div class="menu-container"></div>
                            <div class="menu-container"></div>
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
                                    <img src="images/home-img-1.png" alt="Image" class="img-responsive">
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
            <footer class="row">
                CopyRight &copy; yoohao
            </footer>
        </div>
    </div>
@endsection
