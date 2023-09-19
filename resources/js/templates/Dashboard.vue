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
    const menu = {

      'Catalog': {
        'title': 'Organizaciones',
        'icon': 'domain',
        'color': 'blue',
        'links': {
          'Organizaciones': 'organizations',
          'Sucursales': 'branches',
          'Departamentos': 'departments',
          'Puestos': 'positions',
          'Personal': 'employees',
        }
      },
      'Catalog2': {
        'title': 'Activos',
        'icon': 'monitor_cellphone',
        'color': 'blue',
        'links': {
          'Contratos': 'contracts',
          'Categorias': 'categories',
          'Equipos': 'equipment',
          'Marcas': 'brands',
          'Modelos': 'equipmentModels',
          'Planes': 'phonePlans',
        }
      },
      'AssetManagement': {
        'title': 'Activos',
        'icon': 'monitor_cellphone',
        'color': 'blue',
        'links': {
          'Activos': 'assets',
        }
      },
    }
    return { menu, logout }
  }
}
</script>
<template>
  <div class="flex h-full backdrop-blur-sm bg-white/95 rounded-lg p-4 ">
    <div class="sm:w-72 md:block hidden shrink-0 space-y-4 py-2">
      <div class="flex items-center w-full">
        <img src="/images/avatar.jpeg" class="rounded-full h-16 w-16" alt="Avatar" />
        <div class="flex flex-col ml-2 truncate ">
          <span class="font-medium">{{ $store.state.user.data.name }}</span>
          <span class="text-xs">{{ $store.state.user.data.email }}</span>
        </div>
      </div>

      <div class="h-5/6 space-y-2 overflow-y-auto">
        <Link :label="'Notificaciones'" :route_name="'notificaciones'" :icon="'bell_outline'" :badge="'16'" />
        <div v-for=" userMenu  in  menu " class="overflow-y-auto">
          <DropDown :icon="userMenu.icon" :label="userMenu.title" :color="'violet'">
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
    <div class="w-full overflow-x-auto p-2">
      <router-view />
    </div>
  </div>
</template>