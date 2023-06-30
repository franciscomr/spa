<script>
import Icon from '../components/Icon.vue'
export default {
  name: 'ButtonVue',
  props: {
    label: {
      type: String,
      default: 'Button'
    },
    color: {
      type: String,
      default: 'gray'
    },
    icon: {
      type: String,
      default: null
    },
  },
  components: {
    Icon
  },
  data() {

    const buttonColor = {
      gray: 'bg-white border-gray-300 hover:bg-gray-100',
      red: 'bg-red-500 hover:bg-red-600 text-white',
      orange: 'bg-orange-500 hover:bg-orange-600 text-white',
      yellow: 'bg-yellow-500 hover:bg-yellow-600 text-white',
      green: 'bg-green-500 hover:bg-green-600 text-white',
      blue: 'bg-blue-500 hover:bg-blue-600 text-white',
      indigo: 'bg-indigo-500 hover:bg-indigo-600 text-white',
      violet: 'bg-violet-500 hover:bg-violet-600 text-white',

    }
    return { buttonColor }
  }
}
</script>
<template>
  <div>
    <button class="w-full md:py-1.5 px-4 md:px-6 py-2 rounded-md border border-b-2"
      :class="buttonColor[color] || 'bg-red-500 text-white'">
      <span class="block md:hidden">
        <Icon :name="icon" :color="color === 'gray' ? 'black' : 'white'" />
      </span>
      <span class="hidden md:block">{{ label }}</span>
    </button>
  </div>
</template>