<template>
<div>
<div class="justify-end px-2 mt-2">

     <div class="flex justify-between w-full pt-6 ">
         
         <!--New lan -->
 <div class="flex flex-col px-2 md:flex-row">
            <button type="button" @click="newLanguageModalShow" class="py-2 px-4 bg-transparent text-green-600 font-semibold border border-green-600 rounded hover:bg-green-600 hover:text-white hover:border-transparent transition ease-in duration-200 transform hover:-translate-y-1 active:translate-y-0">
              New Language</button>
      </div>

      <svg width="14" height="4" viewBox="0 0 14 4" fill="none" xmlns="http://www.w3.org/2000/svg">
      <g opacity="0.4">
      <circle cx="2.19796" cy="1.80139" r="1.38611" fill="#222222"/>
      <circle cx="11.9013" cy="1.80115" r="1.38611" fill="#222222"/>
      <circle cx="7.04991" cy="1.80115" r="1.38611" fill="#222222"/>
      </g>
      </svg>
    </div>

        <div class="w-full sm:w-64 inline-block relative pt-4 ">
          <input type="search" v-model="filter" name="" class="leading-snug border border-gray-300 block w-full appearance-none bg-gray-100 text-sm text-gray-600 py-1 px-4 pl-8 rounded-lg" placeholder="Search" />

          <div class="pointer-events-none absolute pl-3 inset-y-0 left-0 flex items-center px-2 pt-4  text-gray-300">

            <svg class="fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
              <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
            </svg>
          </div>
        </div>
      </div>
    <div class="overflow-x-auto mt-6">

      <table class="table-auto border-collapse w-full">
        <thead>
          <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8" @click="sort('name')">language</th>
            <th class="px-4 py-2 " style="background-color:#f8f8f8" @click="sort('status')">Status</th>
            <th class="px-4 py-2 justify-end text-right " style="background-color:#f8f8f8">Action</th>
          </tr>
        </thead>
        <tbody class="text-sm font-normal text-gray-700" v-for="language  in sortedLanguages"
          v-bind:key="language.id">
          <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
            <td class="px-4 py-4">
                 <div class="flex items-center">
                                      <div class="flex-shrink-0 h-10 w-10">
                                          <img v-if="language.logo.length < '50'" class="h-10 w-10 rounded-full"
                                          v-bind:src="'/Programminglanguages/' + language.dir + '/'+ language.logo"    
                                              alt="" />
                                               <img v-else class="h-10 w-10 rounded-full"
                                          v-bind:src="language.logo"    
                                              alt="" />
                                      </div>

                                      <div class="ml-4">
                                          <div class="text-sm leading-5 font-medium text-gray-900">{{language.name}}
                                          </div>
                                      </div>
                                  </div>
            </td>
          

              <td class="px-4 py-4">
                <span v-if='language.status === 0' class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-50">Not Active</span>
              <span v-else class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-800 text-gray-50">Active</span>
            </td>
         
                    <td class="py-3 px-6 ">
                                    <div class="flex  justify-end text-right">
                           
                                        <div class="w-4 mr-2 transform hover:text-green-400 hover:scale-110">
                                            <svg @click="editLanguageModalShow(language)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                 

                                                     <div v-if='language.status === 0' class="w-4 mr-2 transform hover:text-green-400 hover:scale-110">
                                                                                                           <svg @click="showLanguage(language , 1)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
</svg>
                                        </div>
<div v-else class="w-4 mr-2 transform hover:text-red-400 hover:scale-110">
              
<svg @click="showLanguage(language , 0)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                    </div>
                                </td>
            

            
          </tr>
       
        </tbody>
      </table>
    </div>
  	 <div id="pagination" class="w-full flex justify-center border-t border-gray-100 pt-4 items-center ">
        
 <svg @click="firstPage"  :class="this.currentPage != 1 ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
</svg>
   <svg :class="this.currentPage != 1 ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="prevPage" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
</svg>
            

        <p  v-if="(this.currentPage-2) > 0" class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600" @click="OpenPage(currentPage-2)"> {{this.currentPage-2}}</p>
        <p  v-if="(this.currentPage-1) > 0" class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600" @click="OpenPage(currentPage-1)"> {{this.currentPage-1}}</p>
