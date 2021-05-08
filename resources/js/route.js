import Vue from 'vue';
import VueRouter from 'vue-router';


Vue.use(VueRouter);

if (window.Vue) {
    window.Vue.use(VueRouter);
}

import About from './components/About.vue';
import Index from './components/index.vue';
import Notfound from './components/Notfound.vue';

//-------------------------------------------------------------------

export default new VueRouter({
    mode: 'history', //因為Vue router 會自動產生hashtag(#)，俗果你覺得礙事可以加入這行
    routes: //ES6語法，當key和value一樣時可省略key
        [   {
                path:'*',
                component:Notfound,
            },
            {
                path: '/',
                component: Index,
                children: [{
                    path: '/about',
                    component: About,
                },
                ]
            },
            
            //之後新增路由皆可使用{path:'', component:''}
        ]
})
