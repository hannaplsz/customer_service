import { createWebHistory, createRouter } from "vue-router";

import Home from '../pages/Home';
import About from '../pages/About';
import Register from '../pages/Register';
import Login from '../pages/Login';
import Dashboard from '../pages/Dashboard';

import Sources from '../components/Sources';
import AddSource from '../components/AddSource';
import EditSource from '../components/EditSource';

export const routes = [{
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'about',
        path: '/about',
        component: About
    },
    {
        name: 'register',
        path: '/register',
        component: Register
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    },
    {
        name: 'dashboard',
        path: '/dashboard',
        component: Dashboard
    },
    {
        name: 'sources',
        path: '/sources',
        component: Sources
    },
    {
        name: 'addsource',
        path: '/sources/add',
        component: AddSource
    },
    {
        name: 'editsource',
        path: '/sources/edit/:id',
        component: EditSource
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;