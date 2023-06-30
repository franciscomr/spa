<script>
export default {
  name: 'NotFound',
  props: {
    error: {
      type: [String, Number],
      default: 404
    }
  }
}
</script>
<template>
  <div class="w-full h-full bg-gray-200 flex items-center justify-center rounded-lg">
    <div class="inline-flex items-center  font-medium">
      <span class="pr-1">{{ error }}</span><span>| Not Found</span>
    </div>
  </div>
</template>