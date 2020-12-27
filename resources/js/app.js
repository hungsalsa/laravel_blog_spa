require('./bootstrap')

// require('alpinejs');
window.Vue = require('vue')
import router from './router'

import App from './components/main.vue'


// Vue.component('mainapp', require('./components/main.vue').default)
const app = new Vue({
    el: '#app',
    render: h => h(App),
    router
})
