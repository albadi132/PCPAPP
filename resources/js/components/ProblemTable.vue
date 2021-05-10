<template>
  <div>
      <input type="search" v-model="filter">
    <table class="border-collapse w-full">
      <thead>
        <tr>
          <th
            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell"
            @click="sort('name')"
          >
            Problem Name
          </th>
          <th
            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell"
            @click="sort('points')"
          >
            Point
          </th>
          <th
            class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell"
          >
            Difficulty
          </th>
        </tr>
      </thead>
      <tbody id="problems">
        <tr
          class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0"
          v-for="problem in sortedProblems"
          v-bind:key="problem.id"
        >
          <td
            class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static"
          >
            <a href="#"
              ><div class="text-sm leading-5 text-gray-900">
                {{ problem.name }}
              </div></a
            >
          </td>
          <td
            class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static"
          >
            <div class="text-sm leading-5 text-gray-900">
              {{ problem.points }}
            </div>
          </td>
          <td
            class="w-full lg:w-auto p-3 text-gray-800 border border-b text-center block lg:table-cell relative lg:static"
          >
            <div
              class="text-sm leading-5 text-gray-900"
              v-if="problem.points >= 200"
            >
              hard
            </div>
            <div
              class="text-sm leading-5 text-gray-900"
              v-else-if="problem.points < 200 && problem.points >= 100"
            >
              medim
            </div>
            <div class="text-sm leading-5 text-gray-900" v-else>ease</div>
          </td>
        </tr>
      </tbody>
    </table>
    <div>
      <button @click="firstPage">first Page</button>
  <button @click="prevPage">Previous
    </button> 
    <h3>{{this.currentPage}}</h3>
  <button @click="nextPage">Next</button>
  <button @click="lastPage">last page</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["problems"],
  data() {
    return {
      contproblems: JSON.parse(this.problems),
      currentSort: "name",
      currentSortDir: "asc",
      pageSize: 3,
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