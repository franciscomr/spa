<script>

export default {
  name: 'FormSelect',
  props: {
    id: {
      type: String,
      default: 'id'
    },
    label: {
      type: String,
      default: 'label'
    },
    name: {
    },
    modelValue: {
      type: [String, Number],
      default: ''
    },
    message: {
    },
    values: {}
  }
}
</script>
<template>
  <div class="py-1">
    <label class="block font-Nunito text-md  tracking-wide text-gray-700" :for="id">
      {{ label }}
    </label>
    <select :id="id" class="px-4 py-2 w-full rounded-md border" :value="modelValue" required
      @change="$emit('update:modelValue', $event.target.value)">
      <option v-for="(select, index) in values" :key="index" :value="index">
        {{ select }}
      </option>
    </select>
    <div class="h-2">
      <div v-show="message">
        <p class="text-xs text-red-600 dark:text-red-400">
          {{ message }}
        </p>
      </div>
    </div>
  </div>
</template>