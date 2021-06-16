<template>
<div>
<div class="w-full flex justify-end px-2 mt-2">
        <div class="w-full sm:w-64 inline-block relative ">
          <input type="search" v-model="filter" name="" class="leading-snug border border-gray-300 block w-full appearance-none bg-gray-100 text-sm text-gray-600 py-1 px-4 pl-8 rounded-lg" placeholder="Search" />

          <div class="pointer-events-none absolute pl-3 inset-y-0 left-0 flex items-center px-2 text-gray-300">

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
            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8" @click="sort('name')">Problem</th>
            <th class="px-4 py-2 text-center" style="background-color:#f8f8f8" @click="sort('points')">Point</th>
            <th class="px-4 py-2 text-center" style="background-color:#f8f8f8" @click="sort('points')">Difficulty</th>
            <th class="px-4 py-2 text-center" style="background-color:#f8f8f8" >Question</th>
            <th class="px-4 py-2 text-center" style="background-color:#f8f8f8" @click="sort('testcases')">Test Cases</th>
            <th class="px-4 py-2 text-center" style="background-color:#f8f8f8">Action</th>
          </tr>
        </thead>
        <tbody class="text-sm font-normal text-gray-700" v-for="problem  in sortedProblems"
          v-bind:key="problem.id">
          <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
            <td class="px-4 py-4">
                 <div class="flex items-center">
                                        <div class="text-sm leading-5 font-medium text-gray-900">{{problem.name}} </div>
                                        </div>
                                    
            </td>
            <td class="px-4 py-4 text-center">
             <div class="text-sm leading-5 font-medium text-gray-900">{{problem.points}} </div>
            </td>

              <td class="px-4 py-4 text-center">
<span v-if="problem.points >= 200" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-400 text-gray-50">Hard</span>
 <span v-else-if="problem.points < 200 && problem.points >= 100" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-400 text-gray-50">Medium</span>    
 <span v-else class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 text-gray-50">Easy</span>          
            </td>
 <td class="px-4 py-4 text-center">
             <div class="text-sm leading-5 font-medium text-gray-600"><a :href="'/../contests/library/'+problem.file">{{problem.file}}</a></div>
            </td>
             <td class="px-4 py-4 text-center">
              <span v-if="problem.testcases.length < 1" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-400 text-gray-50">There is no test case</span> 
              <span v-else class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full  text-gray-900">{{problem.testcases.length}}</span>    
            </td>
            
                    <td class="px-4 py-4 flex  justify-center ">
                                    <div class="flex ">
                                        <div  class="w-4 mr-2 transform hover:text-green-400 hover:scale-110">
        <svg @click="showtestCases(problem)"   xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
</svg>
                                        </div>
              
                                        <div class="w-4 mr-2 transform hover:text-green-400 hover:scale-110">
                                            <svg @click="chosenProblem(problem)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                          <div v-if='problem.status === 0' class="w-4 mr-2 transform hover:text-green-400 hover:scale-110">
                                                                                                           <svg @click="showProblem(problem , 1)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
</svg>
                                        </div>
<div v-else class="w-4 mr-2 transform hover:text-red-400 hover:scale-110">
              
<svg @click="showProblem(problem , 0)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
        <p  v-if="(this.currentPage+1) <= (Math.ceil(this.allproblems.length/ this.pageSize))" class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600" @click="OpenPage(currentPage+1)"> {{this.currentPage+1}}</p>
        <p  v-if="(this.currentPage+2) <= (Math.ceil(this.allproblems.length/ this.pageSize))" class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600" @click="OpenPage(currentPage+2)"> {{this.currentPage+2}}</p>

<svg  :class="this.currentPage < (Math.ceil(this.allproblems.length/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="nextPage"  xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
</svg>
                  <svg :class="this.currentPage < (Math.ceil(this.allproblems.length/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="lastPage" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
</svg>

        

      </div>

<Modal v-model="editModal" title="Edit Problem" wrapper-class="modal-wrapper" modal-class="modal">
       <div class="flex flex-col">
      <!-- form -->
       <form
            method="POST"
            enctype="multipart/form-data"
            @submit.prevent="creatteam"
            @keydown="editProblem.onKeydown($event)"
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
								<input type="text" id="name" v-model="editProblem.name"
                  name="name" class="flex-shrink flex-grow flex-auto leading-normal w-px  border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow" placeholder="Problem Name">
                <div
                class="text-xs text-red-500 text-left my-3"
                v-if="editProblem.errors.has('name')"
                v-html="editProblem.errors.get('name')"
              />
                  </div>

                  	<div class="flex-auto w-full mb-1 text-xs space-y-2">
									<label class="font-semibold text-gray-600 py-2">Description</label>
									<textarea v-model="editProblem.description" required="" name="description" id="description" class=" min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Problem Desc.." ></textarea>
								 <div
                class="text-xs text-red-500 text-left my-3"
                v-if="editProblem.errors.has('description')"
                v-html="editProblem.errors.get('description')"
              />
								</div>

