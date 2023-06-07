<script>
import { onMounted } from 'vue';
import isAuthenticated from '../functions/isAuthenticated';
import logout from '../functions/logout';
import store from '../store';
import Icon from '../components/Icon.vue';
import DropDown from '../components/DropDown.vue';
import Link from '../components/Link.vue';
export default {
  name: 'Dashboard',
  components: {
    Icon, DropDown, Link
  },
  setup() {

    onMounted(() => {
      if (!store.state.user.isAuthenticated) {
        isAuthenticated()
      }
    });

    const menu = {

      'Catalog': {
        'title': 'Catálogos',
        'icon': 'notebook_outline',
        'color': 'blue',
        'links': {
          'Organizaciones': 'organizations',
          'Sucursales': 'branches',
          'Organizacione': 'organizations',
          'Sucursale': 'branches',
          'Organizacion': 'organizations',
          'Sucursal': 'branches',
          'Organizacion': 'organizations',
          'Sucursal': 'branches'
        }
      },
      'DeviceInventory': {
        'title': 'Catalogo',
        'icon': 'book_open_outline',
        'color': 'red',
        'links': {
          'Organizaciones': 'organizations',
          'Sucursales': 'branches',
          'Organizacione': 'organizations',
          'Sucursale': 'branches',
          'Organizacion': 'organizations',
          'Sucursal': 'branches',
          'Sucursale': 'branches',
          'Organizacion': 'organizations',
          'Sucursal': 'branches',
          'Organcion': 'organizations',
          'Sucursal': 'branches'
        }
      },
      'ServiceDesk': {
        'title': 'Mesa de Servicios',
        'icon': 'monitor_cellphone',
        'color': 'green',
        'links': {
          'Organizaciones': 'organizations',
          'Sucursales': 'branches',
          'Organizacione': 'organizations',
          'Sucursale': 'branches',
          'Organizacion': 'organizations',
          'Sucursal': 'branches',
          'Sucursale': 'branches',
          'Organizacion': 'organizations',
          'Sucursal': 'branches'
        }
      }
    }
    return { menu, logout }
  }
}
</script>
<template>
  <div class="flex h-full backdrop-blur-sm bg-white/95 rounded-lg">
    <div class="sm:w-72 md:block hidden shrink-0 py-8 px-3 space-y-6">
      <div class="flex items-center  w-full">
        <img src="/images/avatar.jpeg" class="rounded-full h-16 w-16" alt="Avatar" />
        <div class="flex flex-col ml-2 truncate ">
          <span class="font-medium">{{ $store.state.user.data.name }}</span>
          <span class="text-xs">{{ $store.state.user.data.email }}</span>
        </div>
      </div>

      <div class="h-4/5 space-y-2 overflow-y-auto">
        <Link :label="'Notificaciones'" :route_name="'notifications'" :icon="'bell_outline'" :badge="'16'" />
        <div v-for=" userMenu  in  menu " class="overflow-y-auto">
          <DropDown :icon="userMenu.icon" :label="userMenu.title">
            <template #content>
              <div v-for="( link, index ) in  userMenu.links " :key="index">
                <Link :label="index" :route_name="link" />
              </div>
            </template>
          </DropDown>
        </div>
      </div>

      <div @click="logout()"
        class="flex items-center px-1 py-2 cursor-pointer hover:bg-gray-200 border-l-4 border-transparent">
        <span>
          <Icon :name="'power'" :size="'xl'" />
        </span>
        <span class="ml-2 w-full">
          <h3> Cerrar Sesión</h3>
        </span>
      </div>

    </div>
    <div class="w-full py-8 px-3 overflow-x-auto">
      <router-view />
    </div>
  </div>
</template>