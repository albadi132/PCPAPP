<template>
  <div>
   
    <button
      @click="showmodal"
      class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4"
    >
      Edit Profile
    </button>

    <!-- Start Modal -->

    <div
      v-if="toggleModal"
      class="fixed overflow-xhidden overflow-y-auto inset-0 flex justify-center items-center z-50"
    >
      <div
        class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl"
      >
        <div
          class="flex flex-row justify-between p-6 bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg"
        >
          <p class="text-2xl justify-center font-semibold text-gray-800">
            Edit Profile
          </p>
        </div>
        <div class="flex flex-col px-6 py-5 bg-gray-50">
          <!-- Form Start -->
          <form
            method="POST"
            enctype="multipart/form-data"
            @submit.prevent="creatteam"
            @keydown="form.onKeydown($event)"
          >
            
            <p class="mb-2 font-semibold text-gray-700">About Me</p>
<div class="flex">
        
          <textarea
          v-model="form.about"
            type="text"
            name="about"
            :placeholder="[[this.profileinfo.about]]"
            class="p-5 mb-5 w-full bg-white border border-gray-200 rounded shadow-sm h-36"
            id="about"
          ></textarea>
</div>
 <div
                class="text-red-500"
                v-if="form.errors.has('about')"
                v-html="form.errors.get('about')"
              />
 
   <label class="text-gray-700 font-semibold text-lg"
              >Education</label
            >
            <div class="input wrapper flex items-center">
              <input
                type="text"
                v-model="form.workplace"
                id="workplace" 
                 name="workplace"
                autocomplete="off"
                class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md"
                :placeholder="[[this.profileinfo.workplace]]"
              />
            </div>
              <div
                class="text-red-500"
                v-if="form.errors.has('workplace')"
                v-html="form.errors.get('workplace')"
              />
          <div class="flex flex-col sm:flex-row items-center mb-5 sm:space-x-5">
            <div class="w-full sm:w-1/2">
              <p class="mb-2 font-semibold text-gray-700">Job Title</p>
              <input
              v-model="form.job"
               type="text"
                id="job" 
                name="job"
                autocomplete="off"
                class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md"
               :placeholder="[[this.profileinfo.job]]"
              >
            </div>
            <div
                class="text-red-500"
                v-if="form.errors.has('job')"
                v-html="form.errors.get('job')"
              />
            <div class="w-full sm:w-1/2 mt-2 sm:mt-0">
              <p class="mb-2 font-semibold text-gray-700">Gender</p>
                  <select class="h-12 w-full border-2 border-gray-300 mb-5 rounded-md"  name="gender" id="gender"  v-model="form.gender">
        
        <option
          value="Male">Male</option>
          <option
         value="Female" >Female</option>
      
      </select>
           
            </div>
             <div
                class="text-red-500"
                v-if="form.errors.has('gender')" 
                v-html="form.errors.get('gender')"
              />
          </div>
          <hr />

          <label class="mb-2 font-semibold text-gray-700">Avatar</label>
          <div class="flex items-center mt-5 mb-3 space-x-4">
              <div class="w-full h-12
               border-2 border-gray-300 mb-5 rounded-md inline-flex">
                
                <input
                @change="handleFile"
                  id="avatar"
                  name="avatar" 
                  type="file"
                  class="w-11/12 focus:outline-none focus:text-gray-600 p-2" 
                />
              </div>
             
          </div>
          <div
                class="text-red-500"
                v-if="form.errors.has('avatar')"
                v-html="form.errors.get('avatar')"
              />
  
            <!-- Form End -->
          </form>
        </div>
        <div
          class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
        >
          <button @click="toggleModal = false">
            <p class="font-semibold text-gray-600">Cancel</p>
          </button>
          <button
            @click="profile"
            :disabled="form.busy"
            class="px-4 py-2 text-white font-semibold bg-blue-500 rounded"
          >
            Save
          </button>
        </div>
      </div>
    </div>
    <!-- End Modal -->

    <!-- change screen to black -->
    <div
      v-if="toggleModal"
      class="pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center opacity-25 bg-black"
    ></div>

    <!-- end screen to black -->
  </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

export default {
  props: ['user'],
  name: "AddRemove",
  data() {
    return {
      profileinfo: JSON.parse(this.user),
      toggleModal: false,
      resp: false,
      form: new Form({
        about: '',
        workplace: '',
        job:'',
        gender: JSON.parse(this.user).gender,
        avatar: null,
      }),
    };
  },
  methods: {
    showmodal() {
      this.toggleModal = true;
    },
   handleFile (e) {
     let file = e.target.files[0];
                let reader = new FileReader();
                let limit = 1024 * 1024 * 2;
                if(file['size'] > limit){
                   toast.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'You are uploading a large file',
                    })
                    return false;
                }
                reader.onloadend = (file) => {
                    this.form.avatar = reader.result;
                }
                reader.readAsDataURL(file);
            },
        
    

    async profile() {
      console.log(this.form);
      const response = await this.form
        .post("/profile/" + this.profileinfo.username )
        .then(({ data }) => {
          if (data.status == 200) {
            this.toggleModal = false;
            toast.fire({
              icon: "success",
              title: data.description,
              showConfirmButton: false,
              timer: 3000,
            });
            location.reload();
          } else {
            toast.fire({
              icon: "error",
              title: "Oops...",
              text: data.description,
            });
          }
        });

      // ...
    },
  },
  mounted() {
  },
};
</script>