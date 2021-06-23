<template>
  <div>
    <div class="flex flex-wrap w-full">
      <div class="flex flex-col w-full xl:w-1/2">
        <div class="flex flex-row flex-wrap xl:flex-nowrap">
          <div class="flex flex-1 p-2 lg:p-4">
            <!-- total users card -->
            <div class="flex w-full px-3 py-2 border-b-4 rounded-lg shadow-xl cursor-pointer md:px-5 md:py-4 group border-bluegray-600 hover:border-bluegray-800 bg-gradient-to-b from-bluegray-400 to-bluegray-100"
              @click="filterType = 'all', currentPage = 1">
              <div class="flex flex-row items-center">
                <div class="flex-shrink">
                  <div class="p-1.5 border border-white rounded-full md:p-2 bg-bluegray-500 group-hover:bg-bluegray-700 ring ring-bluegray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                      <path fill="currentColor" d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                    </svg>
                  </div>
                </div>
                <div class="mx-3 md:mx-5">
                  <h4 class="text-lg font-semibold text-gray-900 md:text-2xl">{{ countedUsers.all }}</h4>
                  <h3 class="text-gray-800 whitespace-nowrap">Users</h3>
                </div>
              </div>
            </div>
            <!-- /total users card -->
          </div>
          <div class="flex flex-1 p-2 lg:p-4">
            <!-- managers card -->
            <div class="flex w-full px-3 py-2 border-b-4 border-indigo-600 rounded-lg shadow-xl cursor-pointer md:px-5 md:py-4 group hover:border-indigo-800 bg-gradient-to-b from-indigo-400 to-indigo-100"
              @click="filterType = 'managers', currentPage = 1">
              <div class="flex flex-row items-center">
                <div class="flex-shrink">
                  <div class="p-1.5 md:p-2 bg-indigo-500 border border-white rounded-full group-hover:bg-indigo-700 ring ring-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                      <path fill-rule="evenodd" fill="currentColor" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                      <path fill="currentColor" d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                    </svg>
                  </div>
                </div>
                <div class="mx-3 md:mx-5">
                  <h4 class="text-lg font-semibold text-gray-900 md:text-2xl">{{ countedUsers.managers }}</h4>
                  <h3 class="text-gray-800 whitespace-nowrap">Managers</h3>
                </div>
              </div>
            </div>
            <!-- /managers card -->
          </div>
        </div>
      </div>
      <div class="flex flex-col w-full xl:w-1/2">
        <div class="flex flex-row flex-wrap xl:flex-nowrap">
          <div class="flex flex-1 p-2 lg:p-4">
            <!-- non-verified users card -->
            <div class="flex w-full px-3 py-2 border-b-4 border-orange-600 rounded-lg shadow-xl cursor-pointer md:px-5 md:py-4 group hover:border-orange-800 bg-gradient-to-b from-orange-400 to-orange-100"
              @click="filterType = 'nonVerified', currentPage = 1">
              <div class="flex flex-row items-center">
                <div class="flex-shrink">
                  <div class="p-1.5 md:p-2 bg-orange-500 border border-white rounded-full group-hover:bg-orange-700 ring ring-orange-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                      <path fill-rule="evenodd" fill="currentColor" d="M6.625 2.655A9 9 0 0119 11a1 1 0 11-2 0 7 7 0 00-9.625-6.492 1 1 0 11-.75-1.853zM4.662 4.959A1 1 0 014.75 6.37 6.97 6.97 0 003 11a1 1 0 11-2 0 8.97 8.97 0 012.25-5.953 1 1 0 011.412-.088z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" fill="currentColor" d="M5 11a5 5 0 1110 0 1 1 0 11-2 0 3 3 0 10-6 0c0 1.677-.345 3.276-.968 4.729a1 1 0 11-1.838-.789A9.964 9.964 0 005 11zm8.921 2.012a1 1 0 01.831 1.145 19.86 19.86 0 01-.545 2.436 1 1 0 11-1.92-.558c.207-.713.371-1.445.49-2.192a1 1 0 011.144-.83z" clip-rule="evenodd" />
                      <path fill-rule="evenodd" fill="currentColor" d="M10 10a1 1 0 011 1c0 2.236-.46 4.368-1.29 6.304a1 1 0 01-1.838-.789A13.952 13.952 0 009 11a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </div>
                <div class="mx-3 md:mx-5">
                  <h4 class="text-lg font-semibold text-gray-900 md:text-2xl">{{ countedUsers.nonVerified }}</h4>
                  <h3 class="text-gray-800 whitespace-nowrap">Non-Verified</h3>
                </div>
              </div>
            </div>
            <!-- /non-verified users card -->
          </div>
          <div class="flex flex-1 p-2 lg:p-4">
            <!-- suspended users card -->
            <div class="flex w-full px-3 py-2 border-b-4 border-red-600 rounded-lg shadow-xl cursor-pointer md:px-5 md:py-4 group hover:border-red-800 bg-gradient-to-b from-red-400 to-red-100"
              @click="filterType = 'suspended', currentPage = 1">
              <div class="flex flex-row items-center">
                <div class="flex-shrink">
                  <div class="p-1.5 md:p-2 bg-red-500 border border-white rounded-full group-hover:bg-red-700 ring ring-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                      <path fill-rule="evenodd" fill="currentColor" d="M13.477 14.89A6 6 0 015.11 6.524l8.367 8.368zm1.414-1.414L6.524 5.11a6 6 0 018.367 8.367zM18 10a8 8 0 11-16 0 8 8 0 0116 0z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </div>
                <div class="mx-3 md:mx-5">
                  <h4 class="text-lg font-semibold text-gray-900 md:text-2xl">{{ countedUsers.suspended }}</h4>
                  <h3 class="text-gray-800 whitespace-nowrap">Suspended</h3>
                </div>
              </div>
            </div>
            <!-- /suspended users card -->
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-row w-full mt-8">
      <div class="flex flex-col w-full bg-white border-2 rounded-lg shadow-lg border-bluegray-200">
        <!-- search box -->
        <div class="flex flex-row justify-center flex-shrink-0 w-full my-4 lg:my-6">
          <div class="relative flex flex-row">
            <input type="search" v-model="searchInput" placeholder="User Email" @keypress="filterType = 'search'"
              class="block w-full py-1 pl-8 text-sm leading-snug text-gray-600 border rounded-md shadow-md outline-none appearance-none border-bluegray-300 bg-bluegray-200 lg:text-base lg:rounded-lg focus:bg-bluegray-100 focus:border-bluegray-400"/>
            <div class="absolute inset-y-0 left-0 flex items-center px-3 text-gray-300 pointer-events-none">
              <svg class="w-3 h-4 text-gray-400 fill-current lg:w-4 lg:h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
              </svg>
            </div>
          </div>
        </div>
        <!-- users table -->
        <div class="flex flex-row w-full overflow-x-scroll border-t-2 border-bluegray-200 lg:overflow-auto">
          <table class="flex-1 whitespace-nowrap">
            <thead>
              <tr>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('username')">
                  Name
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('email')">
                  Email
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('is_verified')">
                  Verification / Status
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('role')">
                  Role
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 lg:text-base">
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
                  <span v-if="user.is_verified == 1" class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 border border-green-300 rounded-full shadow-md">
                    Verified
                  </span>
                  <span v-else class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 border-orange-300 rounded-full shadow-md boder whitespace-nowrap">
                    Non-Verified
                  </span>
                  /
                  <span v-if="user.status == 1" class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 border border-green-300 rounded-full shadow-md">
                    Active
                  </span>
                  <span v-else class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 border border-red-300 rounded-full shadow-md">
                    Suspended
                  </span>
                </td>
                <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                  <span v-if="user.role === 'admin'" class="inline-flex px-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 border border-yellow-300 rounded-full shadow-md">
                    Admin
                  </span>
                  <span v-else-if="user.role === 'manager'" class="inline-flex px-2 text-xs font-semibold leading-5 text-indigo-800 bg-indigo-100 border border-indigo-300 rounded-full shadow-md">
                    Manager
                  </span>
                  <span v-else class="inline-flex px-2 text-xs font-semibold leading-5 border rounded-full shadow-md border-bluegray-300 text-bluegray-800 bg-bluegray-100">
                    User
                  </span>
                </td>
                <td class="px-6 py-4 text-sm font-medium leading-5 text-left border-b border-gray-200">
                  <div v-if="user.role !== 'admin' && user.is_verified == 1" class="flex flex-col space-y-1 md:flex-row md:space-x-2 md:space-y-0">
                    <!-- Change Role -->
                    <div class="has-tooltip">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 cursor-pointer text-bluegray-400 hover:text-cyan-600 has-tooltip"
                        @click="vModals.target = user, roleForm.targetUser = 0, roleForm.userRole = '', vModals.roleVM = true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                      </svg>
                      <span class="mr-4 tooltip">Change role</span>
                    </div>
                    <!-- Change Status -->
                    <div class="has-tooltip">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 cursor-pointer text-bluegray-400 has-tooltip"
                        :class="user.status == 1 ? 'hover:text-red-600' : 'hover:text-green-600'"
                        @click="vModals.target = user, statusForm.targetUser = 0, statusForm.userStatus = user.status, vModals.statusVM = true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                      </svg>
                      <span class="mr-3 tooltip">Change status</span>
                    </div>
                    <!-- Reset Password -->
                    <div class="has-tooltip">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 cursor-pointer text-bluegray-400 hover:text-amber-600 has-tooltip"
                        @click="vModals.target = user, restpassForm.targetUser = 0, restpassForm.userPassword = '', restpassForm.userPassword_confirmation = '', vModals.restpassVM = true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                      </svg>
                      <span class="mr-3 tooltip">Reset password</span>
                    </div>
                  </div>
                  <div v-else class="flex flex-col space-y-1 md:flex-row md:space-x-2 md:space-y-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                      class="w-6 h-6 cursor-not-allowed text-bluegray-300">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                      class="w-6 h-6 cursor-not-allowed text-bluegray-300">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                      class="w-6 h-6 cursor-not-allowed text-bluegray-300">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- users table pagination -->
        <div id="pagination" class="flex flex-row justify-center w-full px-4 py-2 bg-gray-100 rounded-b-md">
          <svg @click="firstPage"  :class="this.currentPage != 1 ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
          </svg>
          <svg :class="this.currentPage != 1 ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="prevPage" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
          </svg>
          <p v-if="(this.currentPage-2) > 0" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage-2)"> {{this.currentPage-2}}</p>
          <p v-if="(this.currentPage-1) > 0" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage-1)"> {{this.currentPage-1}}</p>
          <p class="mx-2 text-sm leading-relaxed text-blue-600 cursor-pointer"> {{this.currentPage}} </p>
          <p v-if="(this.currentPage+1) <= (Math.ceil(this.countedUsers.currentList/ this.pageSize))" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage+1)"> {{this.currentPage+1}}</p>
          <p v-if="(this.currentPage+2) <= (Math.ceil(this.countedUsers.currentList/ this.pageSize))" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage+2)"> {{this.currentPage+2}}</p>
          <svg :class="this.currentPage < (Math.ceil(this.countedUsers.currentList/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="nextPage"  xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
          <svg :class="this.currentPage < (Math.ceil(this.countedUsers.currentList/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="lastPage" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
          </svg>
        </div>
      </div>
      <!-- user role vueModal -->
      <Modal v-model="vModals.roleVM" title="Change User Role">
        <div class="flex flex-col">
          <div class="flex flex-row self-center w-full">
            <div class="flex flex-col items-center w-full">
              <div class="flex flex-col items-center w-5/6 px-4 py-2 border-2 border-gray-200 rounded-md shadow-md bg-bluegray-50 hover:shadow-lg">
                <div class="flex-shrink-0 w-10 h-10 mb-2">
                  <img class="w-10 h-10 rounded-full"
                    v-bind:src="'/images/avatar/'+vModals.target.avatar"
                    v-bind:alt="'/images/avatar/avatar.png'">
                </div>
                <div class="text-sm text-center text-gray-900">
                  {{ vModals.target.username }}
                  <br>
                  {{ vModals.target.email }}
                </div>
                <span v-if="vModals.target.role === 'admin'" class="inline-flex px-2 mt-2 text-xs font-semibold leading-5 text-yellow-800 bg-yellow-100 border border-yellow-300 rounded-full shadow-md">
                  Admin
                </span>
                <span v-else-if="vModals.target.role === 'manager'" class="inline-flex px-2 mt-2 text-xs font-semibold leading-5 text-indigo-800 bg-indigo-100 border border-indigo-300 rounded-full shadow-md">
                  Manager
                </span>
                <span v-else class="inline-flex px-2 mt-2 text-xs font-semibold leading-5 border rounded-full shadow-md border-bluegray-300 text-bluegray-800 bg-bluegray-100">
                  User
                </span>
              </div>
              <form method="POST" enctype="multipart/form-data" @submit.prevent="changeRole" @keydown="roleForm.onKeydown($event)"
                class="flex flex-row justify-center w-full my-6">
                <p class="self-center mr-4 font-semibold text-center text-gray-700">Role</p>
                <select id="userRole" name="userRole" v-model="roleForm.userRole" class="w-3/5 h-8 border-2 border-gray-300 rounded-md">
                  <option value="user">User</option>
                  <option value="manager">Manager</option>
                  <option value="admin">Admin</option>
                </select>
                <div v-if="roleForm.errors.has('userRole')" v-html="form.errors.get('userRole')" class="text-red-500"/>
              </form>
            </div>
          </div>
          <div class="flex flex-row justify-end w-full pt-4 border-t-2">
            <button type="button" @click="vModals.roleVM = false"
              class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
              Close
            </button>
            <button type="button" @click="changeRole" :disabled="roleForm.busy"
              class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
              Apply
            </button>
          </div>
        </div>
      </Modal>
      <!-- user status vueModal -->
      <Modal v-model="vModals.statusVM" title="Change User Status">
        <div class="flex flex-col">
          <div class="flex flex-row self-center w-full">
            <div class="flex flex-col items-center w-full">
              <div class="flex flex-col items-center w-5/6 px-4 py-2 border-2 border-gray-200 rounded-md shadow-md bg-bluegray-50 hover:shadow-lg">
                <div class="flex-shrink-0 w-10 h-10 mb-2">
                  <img class="w-10 h-10 rounded-full"
                    v-bind:src="'/images/avatar/'+vModals.target.avatar"
                    v-bind:alt="'/images/avatar/avatar.png'">
                </div>
                <div class="text-sm text-center text-gray-900">
                  {{ vModals.target.username }}
                  <br>
                  {{ vModals.target.email }}
                </div>
                <span v-if="vModals.target.status == 1" class="inline-flex px-2 mt-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 border border-green-300 rounded-full shadow-md">
                  Active
                </span>
                <span v-else class="inline-flex px-2 mt-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 border border-red-300 rounded-full shadow-md">
                  Suspended
                </span>
              </div>
              <div class="flex flex-row my-6">
                <span class="self-end mr-4 text-sm font-semibold"
                  :class="statusForm.userStatus == 0 ? 'text-red-700' : 'text-black'">Suspended</span>
                <div class="relative w-12 h-6 transition duration-200 ease-linear bg-opacity-50 rounded-full shadow-inner ring-1 ring-red-400 ring-opacity-50"
                  :class="statusForm.userStatus == 1 ? 'bg-green-400 ring-green-400' : 'bg-red-400'">
                  <label for="toggle"
                    class="absolute left-0 w-6 h-6 mb-2 transition duration-100 ease-linear transform bg-white border-2 border-opacity-50 rounded-full cursor-pointer"
                    :class="statusForm.userStatus == 1 ? 'translate-x-full border-green-400' : 'translate-x-0 border-red-400'"></label>
                  <input type="checkbox" id="toggle" name="toggle"
                    class="w-full h-full appearance-none active:outline-none focus:outline-none"
                    @click="statusForm.userStatus == 0 ? statusForm.userStatus = 1 : statusForm.userStatus = 0"/>
                </div>
                <span class="self-end ml-4 text-sm font-semibold"
                  :class="statusForm.userStatus == 1 ? 'text-green-700' : 'text-black'">Active</span>
              </div>
            </div>
          </div>
          <div class="flex flex-row justify-end w-full pt-4 border-t-2">
            <button type="button" @click="vModals.statusVM = false"
              class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
              Close
            </button>
            <button type="button" @click="changeStatus" :disabled="statusForm.busy"
              class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
              Apply
            </button>
          </div>
        </div>
      </Modal>
      <!-- user restpass vueModal -->
      <Modal v-model="vModals.restpassVM" title="Reset User Password">
        <div class="flex flex-col">
          <div class="flex flex-row self-center w-full">
            <div class="flex flex-col items-center w-full">
              <div class="flex flex-col items-center w-5/6 px-4 py-2 border-2 border-gray-200 rounded-md shadow-md bg-bluegray-50 hover:shadow-lg">
                <div class="flex-shrink-0 w-10 h-10 mb-2">
                  <img class="w-10 h-10 rounded-full"
                    v-bind:src="'/images/avatar/'+vModals.target.avatar"
                    v-bind:alt="'/images/avatar/avatar.png'">
                </div>
                <div class="text-sm text-center text-gray-900">
                  {{ vModals.target.username }}
                  <br>
                  {{ vModals.target.email }}
                </div>
              </div>
              <form method="POST" enctype="multipart/form-data" @submit.prevent="restPass" @keydown="restpassForm.onKeydown($event)"
                class="flex flex-row justify-center w-4/6 my-6">
                <div class="flex flex-col items-center w-full space-y-2">
                  <input id="userPassword" name="userPassword" :type="!vModals.showPass ? 'password' : 'text'" autocomplete="new-password" placeholder="new password"
                    v-model="restpassForm.userPassword"
                    class="block w-full px-3 py-1 leading-5 text-gray-700 placeholder-gray-500 border-2 rounded-md appearance-none bg-bluegray-100 border-bluegray-400 focus:outline-none focus:ring-2 focus:ring-bluegray-300 focus:placeholder-opacity-30 focus:shadow-inner"/>
                  <input id="userPassword_confirmation" name="userPassword_confirmation" :type="!vModals.showPass ? 'password' : 'text'" autocomplete="new-password" placeholder="confirm password"
                    v-model="restpassForm.userPassword_confirmation"
                    class="block w-full px-3 py-1 leading-5 text-gray-700 placeholder-gray-500 border-2 rounded-md appearance-none bg-bluegray-100 border-bluegray-400 focus:outline-none focus:ring-2 focus:ring-bluegray-300 focus:placeholder-opacity-30 focus:shadow-inner"/>
                  <div v-if="restpassForm.errors.has('userPassword')" v-html="restpassForm.errors.get('userPassword')" class="text-red-500"/>
                </div>
                <div class="flex flex-col p-2 pl-4 place-content-center">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    @click="vModals.showPass = true"
                    class="w-6 h-6 text-bluegray-400 hover:text-green-400" :class="{'hidden': vModals.showPass}">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    @click="vModals.showPass = false"
                    class="w-6 h-6 text-bluegray-400 hover:text-red-400" :class="{'hidden': !vModals.showPass}">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                  </svg>
                </div>
              </form>
            </div>
          </div>
          <div class="flex flex-row justify-end w-full pt-4 border-t-2">
            <button type="button" @click="vModals.restpassVM = false"
              class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
              Close
            </button>
            <button type="button" @click="restPass" :disabled="restpassForm.busy"
              class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
              Apply
            </button>
          </div>
        </div>
      </Modal>
    </div>
  </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

