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
                                          <img class="h-10 w-10 rounded-full"
                                          v-bind:src="'/contests/images/' + contest.logo"    
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
            end: {{contest.starting_date}}
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
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </div>
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
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

</div>
</template>

<script>
    export default {
        props: ["contests", 'time'],
  data() {
    return {
      allcontests: JSON.parse(this.contests),
      timenow: this.time,
      currentSort: "name",
      currentSortDir: "asc",
      pageSize: 10,
      currentPage: 1,
      countpage: 0,
      filter:''
    };
  },
   methods: {
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