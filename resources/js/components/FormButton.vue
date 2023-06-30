<script>
export default {
  name: 'FormButtonVue',
  props: {
    label: {
      type: String,
      default: 'Button'
    },
    color: {
      type: String,
      default: 'default'
    },
  },
  data() {

    const buttonColor = {
      default: 'bg-white border-gray-300 hover:bg-gray-100',
      gray: 'bg-gray-600 hover:bg-gray-500 text-white',
      red: 'bg-red-600 hover:bg-red-500 text-white',
      orange: 'bg-orange-600 hover:bg-orange-500 text-white',
      yellow: 'bg-yellow-600 hover:bg-yellow-500 text-white',
      green: 'bg-green-600 hover:bg-green-500 text-white',
      blue: 'bg-blue-500 hover:bg-blue-600 text-white',
      indigo: 'bg-indigo-600 hover:bg-indigo-500 text-white',
      violet: 'bg-violet-600 hover:bg-violet-500 text-white',

    }
    return { buttonColor }
  }
}
</script>

<template>
  <button type="submit" class="w-full py-1 px-10 rounded-md border border-b-2"
    :class="buttonColor[color] || 'bg-red-400'">
    <span class="">{{ label }}</span>
  </button>
</template>