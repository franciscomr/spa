<script>
import { ref, onMounted, watch } from 'vue';
import { useRouter } from 'vue-router';
import search from '../functions/search';
import exportExcel from '../functions/exportExcel';
import Notification from '../components/Notification.vue';
import Icon from '../components/Icon.vue';
import ButtonVue from '../components/ButtonVue.vue';
import FormInput from '../components/FormInput.vue';
import FormSelect from '../components/FormSelect.vue';
import FormButton from '../components/FormButton.vue';
export default {
  name: 'DataTable',
  props: {
    title: {
      type: String,
      default: 'Title'
    },
    resource: {
      type: String,
      default: 'organizations'
    },
    attributes: {
      default: {}
    },
    relationships: {
      default: {}
    },
    actions: {
      default: {}
    }
  },
  components: {
    Notification, Icon, ButtonVue, FormInput, FormSelect, FormButton
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

    const resetFilters = () => {
      filters.value = {}
      displayMenu.value = false
      searchData();
    }

    watch(() => props.title, (after, before) => {
      filters.value = {}
      dataReceived.value = {}
      pagination.value = {}
      searchData()
    });

    return {
      exportData, dataReceived, sort, sortBy, perPage, numberItemsPerPage, displayMenu,
      filters, filterData, changePageDisplayed, pagination, redirectTo, resetFilters
    }
  }
}
</script>

<template>
  <div class="w-full h-full pl-2 space-y-2">
    <h1 class="text-2xl font-semibold">{{ title }}</h1>
    <Notification />
    <div class="flex items-center justify-end space-x-2">
      <div class="flex items-center">
        <label for="pagination" class="text-sm hidden md:block pr-2">Registros por Pagina:</label>
        <select name="pagitation" id=" pagination" v-model="perPage" @change="numberItemsPerPage(perPage)"
          class="md:py-1 px-2 py-1.5 rounded-md border border-b-2 border-gray-300  focus:outline-none">
          <option>10</option>
          <option>25</option>
          <option>50</option>
        </select>
      </div>
      <div class="flex items-center">
        <span class="text-sm pr-2 hidden md:block">Filtrar por:
        </span>
        <button @click="displayMenu = !displayMenu"
          class="bg-white border-gray-300 md:py-1.5 px-4 py-2 rounded-md border border-b-2">
          <Icon :name="'filter_outline'" />
        </button>
      </div>
      <ButtonVue @click="exportData" :label="'Exportar a Excel'" :icon="'tray_arrow_down'" class="text-sm" />
      <ButtonVue @click="redirectTo(resource + '.create')" :label="'Nuevo Registro'" :icon="'plus'" :color="'blue'"
        class="text-sm" />
    </div>

    <div class="relative " v-show="displayMenu">
      <div class="w-full absolute flex justify-end py-2">
        <div class="w-full sm:max-w-md  rounded-md shadow-md mx-6 sm:m-0 bg-white/95 backdrop-blur-sm ">
          <div class="flex items-center justify-end">
            <Icon :name="'window_close'" @click="displayMenu = false" class="p-2 cursor-pointer" />
          </div>
          <div class="px-6 pb-2">
            <div v-if="relationships" v-for="relationship in relationships">
              <FormSelect :id="relationship.id" :label="relationship.label" v-model="filters[relationship.id]"
                :name="relationship.id" :resource="relationship.resource" :landscape="true" class="text-sm" />
            </div>
            <div v-for="attribute in attributes" class="">
              <FormInput :id="attribute.name" :label="attribute.label" v-model="filters[attribute.id]"
                :type="attribute.filter === 'date' ? 'date' : 'search'" :landscape="true" class="text-sm" />
            </div>
          </div>
          <div class="bg-gray-100">
            <div class="p-6 inline-flex w-full justify-between space-x-2">
              <FormButton @click="resetFilters" :label="'Reset'" />
              <FormButton @click="filterData" :label="'Filtrar'" :color="'blue'" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-if="dataReceived.length > 0">
      <table class="w-full  border-separate border-spacing-y-1.5">
        <thead>
          <tr class="bg-white h-14 hover:bg-gray-50">
            <th v-for="attribute in attributes" class="text-sm font-medium min-w-max text-left">
              <div @click="sort(attribute.id)" class="cursor-pointer flex items-center">
                <span class="">{{ attribute.label }}</span>
                <div class="w-4">
                  <span v-show="attribute.id === sortBy">
                    <Icon name="arrow_up_thin" :size="'xs'" />
                  </span>
                  <span v-show="attribute.id === sortBy.slice(1)">
                    <Icon name="arrow_down_thin" :size="'xs'" />
                  </span>
                </div>
              </div>
            </th>
            <th v-for="relationship in relationships" class="text-sm font-medium min-w-max text-left">
              {{ relationship.label }}
            </th>
            <th v-if="actions"></th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="data in dataReceived" class="bg-white h-12 hover:bg-gray-50">
            <td v-for="attribute in attributes" class="text-sm min-w-max">
              {{ data['attributes'][attribute.id] }}
            </td>
            <td v-for="relationship in relationships" class="text-sm min-w-max">
              {{ data['relationships'][relationship.resource]['data']['name'] }}
            </td>
            <td v-if="actions" class="space-x-2 mx-auto">
              <div class="w-full  flex items-center">
                <div v-for="action in actions" class="">
                  <button v-if="action.route" class="flex items-center">
                    <router-link :to="{ name: action.route, params: { id: data['attributes']['id'] } }">
                      <Icon :name="action.icon" :size="'lg'" class="p-1" />
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

    <div v-if="dataReceived.length > 0" class="flex justify-end">
      <div class=" space-x-2 inline-flex items-center justify-center">
        <div v-for="page in pagination.links" class="">
          <div @click="changePageDisplayed(page.url)"
            class="bg-white border border-gray-300 text-center text-sm p-2 rounded-md"
            :class="page.active ? 'bg-gray-100 text-blue-500' : '' || page.url !== null ? 'cursor-pointer' : ''">
            <div :class="page.label.length < 3 ? 'w-4' : ''">
              <span v-html="page.label"></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-if="dataReceived.length > 0" class="text-sm">
      <span>{{ pagination.from }} - {{ pagination.to }} <span class="px-1">de</span> {{ pagination.total
      }} Resultados</span>
    </div>

    <Transition>
      <p v-if="dataReceived.length < 1">No se encontraron registros</p>
    </Transition>


  </div>
</template>

<style>
.v-enter-active,
.v-leave-active {
  transition: opacity .1s ease;
}

.v-enter-from,
.v-leave-to {
  opacity: 0
}
</style>