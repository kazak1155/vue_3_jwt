import App from './components/index.vue'
import router from './router.js'
import store from './store/index.js'
import { createApp } from "vue";

createApp(App).use(router).use(store).mount('#app')

