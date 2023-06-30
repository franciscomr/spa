<script>
export default {
  name: 'LogoVue',
  props: {
    src: {
      type: String,
      default: 'http://127.0.0.1:8000/images/logo.png',
    },
    size: {
      type: String,
      default: 'md'
    }
  },
  data() {
    const logoSize = {
      'xs': 'h-8',
      'sm': 'h-12',
      'md': 'h-16',
      'lg': 'h-20',
      'xl': 'h-24',
      '2xl': 'h-28',
      '3xl': 'h-32',
      '4xl': 'h-36',
    }
    return { logoSize }
  }
}
</script>

<template>
  <div>
    <img :src="src" class="mx-auto" aria-label="Logo SAGAJI" :class="logoSize[size] || 'h-16'" />
  </div>
</template>