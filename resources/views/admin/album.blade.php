@extends('layouts.admin')

@section('title', '后台管理-相册管理')

@section('content')
    <div class="album-box-header clearfix">
        <div class="pull-left">
            <i-button @click="showPhotoUpload">上传照片</i-button>
            <i-button @click="addAlbumWindow">新建相册</i-button>
        </div>
        <div class="pull-right">
            <div class="pull-left album-select">
                <i-select v-if="showPhotoUploadBox" style="width: 100px;" v-on:on-change="onSelectAlbum">
                    <i-option v-for="item in albumList" :value="item.albumId" :key="item">@{{ item.albumName }}</i-option>
                </i-select>
            </div>
            <i-button @click="showAlbumList">相册列表</i-button>
        </div>
    </div>
    <div class="album-box-content bg-white">
        <div class="album-photo-upload" v-if="showPhotoUploadBox">
            {{-- 上传照片 --}}
            <Upload action="{{ url('/admin/albumupdate') }}" multiple :data="uploadData" :on-success="handleSuccess" :on-error="handleError" :before-upload="beforeUpload" name="photo">
                <i-button type="ghost" icon="ios-cloud-upload-outline">上传文件</i-button>
            </Upload>
        </div>
        <div class="album-new-album" v-else-if="showAddAlbum">
            {{-- 新建相册 --}}
            <i-form action="{{ url('/admin/album') }}" method="post">
                <Form-item>
                    {{ csrf_field() }}
                </Form-item>
                <Form-item>
                    <i-input placeholder="相册名"></i-input>
                </Form-item>
                <Form-item>
                    <i-button type="primary">创建</i-button>
                </Form-item>
            </i-form>
        </div>
        <div class="album-photo-list" v-else-if="showPhotoListWindow">
            {{-- 照片列表 --}}
            <i-table :columns="photoColumns" :data="photoListData"></i-table>
            <div style="margin: 10px;">
                <Page :total="photoListTotal" :page-size=15 v-on:on-change="photoPageChange" show-total></Page>
            </div>
        </div>
        <div class="album-album-list" v-else-if="showAlbumListWindow">
            {{-- 相册列表 --}}
            <i-table :columns="albumColumns" :data="albumData" v-on:on-row-click="albumRowClick"></i-table>
        </div>
    </div>
    <Modal></Modal>
@endsection

@section('javascript')
    <script>
        var app = new Vue({
            el: "#app",
            data: {
                showPhotoUploadBox: false,// 照片上传
                selectedAlbum: null,
                uploadData: {'_token': "{{ csrf_token() }}"},
                albumList: [
                    @foreach($albums as $album)
                    {albumId: "{{ $album->id }}", albumName: "{{ $album->name }}", cover: "{{ $album->cover }}", createdAt: "{{ $album->created_at }}"},
                    @endforeach
                ],
                showAddAlbum: false,// 添加相册
                showAlbumListWindow: true,// 相册列表
                showPhotoListWindow: false,// 照片列表
                photoListTotal: 10,
                albumColumns: [
                    {
                        title: '相册ID',
                        key: 'id'
                    },
                    {
                        title: '相册名',
                        key: 'name'
                    },
                    {
                        title: '操作',
                        key: 'action',
                        width: 160,
                        align: 'center',
                        render: function (h, params) {
                            return h('div', [
                                h('Button', {
                                    props: {
                                        type: 'primary'
                                    },
                                    style: {
                                        marginRight: "5px"
                                    },
                                    on: {
                                        click: function () {
                                            console.log(params);
                                        }
                                    }
                                }, '改名'),
                                h('Button', {
                                    props: {
                                        type: 'error'
                                    },
                                    on: {
                                        click: function () {
                                            //
                                        }
                                    }
                                }, '删除')
                            ]);
                        }
                    }
                ],
                albumData: [
                    @foreach($albums as $album)
                    {
                        id: "{{ $album->id }}",
                        name: "{{ $album->name }}"
                    },
                    @endforeach
                ],
                photoColumns: [
                    {
                        title: '照片ID',
                        name: 'id'
                    },
                    {
                        title: '照片名',
                        name: 'name'
                    }
                ],
                photoListData: []
            },
            methods: {
                logout: function() {
                    window.location.href = "{{ route('logout') }}"
                },
                selectMenuItem: function(name) {
                    window.location.href = "{{ url('/admin') }}/"+name;
//                console.log(name)
                },
                showAlbumList: function() {
                    // 相册列表
                    this.showPhotoUploadBox = false;
                    this.showAlbumListWindow = true;
                    this.showAddAlbum = false;
                    this.showPhotoListWindow = false;
                },
                showPhotoUpload: function() {
                    // 打开文件上传
                    this.showPhotoUploadBox = true;
                    this.showAlbumListWindow = false;
                    this.showAddAlbum = false;
                    this.showPhotoListWindow = false;
                },
                addAlbumWindow: function() {
                    // 打开新建相册窗口
                    this.showPhotoUploadBox = false;
                    this.showAlbumListWindow = false;
                    this.showAddAlbum = true;
                    this.showPhotoListWindow = false;
                },
                handleSuccess: function(res, file) {
                    console.log(res);
                    console.log(file);
                    console.log('success');
                },
                handleError: function(res, file) {
                    console.log(res);
                    console.log('error');
                },
                onSelectAlbum: function (value) {
//                    console.log(value)
                    this.selectedAlbum = value;
                },
                beforeUpload: function () {
                    if (this.selectedAlbum === null) {
                        this.$Message.error('选择上传的相册！');
                        return false
                    }
                    this.uploadData['albumId'] = this.selectedAlbum;
                },
                photoPageChange: function (page) {
                    //
                },
                albumRowClick: function (params) {
                    console.log(params);
                    this.showPhotoUploadBox = false;
                    this.showAlbumListWindow = false;
                    this.showAddAlbum = false;
                    this.showPhotoListWindow = true;
                }
            }
        });
    </script>
@endsection
