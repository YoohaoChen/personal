@extends('layouts.admin')

@section('content')
<div class="photos-box"></div>
@endsection

@section('javascript')
    <script>
        var app = new Vue({
            el: '#app',
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