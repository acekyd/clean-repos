/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import lineClamp from 'vue-line-clamp';
import VuejsDialog from 'vuejs-dialog';

// include the default style
import 'vuejs-dialog/dist/vuejs-dialog.min.css';


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('repos-component', require('./components/ReposComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(lineClamp, {})

Vue.use(require('vue-moment'));

Vue.use(VuejsDialog, {
  html: true,
  loader: true,
  okText: 'Yes, delete repositories',
  cancelText: 'No, keep repositories',
  animation: 'bounce',
  type:'soft',
  clicksCount: 3, // for soft confirm, user will be asked to click on "proceed" btn 3 times before actually proceeding
  customClass: 'deleteConfirm'
});

const app = new Vue({
    el: '#app',
});