<p  class="leading-relaxed cursor-pointer mx-2 text-sm text-blue-600"> {{this.currentPage}} </p>
        <p  v-if="(this.currentPage+1) <= (Math.ceil(this.sortedLanguages.length/ this.pageSize))" class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600" @click="OpenPage(currentPage+1)"> {{this.currentPage+1}}</p>
        <p  v-if="(this.currentPage+2) <= (Math.ceil(this.sortedLanguages.length/ this.pageSize))" class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600" @click="OpenPage(currentPage+2)"> {{this.currentPage+2}}</p>

<svg  :class="this.currentPage < (Math.ceil(this.sortedLanguages.length/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="nextPage"  xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
</svg>
                  <svg :class="this.currentPage < (Math.ceil(this.sortedLanguages.length/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="lastPage" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
</svg>

        

      </div>


<Modal v-model="newLanguageModal" title="New Language" wrapper-class="modal-wrapper" modal-class="modal">
      <div class="flex flex-col">
      <!-- form -->
       <form
            method="POST"
            enctype="multipart/form-data"
            @submit.prevent="newLanguageForm"
            @keydown="newLanguageForm.onKeydown($event)"
          >
		<div class="mb-3 space-y-2 w-full text-xs">
							<label class=" font-semibold text-gray-600 py-2">Language Name</label>
							<div class="flex flex-wrap items-stretch w-full mb-4 relative">
								<div class="flex">
									<span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark w-12 h-10 bg-blue-300 justify-center  text-xl rounded-lg text-white">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
</svg>
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />

                                   </span>
								</div>
								<input type="text" id="name" v-model="newLanguageForm.name"
                  name="name" class="flex-shrink flex-grow flex-auto leading-normal w-px  border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow" placeholder="Name">
                <div
                class="text-xs text-red-500 text-left my-3"
                v-if="newLanguageForm.errors.has('name')"
                v-html="newLanguageForm.errors.get('name')"
              />
                  </div>

		<label class=" font-semibold text-gray-600 py-2">Language Directory ( Without special character )</label>
							<div class="flex flex-wrap items-stretch w-full mb-4 relative">
								<div class="flex">
								</div>
								<input type="text" id="dir" v-model="newLanguageForm.dir"
                  name="dir" class="flex-shrink flex-grow flex-auto leading-normal w-px  border h-10 border-grey-light rounded-lg  px-3 relative focus:border-blue focus:shadow" placeholder="Directory">
                <div
                class="text-xs text-red-500 text-left my-3"
                v-if="newLanguageForm.errors.has('dir')"
                v-html="newLanguageForm.errors.get('dir')"
              />
                  </div>

               

<div class="md:space-y-2 mb-3">
						<label class="text-xs font-semibold text-gray-600 py-2">Language Logo<abbr class="hidden" title="required">*</abbr></label>
						<div class="flex items-center py-6">
							<div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
								<img v-if="newLanguageForm.logo != ''" class="w-12 h-12 mr-4 object-cover" :src="newLanguageForm.logo" alt="Avatar Upload">
                </div>
								<label class="cursor-pointer ">
                  <span
							class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border" 
						>Browse</span>
                  <input type="file" @change="newLogo" name="logo" id="logo" class="hidden">
                </label>
							</div>
               <div
                class="text-xs text-red-500 text-left my-3"
                v-if="newLanguageForm.errors.has('logo')"
                v-html="newLanguageForm.errors.get('logo')"
              />
						</div>

              </div>
</form>
      <!-- end form -->

        <div class="flex flex-row self-end">
          <button type="button" @click="newLanguageModal = false"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Close</button>
          <button type="button" @click="newLanguage"
            :disabled="newLanguageForm.busy"
                  class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
          Add</button>
        </div>
      </div>
    </Modal>


