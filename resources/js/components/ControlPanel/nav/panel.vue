<template>
  <div class="flex h-screen" :class="{ 'overflow-hidden': sideMenu }">

    <!-- Desktop sidebar -->
    <aside class="z-20 flex-shrink-0 hidden pl-2 overflow-y-auto bg-bluegray-800 w-60 md:block">
      <CPNavMenu>
        <slot name="logo"/>
      </CPNavMenu>
    </aside>

    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
        v-show="sideMenu" @click="sideMenu = false"></div>

    <aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-bluegray-800 dark:bg-bluegray-800 md:hidden"
          v-show="sideMenu" @keydown.escape="sideMenu = false">
      <CPNavMenu>
        <slot name="logo"/>
      </CPNavMenu>
    </aside>

    <div class="flex flex-col flex-1 w-full overflow-y-auto">
        <header class="z-40 py-4 bg-bluegray-800 ">
            <div class="flex items-center justify-between h-8 px-6 mx-auto">
                <!-- Mobile hamburger -->
                <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
                        @click="sideMenu = !sideMenu" aria-label="Menu">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>
            </div>
        </header>
        <main class="h-full m-1 bg-gray-200 border-4 border-green-400 rounded-3xl lg:m-5">
          <slot name="page"/>
        </main>
    </div>
  </div>
</template>

<script>
import CPNavMenu from './menu.vue';

export default {
  components: {
    CPNavMenu,
  },
  data: function () {
    return {
      sideMenu: false,
    }
  },
}
</script>

<style scoped>

</style>
