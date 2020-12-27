import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
import newsPage from './components/pages/myNews.vue'
import homeIndex from './components/pages/homeIndex.vue'
import product from './components/pages/product.vue'

const routes = [
    {
        path: '/',
        component: homeIndex,
        name: 'home',
    },
    {
        path: '/my-news',
        component: newsPage,
        name: 'new',
    },{
        path: '/product',
        component: product,
        name: 'product',
    },
]

export default new Router({
    mode: 'history',
    routes
})