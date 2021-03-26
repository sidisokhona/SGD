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
 
 Vue.component('add-author', require('./components/authorsComponent/addAuthorComponent.vue').default);
 Vue.component('edit-author', require('./components/authorsComponent/editAuthorComponent.vue').default);

 Vue.component('add-discType', require('./components/discTypesComponent/addDiscTypeComponent.vue').default);
 Vue.component('edit-discType', require('./components/discTypesComponent/editDiscTypeComponent.vue').default);
 
 
 

 import Ray from './components/raysComponent/raysListeComponent.vue';
 import Author from './components/authorsComponent/authorsListeComponent.vue';
 import DiscType from './components/discTypesComponent/discTypesListeComponent.vue';

 
 
 
 
 const routes = [
     {
         path: '/Rays',
         component:Ray
 
     },
     {
        path: '/Authors',
        component:Author

    },
    {
        path: '/DiscTypes',
        component:DiscType

    },

 ];
 
 const router = new VueRouter({routes});
 
 
 
 
 
 const app = new Vue({
     el: '#app',
     router:router
 });
 