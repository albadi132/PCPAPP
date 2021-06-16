<template>
  <div>
      <div class="flex flex-col px-2 md:flex-row">
            <button type="button" @click="showModal = true" class="py-2 px-4 bg-transparent text-green-600 font-semibold border border-green-600 rounded hover:bg-green-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
              New Problem</button>
      </div>

    <Modal v-model="showModal" title="Creat New Problem" wrapper-class="modal-wrapper" modal-class="modal">
      <div class="flex flex-col">
      <!-- form -->
       <form
            method="POST"
            enctype="multipart/form-data"
            @submit.prevent="creatteam"
            @keydown="form.onKeydown($event)"
          >
		<div class="mb-3 space-y-2 w-full text-xs">
							<label class=" font-semibold text-gray-600 py-2">Problem Name</label>
							<div class="flex flex-wrap items-stretch w-full mb-4 relative">
								<div class="flex">
									<span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark w-12 h-10 bg-blue-300 justify-center  text-xl rounded-lg text-white">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
</svg>
                                   </span>
								</div>
								<input type="text" id="name" v-model="form.name"
                  name="name" class="flex-shrink flex-grow flex-auto leading-normal w-px  border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow" placeholder="Problem Name">
                <div
                class="text-xs text-red-500 text-left my-3"
                v-if="form.errors.has('name')"
                v-html="form.errors.get('name')"
              />
                  </div>

                  	<div class="flex-auto w-full mb-1 text-xs space-y-2">
									<label class="font-semibold text-gray-600 py-2">Description</label>
									<textarea v-model="form.description" required="" name="description" id="description" class=" min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Problem Desc.." ></textarea>
								 <div
                class="text-xs text-red-500 text-left my-3"
                v-if="form.errors.has('description')"
                v-html="form.errors.get('description')"
              />
								</div>

<div class="md:space-y-2 mb-3">
						<label class="text-xs font-semibold text-gray-600 py-2">Problem question (pdf)<abbr class="hidden" title="required">*</abbr></label>
						<div class="flex items-center py-6">
									<label class="cursor-pointer ">
                  <h2 id="filepdf"/>
                  <span
							class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm items-left text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border" 
						>Browse</span>
                  <input type="file" @change="updateQuestion" name="question" id="question" class="hidden">
                </label>
							<label class="text-xs font-semibold text-gray-600 py-2"/>
                </div>
			
							</div>
               <div
                class="text-xs text-red-500 text-left my-3"
                v-if="form.errors.has('question')"
                v-html="form.errors.get('question')"
              />
						</div>


							<label class=" font-semibold text-gray-600 py-2">Score</label>
							<div class="flex flex-wrap items-stretch w-full mb-4 relative">
								
								<input type="text" id="score" v-model="form.score"
                  name="score" class="flex-shrink flex-grow flex-auto leading-normal w-px  border  h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue  focus:shadow" placeholder="Problem score">
                <div
                class="text-xs text-red-500 text-left my-3"
                v-if="form.errors.has('score')"
                v-html="form.errors.get('score')"
              />
                  </div>

                  
           

</form>
      <!-- end form -->

        <div class="flex flex-row self-end">
          <button type="button" @click="showModal = false"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Close</button>
          <button type="button" @click="creatcontest"
            :disabled="form.busy"
                  class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
          Creat</button>
        </div>
      </div>
    </Modal>

  </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
export default {
  data()  {
    return {
      showModal: false,
      CustomizeModal: false,
      image: '',
      form: new Form({
        name: "",
        description: "",
        question: '',
        score: '',
      }),
      	
    }
  },
  methods:{
      updateQuestion(e){
                let file = e.target.files[0];
                let reader = new FileReader();
                let limit = 4194304; 
                var sFileName = file['name'];
        var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
        console.log(sFileExtension)
        
                if(!(sFileExtension === "pdf") || (file['size'] > limit)){
                   toast.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Please make sure your file is in pdf and less than 4 MB',
                    })
                    return false;
                }
                reader.onloadend = (file) => {
                    this.form.question = reader.result;
                    document.getElementById('filepdf').innerHTML = sFileName
                    
                }
                reader.readAsDataURL(file); 
            },

            async creatcontest() {
      const response = await this.form
        .post("/controlpanel/problems/creat" )
        .then(({ data }) => {

            if (data.status == 200) {
            this.showModal = false;
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
          
        })
.catch(error => {
    console.log(error)
});

      // ...
    },
        
  }
}
</script>

