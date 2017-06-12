@extends('layouts.admin')

@section('content')
    <div class="update-article-box" :model="updateArticleForm" ref="updateArticleForm">
        <i-form :label-width="80">
            <Form-item label="标题" prop="title">
                <i-input v-model="updateArticleForm.title" type="text"></i-input>
            </Form-item>
            <Form-item label="模块" prop="module">
                <i-select v-model="updateArticleForm.module">
                    <i-option v-for="item in modules" :value="item.value" :key="item">@{{ item.label }}</i-option>
                </i-select>
            </Form-item>
            <Form-item label="内容">
                <div id="editor"><?php echo html_entity_decode($article[0]->content) ?></div>
            </Form-item>
            <Form-item>
                <i-button type="primary" @click="updateArticle">修改</i-button>
                <i-button type="ghost">取消</i-button>
            </Form-item>
        </i-form>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('js/wangEditor.js') }}"></script>
    <script>
        let app = new Vue({
            el: '#app',
            data: {
                updateArticleForm: {
                    title: "{{ $article[0]->title }}",
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
                selectMenuItem: function (name) {
                    this.menuActiveName = name;
                    window.location.href = "{{ url('/admin') }}/"+name;
                },
                updateArticle: function () {
                    let sendData = {
                        "_token": "{{ csrf_token() }}",
                        "id": "{{ $article[0]->id }}",
                        "title": this.updateArticleForm.title,
                        "module": this.updateArticleForm.module ? this.updateArticleForm.module : "{{ $article[0]->module_id }}",
                        "content": editor.txt.html()
                    };

                    $.ajax({
                        url: "{{ url('/admin/updatearticle') }}",
                        data: sendData,
                        type: 'POST',
                        success: () => {
                            this.$Notice.success({
                                title: '更新成功'
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