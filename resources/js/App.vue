<script>
import { onMounted } from 'vue';
import ArrowLeftCircleIcon from 'vue-material-design-icons/ArrowLeftCircle.vue';
import Background from './components/Background.vue';
import ButtonVue from './components/ButtonVue.vue';
export default {
  name: 'App',
  components: {
    Background, ButtonVue, ArrowLeftCircleIcon
  },
  setup() {

  }
}
</script>
<template>
  <div>
    <Background>
      <template #content>
        <div class="w-full h-screen p-4">
          <div v-if="$route.name === 'index'" class="backdrop-blur-sm bg-white/95 rounded-lg h-full p-5">
            <div class="pb-5 w-full">
              <div class="flex justify-end">
                <router-link :to="{ name: 'home' }">
                  <ButtonVue :label="'Aplicación'" />
                </router-link>
              </div>
            </div>
          </div>
          <router-view />
        </div>
      </template>
    </Background>
  </div>
</template>