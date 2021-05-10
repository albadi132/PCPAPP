<template>
  <div>
    <button
      class="bg-green-400 px-4 py-2 text-sm font-semibold tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-green-700 outline-none focus :outline-none active:outline-none"
      @click="creatContest"
    >
      open Modal
    </button>
    {{ toggleModal }}
    <!-- START "-->
    <div
      v-if="toggleModal"
      class="fixed overflow-xhidden overflow-y-auto inset-0 flex justify-center items-center z-50"
    >
      <div class="w-full">
        <div class="h-max bg-indigo"></div>
        <div class="flex items-center justify-center h-screen">
          <div class="container mx-24">
            <div class="px-12 py-6">
              <form @submit="formSubmit" enctype="multipart/form-data">
                @csrf
                <div class="mx-auto container max-w-2xl md:w-3/4 shadow-md">
                  <div class="bg-white space-y-6">
                    <div
                      class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center"
                    >
                      <h2 class="md:w-1/3 max-w-sm mx-auto">Description</h2>
                      <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                        <div>
                          <label class="text-sm text-gray-400"
                            >Contest Name</label
                          >
                          <div class="w-full inline-flex border">
                            <div class="w-1/12 pt-2 bg-gray-100"></div>
                            <input
                              id="name"
                              name="name"
                              v-model="form.name"
                              type="text"
                              class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                            />
                          </div>
                          @error('name')
                          <div class="text-red-500"></div>
                          @enderror
                        </div>
                        <div>
                          <label class="text-sm text-gray-400"
                            >Contest Description</label
                          >
                          <div class="w-full inline-flex border">
                            <div class="pt-2 w-1/12 bg-gray-100"></div>
                            <textarea
                              id="description"
                              name="description"
                              v-model="form.description"
                              class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                              rows="4"
                              cols="50"
                            >
                            </textarea>
                          </div>
                          @error('description')
                          <div class="text-red-500"></div>
                          @enderror
                        </div>
                        <div>
                          <label class="text-sm text-gray-400"
                            >Contest logo</label
                          >
                          <div class="w-full inline-flex">
                            <div class="pt-2 w-1/12 bg-gray-100"></div>
                            <input
                              id="logo"
                              name="logo"
                               v-on:change="onChange"
                              type="file"
                              class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                            />
                          </div>
                          @error('logo')
                          <div class="text-red-500"></div>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <hr />
                    <div
                      class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center"
                    >
                      <h2 class="md:w-1/3 mx-auto max-w-sm">Time</h2>
                      <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                        <div>
                          <label class="text-sm text-gray-400"
                            >Starting Time</label
                          >
                          <div class="w-full inline-flex border">
                            <div class="w-1/12 pt-2 bg-gray-100"></div>
                            <input
                              type="datetime-local"
                              id="startingtime"
                              name="startingtime"
                              v-model="form.startingtime"
                              class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                            />
                          </div>
                          @error('startingtime')
                          <div class="text-red-500"></div>
                          @enderror
                        </div>
                        <div>
                          <label class="text-sm text-gray-400"
                            >Ending Time</label
                          >
                          <div class="w-full inline-flex border">
                            <div class="pt-2 w-1/12 bg-gray-100"></div>
                            <input
                              type="datetime-local"
                              id="endingtime"
                              name="endingtime"
                              v-model="form.endingtime"
                              class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                            />
                          </div>
                          @error('endingtime')
                          <div class="text-red-500"></div>
                          @enderror
                        </div>
                      </div>
                    </div>

                    <hr />
                    <div
                      class="md:inline-flex w-full space-y-4 md:space-y-0 p-8 text-gray-500 items-center"
                    >
                      <h2 class="md:w-4/12 max-w-sm mx-auto">Settings</h2>
                      <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                        <div>
                          <div class="w-full inline-flex">
                            <div
                              class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in"
                            >
                              <input
                                type="checkbox"
                                name="private"
                                id="private"
                                v-model="form.private"
                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"
                              />
                              <label
                                for="toggle"
                                class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"
                              ></label>
                            </div>
                            <label class="text-sm text-gray-400">Private</label>
                          </div>
                        </div>
                        <div>
                          <div class="w-full inline-flex">
                            <div
                              class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in"
                            >
                              <input
                                type="checkbox"
                                name="team"
                                id="team"
                                v-model="form.team"
                                class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"
                              />
                              <label
                                for="toggle"
                                class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"
                              ></label>
                            </div>
                            <label class="text-sm text-gray-400">Team</label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <hr />
                    <div class="w-full p-4 text-right text-gray-500">
                      <button
                        @click="toggleModal = false"
                        class="inline-flex items-center focus:outline-none mr-4"
                      >
                        CANCLE
                      </button>
                      <button
                        type="submit"
                        class="inline-flex items-center focus:outline-none mr-4"
                      >
                        SUBMET
                      </button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END -->
    <!--<div v-if="toggleModal" class="fixed overflow-xhidden overflow-y-auto inset-0 flex justify-center items-center z-50">
      <div class="relative mx-auto  w-auto max-w-2xl"><div class="bg-white w-full"></div>
      <span>Salim ALi SAlim Albadi</span>
          <button
      class="bg-green-400 px-4 py-2 text-sm font-semibold tracking-wider text-white inline-flex items-center space-x-2 rounded hover:bg-green-700 outline-none focus :outline-none active:outline-none"
      c
    >
      open Modal
    </button>


      </div>
    </div>
    
    <div class="max-w-7xl bg-green-400">
  <div class="h-2 bg-indigo"></div>
    <div class="flex items-center justify-center h-screen">
