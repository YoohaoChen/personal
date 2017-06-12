@extends('layouts.admin')

@section('content')
<div class="new-module-box">
    <i-form :model="newModuleForm" ref="newModuleForm" :label-width="80">
        <Form-item label="模块" prop="name">
            <i-input v-model="newModuleForm.name" type="text"></i-input>
        </Form-item>
        <Form-item>
            <i-button type="primary" @click="newModuleSubmit">提交</i-button>
        </Form-item>
    </i-form>
</div>
@endsection

@section('javascript')
    <script>
        let app = new Vue({
            el: '#app',
            data: {
                newModuleForm: {
                    name: ''
                }
            },
            methods: {
                logout: function() {
                    window.location.href = "{{ route('logout') }}"
                },
                selectMenuItem: function(name) {
                    this.menuActiveName = name;
                    window.location.href = "{{ url('/admin') }}/"+name;
                },
                newModuleSubmit: function () {
                    console.log(this);
                    let sendData = {"name": this.newModuleForm.name, '_token': "{{ csrf_token() }}"};
                    $.ajax({
                        data: sendData,
                        url: "{{ url('/admin/newmodule') }}",
                        type: 'POST',
                        success: (data) => {
                            console.log(this);
                            this.$Message.info('创建模块成功！');
                        },
                        error: () => {
                            this.$Message.error('创建模块失败！');
                        }
                    });
                }
            }
        });
    </script>
@endsection