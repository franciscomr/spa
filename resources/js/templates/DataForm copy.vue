<script>
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router'
import sendSubmit from '../functions/sendSubmit';
import getSingleRecord from '../functions/getSingleRecord';
import FormSelectVue from '../components/FormSelect.vue';
import FormInputVue from '../components/FormInput.vue';
import FormButtonVue from '../components/FormButton.vue';
export default {
  name: 'DataForm',
  props: {
    title: {
      type: String,
      default: 'Title'
    },
    attributes: {
      default: {}
    },
    relationships: {
      default: {}
    },
    resource: {
      String,
      default: 'login'
    },
    is_new_record: {
      type: Boolean,
      default: true
    },
  },
  components: {
    FormSelectVue,
    FormInputVue,
    FormButtonVue
  },
  setup(props) {
    const vueRouter = useRouter()
    const form = ref({
      type: props.resource,
      attributes: {},
      relationships: {}
    });
    const errors = ref({})

    onMounted(() => {
      if (!props.is_new_record) {
        getSingleRecord(route(props.resource + '.show', vueRouter.currentRoute.value.params.id))
          .then(res => {
            form.value['attributes'] = res.data.attributes;
            form.value['relationships'] = res.data.relatedAttributes;

          })
          .catch(err => {
            if (err.response) {
              console.log(err.response)
            }
            else if (err.request) {
              console.log(err.request)
            }
          })
      }
    });

    const submit = async () => {
      errors.value = await sendSubmit(props.is_new_record, props.resource, form.value)
    }

    const redirectTo = (path) => {
      vueRouter.push({ name: path });
    }

    return {
      form, errors, submit, redirectTo
    }
  },
}
</script>
<template>
  <div class="h-full flex items-center justify-center bg-white/95 rounded-lg">
    <div class="bg-white max-w-sm  mx-auto rounded-md shadow-lg w-full">
      <form @submit.prevent="submit()">
        <div class="bg-white rounded-t-md p-6">
          <h2 class="pb-2 text-2xl font-semibold">{{ title }}</h2>
          <div v-if="relationships" v-for="relationship in relationships">
            <FormSelectVue v-if="relationship.type === 'select'" :id="relationship.id" :label="relationship.label"
              :name="relationship.id" v-model="form.relationships[relationship.id]" :resource="relationship.resource"
              :message="errors[relationship.id]" />
          </div>

          <div v-for="attribute in attributes">
            <FormSelectVue v-if="attribute.type === 'select'" :id="attribute.id" :label="attribute.label"
              :name="attribute.id" v-model="form.attributes[attribute.id]" :values="attribute.values"
              :message="errors[attribute.id]" />

            <FormInputVue v-if="attribute.type === 'input'" :id="attribute.id" :label="attribute.label"
              :name="attribute.id" v-model="form.attributes[attribute.id]" :type="attribute.propieties.type"
              :message="errors[attribute.id]" />
          </div>
        </div>
        <div class="bg-gray-100 w-full rounded-b-md p-6">
          <div v-if="resource === 'login'">
            <FormButtonVue :label="'Iniciar Sesión'" :color="'blue'" />
          </div>
          <div v-else class="flex items-center justify-between w-full space-x-2">
            <FormButtonVue @click="redirectTo(resource)" :label="'Cancelar'" :type="'reset'" />
            <FormButtonVue :label="is_new_record ? 'Registrar' : 'Actualizar'" :type="'submit'" :color="'blue'" />
          </div>
        </div>
      </form>
    </div>
  </div>
</template>