<form  method="POST" action="" enctype="multipart/form-data">
  <div class="mx-auto container max-w-full md:w-max shadow-md">
    <div class="bg-white space-y-6">
      <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
        <h2 class="md:w-max max-w-sm mx-auto">Description</h2>
        <div class="md:w-max mx-auto max-w-sm space-y-5 pl-20">
          <div>
            <label class="text-sm text-gray-400">Contest Name</label>
            <div class="w-full inline-flex border">
              <div class="w-1/12 pt-2 bg-gray-100">
              </div>
              <input
                id="name"
                name="name"
                type="text"
                class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
              />
            </div>
            @error('name')
                <div class="text-red-500"></div>
            @enderror
          </div>
          <div>
            <label class="text-sm text-gray-400">Contest Description</label>
            <div class="w-full inline-flex border">
              <div class="pt-2 w-1/12 bg-gray-100">
              </div>
              <textarea
                id="description"
                name="description"
                class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                rows="4" cols="50"
              > </textarea>
            </div>
            @error('description')
                <div class="text-red-500"></div>
            @enderror
          </div>
          <div>
            <label class="text-sm text-gray-400">Contest logo</label>
            <div class="w-full inline-flex">
              <div class="pt-2 w-1/12 bg-gray-100">
              </div>
              <input
                id="logo"
                name="logo"
                type="file"
                class="w-11/12 focus:outline-none focus:text-gray-600 p-2" 
              />
            </div>
            @error('logo')
            <div class="text-red-500"></div>
        @enderror
          </div>
        </div>
      </div>

      <hr />
      <div class="w-full p-4 text-right text-gray-500">
        <button type="submit" class="inline-flex items-center focus:outline-none mr-4">
          SUBMET
        </button>
      </div>
    </div>
  </div>
</form>
    </div>
</div>

{
        name:'',
        description:'',
        logo:'',
        startingtime:'', 
        endingtime:'',
        private:'',
        team:'',
      }
    -->
    <div
      v-if="toggleModal"
      class="absolute z-40 inset-0 opacity-25 bg-black"
    ></div>
  </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";

export default {
  name: "modle",
  data() {
    return {
      toggleModal: false,
      form: new Form({
        name: "",
        description: "",
        logo: null,
        startingtime: "",
        endingtime: "",
        private: "",
        team: "",
      }),
    };
  },
  methods: {
    creatContest() {
      this.toggleModal = true;
    },
    onChange(e) {
      this.file = e.target.files[0];
    },

    formSubmit(e) {
      this.form.logo = this.file

      this.form.submit('post', '/controlpanel/contests/creat', {
              // Transform form data to FormData
              transformRequest: [function (data, headers) {
                return objectToFormData(data)
              }],

              onUploadProgress: e => {
                console.log("1")
                // Do whatever you want with the progress event
                // console.log(e)
              }
            })
            .then(({ data }) => {
               console.log(data)
              // ...
            })


    },
  },
};
</script>