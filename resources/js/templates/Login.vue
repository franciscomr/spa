<script>
import DataForm from '../templates/DataForm.vue'
import LogoVue from '../components/Logo.vue';
import FormInputVue from '../components/FormInput.vue';
export default {
  name: 'Login',
  components: {
    LogoVue, FormInputVue, DataForm
  }
}
</script>
<template>
  <div class="h-full backdrop-blur-sm bg-white/95 rounded-lg flex items-center justify-center">
    <div class="w-full">
      <DataForm :attributes="[
        {
          id: 'username',
          label: 'Usuario',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          id: 'password',
          label: 'Password',
          type: 'input',
          propieties: {
            type: 'password',
            required: true
          }
        },
      ]" :full_display="true">
        <template #header>
          <LogoVue :size="'lg'" class="py-2" />
        </template>
      </DataForm>
    </div>
  </div>
</template>