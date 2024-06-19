import { createWebHistory, createRouter } from "vue-router";


const routes = [
    {
        path: "/",
        name: "mainPage",
        component: () => import('./components/mainPage.vue')
    },
    {
        path: "/fruit",
        name: "fruit.index",
        component: () => import('./components/fruit/indexFruit.vue')
    },
    {
        path: "/users/login",
        name: "user.login",
        component: () => import('./components/User/login.vue')
    },
    {
        path: "/users/registration",
        name: "user.registration",
        component: () => import('./components/User/registration.vue')
    },
    {
        path: "/users/personal/:id",
        name: "user.personal",
        component: () => import('./components/User/personal.vue')
    },
    {
        path: "/users/logout",
        name: "user.logout",
        component: () => import('./components/User/logout.vue')
    },
    {
        path: "/:pathToMatch(.*)*",
        name: "404",
        component: () => import('./components/404.vue')
    }

];

const router = createRouter({
    history: createWebHistory(),
    routes,

});

router.beforeEach((to, from) => {

    const accessToken = localStorage.getItem('access_token')

    if (!accessToken) {
        if (to.name === 'user.login' ||  to.name === 'user.registration') {
            return true
        } else {
            return { name: 'user.login' }
        }
    }

    if (to.name === 'user.login' || to.name === 'user.registration' && accessToken) {
        return { name: 'user.personal', params: { id: localStorage.getItem('id') }}
    }

    return true
})

export default router;
