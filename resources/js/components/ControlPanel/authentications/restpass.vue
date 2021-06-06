<template>
  <div>
    <button type="button" @click="showModal = true"
      class="px-2 py-1 text-indigo-700 bg-indigo-200 shadow-md rounded-xl focus:outline-none hover:bg-indigo-300">
      Reset Password</button>

    <Modal v-model="showModal" title="Reset User Password" wrapper-class="modal-wrapper" modal-class="modal">
      <div class="flex flex-col">
        <div class="flex flex-row">
          This is user reset password modal
        </div>
        <div class="flex flex-row justify-center w-full my-6">
          <div class="flex flex-col items-center w-full space-y-4">
            <input type="password" autocomplete="new-password" placeholder="new password"
              class="block w-3/5 px-4 py-2 leading-5 text-gray-700 placeholder-gray-500 border-2 rounded-md appearance-none bg-bluegray-100 border-bluegray-400 border- focus:outline-none focus:ring-2 focus:ring-bluegray-300 focus:placeholder-opacity-30 focus:shadow-inner"/>
            <input type="password" autocomplete="new-password" placeholder="confirm password"
              class="block w-3/5 px-4 py-2 leading-5 text-gray-700 placeholder-gray-500 border-2 rounded-md appearance-none bg-bluegray-100 border-bluegray-400 border- focus:outline-none focus:ring-2 focus:ring-bluegray-300 focus:placeholder-opacity-30 focus:shadow-inner"/>
          </div>
        </div>
        <div class="flex flex-row self-end">
          <button type="button" @click="showModal = false"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Close</button>
          <button type="button" @click="showModal = false"
                  class="px-2 py-1 text-blue-800 bg-blue-200 rounded-lg ring-opacity-50 ring-blue-400 ring-2 focus:outline-none hover:bg-blue-300">
          Apply</button>
        </div>
      </div>
    </Modal>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      showModal: false
    }
  }
}
</script>
