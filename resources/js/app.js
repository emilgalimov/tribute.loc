import Vue from 'vue';
import Main from './main.vue';
import {
    store
} from './store/index.js';
import {
    router
} from './routes.js';
require('./bootstrap');


router.beforeEach((to, from, next) => {
    document.title = to.name;
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!store.getters['auth/loggedIn']) {
            next({
                name: 'login'
            })
        } else {
            next()
        }
    } else if (to.matched.some(record => record.meta.requiresVisitor)) {
        if (store.getters['auth/loggedIn']) {
            next({
                name: 'shedule'
            })
        } else {
            next()
        }
    } else {
        next() // make sure to always call next()!
    }
})


const app = new Vue({
    el: '#app',
    store: store,
    router: router,
    render: h => h(Main)
});
