import './bootstrap';
import { createApp } from "vue";
import router from './router';
import App from "./App.vue";
import scrollbar from './smoothScrollbar.js';

scrollbar;

createApp(App)
    .use(router)
    .mount("#app");