@extends('layouts.admin')

@section('content')
@endsection

@section('javascript')
    <script>
        let app = new Vue({
            el: '#app',
            data: {
            },
            methods: {
                logout: function() {
                    window.location.href = "{{ route('logout') }}"
                },
                selectMenuItem: function(name) {
                    this.menuActiveName = name;
                    window.location.href = "{{ url('/admin') }}/"+name;
                }
            }
        });
    </script>
@endsection