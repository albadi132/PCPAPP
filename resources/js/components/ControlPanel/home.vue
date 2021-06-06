<template>
  <CPPage pageTitle="home">
    <template>
      <div id="app" class="flex flex-col flex-wrap items-center w-full md:justify-evenly md:flex-row">
        <VMRole class="m-2"/>
        <VMRestPass class="m-2"/>
        <VMStatus class="m-2"/>
      </div>
    </template>
  </CPPage>
</template>

<script>
import CPPage from './body.vue';
import VMRole from './auth/role.vue';
import VMRestPass from './auth/restpass.vue';
import VMStatus from './auth/status.vue';

export default {
  components: {
    CPPage,
    VMRole,
    VMRestPass,
    VMStatus,
  },
}
</script>

<style scoped>

</style>
