
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

window.VueRouter = require("vue-router");
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example', require('./components/Db.vue'));
import axios from 'axios';
import TableDetail from './components/TableDetail.vue';
import Welcome from './components/Welcome.vue';
import NotFound from './components/NotFound.vue';
Vue.component('db', require('./components/Db.vue'));
Vue.prototype.$http = axios;

const routes = [
    { path: '/', component: Welcome},
    { 
        path: '/not_found/:search', 
        component: NotFound,
        'props': true
    },
    { 
        path: '/table/:db/:table', 
        name: 'table',
        component: TableDetail,
        'props': true
    },
];

const router = new VueRouter({
    routes // （缩写）相当于 routes: routes
});

const app = new Vue({
    router
}).$mount('#app');