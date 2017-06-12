@extends('layouts.admin')

@section('title', '后台管理-主页')

@section('content')
<div class="">
    //
</div>
@endsection

@section('javascript')
<script>
    var app = new Vue({
        el: "#app",
        data: {},
        methods: {
            logout: function() {
                window.location.href = "{{ route('logout') }}"
            },
            selectMenuItem: function(name) {
                window.location.href = "{{ url('/admin') }}/"+name;
            }
        }
    });
</script>
@endsection
