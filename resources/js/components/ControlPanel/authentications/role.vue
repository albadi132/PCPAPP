<template>
  <div>
    <button type="button" @click="showModal = true"
            class="px-2 py-1 text-indigo-700 bg-indigo-200 shadow-md rounded-xl focus:outline-none hover:bg-indigo-300">
      Role</button>

    <Modal v-model="showModal" title="User Role">
      <div class="flex flex-col">
        <div class="flex flex-row">
          This is user role modal
        </div>
        <div class="flex flex-row self-center">
          <div class="flex flex-col my-6">
            <div class="flex items-center justify-center">
              <span class="mr-4 text-sm">Regular</span>
              <div class="relative w-12 h-6 transition duration-200 ease-linear bg-opacity-50 rounded-full shadow-inner ring-1 ring-gray-400 ring-opacity-50"
                  :class="[toggle.after === '1' ? 'bg-green-400 ring-green-400' : 'bg-gray-400']">
                <label for="toggle"
                      class="absolute left-0 w-6 h-6 mb-2 transition duration-100 ease-linear transform bg-white border-2 border-opacity-50 rounded-full cursor-pointer"
                      :class="toggle.after === '1' ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400'"></label>
                <input type="checkbox" id="toggle" name="toggle"
                      class="w-full h-full appearance-none active:outline-none focus:outline-none"
                      @click="toggle.after === '0' ? toggle.after = '1' : toggle.after = '0'"/>
              </div>
              <span class="ml-4 text-sm">Manager</span>
            </div>
          </div>
        </div>
        <div class="flex flex-row self-end">
          <button type="button" @click="showModal = false, toggle.after = toggle.before"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Close</button>
          <button type="button" @click="showModal = false, toggle.before = toggle.after"
                  class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
          Apply</button>
        </div>
      </div>
    </Modal>
  </div>
</template>

<script scoped>
export default {
  data: function () {
    return {
      showModal: false,
      toggle: {
        before: '0',
        after: '0'
      }
    }
  }
}
</script>
