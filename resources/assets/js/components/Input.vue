<template>
    <Input v-model="value" placeholder="请输入..." style="width: 300px"></Input>
</template>
<script>
    import Input from 'vue'
    export default {
        name: 'myInput',
        props: {},
        data () {
            return {
                value: ''
            }
        },
        components: {Input}
    }
</script>