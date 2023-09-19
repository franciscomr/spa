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
import categories from '../router/catalog/categories';
import brands from '../router/catalog/brands';
import equipments from '../router/catalog/equipments';
import equipmentModels from '../router/catalog/equipmentModels';
import phonePlans from "../router/catalog/phonePlans";
import contracts from '../router/catalog/contracts';
import assets from '../router/assetManagement/assets';


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
      ...categories,
      ...brands,
      ...equipments,
      ...equipmentModels,
      ...phonePlans,
      ...contracts,
      ...assets,
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