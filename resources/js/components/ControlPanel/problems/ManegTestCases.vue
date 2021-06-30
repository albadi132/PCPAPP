<template>
                

                        <div>
       
 <div class=" inline-flex items-center leading-none text-sm">
    
    
    <div class="w-4 mr-2 transform hover:text-green-400 hover:scale-110">
                       <svg @click="edittestcase" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                       </svg>
                   </div>
    <div class="w-4 mr-2 transform hover:text-red-400 hover:scale-110">
                    <svg  @click="delatetestcase" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
    </svg>
                   </div>
                  </div>
                            

<Modal v-model="testcase" title="Edit Test Case" wrapper-class="modal-wrapper" modal-class="modal">
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
          <button type="button" @click="saveedit"
            :disabled="testcaseform.busy"
                  class="disabled:opacity-50 px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
          Eidt</button>
        </div>
      </div>
    </Modal>
                        </div>
              

</template>

<script>
import { Form, HasError, AlertError } from "vform";
    export default {
        props: ["problemid" ,"testcaseid", "num", "input", "output" ,"timelimit"],
  data() {
    return {
      testcase: false,
      change: false,
     
      testcaseform: new Form({
        problemid: '',
        testcaseid: '',
        input: '',
        output: '',
        executtime:0,
      }),
        testcasedelate: new Form({
        testcaseid: '',
      }),
    };
  },
   methods: {

     delatetestcase(){
 this.testcasedelate.testcaseid = this.testcaseid

              toast
        .fire({
          title: 'Do you want to delete test case ' + this.num,
          type: "warning",
          showCancelButton: true,
          confirmButtonText: 'Delate',
          confirmButtonColor: '#EC7063',
        })
        .then((result) => {
          if (result.isConfirmed) {
         
            const response = this.testcasedelate
            .post("/controlpanel/problems/testcase/delate")
        .then(({ data }) => {
          if (data.status == 200) {
         location.reload();
          } else {
            toast.fire({
              icon: "error",
              title: "Oops...",
              text: data.description,
            });
          }
        });
            

          }
        });




     },

            async saveedit() {
              
      const response = await this.testcaseform
        .post("/controlpanel/problems/testcase/edit" )
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
        this.testcase = false
      }



    }, 
    edittestcase(){

      this.testcaseform.problemid = this.problemid
this.testcaseform.testcaseid = this.testcaseid
      this.testcaseform.input = JSON.parse(this.input)
      this.testcaseform.output = JSON.parse(this.output)
      this.testcaseform.executtime = JSON.parse(this.timelimit) / 60

      this.testcase = true


    },
    
  },
   
   watch: {
   
  },
  computed: {

    
  },
        mounted() {

        },
        
    }
</script>