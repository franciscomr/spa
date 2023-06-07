<script>
import Icon from '../components/Icon.vue';
export default {
  name: 'Link',
  props: {
    label: {
      type: String,
      default: 'Label'
    },
    route_name: {
      type: String,
      default: 'home'
    },
    icon: {
      type: String,
      default: null
    },
    badge: {
      type: [String, Number],
      default: null
    }
  }, components: {
    Icon
  }
}
</script>
<template>
  <router-link :to="{ name: route_name }">
    <div
      class="border border-red-300 flex items-center px-1 py-2 cursor-pointer hover:bg-gray-200 border-l-4 border-transparent">
      <span v-if="icon !== null">
        <Icon :name="icon" :size="'xl'" />
      </span>
      <span class="ml-2 w-full">
        <h3> {{ label }}</h3>
      </span>
      <div v-if="badge !== null">
        <span class="px-1.5 text-sm font-medium rounded-full bg-blue-500 text-white"> {{ badge }}</span>
      </div>
    </div>
  </router-link>
</template>