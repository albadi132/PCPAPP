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
            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8" @click="sort('name')">Contest</th>
            <th class="px-4 py-2 " style="background-color:#f8f8f8" @click="sort('name')">Date</th>
            <th class="px-4 py-2 " style="background-color:#f8f8f8" @click="sort('starting_date')">Status</th>
            <th class="px-4 py-2 " style="background-color:#f8f8f8" @click="sort('type')">type</th>
            <th class="px-4 py-2 " style="background-color:#f8f8f8" @click="sort('participation')">participation</th>
            <th class="px-4 py-2 " style="background-color:#f8f8f8">Action</th>
          </tr>
        </thead>
        <tbody class="text-sm font-normal text-gray-700" v-for="contest  in sortedContests"
          v-bind:key="contest.id">
          <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
            <td class="px-4 py-4">
                 <div class="flex items-center">
                                      <div class="flex-shrink-0 h-10 w-10">
                                          <img v-if="contest.logo.length < '50'" class="h-10 w-10 rounded-full"
                                          v-bind:src="'/contests/images/' + contest.logo"    
                                              alt="" />
                                               <img v-else class="h-10 w-10 rounded-full"
                                          v-bind:src="contest.logo"    
                                              alt="" />
                                      </div>

                                      <div class="ml-4">
                                          <div class="text-sm leading-5 font-medium text-gray-900">{{contest.name}}
                                          </div>
                                      </div>
                                  </div>
            </td>
            <td class="px-4 py-4">
                start: {{contest.starting_date}}
                <br>
            end: {{contest.ending_date}}
            </td>

              <td class="px-4 py-4">
                <span v-if='contest.status === 0' class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-800 text-gray-50">Not Active</span>
                <div v-else>

<span v-if='contest.ending_date < timenow ' class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-700 text-gray-50">Finished</span>
<span v-else-if=' (contest.starting_date <= timenow) & (contest.ending_date >= timenow) ' class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-400 text-gray-50">Live</span>

<span v-else class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-400 text-gray-50">Upcoming</span>
                </div>
            </td>
             <td class="px-4 py-4">
               {{contest.type}}
            </td>
             <td class="px-4 py-4">
               {{contest.participation}}
            </td>
                    <td class="py-3 px-6 ">
                                    <div class="flex ">
                           
                                        <div class="w-4 mr-2 transform hover:text-green-400 hover:scale-110">
                                            <svg @click="chosenContest(contest)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                 

                                                     <div v-if='contest.status === 0' class="w-4 mr-2 transform hover:text-green-400 hover:scale-110">
                                                                                                           <svg @click="showContest(contest , 1)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
</svg>
                                        </div>
<div v-else class="w-4 mr-2 transform hover:text-red-400 hover:scale-110">
              
<svg @click="showContest(contest , 0)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
        <p  v-if="(this.currentPage+1) <= (Math.ceil(this.allcontests.length/ this.pageSize))" class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600" @click="OpenPage(currentPage+1)"> {{this.currentPage+1}}</p>
        <p  v-if="(this.currentPage+2) <= (Math.ceil(this.allcontests.length/ this.pageSize))" class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600" @click="OpenPage(currentPage+2)"> {{this.currentPage+2}}</p>

<svg  :class="this.currentPage < (Math.ceil(this.allcontests.length/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="nextPage"  xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
</svg>
                  <svg :class="this.currentPage < (Math.ceil(this.allcontests.length/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="lastPage" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
</svg>

        

      </div>


<Modal v-model="editModal" title="Edit Contest" wrapper-class="modal-wrapper" modal-class="modal">
      <div class="flex flex-col">
      <!-- form -->
       <form
            method="POST"
            enctype="multipart/form-data"
            @submit.prevent="creatteam"
            @keydown="editContest.onKeydown($event)"
          >
		<div class="mb-3 space-y-2 w-full text-xs">
							<label class=" font-semibold text-gray-600 py-2">Contest Name</label>
							<div class="flex flex-wrap items-stretch w-full mb-4 relative">
								<div class="flex">
									<span class="flex items-center leading-normal bg-grey-lighter border-1 rounded-r-none border border-r-0 border-blue-300 px-3 whitespace-no-wrap text-grey-dark w-12 h-10 bg-blue-300 justify-center  text-xl rounded-lg text-white">
                                   <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
