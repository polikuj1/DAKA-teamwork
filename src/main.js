import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

// fontIcon引入
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
// 字體引入
import "@/assets/fonts/font.css";


createApp(App).use(store).use(router).mount('#app')
