import { createRouter, createWebHistory } from "vue-router";
import organizations from "./catalog/organizations";
import Background from '../components/Background.vue';
import Dashboard from '../templates/Dashboard.vue';
import DataTable from '../templates/DataTable.vue';
import DataForm from '../templates/DataForm.vue';
import Login from '../templates/Login.vue';
import NotFound from '../components/NotFound.vue';
import Notifications from '../templates/Notifications.vue';
import Test from '../components/Test.vue';

const routes = [
  {
    path: "/:catchAll(.*)",
    name: "NotFound",
    component: NotFound,
  },
  {
    path: "/",
    name: "index",
    component: Background
  },
  {
    path: "/login",
    name: "login",
    component: Login
  },
  {
    path: "/app",
    name: "home",
    component: Dashboard,
    children: [

      ...organizations

      ,
      {
        path: "notificaciones",
        name: "notifications",
        component: Notifications,
      },
      {
        path: "sucursales",
        name: "branches",
        component: Test,
      },
    ]

  }
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;