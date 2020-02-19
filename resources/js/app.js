require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import User from './components/User.vue';
import CreateUser from './components/CreateUser.vue';
import EditUser from './components/EditUser.vue';

const router = new VueRouter({
    routes:[
        {
            path: '/',
            name: 'user-index',
            component: User,
        },
        {
            path: '/create',
            name: 'user-create',
            component: CreateUser,
        },
        {
            path: '/edit/:id',
            name: 'user-edit',
            component: EditUser,
        }
    ]
});

const app = new Vue({
    el: '#app',
    router,
});
