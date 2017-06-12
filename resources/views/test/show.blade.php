@extends('layouts.app')

@section('title', 'Show Hello')
@section('style')
    <link href="https://cdn.quilljs.com/1.2.6/quill.snow.css" rel="stylesheet">
@endsection
@section('style')
<!--suppress XmlUnboundNsPrefix -->

@endsection
@section('content')
    <div class="container">
        @foreach ($users as $user)
            {{ $user->name }}<br>
        @endforeach
            {{--<pages :total="{{ $users->total() }}" :current="{{ $users->currentPage() }}" show-elevator show-sizer show-total @on-change="change"></pages>--}}
            <Page :total="{{ $users->total() }}" :current="{{ $users->currentPage() }}" :page-size="15" show-elevator show-sizer show-total @on-change="change"></Page>
            {{--@php(var_dump($users))--}}
            <Tabs value="name1">
                <Tab-pane label="标签一" name="name1">标签一的内容</Tab-pane>
                <Tab-pane label="标签二" name="name2">标签二的内容</Tab-pane>
                <Tab-pane label="标签三" name="name3">标签三的内容</Tab-pane>
            </Tabs>
            <i-Form ref="formInline" :model="formInline" :rules="ruleInline" inline method="post" action="{{ url('/test/editortest') }}">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <Form-item prop="user">
                    <i-input type="text" v-model="formInline.user" placeholder="Username" :class="'layout'">
                        <Icon type="ios-person-outline" slot="prepend"></Icon>
                    </i-input>
                </Form-item>
                <Form-item prop="password">
                    <i-input type="password" v-model="formInline.password" placeholder="Password">
                        <Icon type="ios-locked-outline" slot="prepend"></Icon>
                    </i-input>
                </Form-item>
                <Form-item>
                    <i-button type="primary" html-type="submit" @click="handleSubmit('formInline')">登录</i-button>
                </Form-item>
            </i-Form>

            <Row>
                <i-col span="12">Hello</i-col>
            </Row>

            <i-button type="primary" @click="modal1 = true">显示对话框</i-button>
            <Modal v-model="modal1" title="普通的Modal对话框标题" v-on:on-ok="ok" v-on:on-cancel="cancel">
                <?php echo html_entity_decode($articles[0]->content) ?>
                {{ $articles[0]->content }}
                <div>测试</div>
            </Modal>
            {{--</Modal>--}}
            <Back-top :height="100"></Back-top>

                <Row>
                    <i-col span="8">
                    <i-menu :theme="theme2">
                        <Submenu name="1">
                            <template slot="title">
                                <Icon type="ios-paper"></Icon>
                                内容管理
                            </template>
                            <Menu-item name="1-1">文章管理</Menu-item>
                            <Menu-item name="1-2">评论管理</Menu-item>
                            <Menu-item name="1-3">举报管理</Menu-item>
                        </Submenu>
                        <Submenu name="2">
                            <template slot="title">
                                <Icon type="ios-people"></Icon>
                                用户管理
                            </template>
                            <Menu-item name="2-1">新增用户</Menu-item>
                            <Menu-item name="2-2">活跃用户</Menu-item>
                        </Submenu>
                        <Submenu name="3">
                            <template slot="title">
                                <Icon type="stats-bars"></Icon>
                                统计分析
                            </template>
                            <Menu-group title="使用">
                                <Menu-item name="3-1">新增和启动</Menu-item>
                                <Menu-item name="3-2">活跃分析</Menu-item>
                                <Menu-item name="3-3">时段分析</Menu-item>
                            </Menu-group>
                            <Menu-group title="留存">
                                <Menu-item name="3-4">用户留存</Menu-item>
                                <Menu-item name="3-5">流失用户</Menu-item>
                            </Menu-group>
                        </Submenu>
                    </i-menu>
                    </i-col>
                    <i-col span="8">
                    <i-menu :theme="theme2" active-name="1-2" :open-names="['1']">
                        <Submenu name="1">
                            <template slot="title">
                                <Icon type="ios-paper"></Icon>
                                内容管理
                            </template>
                            <Menu-item name="1-1">文章管理</Menu-item>
                            <Menu-item name="1-2">评论管理</Menu-item>
                            <Menu-item name="1-3">举报管理</Menu-item>
                        </Submenu>
                        <Submenu name="2">
                            <template slot="title">
                                <Icon type="ios-people"></Icon>
                                用户管理
                            </template>
                            <Menu-item name="2-1">新增用户</Menu-item>
                            <Menu-item name="2-2">活跃用户</Menu-item>
                        </Submenu>
                        <Submenu name="3">
                            <template slot="title">
                                <Icon type="stats-bars"></Icon>
                                统计分析
                            </template>
                            <Menu-group title="使用">
                                <Menu-item name="3-1">新增和启动</Menu-item>
                                <Menu-item name="3-2">活跃分析</Menu-item>
                                <Menu-item name="3-3">时段分析</Menu-item>
                            </Menu-group>
                            <Menu-group title="留存">
                                <Menu-item name="3-4">用户留存</Menu-item>
                                <Menu-item name="3-5">流失用户</Menu-item>
                            </Menu-group>
                        </Submenu>
                    </i-menu>
                    </i-col>
                    <i-col span="8">
                    <i-menu :theme="theme2" :open-names="['1']" accordion>
                        <Submenu name="1">
                            <template slot="title">
                                <Icon type="ios-paper"></Icon>
                                内容管理
                            </template>
                            <Menu-item name="1-1">文章管理</Menu-item>
                            <Menu-item name="1-2">评论管理</Menu-item>
                            <Menu-item name="1-3">举报管理</Menu-item>
                        </Submenu>
                        <Submenu name="2">
                            <template slot="title">
                                <Icon type="ios-people"></Icon>
                                用户管理
                            </template>
                            <Menu-item name="2-1">新增用户</Menu-item>
                            <Menu-item name="2-2">活跃用户</Menu-item>
                        </Submenu>
                        <Submenu name="3">
                            <template slot="title">
                                <Icon type="stats-bars"></Icon>
                                统计分析
                            </template>
                            <Menu-group title="使用">
                                <Menu-item name="3-1">新增和启动</Menu-item>
                                <Menu-item name="3-2">活跃分析</Menu-item>
                                <Menu-item name="3-3">时段分析</Menu-item>
                            </Menu-group>
                            <Menu-group title="留存">
                                <Menu-item name="3-4">用户留存</Menu-item>
                                <Menu-item name="3-5">流失用户</Menu-item>
                            </Menu-group>
                        </Submenu>
                    </i-menu>
                    </i-col>
                </Row>
                <br>
                <p>切换主题</p>
                <Radio-group v-model="theme2">
                    <Radio label="light"></Radio>
                    <Radio label="dark"></Radio>
                </Radio-group>

    </div>
    <div id="ttt"></div>
    <form id="ttf" action="{{ url('/admin/albumupdate') }}" method="post" enctype="multipart/form-data" onsubmit="tests">
        {{ csrf_field() }}
        <input type="text" name="input">
        <i-button type="primary" html-type="submit">确认</i-button>
    </form>
    <i-form ref="formtest" :model="formtest" action="{{ url('/admin/albumupdate') }}" method="post">
        <Form-item label="name" prop="name">
            <i-input type="text" v-model="formtest.name"></i-input>
        </Form-item>
        <Form-item prop="submit">
            <i-button type="primary" html-type="submit" v-model="formtest.submit">确认</i-button>
        </Form-item>
    </i-form>
    <div id="toolbar"></div>
    <div id="editor"></div>
    <i-button type="primary" v-on:click="editorTest">查询</i-button>
    <i-button type="primary" @click="info">提醒</i-button>
    <div>
        @{{ editorHtml }}
    </div>