<Modal v-model="editLanguageModal" title="Edit Language" wrapper-class="modal-wrapper" modal-class="modal">
      <div class="flex flex-col">
      <!-- form -->
       <form
            method="POST"
            enctype="multipart/form-data"
            @submit.prevent="editLanguageForm"
            @keydown="editLanguageForm.onKeydown($event)"
          >
		<div class="mb-3 space-y-2 w-full text-xs">
							<label class=" font-semibold text-gray-600 py-2">Language Name</label>
							<div class="flex flex-wrap items-stretch w-full mb-4 relative">
								<div class="flex">
									<span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark w-12 h-10 bg-blue-300 justify-center  text-xl rounded-lg text-white">
                                 <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
</svg>
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />

                                   </span>
								</div>
								<input type="text" id="name" v-model="editLanguageForm.name"
                  name="name" class="flex-shrink flex-grow flex-auto leading-normal w-px  border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow" placeholder="Name">
                <div
                class="text-xs text-red-500 text-left my-3"
                v-if="editLanguageForm.errors.has('name')"
                v-html="editLanguageForm.errors.get('name')"
              />
                  </div>

		<label class=" font-semibold text-gray-600 py-2">Language Directory ( Without special character )</label>
							<div class="flex flex-wrap items-stretch w-full mb-4 relative">
								<div class="flex">
								</div>
								<input type="text" id="dir" v-model="editLanguageForm.dir"
                  name="dir" class="flex-shrink flex-grow flex-auto leading-normal w-px  border h-10 border-grey-light rounded-lg  px-3 relative focus:border-blue focus:shadow" placeholder="Directory">
                <div
                class="text-xs text-red-500 text-left my-3"
                v-if="editLanguageForm.errors.has('dir')"
                v-html="editLanguageForm.errors.get('dir')"
              />
                  </div>

<div class="md:space-y-2 mb-3">
						<label class="text-xs font-semibold text-gray-600 py-2">Language Logo<abbr class="hidden" title="required">*</abbr></label>
						<div class="flex items-center py-6">
							<div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
								<img v-if="editLanguageForm.logo.length < '50'" class="w-12 h-12 mr-4 object-cover" v-bind:src="'/Programminglanguages/' + editLanguageForm.dir + '/'+ editLanguageForm.logo"   alt="Avatar Upload">
                <img v-else class="w-12 h-12 mr-4 object-cover" v-bind:src="editLanguageForm.logo" alt="Avatar Upload">
                </div>
								<label class="cursor-pointer ">
                  <span
							class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border" 
						>Browse</span>
                  <input type="file" @change="updateLogo" name="logo" id="logo" class="hidden">
                </label>
							</div>
               <div
                class="text-xs text-red-500 text-left my-3"
                v-if="editLanguageForm.errors.has('logo')"
                v-html="editLanguageForm.errors.get('logo')"
              />
						</div>

              </div>
</form>
      <!-- end form -->

        <div class="flex flex-row self-end">
          <button type="button" @click="editLanguageModal = false"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Close</button>
          <button type="button" @click="editLanguage"
            :disabled="editLanguageForm.busy"
                  class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
          Edit</button>
        </div>
      </div>
    </Modal>



    

</div>

</template>

