
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home-component', require('./components/homeComponent.vue').default);
Vue.component('room-component', require('./components/roomComponnent').default);
Vue.component('room-detail-component', require('./components/roomDetailComponent').default);
Vue.component('search-component', require('./components/searchComponent').default);
Vue.component('account-component', require('./components/myAccountComponent').default);
Vue.component('likeroom-component', require('./components/likeRoomComponent').default);

const app = new Vue({
    el: '#app'
});
