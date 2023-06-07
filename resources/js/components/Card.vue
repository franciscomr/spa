<script>
export default {
  name: 'Card',
}
</script>
<template>
  <div class="bg-white md:max-w-lg  rounded-lg p-8  w-full shadow-md">
    <slot name="content">

    </slot>
  </div>
</template>