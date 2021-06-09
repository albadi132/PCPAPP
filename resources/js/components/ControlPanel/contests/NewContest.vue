<template>
  <div>
      <div class="flex flex-col px-2 md:flex-row">
            <button type="button" @click="showModal = true" class="py-2 px-4 bg-transparent text-green-600 font-semibold border border-green-600 rounded hover:bg-green-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
              New Contest</button>
      </div>

    <Modal v-model="showModal" title="Creat New Contest" wrapper-class="modal-wrapper" modal-class="modal">
      <div class="flex flex-col">
      <!-- form -->

      <!-- end form -->

        <div class="flex flex-row self-end">
          <button type="button" @click="showModal = false"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Close</button>
          <button type="button" @click="showModal = false"
                  class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
          Creat</button>
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
