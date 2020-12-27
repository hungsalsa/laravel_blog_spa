require('./bootstrap')

// require('alpinejs');
window.Vue = require('vue')
import router from './admin_router'

// Vue.component('mainapp', require('./Main.vue').default)
import App from './Main.vue'

// Vue.component('LeftAside', require('./components/LeftAside.vue').default)
const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
})