@extends('layouts.admin')

@section('content')
    <div class="album-box-header clearfix">
        <div class="pull-left">
            <i-button @click="showPhotoUpload">上传照片</i-button>
            <i-button @click="addAlbumWindow">新建相册</i-button>
        </div>
        <div class="pull-right">
            <i-button @click="showAlbumList">相册列表</i-button>
        </div>
    </div>
    <div class="album-box-content bg-white">
        <div></div>
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
//                console.log(name)
                },
                showAlbumList: function() {
                    //
                },
                showPhotoUpload: function() {
                    console.log('Hello');
                },
                addAlbumWindow: function() {
                    //
                }
            }
        });
    </script>
@endsection
