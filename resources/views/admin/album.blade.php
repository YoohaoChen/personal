@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="album-box" id="album-box">
        <div class="album-box-header">
            <div class="pull-left">
                <button type="button" name="button" class="btn btn-default" v-on:click="openUpload">上传</button>
                <button type="button" name="button" class="btn btn-default" v-on:click="addAlbum">创建相册</button>
            </div>
            <div class="pull-right return-album">
                <span><button type="button" name="button" class="btn btn-default" v-on:click="showAlbum">返回相册</button></span>
            </div>
        </div>
        <div class="album-box-content" id="album-box-content" v-if="showPhotoView">
            <!-- 查看照片界面 -->
            <div class="photo-box-item" v-for="item in photoItems">
                <div class="photo">
                    <img src="" alt="">
                </div>
                <div class="photo-name">
                    <span>@{{ item.name }}</span>
                </div>
            </div>
        </div>
        <div class="album-box-content" id="album-box-content" v-else-if="uploadView">
            <!-- 上传界面 -->
            <form class="" action="{{ url('admin/albumupdate') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="albumName" value="default">
                <input type="file" name="photo" value="">
                <button type="submit" name="button" class="btn btn-default">上传</button>
            </form>
        </div>
        <div class="album-box-content" id="album-box-content" v-else="defaultView">
            <!-- 默认界面，相册界面 -->
            <div class="album-box-item" v-for="item in albumItems" v-on:click="showPhotos(item)">
                <div class="album-cover">
                    <img src="@{{ item.cover }}" alt="">
                </div>
                <div class="album-name">
                    <span>@{{ item.name }}</span>
                    <span class="pull-right">@{{ item.size }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    var vm = new Vue({
        el: '#app',
        data: {
            title: '后台管理',
            defaultView: true,
            uploadView: false,
            showPhotoView: false,
            albumItems: [],
            photoItems: [
                {name: 'Hello'}
            ]
        },
        methods: {
            openUpload: function () {
                vm.defaultView = false;
                vm.showPhotoView = false;
                vm.uploadView = true;
                vm.title = '后台管理-上传照片';
            },
            showAlbum: function () {
                vm.defaultView = true,
                vm.showPhotoView = false,
                vm.uploadView = false;
                vm.title = '后台管理-相册列表';
            },
            showPhotos: function (item) {
                vm.defaultView = false;
                vm.showPhotoView = true;
                vm.uploadView = false;
                vm.title = '后台管理-查看照片';
                console.log(item);
            },
            addAlbum: function () {
                //
            }
        }
    });

    vm.albumItems = [
        {id: 1, name: 'default', size: 3},
        {id: 2, name: 'default', size: 5}
    ];
    $(function(){
        $.ajax({
            type: 'POST',
            data: {'_token': "{{ csrf_token() }}"},
            url: "{{ url('/admin/albumslist') }}",
            success: function (data) {
                vm.albumItems = data;
            }
        });
    });
</script>
@endsection
