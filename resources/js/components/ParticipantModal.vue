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
          d="M19.769 9.923l-12.642 12.639-7.127 1.438 1.438-7.128 12.641-12.64 5.69 5.691zm1.414-1.414l2.817-2.82-5.691-5.689-2.816 2.817 5.69 5.692z"
        />
      </svg>
      <span class="uppercase text-sm font-semibold">Participant registration</span>
    </button>
  

<!-- Start Modal -->

   <div
      v-if="toggleModal"
      class="fixed overflow-xhidden overflow-y-auto inset-0 flex justify-center items-center z-50"
    >
     
        
      <div class="flex flex-col w-11/12 sm:w-5/6 lg:w-1/2 max-w-2xl mx-auto rounded-lg border border-gray-300 shadow-xl ">
        <div
          class="flex flex-row justify-between p-6  bg-white border-b border-gray-200 rounded-tl-lg rounded-tr-lg "
        >
          <p class="text-2xl	 justify-center font-semibold text-gray-800">Participant registration</p>
          
        </div>
        <div class="flex flex-col px-6 py-5 bg-gray-50">
          <!-- Form Start -->
          <form method="POST" @submit.prevent="participants" @keydown="form.onKeydown($event)">   
            <AlertError :form="form" /> 
      
        <label class="text-gray-600 font-semibold text-lg">Participant Email</label>
       <div
          v-for="(input, index) in form.participant"
          :key="`EmailInput-${index}`"
          class="input wrapper flex items-center"
        >
           <input  v-model="input.email" type="email" id="names" autocomplete="off" class="h-3 p-6 w-full border-2 border-gray-300 mb-5 rounded-md" placeholder="Email">
          
      
          <svg v-show="form.participant.length > 1"
            @click="removeField(index, form.participant)" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
          <div class="text-red-500" v-if="form.errors.has('participant.'+index+'.email')" v-html="form.errors.get('participant.'+index+'.email')" />
        </div>

          <a @click="addField(input, form.participant)" class="border-2 text-sm border-green-500 rounded-full font-bold text-green-500 px-2 py-2 transition duration-300 ease-in-out hover:bg-green-500 hover:text-white mr-6">  
Add more 
</a>
      
      <!-- Form End -->
      
      
        </form>
        <div  v-if="resp">
          salim
        </div>
    
        </div>
        <div
          class="flex flex-row items-center justify-between p-5 bg-white border-t border-gray-200 rounded-bl-lg rounded-br-lg"
        >
          <button @click="toggleModal = false"><p class="font-semibold text-gray-600">Cancel</p></button>
          <button @click="participants" :disabled="form.busy" class="disabled:opacity-50 px-4 py-2 text-white font-semibold bg-green-500 rounded">
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
 import { Form, HasError, AlertError } from 'vform';
 Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)



export default {
      props: ["contest","urlname"],
      name: "AddRemove",
  data() {
    return {
      
      toggleModal: false,
      resp : false,
      url : this.urlname,
       form: new Form({
      participant: [{ email: "" }],
      contestid: this.contest
    })
     
    };
  },
    methods: {
      
    showmodal() {
      this.toggleModal = true;
    },
    test() {
      console.log(this.form);
    },
      addField(value, fieldType) {
      fieldType.push({ value: "" });
    },
    removeField(index, fieldType) {
      fieldType.splice(index, 1);
    },
        async participants () {
           
      const response = await this.form.post('/competition/'+ this.url +'/registration').then(({ data }) => { 
        if(data.status == 200)
        {this.toggleModal = false;
        toast.fire({
  icon: 'success',
  title: data.description,
  showConfirmButton: false,
  timer: 3000
})
        
        }
        else
        {toast.fire({
  icon: 'error',
  title: 'Oops...',
  text: data.description,
})}
       })
      
      
      
      // ...
    }
    
  },
  mounted() {
    console.log(this.urlname);
  },
};
</script>