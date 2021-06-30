<template>
                

                        <div>
       
<div class="flex flex-col px-2 md:flex-row">
<button  @click="newtestcase = true" type="button"  class="py-2 px-4 bg-transparent text-green-600 font-semibold border border-green-600 rounded hover:bg-green-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
New Test Case</button>
</div>
                            

<Modal v-model="newtestcase" title="Creat Test Case" wrapper-class="modal-wrapper" modal-class="modal">
      <div class="flex flex-col">
      <!-- form -->
           <form
            method="POST"
            enctype="multipart/form-data"
            @submit.prevent="creatteam"
            @keydown="testcaseform.onKeydown($event)"
          >
		<div class="mb-3 space-y-2 w-full text-xs">
	

                  	<div class="flex-auto w-full mb-1 text-xs space-y-2">
									<label class="font-semibold text-gray-600 py-2">System Inputs</label>
									<textarea v-model="testcaseform.input" required="" name="description" id="description" class=" min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Inputs.." ></textarea>
								 <div
                class="text-xs text-red-500 text-left my-3"
                v-if="testcaseform.errors.has('input')"
                v-html="testcaseform.errors.get('input')"
              />
								</div>

    	<div class="flex-auto w-full mb-1 text-xs space-y-2">
									<label class="font-semibold text-gray-600 py-2">Expected Outputs</label>
									<textarea v-model="testcaseform.output" required="" name="description" id="description" class=" min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Outputs.." ></textarea>
								 <div
                class="text-xs text-red-500 text-left my-3"
                v-if="testcaseform.errors.has('output')"
                v-html="testcaseform.errors.get('output')"
              />
								</div>

                	<div class="flex-auto w-full mb-1 text-xs space-y-2">
									<label class="font-semibold text-gray-600 py-2">Executed Time Limt</label>
									<input type="text" id="score" v-model="testcaseform.executtime"
                  name="score" class=" h-8 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Time in seconds">
								 <div
                class="text-xs text-red-500 text-left my-3"
                v-if="testcaseform.errors.has('executtime')"
                v-html="testcaseform.errors.get('executtime')"
              />
								</div>
          


                  
           
    </div>
</form>
      <!-- end form -->

        <div class="flex flex-row self-end">
          <button type="button" @click="closemodal"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Close</button>
          <button type="button" @click="creattestcase"
            :disabled="testcaseform.busy"
                  class="disabled:opacity-50 px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
          Creat</button>
        </div>
      </div>
    </Modal>
                        </div>
              

</template>

<script>
import { Form, HasError, AlertError } from "vform";
    export default {
        props: ["problem"],
  data() {
    return {
      newtestcase: false,
      change: false,
     
      testcaseform: new Form({
        problemid: '',
        input: '',
        output: '',
        executtime:0,
      }),
    };
  },
   methods: {

            async creattestcase() {
              this.testcaseform.problemid = this.problem;
      const response = await this.testcaseform
        .post("/controlpanel/problems/testcase/creat" )
        .then(({ data }) => {

            if (data.status == 200) {
            this.showModal = false;
            toast.fire({
              icon: "success",
              title: data.description,
              showConfirmButton: false,
              timer: 3000,
            });
            this.change = true
            
          } else {
            toast.fire({
              icon: "error",
              title: "Oops...",
              text: data.description,
            });
          }
          
        })
.catch(error => {
    console.log(error)
});

      // ...
    },

    closemodal (){

      if(this.change)
      {
        location.reload();
      }
      else
      {
        this.newtestcase = false
      }



    }
    
  },
   
   watch: {
   
  },
  computed: {

    
  },
        mounted() {

        },
        
    }
</script>