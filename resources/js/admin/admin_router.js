import Vue from 'vue'
import Router from 'vue-router'
Vue.use(Router)
import homeIndex from './views/home/index.vue'
import postCategory from './views/postCategory/index.vue'
// import product from './components/pages/product.vue'

const routes = [
    {
        path: '/alobike',
        component: homeIndex,
        name: 'home',
    },
    {
        path: '/alobike/post-category',
        component: postCategory,
        name: 'postCategory',
    },
    // {
    //     path: '/product',
    //     component: product,
    //     name: 'product',
    // },
]

export default new Router({
    mode: 'history',
    routes
})