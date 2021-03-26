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

 Vue.component('add-disc', require('./components/discsComponent/addDiscComponent.vue').default);
 Vue.component('command-disc', require('./components/discsComponent/doCommandDiscComponent.vue').default);
Vue.component('move-disc', require('./components/discsComponent/moveDiscComponent.vue').default);

 

 import Ray from './components/raysComponent/raysListeComponent.vue';
 import Author from './components/authorsComponent/authorsListeComponent.vue';
 import DiscType from './components/discTypesComponent/discTypesListeComponent.vue';
 import Disc from './components/discsComponent/discsListeComponent.vue';
 import ShowDisc from './components/discsComponent/showDetailDiscComponent.vue';
 
 
 
 
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
    {
        path: '/Discs',
        component:Disc

    },
    {
        path: '/ShowDisc/:discId',
        name:'showDisc',
        component:ShowDisc

    }

 ];
 
 const router = new VueRouter({routes});
 
 
 
 
 
 const app = new Vue({
     el: '#app',
     router:router
 });
 