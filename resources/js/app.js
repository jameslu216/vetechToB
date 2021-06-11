import Vue from 'vue';
import Vuex from 'vuex';

import { FormCheckboxPlugin,CalendarPlugin,InputGroupPlugin,FormInputPlugin,FormDatepickerPlugin,FormTextareaPlugin,LayoutPlugin} from 'bootstrap-vue'
Vue.use(CalendarPlugin)
Vue.use(FormDatepickerPlugin)
Vue.use(InputGroupPlugin)
Vue.use(FormInputPlugin)
Vue.use(FormTextareaPlugin)
Vue.use(LayoutPlugin)
Vue.use(FormCheckboxPlugin)
Vue.use(Vuex);

window.Vue = Vue;

require('./bootstrap');
import router from './route';
import store from './Vuex/index'
const app = new Vue({
    el: '#app',
    router,
    store,
});


