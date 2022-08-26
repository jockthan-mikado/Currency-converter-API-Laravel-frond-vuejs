import { createRouter, createWebHistory } from "vue-router";
import AdminViewVue from "../views/AdminView.vue";

import LoginView from "../views/LoginView.vue";
import DashbordView from "../views/DashbordView.vue";
import TableListPairsView from "../views/TableListPairsView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
   
    {
      path: "/",
      name: "login",
      component: () => import("../views/LoginView.vue"),
      beforeEnter(){
        if (localStorage.getItem("token")) {
            return {path:"/dashbord"};
        }
      }
    },
    
    {
      path: "/dashbord",
      name: "dashbord",
      
      component: () => import("../views/DashbordView.vue"),
      beforeEnter(){
        if (localStorage.getItem("token") == null) {
            return {path:"/"};
        }
      }
   
    },
    {
      path: "/dashbord-listepair",
      name: "listepair",
      component:  () => import("../views/TableListPairsView.vue"),
      beforeEnter(){
        if (localStorage.getItem("token") == null) {
            return {path:"/"};
        }
      }
    },
    

  ],
});

export default router;
