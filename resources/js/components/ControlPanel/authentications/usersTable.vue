<template>
  <div class="w-full overflow-x-scroll bg-white border-gray-200 rounded-lg shadow-lg lg:overflow-auto">
    <table class="w-full whitespace-nowrap">
      <thead>
        <tr>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
            @click="sort('username')">
            Name
          </th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
            @click="sort('email')">
            Email
          </th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
            @click="sort('is_verified')">
            Verification / Status
          </th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50"
            @click="sort('role')">
            Role
          </th>
          <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
            Actions
          </th>
        </tr>
      </thead>
      <tbody class="bg-white" v-for="user in sortedUsers" v-bind:key="user.id">
        <tr>
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="flex items-center">
              <div class="flex-shrink-0 w-10 h-10">
                <img class="w-10 h-10 rounded-full"
                  v-bind:src="'/images/avatar/'+user.avatar"
                  v-bind:alt="'/images/avatar/avatar.png'">
              </div>
              <div class="ml-4">
                <div class="text-sm font-medium leading-5 text-gray-900">{{ user.username }}</div>
                <div class="text-sm leading-5 text-gray-500">{{ user.first_name }} {{ user.last_name }}</div>
              </div>
            </div>
          </td>
          <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
            <div class="text-sm leading-5 text-gray-900">
              {{ user.email }}
            </div>
          </td>
          <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
            <span v-if="user.is_verified == 1" class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
              Verified
            </span>
            <span v-else class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full whitespace-nowrap">
              Non-Verified
            </span>
            /
            <span v-if="user.status == 1" class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
              Active
            </span>
            <span v-else class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">
              Suspended
            </span>
          </td>
          <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
            <span v-if="user.role === 'admin'" class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 rounded-full">
              Admin
            </span>
            <span v-else-if="user.role === 'manager'" class="inline-flex px-2 text-xs font-semibold leading-5 text-indigo-800 bg-indigo-100 rounded-full">
              Manager
            </span>
            <span v-else class="inline-flex px-2 text-xs font-semibold leading-5 text-gray-800 bg-gray-100 rounded-full">
              User
            </span>
          </td>
          <td class="px-6 py-4 text-sm font-medium leading-5 text-left border-b border-gray-200">
            <div class="flex flex-col">
              <a href="#" class="text-indigo-600 hover:text-indigo-900">
                Change Role
              </a>
              <a href="#" class="text-indigo-600 hover:text-indigo-900">
                Change Status
              </a>
              <a href="#" class="text-indigo-600 hover:text-indigo-900">
                Reset Password
              </a>
            </div>
          </td>
        </tr>
      </tbody>
      <tfoot class="bg-gray-100">
        <tr id="pagination">
          <td colspan="5">
            <div class="flex items-center justify-start px-20 py-1 flex-nowrap md:justify-center">
              <svg @click="firstPage"  :class="this.currentPage != 1 ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
              </svg>
              <svg :class="this.currentPage != 1 ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="prevPage" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
              </svg>
              <p v-if="(this.currentPage-2) > 0" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage-2)"> {{this.currentPage-2}}</p>
              <p v-if="(this.currentPage-1) > 0" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage-1)"> {{this.currentPage-1}}</p>
              <p class="mx-2 text-sm leading-relaxed text-blue-600 cursor-pointer"> {{this.currentPage}} </p>
              <p v-if="(this.currentPage+1) <= (Math.ceil(this.userslist.length/ this.pageSize))" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage+1)"> {{this.currentPage+1}}</p>
              <p v-if="(this.currentPage+2) <= (Math.ceil(this.userslist.length/ this.pageSize))" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage+2)"> {{this.currentPage+2}}</p>
              <svg :class="this.currentPage < (Math.ceil(this.userslist.length/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="nextPage"  xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
              </svg>
              <svg :class="this.currentPage < (Math.ceil(this.userslist.length/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="lastPage" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
              </svg>
            </div>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</template>

<script>
export default {
  props: [
    'users'
  ],
  data() {
    return {
      userslist: JSON.parse(this.users),
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
      if (this.currentPage * this.pageSize < this.userslist.length)
        this.currentPage++;
    },
    prevPage: function () {
      if (this.currentPage > 1) this.currentPage--;
    },
    lastPage: function () {
      if (Number.isInteger(this.userslist.length / this.pageSize)) {
        this.currentPage = this.userslist.length / this.pageSize;

      } else {
        this.currentPage = Math.floor(this.userslist.length / this.pageSize) + 1;
      }

    }
  },
  watch: {
    filter() {
      this.currentPage = 1;
    }
  },
  computed: {
    filteredUsers() {
      return this.userslist.filter(c => {
        if(this.filter == '') return true;

        return c.name.toLowerCase().indexOf(this.filter.toLowerCase()) >= 0;
      })
    },
    sortedUsers:function() {
	    return this.filteredUsers.sort((a,b) => {
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
  mounted() {},
}
</script>
