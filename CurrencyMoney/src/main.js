import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import Dashbord from "@/components/Dashbord.vue";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

/* add fontawesome core */
// import { library } from '@fortawesome/fontawesome-svg-core'

// /* add some free styles */
// import { faCircleDollar } from '@fortawesome/free-brands-svg-icons'

// library.add(faCircleDollar)

import "./assets/main.css";
// import {Vue} from 'vue'
// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
// Vue.use(BootstrapVue)

const app = createApp(App);
app.use(VueSweetalert2);

app.use(router);

app.mount("#app");
