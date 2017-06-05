/**
 * Created by yoohao on 17-6-4.
 */
window.$ = window.jQuery = require('jquery');
window.Vue = require('vue');
require('iview');

Vue.component('page', require("./components/Page.vue"));
// Vue.component('test', require('./components/Example.vue'));
/*
Vue.component('pages', require('./components/Page.vue'));

const app = new Vue({
    el: "#app",
    methods: {
    }
});*/
