@extends('layouts.app')

@section('title', 'Home')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="main-navigation">
                    <div class="main-menu">
                        <div class="main-container">
                            <div class="block-keep-ratio home"></div>
                        </div>
                        <div class="main-container"></div>
                        <div class="main-container"></div>
                        <div class="main-container"></div>
                    </div>
                </div>
                <div class="main-content"></div>
            </div>
            <footer class="row">
                CopyRight &copy; yoohao
            </footer>
        </div>
    </div>
@endsection
