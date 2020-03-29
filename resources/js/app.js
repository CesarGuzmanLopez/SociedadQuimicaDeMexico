/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import 'jquery-ui/ui/widgets/datepicker.js';
import $ from 'jquery'; 
import BootstrapVue from 'bootstrap-vue'

/*importaciones de ckeditor */
import ckeditor from '@ckeditor/ckeditor5-vue';
import DecoupledEditor from '@ckeditor/ckeditor5-build-decoupled-document';

//import ClassicEditor 	from '@ckeditor/ckeditor5-build-classic';
global.ckeditor = ckeditor;
window.ckeditor = ckeditor;
global.DecoupledEditor =DecoupledEditor;
window.DecoupledEditor = DecoupledEditor;

window.$ = window.jQuery = $;
global.$ = global.jQuery = require('jquery');
 window.Vue = require('vue');
require('./bootstrap');
//import * as uiv from 'uiv'
Vue.use(BootstrapVue); 
Vue.use(ckeditor);





Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});
