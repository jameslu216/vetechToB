import Vue from 'vue';
import { FormCheckboxPlugin,InputGroupPlugin,FormInputPlugin,FormDatepickerPlugin,FormTextareaPlugin,LayoutPlugin} from 'bootstrap-vue'
Vue.use(FormDatepickerPlugin)
Vue.use(InputGroupPlugin)
Vue.use(FormInputPlugin)
Vue.use(FormTextareaPlugin)
Vue.use(LayoutPlugin)
Vue.use(FormCheckboxPlugin)



window.Vue = Vue;

require('./bootstrap');
import router from './route';

const app = new Vue({
    el: '#app',
    router
});


