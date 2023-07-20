import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

// fontIcon引入
import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'
// 字體引入
import "@/assets/fonts/font.css";


//外部函式庫 view-ui-plus
import ViewUIPlus from 'view-ui-plus';





const app = createApp(App);
app.use(store);
app.use(router);
app.use(ViewUIPlus);
app.mount('#app');
