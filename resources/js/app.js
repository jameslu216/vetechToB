import Vue from 'vue';
import { FormDatepickerPlugin } from 'bootstrap-vue'
Vue.use(FormDatepickerPlugin)
window.Vue = Vue;

require('./bootstrap');
import router from './route';

const app = new Vue({
    el: '#app',
    router
});


