<script>
import router from '../router';
import { ref, onMounted } from 'vue';
import { useRouter } from 'vue-router'
import sendNotification from '../functions/sendNotification';
import FormInputVue from '../components/FormInput.vue';
import FormButtonVue from '../components/FormButton.vue';
export default {
  name: 'FormForAttach',
  props: {
    title: {
      type: String,
      default: 'Title'
    },
    attributes: {
      default: {}
    },
    resource: {
      String,
      default: null
    },
    format: {
      type: Array,
      default: ['image/png', 'image/jpeg']
    }
  },
  components: {
    FormInputVue, FormButtonVue
  },
  setup(props) {
    const vueRouter = useRouter()
    const form = ref({});
    const errors = ref({})
    const file = ref({})

    const uploadFile = (event) => {
      //console.log(event)
      if (event.target.files.length === 0) {
        return;
      }
      file.value = event.target.files[0];
      fileFormatValidation()
    }

    const fileFormatValidation = () => {
      if (!props.format.includes(file.value['type'])) {
        form.value['attach'] = "";
      }
    }


    const submit = async () => {
      let dataForm = new FormData();
      dataForm.append('select_file', file.value);

      let url = route(props.resource + '.attach', vueRouter.currentRoute.value.params.id);
      await axios.get('/sanctum/csrf-cookie')

      await axios.post(url, dataForm)
        .then(res => {
          sendNotification(false, res.data[0]['attributes']);
          router.push({ name: props.resource })
        })
        .catch(err => {
          if (err.response) {
            errors = err.response.data.errors
          }
          else if (err.request) {
            console.log(err.request)
          }
        })
    }

    const redirectTo = (path) => {
      vueRouter.push({ name: path });
    }

    return { form, errors, uploadFile, redirectTo, submit }
  },
}
</script>
<template>
  <div class="h-full flex items-center justify-center bg-white/95 rounded-lg">
    <div class="bg-white max-w-sm  mx-auto rounded-md shadow-lg w-full">
      <form @submit.prevent="submit()" enctype="multipart/form-data">
        <div class="bg-white rounded-t-md p-6">
          <h2 class="pb-2 text-2xl font-semibold">{{ title }}</h2>
          <FormInputVue @change="uploadFile" :id="'attach'" :label="'Archivo Adjunto'" :name="'attach'"
            v-model="form['attach']" :type="'file'" :message="errors['attach']" />
          <p class="text-xs">Formatos admitidos {{ format }}</p>
        </div>

        <div class="bg-gray-100 w-full rounded-b-md p-6">
          <div class="flex items-center justify-between w-full space-x-2">
            <FormButtonVue @click="redirectTo(resource)" :label="'Cancelar'" :type="'reset'" />
            <FormButtonVue label="Adjuntar" :type="'submit'" :color="'blue'" />
          </div>
        </div>
      </form>
    </div>
  </div>
</template>