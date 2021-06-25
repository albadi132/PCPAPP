<template>
  <div>
    <button
      @click="showmodal"
      class="md:flex hidden items-center text-gray-500 space-x-2 border border-gray-400 px-4 py-1.5 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-400"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="fill-current w-4 h-4"
        viewBox="0 0 24 24"
      >
        <path
          d="M6.188 8.719c.439-.439.926-.801 1.444-1.087 2.887-1.591 6.589-.745 8.445 2.069l-2.246 2.245c-.644-1.469-2.243-2.305-3.834-1.949-.599.134-1.168.433-1.633.898l-4.304 4.306c-1.307 1.307-1.307 3.433 0 4.74 1.307 1.307 3.433 1.307 4.74 0l1.327-1.327c1.207.479 2.501.67 3.779.575l-2.929 2.929c-2.511 2.511-6.582 2.511-9.093 0s-2.511-6.582 0-9.093l4.304-4.306zm6.836-6.836l-2.929 2.929c1.277-.096 2.572.096 3.779.574l1.326-1.326c1.307-1.307 3.433-1.307 4.74 0 1.307 1.307 1.307 3.433 0 4.74l-4.305 4.305c-1.311 1.311-3.44 1.3-4.74 0-.303-.303-.564-.68-.727-1.051l-2.246 2.245c.236.358.481.667.796.982.812.812 1.846 1.417 3.036 1.704 1.542.371 3.194.166 4.613-.617.518-.286 1.005-.648 1.444-1.087l4.304-4.305c2.512-2.511 2.512-6.582.001-9.093-2.511-2.51-6.581-2.51-9.092 0z"
        />
      </svg>
      <span class="uppercase text-sm font-semibold">Add Language</span>
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
            Sysutem Language
          </p>
        </div>
        
        <div class="flex flex-col px-6 py-5 bg-gray-50">
          
       
          <!-- Form Start -->

          <form
            method="POST"
            @submit.prevent="judge"
            @keydown="form.onKeydown($event)"
          >
            
<div>
          <h3 class="text-1xl text-gray-500 ">Select Language:</h3>
    <div class="relative inline-block w-full text-gray-700">
      <select class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Select Language" name="language"
     v-model="form.language" @change="onChange(form.language)" >
        
        <option v-for="language   in syslanguages"
          v-bind:key="language.id" v-bind:value="language.id" >{{language.name}}</option>
      
      </select>
      <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
      </div>
       <div
                class="text-red-500"
                v-if="form.errors.has('language')"
                v-html="form.errors.get('language')"
              />
         <div id="existing" class="text-red-500" />   
    </div>
    </div>

    



 
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
            @click="addlanguage"
            :disabled="form.busy"
            class="px-4 py-2 text-white font-semibold bg-green-500 rounded"
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
  props: ["language" , "languages" ,"contest", "urlname"],
  name: "AddRemove",
  data() {
    return {
      syslanguages: JSON.parse(this.language),
      comlanguages: JSON.parse(this.languages),
      toggleModal: false,
      url: this.urlname,
      form: new Form({
        language: "",
        contestid: this.contest,
      }),
    };
  },
  methods: {
    showmodal() {
      this.toggleModal = true;
      console.log(this.syslanguages)
    },
    onChange(language)
    {

      for( let i = 0 ; i < this.comlanguages.length ; i++)
            {
              if(language == this.comlanguages[i].id)
              {

                for(let j = 0 ; j < this.syslanguages.length ; j++)
                {
                  if(this.syslanguages[j].id == this.comlanguages[i].id)
                  {
                     document.getElementById('existing').innerHTML =  'This language has already been in the competition'
                  }

                }
  
              }

            }
            
    },
    async addlanguage() {
      const response = await this.form
        .post("/competition/" + this.url + "/mange/languages/add")
        .then(({ data }) => {
          if (data.status == 200) {
            this.toggleModal = false;
            toast.fire({
              icon: "success",
              title: data.description,
              showConfirmButton: false,
              timer: 3000,
            });
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