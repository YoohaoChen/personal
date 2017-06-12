@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="row">
        <Carousel v-model="value1">
            <Carousel-item>
                <div class="home-carousel">1</div>
            </Carousel-item>
            <Carousel-item>
                <div class="home-carousel">2</div>
            </Carousel-item>
            <Carousel-item>
                <div class="home-carousel">3</div>
            </Carousel-item>
            <Carousel-item>
                <div class="home-carousel">4</div>
            </Carousel-item>
        </Carousel>
    </div>
@endsection

@section('javascript')
<script type="text/javascript">
    let app = new Vue({
        el: "#app",
        data: {
            value1: 0,
            urls: {
                admin: {
                    index: "{{ url('/admin/') }}"
                },
                root: "{{ url('/') }}",
                home: "{{ route('home') }}"
            }
        },
        methods: {
            menuChange: function(name) {
//                console.log(name);
                if (name === 'user') {
                    window.location.href = "{{ url('admin/index') }}"
                } else {
                    window.location.href = "{{ url('/') }}/"+name
                }
            }
        }
    });
</script>
@endsection
