@extends('layouts.admin')

@section('content')
<div class="article-list-box bg-white">
<i-table :columns="articleListColumns" :data="articleListData"></i-table>
</div>
@endsection
@section('javascript')
    <script>
        let app = new Vue({
            el: '#app',
            data: {
                articleListColumns: [
                    {
                        title: '文章ID',
                        key: 'id'
                    },
                    {
                        title: '文章标题',
                        key: 'title'
                    },
                    {
                        title: '模块',
                        key: 'module'
                    },
                    {
                        title: '操作',
                        key: 'action',
                        render: function (h, params) {
                            return h('div', [
                                h('Button', {
                                    props: {
                                        type: 'primary'
                                    },
                                    style: {
                                        marginRight: '5px'
                                    },
                                    on: {
                                        click: function () {
//                                            console.log(params);
                                            window.location.href = "{{ url('/admin/updatearticle') }}/"+params.row.id;
                                        }
                                    }
                                }, '修改'),
                                h('Button', {
                                    props: {
                                        type: 'ghost'
                                    },
                                    on: {
                                        click: function () {}
                                    }
                                }, '删除')
                            ]);
                        }
                    }
                ],
                articleListData: [
                    @foreach($articles as $article)
                    {id: "{{ $article->id }}", title: "{{ $article->title }}", module: "{{ $article->module_id }}"},
                    @endforeach
                ]
            },
            methods: {
                logout: function() {
                    window.location.href = "{{ route('logout') }}"
                },
                selectMenuItem: function(name) {
                    window.location.href = "{{ url('/admin') }}/"+name;
                }
            }
        });
    </script>
@endsection