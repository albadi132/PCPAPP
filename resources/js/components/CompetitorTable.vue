<template>
<div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
                
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left" @click="sort('name')" >Name</th>
                                <th class="py-3 px-6 text-left" @click="sort('gender')" >Gender</th>
                                <th class="py-3 px-6 text-center" @click="sort('workplace')" >Workplace</th>
                                
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light" v-for="competitor in sortedCompetitors" v-bind:key="competitor.username">
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                  <a :href="competitor.route">
                                    <div class="flex items-center">
                                        <div class="mr-2">
                                          <img class='w-10 h-10 object-cover rounded-full' alt='User avatar'
                                          v-bind:src="'/images/avatar/' + competitor.profile" />   
                                        </div>
                                        <span class="font-medium">{{competitor.name}}</span>
                                    </div>
                                  </a>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        <span>{{competitor.gender}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <p class="">
                            {{competitor.workplace}}
                        </p>
                        <p class="text-gray-500">
                            {{competitor.job}}
                        </p>
                                </td>
                            
                            </tr>
                           
                        </tbody>
                    </table>

                          <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
        <div>
            <p class="text-sm leading-5 text-blue-700">
                Participants:
                <span class="font-medium">{{this.competitors.length}}</span>
                
            </p>
        </div>

            <div>
            <nav class="relative z-0 inline-flex shadow-sm">
                <div	>
                    <button @click="firstPage" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
</svg>
                    </button>
                </div>
                <div>
                    <button @click="prevPage" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-700 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
                       <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
</svg>
                    </button>
                  <button  class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-600 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
                        {{this.currentPage}}
                    </button>
                   <button @click="nextPage" class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-600 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
</svg>
                    </button>
                </div>
                <div >
                    <button @click="lastPage" href="#" class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
</svg>
                    </button>
                </div>
            </nav>
        </div>
        
    </div>

                    
                    
                </div>
           
        

            </div>
<!-- ///////////////// -->
  
</template>

<script>
export default {
  props: ["participants"],
  data() {
    return {
      competitors: JSON.parse(this.participants),
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
    firstPage: function () {
      this.currentPage = 1;
    },
    nextPage: function () {
      if (this.currentPage * this.pageSize < this.competitors.length)
        this.currentPage++;
    },
    prevPage: function () {
      if (this.currentPage > 1) this.currentPage--;
    },
    lastPage: function () {
      if (Number.isInteger(this.competitors.length / this.pageSize)) {
        this.currentPage = this.competitors.length / this.pageSize;
        
      } else {
        this.currentPage = Math.floor(this.competitors.length / this.pageSize) + 1;
      }
      
    }
  },
   
  computed: {
    sortedCompetitors:function() {
	return this.competitors.sort((a,b) => {
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
    console.log(this.allow);
  },
};
</script>