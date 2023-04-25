import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from './components/Home.vue';
import Shop from './components/Body.vue';
import Cart from './components/Cart.vue';
import AddItem from './components/AddItem.vue'
import Login from './components/Login.vue'
import Register from './components/Register.vue'
Vue.use(VueRouter);

export default new VueRouter({
    mode: 'history',
    routes: [
  { path: '/', component: Home },
  { path: '/shop', component: Shop },
  { path: '/cart', component: Cart },
  { path: '/add', component: AddItem },
  { path: '/login', component: Login },
  { path: '/register', component: Register },
]
});