</svg>
                                   </span>
								</div>
								<input type="text" id="name" v-model="editContest.name"
                  name="name" class="flex-shrink flex-grow flex-auto leading-normal w-px  border border-l-0 h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue focus:shadow" placeholder="Contest Name">
                <div
                class="text-xs text-red-500 text-left my-3"
                v-if="editContest.errors.has('name')"
                v-html="editContest.errors.get('name')"
              />
                  </div>

                  	<div class="flex-auto w-full mb-1 text-xs space-y-2">
									<label class="font-semibold text-gray-600 py-2">Description</label>
									<textarea v-model="editContest.description" required="" name="description" id="description" class=" min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Contest Desc.." ></textarea>
								 <div
                class="text-xs text-red-500 text-left my-3"
                v-if="editContest.errors.has('description')"
                v-html="editContest.errors.get('description')"
              />
								</div>

<div class="md:space-y-2 mb-3">
						<label class="text-xs font-semibold text-gray-600 py-2">Contest Logo<abbr class="hidden" title="required">*</abbr></label>
						<div class="flex items-center py-6">
							<div class="w-12 h-12 mr-4 flex-none rounded-xl border overflow-hidden">
								<img class="w-12 h-12 mr-4 object-cover" :src="editContest.logo" alt="Avatar Upload">
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
                v-if="editContest.errors.has('logo')"
                v-html="editContest.errors.get('logo')"
              />
						</div>
            
            	<div class="md:flex flex-row md:space-x-4 w-full text-xs">
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Starting Date</label>
                  <input
                  v-model="editContest.startingtime" 
                  type="datetime-local"
                  id="startingtime"
                  name="startingtime"
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                />
							<div
                class="text-xs text-red-500 text-left my-3"
                v-if="editContest.errors.has('startingtime')"
                v-html="editContest.errors.get('startingtime')"
              />
							</div>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Finish Date</label>
							  <input
                  type="datetime-local"
                  v-model="editContest.endingtime" 
                  id="endingtime"
                  name="endingtime"
                  class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4"
                />
									<div
                class="text-xs text-red-500 text-left my-3"
                v-if="editContest.errors.has('endingtime')"
                v-html="editContest.errors.get('endingtime')"
              />
							</div>
						</div>

            <div class="md:flex flex-row md:space-x-4 w-full text-xs">
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Make the contest private?</label>
                
                      <div class="relative w-12 h-6 transition duration-200 ease-linear bg-opacity-50 rounded-full shadow-inner ring-1 ring-gray-400 ring-opacity-50"
                  :class="[editContest.private === '1' ? 'bg-green-400 ring-green-400' : 'bg-gray-400']">
                <label for="private"
                      class="absolute left-0 w-6 h-6 mb-2 transition duration-100 ease-linear transform bg-white border-2 border-opacity-50 rounded-full cursor-pointer"
                      :class="editContest.private === '1' ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400'"></label>
                <input type="checkbox" id="private" name="private" :checked="editContest.private === '1'"
                      class="w-full h-full appearance-none active:outline-none focus:outline-none"
                      @click="editContest.private === '0' ? editContest.private = '1' : editContest.private = '0'"/>
              </div>

		<div
                class="text-xs text-red-500 text-left my-3"
                v-if="editContest.errors.has('private')"
                v-html="editContest.errors.get('private')"
              />
							</div>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">Make the contest team?</label>
							
                <div class="relative w-12 h-6 transition duration-200 ease-linear bg-opacity-50 rounded-full shadow-inner ring-1 ring-gray-400 ring-opacity-50"
                  :class="[editContest.team === '1' ? 'bg-green-400 ring-green-400' : 'bg-gray-400']">
                <label for="team"
                      class="absolute left-0 w-6 h-6 mb-2 transition duration-100 ease-linear transform bg-white border-2 border-opacity-50 rounded-full cursor-pointer"
                      :class="editContest.team === '1' ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400'"></label>
                <input type="checkbox" id="team" name="team" :checked="editContest.team === '1'"
                      class="w-full h-full appearance-none active:outline-none focus:outline-none"
                      @click="editContest.team === '0' ? editContest.team = '1' : editContest.team= '0'"/>
              </div>

	<div
                class="text-xs text-red-500 text-left my-3"
                v-if="editContest.errors.has('team')"
                v-html="editContest.errors.get('team')"
              />
							</div>
						</div>


            	<div class="flex-auto w-full mb-1 text-xs space-y-2">
									<label @click="customizeEditModal = true" class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">More Customize</label>
                   
								</div>
