<script>
import { useRouter } from 'vue-router';
import { ref, onMounted } from 'vue';
import exportExcel from '../functions/exportExcel';
import FormInputHorizontal from '../components/FormInputHorizontal.vue';
import BasicButton from '../components/BasicButton.vue';
import FormButton from '../components/FormButton.vue';
import Notification from '../components/Notification.vue';
import store from '../store';
import search from '../functions/search';
import Icon from '../components/Icon.vue';
export default {
  name: 'DataTable',
  props: {
    title: {
      type: String,
      default: 'Title'
    },
    fields: {
      default: {}
    },
    actions: {
      default: {}
    }
  },
  components: {
    Icon, FormInputHorizontal, BasicButton, FormButton, Notification
  },
  setup(props) {
    const filters = ref({});
    const sortBy = ref('-id');
    const perPage = ref(10);
    const vueRouter = useRouter();
    const dataReceived = ref({});
    const pagination = ref({});

    const displayMenu = ref(false);

    //Api Call
    const searchData = async () => {
      await search(route(vueRouter.currentRoute.value.name + '.index'), sortBy.value, filters.value, perPage.value)
        .then(res => {
          dataReceived.value = res.data;
          pagination.value = res.pagination
        })
    }

    const sort = (value) => {
      if (sortBy.value.startsWith('-')) {
        sortBy.value = sortBy.value.slice(1)
        if (value !== sortBy.value) {
          sortBy.value = value
        }
      } else {
        if (value === sortBy.value) {
          sortBy.value = '-' + value
        } else {
          sortBy.value = value
        }
      }
      searchData();
    }

    const exportData = async () => {
      await search(route(vueRouter.currentRoute.value.name + '.export'), sortBy.value, filters.value)
        .then(res => {
          exportExcel(props.title, res.data)
        })
    }
    //display NUmber of result per Page
    const numberItemsPerPage = (number) => {
      perPage.value = number
      searchData()
    }

    const changePageDisplayed = async (url) => {
      if (url !== null) {
        await search(url, sortBy.value, filters.value, perPage.value)
          .then(res => {
            dataReceived.value = res.data;
            pagination.value = res.pagination
          })
      }
    }

    const filterData = () => {
      searchData();
      displayMenu.value = false
    }

    const redirectTo = (path) => {
      vueRouter.push({ name: path });
    }

    onMounted(() => {
      searchData()
    });

    return {
      exportData, dataReceived, sort, sortBy, perPage, numberItemsPerPage, displayMenu, filters, filterData, changePageDisplayed, pagination, redirectTo
    }
  }
}
</script>
<template>
  <div class="p-2">
    <h2 class="text-2xl font-semibold ml-2">{{ title }}</h2>
    <Notification />
    <div class="flex items-center justify-end space-x-3 py-2">
      <div class="flex items-center">
        <span class="text-sm px-1 text-gray-500 hidden md:block">Registros por Pagina:
        </span>
        <select name="pagintation" id=" pagination" v-model="perPage" @change="numberItemsPerPage(perPage)"
          class="md:py-1.5 px-4 py-2 rounded-md border border-b-2 border-gray-300  focus:outline-none">
          <option>10</option>
          <option>25</option>
          <option>50</option>
        </select>
      </div>
      <div class="flex items-center">
        <span class="text-sm px-1 text-gray-600 hidden md:block">Filtrar por:
        </span>
        <button @click="displayMenu = !displayMenu"
          class="bg-white border-gray-300 md:py-1.5 px-4 py-2 rounded-md border border-b-2">
          <Icon :name="'filter_outline'" />
        </button>
      </div>
      <BasicButton @click="exportData" :label="'Exportar a Excel'" :icon="'tray_arrow_down'" class="text-sm" />
      <BasicButton @click="redirectTo('organizations.create')" :label="'Nuevo Registro'" :icon="'plus'" :color="'blue'"
        class="text-sm" />
    </div>

    <div class="relative " v-show="displayMenu">
      <div class="w-full absolute flex justify-end py-2">
        <div class="w-full sm:max-w-sm  rounded-md shadow-md mx-6 sm:m-0 bg-white/95 backdrop-blur-sm ">
          <div class="p-3">
            <div v-for="field in fields" class="">
              <FormInputHorizontal :id="field.name" :label="field.label" v-model="filters[field.name]"
                :type="field.filter === 'date' ? 'date' : 'search'" class="p-3" />
            </div>
          </div>

          <div class="bg-gray-100">
            <div class="p-6 inline-flex w-full justify-between space-x-2">
              <FormButton @click="displayMenu = false" :label="'Cancelar'" />
              <FormButton @click="filterData" :label="'Filtrar'" :color="'blue'" />
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="py-2 overflow-x-auto">
      <table class=" w-full border-separate border-spacing-y-1">
        <thead>
          <tr class="bg-white h-12 hover:bg-gray-50">
            <th v-for="field in fields" class="text-sm pl-1 font-medium text-left min-w-max">
              <div @click="sort(field.name)" class="cursor-pointer flex items-center">
                <span class="">{{ field.label }}</span>
                <div class="w-4">
                  <span v-show="field.name === sortBy">
                    <Icon name="arrow_up_thin" :size="'xs'" />
                  </span>
                  <span v-show="field.name === sortBy.slice(1)">
                    <Icon name="arrow_down_thin" :size="'xs'" />
                  </span>
                </div>
              </div>
            </th>
            <th v-if="actions"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="data in dataReceived" class="bg-white h-12 hover:bg-gray-50">
            <td v-for="field in fields" class="text-sm pl-1 text-gray-600">
              {{ data['attributes'][field.name] }}
            </td>
            <td v-if="actions" class="space-x-2 mx-auto">
              <div class="w-full  flex items-center">
                <div v-for="action in actions" class="">
                  <button v-if="action.route" class="p-1">
                    <router-link :to="{ name: action.route, params: { id: data['attributes']['id'] } }">
                      <Icon :name="action.icon" :size="'lg'" />
                    </router-link>
                  </button>
                  <button v-else class="p-1">
                    <Icon :name="action.icon" :size="'lg'" />
                  </button>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="flex justify-end">
      <div class=" space-x-2 inline-flex items-center justify-center">
        <div v-for="page in pagination.links" class="">
          <div @click="changePageDisplayed(page.url)"
            class="bg-white border border-gray-300 font-medium text-center text-sm p-2 rounded-md"
            :class="page.active ? 'bg-gray-100 text-blue-500' : '' || page.url !== null ? 'cursor-pointer' : ''">
            <span v-html="page.label"></span>
          </div>
        </div>
      </div>
    </div>

    <div>
      <span>{{ pagination.from }} - {{ pagination.to }} <span class="px-1">de</span> {{ pagination.total
      }} Resultados</span>
    </div>

  </div>
</template>
