@extends('layouts.admin')

@section('content')
<div class="new-article-box bg-white">
    <div class="new-article-content">
        <i-form :label-width="80" :model="newArticleForm" ref="newArticleForm">
            <Form-item label="标题" prop="title">
                <i-input type="text" placeholder="标题" v-model="newArticleForm.title"></i-input>
            </Form-item>
            <Form-item label="模块" prop="module">
                <i-select v-model="newArticleForm.module">
                    <i-option v-for="item in modules" :value="item.value" :key="item">@{{ item.label }}</i-option>
                </i-select>
            </Form-item>
            <Form-item label="内容">
                <div id="editor"></div>
            </Form-item>
            <Form-item>
                <i-button type="primary" @click="handleSubmit">创建</i-button>
            </Form-item>
        </i-form>
    </div>
</div>
@endsection

@section('javascript')
    <script src="{{ asset('js/wangEditor.js') }}"></script>
    <script>
        let app = new Vue({
            el: '#app',
            data: {
                menuActiveName: '',
                newArticleForm: {
                    title: '',
                    module: ''
                },
                modules: [
                    @foreach($modules as $module)
                    {label: "{{ $module->name }}", value: "{{ $module->id }}"},
                    @endforeach
                ]
            },
            methods: {
                logout: function() {
                    window.location.href = "{{ route('logout') }}"
                },
                selectMenuItem: function(name) {
                    this.menuActiveName = name;
                    window.location.href = "{{ url('/admin') }}/"+name;
                },
                handleSubmit: function () {
                    let sendData = {
                        'title': this.newArticleForm.title,
                        '_token': "{{ csrf_token() }}",
                        'module': this.newArticleForm.module,
                        'content': editor.txt.html()
                    };
                    let that = this;
                    $.ajax({
                        type: 'POST',
                        data: sendData,
                        url: "{{ url('/admin/newarticle') }}",
                        success: function (data) {
//                            console.log(data);
                            that.$Notice.success({
                                title: '文章上传成功！',
                                desc: ''
                            });
                        }
                    });
                }
            }
        });

        const E = window.wangEditor;
        let editor = new E('#editor');
        editor.customConfig = {
            uploadImgServer: "{{ url('/admin/editorupload') }}",
            uploadImgParams: {_token: "{{ csrf_token() }}"},
            uploadImgHooks: {
                before: function before(xhr, editor, files) {},
                success: function success(xhr, editor, result) {
                    console.log(result);
//                    editor.txt.append('<p><img src="'+result.data[0]+'" style="max-width: 200px;"><br></p>');
                },
                fail: function fail(xhr, editor, result) {},
                error: function error(xhr, editor) {this.$message.error('图片上传失败！')},
                timeout: function timeout(xhr, editor) {}
            }
        };
        editor.create();
    </script>
@endsection