import { createRouter, createWebHistory } from "vue-router";
import AdminViewVue from "../views/AdminView.vue";

import LoginView from "../views/LoginView.vue";
import DashbordView from "../views/DashbordView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
   
    {
      path: "/",
      name: "login",
      component: LoginView,
    },
    {
      path: "/Admin",
      name: "Admin",
      component: AdminViewVue,
    },
    {
      path: "/dashbord",
      name: "dashbord",
      component: DashbordView

    }

  ],
});

export default router;