<div class="md:space-y-2 mb-3">
						<label class="text-xs font-semibold text-gray-600 py-2">Problem question (pdf)<abbr class="hidden" title="required">*</abbr></label>
						<div class="flex items-center py-6">
									<label class="cursor-pointer ">
                  <h2 id="filepdf">{{this.editProblem.question}}</h2>
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
                v-if="editProblem.errors.has('question')"
                v-html="editProblem.errors.get('question')"
              />
						</div>


							<label class=" font-semibold text-gray-600 py-2">Score</label>
							<div class="flex flex-wrap items-stretch w-full mb-4 relative">
								
								<input type="text" id="score" v-model="editProblem.score"
                  name="score" class="flex-shrink flex-grow flex-auto leading-normal w-px  border  h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue  focus:shadow" placeholder="Problem score">
                <div
                class="text-xs text-red-500 text-left my-3"
                v-if="editProblem.errors.has('score')"
                v-html="editProblem.errors.get('score')"
              />
                  </div>

                  
           

</form>
      <!-- end form -->

        <div class="flex flex-row self-end">
          <button type="button" @click="editModal = false"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Close</button>
          <button type="button" @click="editProblems"
            :disabled="editProblem.busy"
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
        props: ["problems", 'time'],
  data() {
    return {
      editModal: false,
      showTestCaseModal: false,
      newTestCaseModal: false,
      allproblems: JSON.parse(this.problems),
      timenow: this.time,
      currentSort: "name",
      currentSortDir: "asc",
      pageSize: 10,
      currentPage: 1,
      countpage: 0,
      filter:'',
      tempConditions: '',
      tempPrize: '',
      tempProfile: '',
       editProblem: new Form({
        problem: '',
        name: "",
        description: "",
        question: '',
        score: '',
      }),
      active: new Form({
        status: '',
        id: ''
      }),
    };
  },
   methods: {
     async showProblem(problem , e){
       var messgae;
       var buttontext;
       var buttoncolor;
       if(e == 1)
       {messgae = "Do you want to show " + problem.name + " ?"
       buttontext = 'Show';
       buttoncolor = '#90EE90';}
       else
       {messgae = "Do you want to hide " + problem.name + " ?";
       buttontext = 'Hide';
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
            for(i = 0 ; i < this.allproblems.length ; i++)
            {
              if(problem.id == this.allproblems[i].id)
              this.allproblems[i].status = e
            }

this.active.status = e;
this.active.id = problem.id;
            const response = this.active
            .post("/controlpanel/problems/active")
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

     showtestCases(problem){

window.location.href = '/controlpanel/problems/testcase/'+problem.id;


     },

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
                    this.editProblem.question = reader.result;
                    document.getElementById('filepdf').innerHTML = sFileName
                    
                }
                reader.readAsDataURL(file); 
            },

     async editProblems() {
      const response = await this.editProblem
        .post("/controlpanel/problems/edit" )
        .then(({ data }) => {

            if (data.status == 200) {
            this.editModal = false;
            toast.fire({
              icon: "success",
              title: data.description,
              showConfirmButton: false,
              timer: 3000,
            });
for( let i = 0 ; i < this.allproblems.length ; i++)
            {
              if(this.editProblem.problem == this.allproblems[i].id)
              {
             this.allproblems[i].name = this.editProblem.name
        this.allproblems[i].description = this.editProblem.description 
        this.allproblems[i].file =  data.file 
        this.allproblems[i].points =  this.editProblem.score 
                
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

      // ...
    },

               chosenProblem(problem){

                 this.editProblem.problem = problem.id

         this.editProblem.name = problem.name
         this.editProblem.description =  problem.description
         this.editProblem.question =  problem.file
         this.editProblem.score =  problem.points
        this.editModal =true;
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
      if (this.currentPage * this.pageSize < this.allproblems.length)
        this.currentPage++;
    },
    prevPage: function () {
      if (this.currentPage > 1) this.currentPage--;
    },
    lastPage: function () {
      if (Number.isInteger(this.allproblems.length / this.pageSize)) {
        this.currentPage = this.allproblems.length / this.pageSize;
        
      } else {
        this.currentPage = Math.floor(this.allproblems.length / this.pageSize) + 1;
      }
      
    }
  },
   
   watch: {
    filter() {

      this.currentPage = 1;
    }
  },
  computed: {
        filteredProblems() {
      return this.allproblems.filter(c => {
        if(this.filter == '') return true;
        return c.name.toLowerCase().indexOf(this.filter.toLowerCase()) >= 0;
      })
    },
    sortedProblems:function() {
	return this.filteredProblems.sort((a,b) => {
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