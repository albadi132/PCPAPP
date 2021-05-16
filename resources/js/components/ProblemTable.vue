<template>
<div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
                <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
                    <div class="flex justify-between">
                        <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                            <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                                <div class="flex">
                                    <span class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                        <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                                <input type="search" v-model="filter" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px  border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs text-gray-500 font-thin" placeholder="Search">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr class="bg-gray-800 text-white">
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4  tracking-wider">Number</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4  tracking-wider" @click="sort('name')" >Problem Name</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-centertext-sm leading-4 tracking-wider" @click="sort('points')" >Point</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider" @click="sort('points')" >Difficulty</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white" v-for="(problem, i)  in sortedProblems"
          v-bind:key="problem.id" >
                                <tr class="hover:shadow">
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                      <a :href="problem.route">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm leading-5 text-gray-800">{{(1+i) + (pageSize*(currentPage-1))}} </div>
                                            </div>
                                        </div>
                                      </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                      <a :href="problem.route">
                                        <div class=" text-center text-sm leading-5 text-blue-900">{{problem.name}}</div>
                                      </a>
                                    </td>
                                    <td class=" text-center px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                                      <a :href="problem.route">{{ problem.points }}</a>
                                      </td>

                                     <td class=" text-center px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"
                                     v-if="problem.points >= 200" >
                                        <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-red-400 opacity-50 rounded-full"></span>
                                        <span class="relative text-xs"><a :href="problem.route">Hard</a></span>
                                    </span>
                                    </td>

                                    <td class="text-center px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"
                                       v-else-if="problem.points < 200 && problem.points >= 100" >
                                        <span class="relative inline-block px-3 py-1 font-semibold text-orange-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-yellow-400 opacity-50 rounded-full"></span>
                                        <span class="relative text-xs"><a :href="problem.route">Medium</a></span>
                                    </span>
                                    </td>
                                    
                                    <td class="text-center px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5"
                                    v-else >
                                        <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                        <span aria-hidden class="absolute inset-0 bg-green-400 opacity-50 rounded-full"></span>
                                        <span class="relative text-xs"><a :href="problem.route">Easy</a></span>
                                    </span>
                                    </td>
                          </tr>

                        </tbody>
                    </table>
                  <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
        <div>
            <p class="text-sm leading-5 text-blue-700">
                challenges:
                <span class="font-medium">{{this.contproblems.length}}</span>
                
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
  props: ["problems"],
  data() {
    return {
      contproblems: JSON.parse(this.problems),
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
      if (this.currentPage * this.pageSize < this.contproblems.length)
        this.currentPage++;
    },
    prevPage: function () {
      if (this.currentPage > 1) this.currentPage--;
    },
    lastPage: function () {
      if (Number.isInteger(this.contproblems.length / this.pageSize)) {
        this.currentPage = this.contproblems.length / this.pageSize;
        
      } else {
        this.currentPage = Math.floor(this.contproblems.length / this.pageSize) + 1;
      }
      
    }
  },
   
   watch: {
    filter() {
      console.log('reset to p1 due to filter');
      this.currentPage = 1;
    }
  },
  computed: {
        filteredProblems() {
      return this.contproblems.filter(c => {
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
    console.log(this.problems);
  },
};
</script>