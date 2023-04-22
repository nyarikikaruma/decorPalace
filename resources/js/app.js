require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('app', require('./components/App.vue').default);

import router from './router.js';

const app = new Vue({
    el: '#app',
    router,
    components: {
        'IndexApp': () => import(/* webpackChunkName: 'IndexHome' */ './components/App.vue')
    }
});