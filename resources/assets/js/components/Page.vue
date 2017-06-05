<template>
    <Page :total="50" :current="pageCurrent" :page-size="15" show-elevator show-sizer show-total @on-change="change"></Page>
</template>
<script>
    import {Page} from 'iview'
    export default {
        name: 'test',
        data: function () {
            return {pageCurrent: 1}
        },
        components: { Page },
        methods: {
            change: function (page) {
                window.location.href = "http://127.0.0.1:1024/test/show?page="+page;
                this.pageCurrent = page;
            }
        }
    }
</script>