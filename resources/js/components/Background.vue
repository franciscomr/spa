<script>
export default {
  name: 'Background',
}
</script>

<template>
  <div class="max-h-screen bg-cover bg-[url('/public/images/wallpaper.jpg')]">
    <slot name="content" />
  </div>
</template>