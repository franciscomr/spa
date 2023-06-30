<script>
import { ref, onMounted } from 'vue';
import store from '../store';
import Icon from '../components/Icon.vue';
import CheckCircleIcon from 'vue-material-design-icons/CheckCircle.vue';
import CloseIcon from 'vue-material-design-icons/Close.vue';
import AlertCircleIcon from 'vue-material-design-icons/AlertCircle.vue';
import AlertIcon from 'vue-material-design-icons/Alert.vue';

export default {
  name: 'Notification',
  props: {
    type: {
      type: String,
      default: 'success'
    },

    time: {
      type: Number,
      default: 4000
    },
  },
  components: {
    CheckCircleIcon, CloseIcon, AlertCircleIcon, AlertIcon, Icon
  },
  setup(props) {


    onMounted(() => {
      fade(props.time)
    });

    const fade = (timevar) => {
      setTimeout(function () {
        closeNotification()

      }, timevar);
    }

    const closeNotification = () => {
      store.dispatch('hideNotification')
    }

    const icon = {
      success: 'checkbox_marked_circle_outline',
      info: 'information',
      warning: 'alert',
      danger: 'alert_octagon',
    }

    const color = {
      success: 'green2',
      info: 'blue2',
      warning: 'yellow2',
      danger: 'red2',
    }

    const style = {
      success: 'bg-green-100 border-green-600',
      info: 'bg-blue-100 border-blue-600',
      warning: 'bg-yellow-100 border-yellow-600',
      danger: 'bg-red-100 border-red-600',
    }

    return {
      closeNotification, icon, color, style
    }
  },

}
</script>
<template>
  <div v-show="$store.state.notification.isActive" class="w-full relative">
    <div class="w-full absolute z-10  p-3  border-l-4 " :class="style[type] || 'bg-green-100 border-green-600'">
      <div class="flex items-center space-x-3">

        <Icon :name="icon[type] || 'checkbox_marked_circle_outline'" :size="'xl'" :color="color[type] || 'green2'" />
        <!-- 

          <div class=" flex p-1 rounded-lg"
            :class="type === 'danger' ? 'bg-red-500' : type === 'warning' ? 'bg-yellow-500' : 'bg-green-500'">
            <check-circle-icon :size=20 fillColor="#fff" v-show="type !== 'danger' && type !== 'warning'" />
            <alert-circle-icon :size=20 fillColor="#fff" v-show="type === 'warning'" />
            <alert-icon :size=20 fillColor="#fff" v-show="type === 'danger'" />
          </div>
        -->

        <div class="flex w-full">
          <span>{{ $store.state.notification.message || 'Se ha creado el recurso: ' }} </span>
          <span class="px-1 font-medium">{{ $store.state.notification.resource.name || 'RESOURCE' }} </span>
          <span class="px-1">{{ 'con ID: ' }} </span>
          <span class="font-medium">{{ $store.state.notification.resource.id || 'ID' }} </span>



        </div>
        <div @click="closeNotification" class=" p-2 rounded-lg cursor-pointer">
          <close-icon :size=20 fillColor="#475569" />
        </div>
      </div>
    </div>
  </div>
</template>