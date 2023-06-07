<script>
import { useRouter } from 'vue-router'
import { ref, onMounted } from 'vue'
import store from '../store';
import show from '../functions/show';
import submitForm from '../functions/submit';
import FormInput from '../components/FormInput.vue';
import FormSelect from '../components/FormSelect.vue';
import FormButton from '../components/FormButton.vue';
export default {
  name: 'DataFrom',
  components: {
    FormInput, FormSelect, FormButton
  },
  props: {
    title: {
      type: String,
      default: 'Title'
    },
    fields: {
      default: {}
    },
    resource: {
      type: String,
      default: 'login'
    },
    is_new_record: {
      type: Boolean,
      default: true
    },
    /*    data: {
      default: {}
    },  */
  },
  setup(props) {
    const router = useRouter()
    const form = ref({})
    const errors = ref({})

    onMounted(() => {
      if (!props.is_new_record) {
        show(route(props.resource + '.show', router.currentRoute.value.params.id))
          .then(res => {
            form.value = res.data.attributes
          })
          .catch(err => {
            if (err.response) {
              errors.value = err.response.data.errors
            }
            else if (err.request) {
              console.log(err.request)
            }
          })

      }
    });

    const submit = () => {
      submitForm(props.is_new_record, props.resource, form.value)
        .then(res => {
          errors.value = {}
          /*
          if (props.resource !== 'login') {
            let notificationMessage = 'Se ha creado el recurso: ';
            if (!props.is_new_record) {
              notificationMessage = 'Se ha Actualizado el recurso: '
            }
            let notification = {
              type: 'success',
              id: res.attributes.id,
              name: res.attributes.name,
              message: notificationMessage
            }
            store.dispatch('showNotification', notification)
          }

          */
          redirect()
        })
        .catch(err => {
          if (err.response) {
            errors.value = err.response.data.errors
          }
          else if (err.request) {
            console.log(err.request)
          }

        })
    }
    return {
      submit, form, errors
    }
  }
}
</script>

<template>
  <div class="w-full sm:max-w-sm shadow-md mx-6 sm:m-0">
    <form @submit.prevent="submit()">
      <div class="bg-white rounded-t-md p-6">
        <slot name="header" />

        <div v-for="field in fields">
          <FormInput v-if="field.type === 'input'" v-model="form[field.name]" :id="field.name" :label="field.label"
            :type="field.propieties.type" :message="errors[field.name]" />
          <FormSelect v-if="field.type === 'select'" :name="form[field.name]" v-model="form[field.name]" :id="field.name"
            :label="field.label" :values="field.propieties.value" :message="errors[field.name]" />
        </div>
      </div>

      <div class="bg-gray-100 w-full rounded-b-md p-6">
        <div v-if="resource === 'login'">
          <FormButton :label="'Iniciar Sesión'" :color="'blue'" />
        </div>
        <div v-else>
          <FormButton :label="is_new_record ? 'Registrar' : 'Actualizar'" :type="'primary'" />
        </div>
      </div>
    </form>
  </div>
</template >
