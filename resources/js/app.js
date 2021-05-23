/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


 require('./bootstrap');
 window.Vue = require('vue').default;
 import { Form, HasError, AlertError } from 'vform';
 import swal from 'sweetalert2'
 import VueModal from '@kouts/vue-modal'
import '@kouts/vue-modal/dist/vue-modal.css'
 window.swal = swal;

 const toast = swal.mixin({
  });
  window.toast = toast;
  Vue.component('Modal', VueModal)
 


 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 Vue.component('pcp-app', require('./components/ExampleComponent.vue').default);
 Vue.component('pcp-contests', require('./components/contests.vue').default);
 Vue.component('pcp-modle', require('./components/test.vue').default);
 Vue.component('pcp-problems', require('./components/ProblemTable.vue').default);
 Vue.component('pcp-participant', require('./components/ParticipantModal.vue').default);
 Vue.component('pcp-competitor', require('./components/CompetitorTable.vue').default);
 Vue.component('pcp-teammodal', require('./components/TeamModal.vue').default);
 Vue.component('pcp-teamstable', require('./components/TeamsTable.vue').default);
 Vue.component('pcp-vuemodal', require('./components/TestVueModal.vue').default);


 

 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 const app = new Vue({
     el: '#app',
 });

 