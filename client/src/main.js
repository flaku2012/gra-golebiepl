import "bootstrap/dist/css/bootstrap.css"

import { createApp } from 'vue'
import mitt from 'mitt'; 
import App from './App.vue'
import router from './router'
import store from './store'
import axios from 'axios'
//import Notifications from '@kyvg/vue3-notification'
//import VueCountdown from '@chenfengyuan/vue-countdown';

require('@/store/subscriber')
const app = createApp(App);

const emitter = mitt();
app.config.globalProperties.emitter = emitter

const baseURL = axios.defaults.baseURL = process.env.NODE_ENV === 'production' ? 'http://www.gra-golebie.pl/api/public/api/' : 'http://127.0.0.1:8000'
axios.defaults.baseURL = `${baseURL}/api`

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'local',
    wsHost: '127.0.0.1',
    wsPort: 6001,
    wssPort: 6001,
    disableStats: true,
    encrypted: false,
    enabledTransports: ['ws'],
    forceTLS: false,
    authEndpoint: `${baseURL}/broadcasting/auth`,
    auth: {
        headers: {
            /** I'm using access tokens to access  **/
          Authorization: "Bearer " + localStorage.getItem('token')
          
        }
    }
});

window.Echo.connector.pusher.connection.bind('connected', () => {
    axios.defaults.headers.common['X-Socket-Id'] = window.Echo.socketId();
});


axios.interceptors.response.use(
    response => response,
    error => {
        if (error.response.status===404 || error.response.status===403) 
        {
            // przekierowanie 
            router.push({name: 'Dashboard'})
        }
        return Promise.reject(error);
    }
);

    
store.dispatch('auth/attempt', localStorage.getItem('token')).then(()=>{
    app
    //.component(VueCountdown.name, VueCountdown)
    .use(store)
    .use(router)
    //.use(Notifications)
    .mount('#app')
})

import "bootstrap/dist/js/bootstrap.js"