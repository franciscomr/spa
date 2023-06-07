<script>
import Logo from '../components/Logo.vue';
import FormInput from '../components/FormInput.vue';
import DataForm from '../templates/DataForm.vue';
export default {
  name: 'Login',
  components: {
    Logo, FormInput, DataForm
  }
}
</script>
<template>
  <div class="h-full backdrop-blur-sm bg-white/95 rounded-lg flex items-center justify-center">
    <div class="w-full">
      <DataForm :fields="[
        {
          label: 'Usuario',
          name: 'username',
          type: 'input',
          propieties: {
            type: 'text',
            required: true
          }
        },
        {
          label: 'Password',
          name: 'password',
          type: 'input',
          propieties: {
            type: 'password',
            required: true
          }
        },
      ]" :full_display="true">
        <template #header>
          <Logo :size="'lg'" class="py-2" />
        </template>
      </DataForm>
    </div>


    <!--   

        <div class="bg-white rounded-t-md p-6">
          <Logo :size="'lg'" class="py-2" />
          <FormInput />
          <FormInput />
        </div>
        <div class="bg-gray-100 w-full rounded-b-md p-6 ">
          <button
            class="w-full bg-white py-1 px-10 rounded-md border border-b-2 border-gray-200 hover:bg-gray-100 ">Iniciar
            Sesión</button>
        </div>
        -->




  </div>
</template>