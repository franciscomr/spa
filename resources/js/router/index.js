import { createRouter, createWebHistory } from "vue-router";
import auth from './middlewares/auth';
import Background from '../components/Background.vue';
import NotFound from '../components/NotFound.vue';
const Dashboard = () => import('../templates/Dashboard.vue')
const Notifications = async () => await import('../templates/Notifications.vue')
import login from './login/login.js';
import organizations from '../router/catalog/organizations'
import branches from '../router/catalog/branches';
import departments from '../router/catalog/departments';
import positions from '../router/catalog/positions';
import employees from '../router/catalog/employees';


const routes = [
  ...login,
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
    path: "/app",
    name: "home",
    component: Dashboard,
    beforeEnter: auth,
    children: [
      ...organizations,
      ...branches,
      ...departments,
      ...positions,
      ...employees,
      {
        path: "notificaciones",
        name: "notificaciones",
        component: Notifications,
      },
    ]

  }
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;