@endsection

@section('javascript')
    {{--<script src="https://cdn.quilljs.com/1.2.6/quill.js"></script>--}}
    <script src=" {{ asset('js/wangEditor.js') }}"></script>
    <script>
        let app = new Vue({
            el: "#app",
            data: {
                pageSize: 15,
                formInline: {
                    user: '',
                    password: ''
                },
                ruleInline: {
                    user: [
                        { required: true, message: '请填写用户名', trigger: 'blur' }
                    ],
                    password: [
                        { required: true, message: '请填写密码', trigger: 'blur' },
                        { type: 'string', min: 6, message: '密码长度不能小于6位', trigger: 'blur' }
                    ]
                },
                modal1: false,
                theme2: 'light',
                formtest: {
                    name: ''
                },
                editorHtml: ''
            },
            methods: {
                change: function(page) {
                    console.log(page);
                    window.location.href = "http://127.0.0.1:1024/test/show?page="+page;
                },
                ok: function() {
                    this.$Message.info('点击了确定');
                },
                cancel: function() {
                    this.$Message.info('点击了取消');
                },
                menuChange: function(name) {
//                console.log(name);
                    if (name === 'user') {
                        window.location.href = "{{ url('admin/index') }}"
                    } else {
                        window.location.href = "{{ url('/') }}/"+name
                    }
                },
                editorTest: function() {
                    this.editorHtml = editor.txt.html();
                    console.log(editor.txt.html())
                },
                handleSubmit: function(name) {
//                    this.$refs[name].formSubmit();
//                    console.log(valid);
                    this.$refs[name].validate((valid) => {
                        if (valid) {
                            this.$Message.success('提交成功!');
                        } else {
                            this.$Message.error('表单验证失败!');
                        }
                    });
                },
                info () {
                    this.$Message.info('这是一条普通的提醒');
                    this.$Notice.success({
                        title: '文章上传成功！',
                        desc: ''
                    });
                }
            }
        });
//        console.log(apps)
        /*var config = {
            /!*modules: {
                toolbar: '#toolbar'
            },*!/
            theme: 'snow',
            formats: ['bold', 'italic', 'color', 'Image']
        };
        var editor = new Quill('#editor', config);*/
        const E = window.wangEditor;
        let editor = new E('#editor');
        editor.customConfig.uploadImgServer = '{{ url('/test/editortest') }}';
        editor.customConfig.uploadImgParams = {
            _token: '{{ csrf_token() }}'
        };
        editor.customConfig.uploadImgHooks = {
            before: function (xhr, editor, files) {
                console.log(xhr);
                console.log(editor);
                console.log(files);
//                files.name = 'photo';
                return files;
            }
        };
        editor.create();
        {{--editor.txt.append({{ html_entity_decode($articles[0]->content) }});--}}
        console.log($('#aaa'));
        $('#aaa').on('change', function() {
            var $this = $(this);
            console.log($this);
            console.log($this[0].files);
        });
        document.getElementById('ttt').innerHTML = "{{ html_entity_decode($articles[0]->content) }}"
    </script>

@endsection
