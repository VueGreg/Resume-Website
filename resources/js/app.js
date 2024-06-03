import './bootstrap';
import { createApp } from "vue";
import router from './router';
import SmoothScrollbar from 'smooth-scrollbar';
import  store  from './store';

const options = {
    'damping': .04,
}

SmoothScrollbar.init(document.querySelector('#scrollId'), options);

import App from "./App.vue";

createApp(App)
    .use(router)
    .use(store)
    .mount("#app");