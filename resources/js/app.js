import './bootstrap';
window.Vue = require('vue');
window.axios = require('axios');
 
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('image-preview', require('./imagepreview/FeatureImage.vue').default);
Vue.component('first-image', require('./imagepreview/FirstImage.vue').default);
Vue.component('second-image', require('./imagepreview/SecondImage.vue').default);
Vue.component('category-dropdown', require('./components/CategoryDropdown.vue').default);
Vue.component('country-dropdown', require('./components/AddressDropDown.vue').default);
Vue.component('message', require('./components/Message.vue').default);
Vue.component('conversation', require('./components/Conversation.vue').default);
Vue.component('show-phone-number', require('./components/ShowPhoneNumber.vue').default);
Vue.component('save-ad', require('./components/SaveAd.vue').default);


const app = new Vue({
    el: '#app'
});
