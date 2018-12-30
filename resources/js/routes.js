import Vue from 'vue';
import VueRouter from 'vue-router';
import E404 from './components/E404';
import Shedule from './components/shedule/Shedule';
import Home from './components/Home';
import AllSubjects from './components/subjects/AllSubjects'
import Chat from './components/chat/Chat'


import Login from './components/user/Login';
import Register from './components/user/Register';
import Logout from './components/user/Logout';




Vue.use(VueRouter);

const routes = [{
        name: 'home',
        path: '',
        component:Home,
    },
    {
        name: 'shedule',
        path: '/shedule',
        component: Shedule,
        meta: {
            requiresAuth:true
        }
    },
    {
        name:'subjects',
        path:'/subjects',
        component:AllSubjects,
        meta: {
            requiresAuth:true
        }
    },
    {
        name:'chat',
        path:'/chat/:id',
        component:Chat,
        meta: {
            requiresAuth:true
        }
    },
    //auth
    {
        name: 'login',
        path: '/user/login',
        component: Login,
        meta: {
            requiresVisitor:true
        }
    },
    {
        name: 'register',
        path: '/user/register',
        component: Register,
        meta: {
            requiresVisitor:true
        }
    },
    {
        name: 'logout',
        path: '/user/logout',
        component: Logout,
        meta: {
            requiresAuth:true
        }
    },
    
    {
        name:'E404',
        path:'*',
        component:E404
    }
]

export const router = new VueRouter({
    routes,
    mode: 'history'
});
