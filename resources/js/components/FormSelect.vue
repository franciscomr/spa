<script>
import { ref, onMounted, watch } from 'vue';
import getIdAndName from '../functions/getIdAndName';
export default {
  name: 'FormSelectVue',
  props: {
    id: {
      type: String,
      default: 'id'
    },
    label: {
      type: String,
      default: 'label'
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
    values: {
    },
    landscape: {
      type: Boolean,
      default: false
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

    watch(() => props.id, async (after, before) => {

      if (props.resource !== null) {
        data.value = await getIdAndName(props.resource);
      }
    });

    return { data }
  }
}
</script>
<template>
  <div class="py-1" :class="landscape ? 'w-full inline-flex items-center' : ''">
    <label :for="id" :class="landscape ? 'min-w-max w-2/5' : ''">
      {{ label }}
    </label>
    <select class="w-full border border-gray-200 rounded-md p-1 border-b-2 focus:outline-none" :id="id"
      :value="modelValue" @change="$emit('update:modelValue', $event.target.value)">
      <option v-if="resource !== null" v-for="(select, index) in data" :key="index" :value="index">
        {{ select }}
      </option>

      <option v-else v-for="(select, index) in values" :value="index">
        {{ select }}
      </option>
    </select>
    <div class="h-2">
      <div v-show="message">
        <p class="text-sm text-red-500">
          {{ message }}
        </p>
      </div>
    </div>
  </div>
</template>