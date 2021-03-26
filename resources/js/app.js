/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');

 window.Vue = require('vue').default;
 
import VueRouter from 'vue-router';
Vue.use(VueRouter);
 
Vue.component('pagination', require('laravel-vue-pagination'));
 
 Vue.component('add-ray', require('./components/raysComponent/addRayComponent.vue').default);
 Vue.component('edit-ray', require('./components/raysComponent/editRayComponent.vue').default);
 

 

 import Ray from './components/raysComponent/raysListeComponent.vue';

 
 
 
 const routes = [
     {
         path: '/Rays',
         component:Ray
 
     }

 ];
 
 const router = new VueRouter({routes});
 
 
 
 
 
 const app = new Vue({
     el: '#app',
     router:router
 });
 