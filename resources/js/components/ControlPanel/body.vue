<template>
  <div class="flex flex-col w-full">
    <div class="flex flex-col flex-shrink-0 text-white shadow-lg bg-bluegray-400"
        style="border-top-right-radius: 1.2rem; border-top-left-radius: 1.2rem;">
        <div class="relative flex items-center h-10 p-4 md:h-12">
            <span class="text-lg italic tracking-wide uppercase md:text-2xl">
              {{ this.pageTitle }}
            </span>
        </div>
    </div>
    <div class="flex flex-row self-center w-11/12 px-6 py-4 mt-6 bg-white rounded-lg shadow-lg">
      <slot/>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    pageTitle: {String, default: '__Page Title__'},
  },
}
</script>

<style scoped>

</style>
