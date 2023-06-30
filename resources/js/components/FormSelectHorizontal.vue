<script>
import { ref, onMounted } from 'vue';
import getIdAndName from '../functions/getIdAndName';
export default {
  name: 'FormSelectHorizontal',
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
    resource: {
      type: String,
      default: null
    },
    modelValue: {
      type: [String, Number],
      default: ''
    },
    message: {
    },
    values: {},
    defaultValue: {
      type: [Number, String],
      default: null
    }
  },
  setup(props) {
    const data = ref({})
    onMounted(async () => {
      if (props.resource !== null) {
        data.value = await getIdAndName(props.resource);
      }
    }
    )
    return { data }
  }
}
</script>
<template>
  <div class="py-1 w-full inline-flex">
    <label class="min-w-max w-2/5 flex items-center" :for="id">
      {{ label }}
    </label>
    <div class="w-full flex justify-end">
      <select :id="id" class="w-full border border-gray-200 rounded-md p-1 border-b-2 focus:outline-none"
        :value="modelValue" required @change="$emit('update:modelValue', $event.target.value)">
        <option v-for="(select, index) in data" :key="index" :value="index">
          {{ select }}
        </option>
      </select>
    </div>
    <div class="h-2">
      <div v-show="message">
        <p class="text-xs text-red-600 dark:text-red-400">
          {{ message }}
        </p>
      </div>
    </div>
  </div>
</template>