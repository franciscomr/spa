<script>
export default {
  name: 'FormInputHorizontal',
  props: {
    id: {
      type: String,
      default: 'id'
    },
    label: {
      type: String,
      default: 'Label'
    },
    type: {
      type: String,
      default: 'text'
    },
    modelValue: {
      type: [String, Number],
      default: ''
    },
    message: {
    },
    color: {
      type: String,
      default: 'blue'
    },
  },
  data() {
    const inputColor = {
      gray: 'focus:border-b-500',
      red: 'focus:border-b-red-500',
      orange: 'focus:border-b-orange-500',
      yellow: 'focus:border-b-yellow-500',
      green: 'focus:border-b-green-500',
      blue: 'focus:border-b-blue-500',
      indigo: 'focus:border-b-indigo-500',
      violet: 'focus:border-b-violet-500',
    }
    return { inputColor }
  }
}
</script>
<template>
  <div class="py-1 w-full inline-flex">
    <label class="min-w-max w-2/5 flex items-center" :for="id">
      {{ label }}
    </label>
    <div class=" w-full flex justify-end items-center">
      <input class="w-full border border-gray-200 rounded-md p-1 border-b-2 focus:outline-none"
        :class="inputColor[color] || 'focus:border-b-blue-500'" :id="id" :type="type" :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)">
    </div>
  </div>
</template>