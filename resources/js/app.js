import Vue from 'vue';
import { InputGroupPlugin,FormInputPlugin,FormDatepickerPlugin } from 'bootstrap-vue'
Vue.use(FormDatepickerPlugin)
Vue.use(InputGroupPlugin)
Vue.use(FormInputPlugin)

window.Vue = Vue;

require('./bootstrap');
import router from './route';

const app = new Vue({
    el: '#app',
    router
});