<div
                class="text-xs text-red-500 text-left my-3"
                v-if="editContest.errors.has('condition')"
                v-html="editContest.errors.get('condition')"
              />
              <div
                class="text-xs text-red-500 text-left my-3"
                v-if="editContest.errors.has('prize')"
                v-html="editContest.errors.get('prize')"
              />
              <div
                class="text-xs text-red-500 text-left my-3"
                v-if="editContest.errors.has('profile')"
                v-html="editContest.errors.get('profile')"
              />

              </div>
</form>
      <!-- end form -->

        <div class="flex flex-row self-end">
          <button type="button" @click="editModal = false"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Close</button>
          <button type="button" @click="editcontest"
            :disabled="editContest.busy"
                  class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
          Edit</button>
        </div>
      </div>
    </Modal>

    <Modal v-model="customizeEditModal" title="More Customize" wrapper-class="modal-wrapper" modal-class="modal">
      <div class="flex flex-col">
      <!-- form -->


<div class="flex-auto w-full mb-1 text-xs space-y-2">
									<label class="font-semibold text-gray-600 py-2">Condition</label>
									<textarea v-model="editContest.conditions" name="condition" id="condition" class=" min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Condition" />
								
								</div>

                <div class="flex-auto w-full mb-1 text-xs space-y-2">
									<label class="font-semibold text-gray-600 py-2">Prize</label>
									<textarea v-model="editContest.prize" name="prize" id="prize" class=" min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="prize" />
							
								</div>


<div class="flex-auto w-full mb-1 text-xs space-y-2">
									<label class="font-semibold text-gray-600 py-2">Profile Background</label>
										<label class="cursor-pointer ">
                  <span
							class="w-40 block mx-auto focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border" 
						>Browse</span>
                  <input type="file" @change="updateProfile" name="profile" id="profile" class="hidden">
                </label>
                  <div class="w-full h-48 mr-4 flex-none rounded-xl border overflow-hidden">
								<img class="w-full h-48 mr-4 object-cover" :src="editContest.profile" alt="profile">
                </div>
								</div>
      <!-- end form -->

        <div class="flex flex-row self-end">
          <button type="button" @click="clearCustomiz"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Cancel</button>
          <button type="button" @click="customizeEditModal = false"
                  class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
          Save</button>
        </div>
      </div>
    </Modal>

</div>

</template>

