import Vue from 'vue';
import VueRouter from 'vue-router';
import Dashboard from './components/Dashboard.vue';
import Home from './components/Home.vue';
import CustomerBooking from './components/CustomerBooking.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';

import Notfound from './components/Notfound.vue';

Vue.use(VueRouter);

if (window.Vue) {
  window.Vue.use(VueRouter);
}

// -------------------------------------------------------------------
const routerSetting = {
  mode: 'history', // 因為Vue router 會自動產生hashtag(#)，俗果你覺得礙事可以加入這行
  // ES6語法，當key和value一樣時可省略key
  routes: [
    {
      path: '*',
      component: Home,
      children: [
        {
          path: '/dashboard',
          component: Dashboard,
        },
        {
          path: '/booking',
          component: CustomerBooking,
        },
        {
          path: '/login',
          component: Login,
        },
        {
          path: '/register',
          component: Register,
        },
      ],
    },

    // 之後新增路由皆可使用{path:'', component:''}
  ],
};
export default new VueRouter(routerSetting);
