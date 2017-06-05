@extends('layouts.app')

@section('title', 'About Me')

@section('content')
<div class="row">
    <div class="my">
        <img src="{{ asset('images/ali1.jpg') }}" alt="">
    </div>
</div>
<div class="row">
    <div class="about-box">
        <div class="about-content">
            Hello
        </div>
    </div>
</div>
@endsection
