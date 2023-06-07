<script>
import Icon from '../components/Icon.vue';
export default {
  name: 'DropDown',
  components: {
    Icon
  },
  props: {
    label: {
      type: String,
      default: 'Label'
    },
    icon: {
      type: String,
      default: 'emoticon_poop'
    }
  },
  data() {
    return {
      showList: false
    }
  }
}
</script>

<template>
  <div @click="showList = !showList"
    class="flex items-center  px-1 py-2 border-l-4 border-transparent hover:border-blue-500 cursor-pointer hover:bg-gray-200">
    <span>
      <Icon :name="icon" :size="'xl'" />
    </span>
    <span class="ml-2 w-full">
      <h3> {{ label }}</h3>
    </span>
    <span>
      <Icon :name="'chevron_up'" :class="!showList ? '' : 'rotate-180'" />
    </span>
  </div>

  <div v-show="showList" class="indent-6 text-sm space-y-1">
    <slot name="content" />
  </div>




  <!--


  <ul @click="showList = !showList">
    <li class="p-2 cursor-pointer hover:bg-gray-50 rounded-md ">
      <div class="flex items-center">
        <span class="p-1 rounded-md" :class="DropDownClass[color] || 'bg-red-400'">
          <component v-bind:is="icon" fillColor="#fff" :size=20></component>
        </span>
        <span class=" w-full px-2 font-medium text-sm">
          {{ title }}
        </span>
        <span class="flex justify-end">
          <chevron-up-icon :size=18 fillColor="#303030" :class="!showList ? '' : 'rotate-180'" />
        </span>
      </div>
    </li>
    <div v-show="showList">
      <slot name="content" />
    </div>
  </ul>

  -->
</template>