<script>
import { Form, HasError, AlertError } from "vform";
    export default {
        props: ["contests", 'time'],
  data() {
    return {
      editModal: false,
      customizeEditModal: false,
      allcontests: JSON.parse(this.contests),
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
       editContest: new Form({
        contest: '',
        name: "",
        description: "",
        startingtime: "",
        endingtime: "",
        private: '0',
        team: '0',
        conditions: '',
        prize: '',
        profile: '',
        logo: '',
      }),
      active: new Form({
        status: '',
        id: ''
      }),
      
    };
  },
   methods: {
     async showContest(contest , e){
       var messgae;
       var buttontext;
       var buttoncolor;
       if(e == 1)
       {messgae = "Do you want to show " + contest.name + " ?"
       buttontext = 'Show';
       buttoncolor = '#90EE90';}
       else
       {messgae = "Do you want to hide " + contest.name + " ?";
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
            for(i = 0 ; i < this.allcontests.length ; i++)
            {
              if(contest.id == this.allcontests[i].id)
              this.allcontests[i].status = e
            }

this.active.status = e;
this.active.id = contest.id;
            const response = this.active
            .post("/controlpanel/contests/active")
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


    
     async editcontest() {
      const response = await this.editContest
        .post("/controlpanel/contests/edit" )
        .then(({ data }) => {

            if (data.status == 200) {
            this.editModal = false;
            toast.fire({
              icon: "success",
              title: data.description,
              showConfirmButton: false,
              timer: 3000,
            });
for( let i = 0 ; i < this.allcontests.length ; i++)
            {
              if(this.editContest.contest == this.allcontests[i].id)
              {
                this.allcontests[i].conditions = this.editContest.conditions
                this.allcontests[i].description = this.editContest.description
                this.allcontests[i].ending_date = this.editContest.endingtime
                this.allcontests[i].logo = this.editContest.logo
                this.allcontests[i].name = this.editContest.name
                this.allcontests[i].prizes = this.editContest.prize
                this.allcontests[i].profile = this.editContest.profile
                this.allcontests[i].starting_date = this.editContest.startingtime
                if(this.editContest.private == 1)
                this.allcontests[i].type = 'private'
                else
                this.allcontests[i].type = 'public'
                if(this.editContest.team == 1)
                this.allcontests[i].participation = 'team'
                else
                this.allcontests[i].participation = 'solo'

                
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
                    this.editContest.logo = reader.result;
                }
                reader.readAsDataURL(file);
            },
            updateProfile(e){
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
                    this.editContest.profile = reader.result;
                }
                reader.readAsDataURL(file);
            },

            clearCustomiz(){
this.editContest.conditions= this.tempConditions;
        this.editContest.prize =  this.tempPrize;
        this.editContest.profile = this.tempProfile ;
        this.customizeEditModal =false;
            },

               chosenContest(contest){
                 this.editContest.contest = contest.id

         this.editContest.name = contest.name
         this.editContest.description = contest.description

         
         this.editContest.startingtime = contest.starting_date.replace(/ /g,"T")
         this.editContest.endingtime = contest.ending_date.replace(/ /g,"T")

         if(contest.type == 'public')
         this.editContest.private = '0'
         else
         this.editContest.private = '1'

  if(contest.participation == 'solo')
         this.editContest.team = '0'
         else
         this.editContest.team = '1'

         this.editContest.conditions = contest.conditions
         this.editContest.prize = contest.prizes
         this.editContest.profile = '/contests/profile/' + contest.profile
         this.editContest.logo = '/contests/images/' +  contest.logo

            
         this.tempConditions = contest.conditions
      this.tempPrize = contest.prizes
      this.tempProfile = '/contests/profile/' + contest.profile

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
      if (this.currentPage * this.pageSize < this.allcontests.length)
        this.currentPage++;
    },
    prevPage: function () {
      if (this.currentPage > 1) this.currentPage--;
    },
    lastPage: function () {
      if (Number.isInteger(this.allcontests.length / this.pageSize)) {
        this.currentPage = this.allcontests.length / this.pageSize;
        
      } else {
        this.currentPage = Math.floor(this.allcontests.length / this.pageSize) + 1;
      }
      
    }
  },
   
   watch: {
    filter() {

      this.currentPage = 1;
    }
  },
  computed: {
        filteredContests() {
      return this.allcontests.filter(c => {
        if(this.filter == '') return true;
        return c.name.toLowerCase().indexOf(this.filter.toLowerCase()) >= 0;
      })
    },
    sortedContests:function() {
	return this.filteredContests.sort((a,b) => {
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