export default {
  props: [
    'users'
  ],
  data: function () {
    return {
      /* users list */
      userslist: JSON.parse(this.users),
      /* users list counter */
      countedUsers: {
        all: 0,
        managers: 0,
        nonVerified: 0,
        suspended: 0,
        /* current filtered users list */
        currentList: 0,
      },
      /* sorting */
      currentSort: "name",
      currentSortDir: "asc",
      /* pagination */
      pageSize: 10,
      currentPage: 1,
      countpage: 0,
      /* search */
      searchInput:'',
      /* current users list filter {default:all} */
      filterType: 'all',
      /* vueModals */
      vModals: {
        /* vueModal target user */
        target: 0,
        /* password <-> text */
        showPass: false,
        /* vueModals trigers */
        roleVM: false,
        statusVM: false,
        restpassVM:false,
      },
      /* role form data */
      roleForm: new Form ({
        targetUser: 0,
        userRole: '',
      }),
      /* status form data */
      statusForm: new Form ({
        targetUser: 0,
        userStatus: 0,
      }),
      /* restpass form data */
      restpassForm: new Form ({
        targetUser: 0,
        userPassword: '',
        userPassword_confirmation: '',
      }),
    };
  },
  methods: {
    /* sorting direction */
    sort: function (s) {
      if (s === this.currentSort) {
        this.currentSortDir = this.currentSortDir === "asc" ? "desc" : "asc";
      }
      this.currentSort = s;
    },
    /* pagination */
    OpenPage: function (page) {
      this.currentPage = page
    },
    firstPage: function () {
      this.currentPage = 1;
    },
    nextPage: function () {
      if (this.currentPage * this.pageSize < this.countedUsers.currentList)
        this.currentPage++;
    },
    prevPage: function () {
      if (this.currentPage > 1) this.currentPage--;
    },
    lastPage: function () {
      if (Number.isInteger(this.countedUsers.currentList / this.pageSize)) {
        this.currentPage = this.countedUsers.currentList / this.pageSize;

      } else {
        this.currentPage = Math.floor(this.countedUsers.currentList / this.pageSize) + 1;
      }
    },
    /* role vueModal vForm POST */
    async changeRole() {
      this.roleForm.targetUser = this.vModals.target.id;
      const response = await this.roleForm
        .post('/controlpanel/authentication/users/role')
        .then(({ data }) => {
          if (data.status == 200) {
            this.vModals.roleVM = false;
            toast.fire({
              icon: "success",
              title: data.description,
              showConfirmButton: false,
              timer: 3000,
            });
            this.sortedUsers[this.sortedUsers.indexOf(this.vModals.target)].role = this.roleForm.userRole;
          } else {
            toast.fire({
              icon: "error",
              title: "Oops...",
              text: data.description,
            });
          }
        })
        .catch(error => {
          toast.fire({
            icon: "error",
            title: "Oops...",
            text: 'Something went wrong!!',
          });
        });
    },
    /* status vueModal vForm POST */
    async changeStatus() {
      this.statusForm.targetUser = this.vModals.target.id;
       const response = await this.statusForm
        .post('/controlpanel/authentication/users/status')
        .then(({ data }) => {
          if (data.status == 200) {
            this.vModals.statusVM = false;
            toast.fire({
              icon: "success",
              title: data.description,
              showConfirmButton: false,
              timer: 3000,
            });
            this.sortedUsers[this.sortedUsers.indexOf(this.vModals.target)].status = this.statusForm.userStatus;
          } else {
            toast.fire({
              icon: "error",
              title: "Oops...",
              text: data.description,
            });
          }
        })
        .catch(error => {
          toast.fire({
            icon: "error",
            title: "Oops...",
            text: 'Something went wrong!!',
          });
        });
    },
    /* restspass vueModal vForm POST */
    async restPass() {
      this.restpassForm.targetUser = this.vModals.target.id;
      const response = await this.restpassForm
        .post('/controlpanel/authentication/users/restpass')
        .then(({ data }) => {
          if (data.status == 200) {
            this.vModals.restpasVM = false;
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
          toast.fire({
            icon: "error",
            title: "Oops...",
            text: 'Something went wrong!!',
          });
        });
    },
  },
  watch: {
    searchInput() {
      this.currentPage = 1;
    },
  },
  computed: {
    /* users list counter */
    countUsers: function () {
      /* all users */
      this.countedUsers.all = this.userslist.length;
      /* only managers */
      this.countedUsers.managers = this.userslist.filter(user => {
        return (user.role === 'manager');
      }).length;
      /* only non-verified users */
      this.countedUsers.nonVerified = this.userslist.filter(user => {
        return (user.is_verified == 0);
      }).length;
      /* only suspended users */
      this.countedUsers.suspended = this.userslist.filter(user => {
        return (user.is_verified == 1 && user.status == 0);
      }).length;
      /* only filtered users */
      this.countedUsers.currentList = this.filteredUsers.length;
    },
    /* users list filter */
    filteredUsers () {
      return this.userslist.filter(user => {
        /* search filter */
        if (this.filterType === 'search') {
          if(this.searchInput == '') {
            return true;
          } else {
            return user.email.toLowerCase().indexOf(this.searchInput.toLowerCase()) >= 0;
          }
        }
        /* all users */
        if (this.filterType === 'all') {
          return true;
        }
        /* managers filter */
        if (this.filterType === 'managers') {
            return (user.role === 'manager');
        }
        /* non-verified users filter */
        if (this.filterType === 'nonVerified') {
          return (user.is_verified == 0);
        }
        /* suspended users filter */
        if (this.filterType === 'suspended') {
          return (user.is_verified == 1 && user.status == 0);
        }
      })
    },
    /* users list sorter */
    sortedUsers: function () {
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
    },
  },
  /* do after mount */
  mounted() {
    this.countUsers
  },
  /* do after update */
  updated() {
    this.countUsers
  },
}
</script>