<script>
import { Form, HasError, AlertError } from "vform";
    export default {
        props: ["languages", 'time'],
  data() {
    return {
      newLanguageModal: false,
      editLanguageModal: false,
      alllanguages: JSON.parse(this.languages),
      timenow: this.time,
      currentSort: "name",
      currentSortDir: "asc",
      pageSize: 10,
      currentPage: 1,
      countpage: 0,
      filter:'',
       newLanguageForm: new Form({
        name: "",
        dir: "",
        logo: '',
      }),
       editLanguageForm: new Form({
        name: "",
        dir: "",
        logo: '',
        id:'',
      }),
      active: new Form({
        status: '',
        id: ''
      }),
      
    };
  },
   methods: {
     async showLanguage(language , e){
       var messgae;
       var buttontext;
       var buttoncolor;
       if(e == 1)
       {messgae = "Do you want to activat " + language.name + " ?"
       buttontext = 'Activat';
       buttoncolor = '#90EE90';}
       else
       {messgae = "Do you want to deactivate " + language.name + " ?";
       buttontext = 'Deactivate';
       buttoncolor = '#EC7063';}

       toast
        .fire({
          title: messgae,
          type: "warning",
          showCancelButton: true,
          confirmButtonText: buttontext,
          confirmButtonColor: buttoncolor,
        })
        .then((result) => {
          if (result.isConfirmed) {
            var i;
            for(i = 0 ; i < this.alllanguages.length ; i++)
            {
              if(language.id == this.alllanguages[i].id)
              this.alllanguages[i].status = e
            }

this.active.status = e;
this.active.id = language.id;
            const response = this.active
            .post("/controlpanel/languages/activat")
        .then(({ data }) => {
          if (data.status == 200) {
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
            

          }
        });


     },

 newLanguageModalShow(){

this.newLanguageForm.dir = []
this.newLanguageForm.logo = []
this.newLanguageForm.name = []
this.newLanguageModal = true

            },
editLanguageModalShow(language){

this.editLanguageForm.dir = language.dir
this.editLanguageForm.logo = language.logo
this.editLanguageForm.name = language.name
this.editLanguageForm.id = language.id
this.editLanguageModal = true

            },

   async  newLanguage(){
  
      const response = await this.newLanguageForm
        .post("/controlpanel/languages/new" )
        .then(({ data }) => {

            if (data.status == 200) {
            this.editModal = false;
            toast.fire({
              icon: "success",
              title: data.description,
              showConfirmButton: false,
              timer: 3000,
            });
this.newLanguageModal = false
            const addtojson = {
  dir: this.newLanguageForm.dir,
  id: data.id,
  logo: this.newLanguageForm.logo,
  name: this.newLanguageForm.name,
  status: 0
};

this.alllanguages.push(addtojson);

            
            
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

      
    },

     async  editLanguage(){
  
      const response = await this.editLanguageForm
        .post("/controlpanel/languages/edit" )
        .then(({ data }) => {

            if (data.status == 200) {
            this.editModal = false;
            toast.fire({
              icon: "success",
              title: data.description,
              showConfirmButton: false,
              timer: 3000,
            });
             this.editLanguageModal = false
            for( let i = 0 ; i < this.alllanguages.length ; i++)
            {
              if(this.editLanguageForm.id == this.alllanguages[i].id)
              {
                this.alllanguages[i].logo = this.editLanguageForm.logo
                 this.alllanguages[i].dir = this.editLanguageForm.dir
                  this.alllanguages[i].name = this.editLanguageForm.name
              }

            }
            
            
            
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

      
    },

      newLogo(e){
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
                    this.newLanguageForm.logo = reader.result;
                }
                reader.readAsDataURL(file);
            },

             updateLogo(e){
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
                    this.editLanguageForm.logo = reader.result;
                }
                reader.readAsDataURL(file);
            },
          
      

    sort: function (s) {
      //if s == current sort, reverse
      if (s === this.currentSort) {
        this.currentSortDir = this.currentSortDir === "asc" ? "desc" : "asc";
      }
      this.currentSort = s;
    },
    OpenPage: function (page) {
this.currentPage = page
    },
    firstPage: function () {
      this.currentPage = 1;
    },
    nextPage: function () {
      if (this.currentPage * this.pageSize < this.alllanguages.length)
        this.currentPage++;
    },
    prevPage: function () {
      if (this.currentPage > 1) this.currentPage--;
    },
    lastPage: function () {
      if (Number.isInteger(this.alllanguages.length / this.pageSize)) {
        this.currentPage = this.alllanguages.length / this.pageSize;
        
      } else {
        this.currentPage = Math.floor(this.alllanguages.length / this.pageSize) + 1;
      }
      
    }
  },
   
   watch: {
    filter() {

      this.currentPage = 1;
    }
  },
  computed: {
        filteredLanguages() {
      return this.alllanguages.filter(c => {
        if(this.filter == '') return true;
        return c.name.toLowerCase().indexOf(this.filter.toLowerCase()) >= 0;
      })
    },
    sortedLanguages:function() {
	return this.filteredLanguages.sort((a,b) => {
		let modifier = 1;
		if(this.currentSortDir === 'desc') modifier = -1;
		if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
		if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
		return 0;
	}).filter((row, index) => {
		let start = (this.currentPage-1)*this.pageSize;
		let end = this.currentPage*this.pageSize;
		if(index >= start && index < end) return true;
	});
}
  },
        mounted() {
        },
        
    }
</script>