import './bootstrap';
import { createApp } from "vue";
import router from './router';
import SmoothScrollbar from 'smooth-scrollbar';

const options = {
    'damping': .04,
}

SmoothScrollbar.init(document.querySelector('#scrollId'), options);

import App from "./App.vue";

createApp(App)
    .use(router)
    .mount("#app");