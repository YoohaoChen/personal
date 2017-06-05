@extends('layouts.app')

@section('title', 'Show Hello')

@section('style')
<style>
.layout{
    border: 1px solid #d7dde4;
    background: #f5f7f9;
    position: relative;
    border-radius: 4px;
    overflow: hidden;
}
.layout-logo{
    width: 100px;
    height: 30px;
    background: #5b6270;
    border-radius: 3px;
    float: left;
    position: relative;
    top: 15px;
    left: 20px;
}
.layout-header{
    height: 60px;
    background: #fff;
    box-shadow: 0 1px 1px rgba(0,0,0,.1);
}
.layout-copy{
    text-align: center;
    padding: 10px 0 20px;
    color: #9ea7b4;
}
.layout-ceiling{
    background: #464c5b;
    padding: 10px 0;
    overflow: hidden;
}
.layout-ceiling-main{
    float: right;
    margin-right: 15px;
}
.layout-ceiling-main a{
    color: #9ba7b5;
}
</style>
@endsection
@section('content')
    {{--<p>Hello Test!</p>
    <test></test>--}}
    {{--<page></page>--}}
    {{--<Page :total="100" show-elevator show-sizer show-total @on-change="change"></Page>--}}
    {{--<div class="layout">
        <div class="layout-ceiling">
            <div class="layout-container">
                <div class="layout-ceiling-main">
                    <a href="#">注册登录</a> |
                    <a href="#">帮助中心</a> |
                    <a href="#">安全中心</a> |
                    <a href="#">服务大厅</a>
                </div>
            </div>
        </div>
        <div class="layout-header">
            <div class="layout-container">
                <div class="layout-logo"></div>
            </div>
        </div>
        <div style="height: 200px">
            <div class="layout-container"></div>
        </div>
        <div class="layout-copy">
            2011-2016 &copy; TalkingData
        </div>
    </div>--}}
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
            <i-Form ref="formInline" :model="formInline" :rules="ruleInline" inline method="post" action="{{ route('logout') }}">
                <input type="hidden">
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
                    <i-button type="primary" @click="handleSubmit('formInline')">登录</i-button>
                </Form-item>
            </i-Form>

            <Row>
                <i-col span="12">Hello</i-col>
            </Row>

            <i-button type="primary" @click="modal1 = true">显示对话框</i-button>
            <Modal v-model="modal1" title="普通的Modal对话框标题" v-on:on-ok="ok" v-on:on-cancel="cancel"></Modal>
            <p>对话框内容</p>
            <p>对话框内容</p>
            <p>对话框内容</p>
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

@endsection

@section('javascript')
    <script>
        var app = new Vue({
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
                theme2: 'light'
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
                }
            }
        });
//        console.log(apps)
    </script>
@endsection
