import Vue from 'vue';

window.Vue = Vue;

require('./bootstrap');
import router from './route';

const app = new Vue({
    el: '#app',
    router
});


