/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import VueRouter from 'vue-router'
import routes from './components/routes/Route'
import VueSweetalert2 from 'vue-sweetalert2'
window.Vue = require('vue').default;
  import Vue from 'vue'
  import Vuesax from 'vuesax'
  import 'vuesax/dist/vuesax.css'
    import 'boxicons/css/boxicons.min.css' 
  import bottomNavigationVue from "bottom-navigation-vue";
import 'sweetalert2/dist/sweetalert2.min.css'
import VueQrcodeReader from "vue-qrcode-reader";
Vue.use(VueQrcodeReader)
Vue.use(bottomNavigationVue);
  Vue.use(Vuesax, {
    // options here
  })

  Vue.use(VueRouter);
  Vue.use(VueSweetalert2);
  
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('root-app', require('./components/_Index.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const router = new VueRouter({
  routes,
  mode:'history'
})
const app = new Vue({
    router,
    el: '#app',
});
