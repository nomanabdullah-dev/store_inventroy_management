require('./bootstrap');

window.Vue = require('vue').default;
import Alpine from 'alpinejs';
import Home from './components/Home.vue'
import ProductAdd from './components/products/ProductAdd.vue'
import store from './store'


window.Alpine = Alpine;

Alpine.start();

const app = new Vue({
    el: '#app',
    components: {
        Home,
        ProductAdd
    },
    store
})
