<template>
  <div>
    <div class="flex flex-wrap w-full">
      <div class="flex flex-col w-full xl:w-1/2">
        <div class="flex flex-row flex-wrap xl:flex-nowrap">
          <div class="flex flex-1 p-2 lg:p-4">
            <!-- total contests card -->
            <div class="flex w-full px-3 py-2 border-b-4 border-blue-600 rounded-lg shadow-xl cursor-pointer md:px-5 md:py-4 group hover:border-blue-800 bg-gradient-to-b from-blue-400 to-blue-100"
              @click="filterType = 'all', currentPage = 1">
              <div class="flex flex-row items-center">
                <div class="flex-shrink">
                  <div class="p-1.5 border border-white rounded-full md:p-2 bg-blue-500 group-hover:bg-blue-700 ring ring-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                      <path fill-rule="evenodd" fill="currentColor" d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                    </svg>
                  </div>
                </div>
                <div class="mx-3 md:mx-5">
                  <h4 class="text-lg font-semibold text-gray-900 md:text-2xl">{{ countedContests.all }}</h4>
                  <h3 class="text-gray-800 capitalize whitespace-nowrap">Contests</h3>
                </div>
              </div>
            </div>
            <!-- total contests card -->
          </div>
          <div class="flex flex-1 p-2 lg:p-4">
            <!-- live contests card -->
            <div class="flex w-full px-3 py-2 border-b-4 border-green-600 rounded-lg shadow-xl cursor-pointer md:px-5 md:py-4 group hover:border-green-800 bg-gradient-to-b from-green-400 to-green-100"
              @click="filterType = 'live', currentPage = 1">
              <div class="flex flex-row items-center">
                <div class="flex-shrink">
                  <div class="p-1.5 md:p-2 bg-green-500 border border-white rounded-full group-hover:bg-green-700 ring ring-green-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                      <path fill-rule="evenodd" fill="currentColor" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </div>
                <div class="mx-3 md:mx-5">
                  <h4 class="text-lg font-semibold text-gray-900 md:text-2xl">{{ countedContests.live }}</h4>
                  <h3 class="text-gray-800 capitalize whitespace-nowrap">Live</h3>
                </div>
              </div>
            </div>
            <!-- live contests card -->
          </div>
        </div>
      </div>
      <div class="flex flex-col w-full xl:w-1/2">
        <div class="flex flex-row flex-wrap xl:flex-nowrap">
          <div class="flex flex-1 p-2 lg:p-4">
            <!-- upcoming contests card -->
            <div class="flex w-full px-3 py-2 border-b-4 rounded-lg shadow-xl cursor-pointer border-rose-600 md:px-5 md:py-4 group hover:border-rose-800 bg-gradient-to-b from-rose-400 to-rose-100"
              @click="filterType = 'upcoming', currentPage = 1">
              <div class="flex flex-row items-center">
                <div class="flex-shrink">
                  <div class="p-1.5 md:p-2 bg-rose-500 border border-white rounded-full group-hover:bg-rose-700 ring ring-rose-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                      <path fill-rule="evenodd" fill="currentColor" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </div>
                <div class="mx-3 md:mx-5">
                  <h4 class="text-lg font-semibold text-gray-900 md:text-2xl">{{ countedContests.upcoming }}</h4>
                  <h3 class="text-gray-800 capitalize whitespace-nowrap">Upcoming</h3>
                </div>
              </div>
            </div>
            <!-- upcoming contests card -->
          </div>
          <div class="flex flex-1 p-2 lg:p-4">
            <!-- archived contests card -->
            <div class="flex w-full px-3 py-2 border-b-4 rounded-lg shadow-xl cursor-pointer md:px-5 md:py-4 group border-bluegray-600 hover:border-bluegray-800 bg-gradient-to-b from-bluegray-400 to-bluegray-100"
              @click="filterType = 'archived', currentPage = 1">
              <div class="flex flex-row items-center">
                <div class="flex-shrink">
                  <div class="p-1.5 border border-white rounded-full md:p-2 bg-bluegray-500 group-hover:bg-bluegray-700 ring ring-bluegray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                      <path fill-rule="evenodd" fill="currentColor" d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                      <path fill-rule="evenodd" fill="currentColor" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </div>
                <div class="mx-3 md:mx-5">
                  <h4 class="text-lg font-semibold text-gray-900 md:text-2xl">{{ countedContests.archived }}</h4>
                  <h3 class="text-gray-800 capitalize whitespace-nowrap">Archived</h3>
                </div>
              </div>
            </div>
            <!-- archived contests card -->
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-row w-full mt-8">
      <div class="flex flex-col w-full bg-white border-2 rounded-lg shadow-lg border-bluegray-200">
        <div class="flex flex-col w-full p-4 space-y-4 lg:space-y-0 lg:p-6">
          <div class="flex flex-row justify-center w-full sm:justify-start">
            <pcp-cp-new-contest></pcp-cp-new-contest>
          </div>
          <!-- search box -->
          <div class="flex flex-row justify-center w-full">
            <div class="relative flex flex-row">
              <input type="search" v-model="searchInput" placeholder="Contest Name" @keypress="filterType = 'search'"
                class="block w-full py-1 pl-8 text-sm leading-snug text-gray-600 border rounded-md shadow-md outline-none appearance-none border-bluegray-300 bg-bluegray-200 lg:text-base lg:rounded-lg focus:bg-bluegray-100 focus:border-bluegray-400"/>
              <div class="absolute inset-y-0 left-0 flex items-center px-3 text-gray-300 pointer-events-none">
                <svg class="w-3 h-4 text-gray-400 fill-current lg:w-4 lg:h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                  <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
                </svg>
              </div>
            </div>
          </div>
        </div>
        <!-- users table -->
        <div class="flex flex-row w-full overflow-x-scroll border-t-2 border-bluegray-200 lg:overflow-auto">
          <table class="flex-1 whitespace-nowrap">
            <thead>
              <tr>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('name')">
                  Contest
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('starting_date')">
                  Date
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('status')">
                  Status
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('type')">
                  Type
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('participation')">
                  Participation
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 lg:text-base">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody class="bg-white" v-for="contest in sortedContests" v-bind:key="contest.id">
              <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10">
                      <img class="w-10 h-10 rounded-full"
                        v-bind:src="contest.logo.length < '50' ? '/contests/images/' + contest.logo : contest.logo"/>
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium leading-5 text-gray-900">{{ contest.name }}</div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm leading-5 text-gray-900 capitalize">
                    Start: {{ contest.starting_date }}
                  </div>
                  <div class="text-sm leading-5 text-gray-900 capitalize">
                    End: {{ contest.ending_date }}
                  </div>
                </td>
                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                  <span v-if="contest.status == 0"
                    class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 capitalize bg-orange-100 border-orange-300 rounded-full shadow-md boder whitespace-nowrap">
                    Inactive
                  </span>
                  <span v-else-if="contest.ending_date < timenow"
                    class="inline-flex px-2 text-xs font-semibold leading-5 capitalize border rounded-full shadow-md text-bluegray-800 bg-bluegray-100 border-bluegray-300">
                    Finished
                  </span>
                  <span v-else-if="(contest.starting_date <= timenow) && (contest.ending_date > timenow)"
                    class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 capitalize bg-green-100 border border-green-300 rounded-full shadow-md">
                    Live
                  </span>
                  <span v-else
                    class="inline-flex px-2 text-xs font-semibold leading-5 capitalize border rounded-full shadow-md text-rose-800 bg-rose-100 border-rose-300">
                    Upcoming
                  </span>
                </td>
                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full shadow-md"
                    :class="contest.type === 'private' ? 'text-amber-800 bg-amber-100 border border-amber-300' : 'text-lime-800 bg-lime-100 border border-lime-300'">
                    {{ contest.type }}
                  </span>
                </td>
                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                  <span class="inline-flex px-2 text-xs font-semibold leading-5 rounded-full shadow-md"
                    :class="contest.participation === 'team' ? 'text-indigo-800 bg-indigo-100 border border-indigo-300' : 'text-teal-800 bg-teal-100 border border-teal-300'">
                    {{ contest.participation }}
                  </span>
                </td>
                <td class="px-6 py-4 text-sm font-medium leading-5 text-left border-b border-gray-200">
                  <div class="flex flex-row space-x-2">
                    <!-- Edit Contest -->
                    <div v-if="contest.ending_date > timenow" class="has-tooltip">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 cursor-pointer text-bluegray-400 hover:text-cyan-400"
                        @click="chosenContest(contest)">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                      </svg>
                      <span class="mr-3 tooltip">Edit Contest</span>
                    </div>
                    <div v-else>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 cursor-not-allowed text-bluegray-300">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                      </svg>
                    </div>
                    <!-- /Edit Contest -->
                    <!-- Change Status -->
                    <div class="has-tooltip">
                      <div v-if="contest.status == 0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                          class="w-6 h-6 cursor-pointer text-bluegray-400 hover:text-green-400"
                          @click="showContest(contest , 1)">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                        <span class="mr-5 tooltip">Activate Contest</span>
                      </div>
                      <div v-else>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                          class="w-6 h-6 cursor-pointer text-bluegray-400 hover:text-red-400"
                          @click="showContest(contest , 0)">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span class="mr-5 tooltip">Deactivate Contest</span>
                      </div>
                    </div>
                    <!-- /Change Status -->
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- contests table pagination -->
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
          <p v-if="(this.currentPage+1) <= (Math.ceil(this.countedContests.currentList/ this.pageSize))" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage+1)"> {{this.currentPage+1}}</p>
          <p v-if="(this.currentPage+2) <= (Math.ceil(this.countedContests.currentList/ this.pageSize))" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage+2)"> {{this.currentPage+2}}</p>
          <svg :class="this.currentPage < (Math.ceil(this.countedContests.currentList/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="nextPage"  xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
          <svg :class="this.currentPage < (Math.ceil(this.countedContests.currentList/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="lastPage" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
          </svg>
        </div>
      </div>
      <!-- contest edit vueModal -->
      <Modal v-model="editModal" title="Edit Contest" wrapper-class="modal-wrapper" modal-class="modal">
        <div class="flex flex-col">
          <!-- form -->
          <form method="POST" enctype="multipart/form-data"
            @submit.prevent="creatteam"
            @keydown="editContest.onKeydown($event)">
            <div class="w-full mb-3 space-y-2 text-xs">
              <label class="py-2 font-semibold text-gray-600 ">Contest Name</label>
              <div class="relative flex flex-wrap items-stretch w-full mb-4">
                <div class="flex">
                  <span class="flex items-center justify-center w-12 h-10 px-3 text-xl leading-normal text-white whitespace-no-wrap bg-blue-300 border border-r-0 border-blue-300 rounded-lg rounded-r-none bg-grey-lighter border-1 text-grey-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                  </span>
                </div>
                <input type="text" id="name" name="name" v-model="editContest.name"
                  class="relative flex-auto flex-grow flex-shrink w-px h-10 px-3 leading-normal border border-l-0 rounded-lg rounded-l-none border-grey-light focus:border-blue focus:shadow" placeholder="Contest Name">
                <div v-if="editContest.errors.has('name')" v-html="editContest.errors.get('name')"
                  class="my-3 text-xs text-left text-red-500" />
              </div>
              <div class="flex-auto w-full mb-1 space-y-2 text-xs">
                <label class="py-2 font-semibold text-gray-600">Description</label>
                <textarea v-model="editContest.description" required="" name="description" id="description" class=" min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Contest Desc.." ></textarea>
                <div v-if="editContest.errors.has('description')" v-html="editContest.errors.get('description')"
                  class="my-3 text-xs text-left text-red-500" />
              </div>
              <div class="mb-3 md:space-y-2">
                <label class="py-2 text-xs font-semibold text-gray-600">Contest Logo<abbr class="hidden" title="required">*</abbr></label>
                <div class="flex items-center py-6">
                  <div class="flex-none w-12 h-12 mr-4 overflow-hidden border rounded-xl">
                    <img class="object-cover w-12 h-12 mr-4" :src="editContest.logo.length < '50' ? '/contests/images/' + editContest.logo: editContest.logo" alt="Avatar Upload">
                  </div>
                  <label class="cursor-pointer ">
                    <span class="block w-40 px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100">
                      Browse
                    </span>
                    <input type="file" @change="updateLogo" name="logo" id="logo" class="hidden">
                  </label>
                </div>
                <div v-if="editContest.errors.has('logo')" v-html="editContest.errors.get('logo')"
                  class="my-3 text-xs text-left text-red-500" />
              </div>
              <div class="flex-row w-full text-xs md:flex md:space-x-4">
                <div class="w-full mb-3 space-y-2 text-xs">
                  <label class="py-2 font-semibold text-gray-600">Starting Date</label>
                  <input id="startingtime" name="startingtime" type="datetime-local"
                    v-model="editContest.startingtime"
                    class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" />
                  <div v-if="editContest.errors.has('startingtime')" v-html="editContest.errors.get('startingtime')"
                    class="my-3 text-xs text-left text-red-500" />
                </div>
                <div class="w-full mb-3 space-y-2 text-xs">
                  <label class="py-2 font-semibold text-gray-600">Finish Date</label>
                  <input id="endingtime" name="endingtime" type="datetime-local"
                    v-model="editContest.endingtime"
                    class="block w-full h-10 px-4 border rounded-lg appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" />
                  <div v-if="editContest.errors.has('endingtime')" v-html="editContest.errors.get('endingtime')"
                    class="my-3 text-xs text-left text-red-500" />
                </div>
              </div>
              <div class="flex-row w-full text-xs md:flex md:space-x-4">
                <div class="w-full mb-3 space-y-2 text-xs">
                  <label class="py-2 font-semibold text-gray-600">Make the contest private?</label>
                  <div class="relative w-12 h-6 transition duration-200 ease-linear bg-opacity-50 rounded-full shadow-inner ring-1 ring-gray-400 ring-opacity-50"
                    :class="[editContest.private === '1' ? 'bg-green-400 ring-green-400' : 'bg-gray-400']">
                    <label for="private"
                      class="absolute left-0 w-6 h-6 mb-2 transition duration-100 ease-linear transform bg-white border-2 border-opacity-50 rounded-full cursor-pointer"
                      :class="editContest.private === '1' ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400'"></label>
                    <input type="checkbox" id="private" name="private" :checked="editContest.private === '1'"
                      class="w-full h-full appearance-none active:outline-none focus:outline-none"
                      @click="editContest.private === '0' ? editContest.private = '1' : editContest.private = '0'"/>
                  </div>
                  <div v-if="editContest.errors.has('private')" v-html="editContest.errors.get('private')"
                    class="my-3 text-xs text-left text-red-500" />
                </div>
                <div class="w-full mb-3 space-y-2 text-xs">
                  <label class="py-2 font-semibold text-gray-600">Make the contest team?</label>
                  <div class="relative w-12 h-6 transition duration-200 ease-linear bg-opacity-50 rounded-full shadow-inner ring-1 ring-gray-400 ring-opacity-50"
                    :class="[editContest.team === '1' ? 'bg-green-400 ring-green-400' : 'bg-gray-400']">
                    <label for="team"
                      class="absolute left-0 w-6 h-6 mb-2 transition duration-100 ease-linear transform bg-white border-2 border-opacity-50 rounded-full cursor-pointer"
                      :class="editContest.team === '1' ? 'translate-x-full border-green-400' : 'translate-x-0 border-gray-400'"></label>
                    <input type="checkbox" id="team" name="team" :checked="editContest.team === '1'"
                      class="w-full h-full appearance-none active:outline-none focus:outline-none"
                      @click="editContest.team === '0' ? editContest.team = '1' : editContest.team= '0'"/>
                  </div>
                  <div v-if="editContest.errors.has('team')" v-html="editContest.errors.get('team')"
                    class="my-3 text-xs text-left text-red-500" />
                </div>
              </div>
              <div class="flex-auto w-full mb-1 space-y-2 text-xs">
                <label @click="customizeEditModal = true" class="block w-40 px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100">More Customize</label>
              </div>
              <div v-if="editContest.errors.has('condition')" v-html="editContest.errors.get('condition')"
                class="my-3 text-xs text-left text-red-500" />
              <div v-if="editContest.errors.has('prize')" v-html="editContest.errors.get('prize')"
                class="my-3 text-xs text-left text-red-500" />
              <div v-if="editContest.errors.has('profile')" v-html="editContest.errors.get('profile')"
                class="my-3 text-xs text-left text-red-500" />
            </div>
          </form>
          <!-- /end form -->
          <div class="flex flex-row self-end">
            <button type="button" @click="editModal = false"
              class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
              Close
            </button>
            <button type="button" @click="editcontest" :disabled="editContest.busy"
              class="disabled:opacity-50 px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
              Edit
            </button>
          </div>
        </div>
      </Modal>
      <!-- /contest edit vueModal -->
      <!-- contest custom options vueModal -->
      <Modal v-model="customizeEditModal" title="More Customize" wrapper-class="modal-wrapper" modal-class="modal">
        <div class="flex flex-col">
          <!-- form -->
          <div class="flex-auto w-full mb-1 space-y-2 text-xs">
            <label class="py-2 font-semibold text-gray-600">Condition</label>
            <textarea v-model="editContest.conditions" name="condition" id="condition" class=" min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Condition" />
          </div>
          <div class="flex-auto w-full mb-1 space-y-2 text-xs">
            <label class="py-2 font-semibold text-gray-600">Prize</label>
            <textarea v-model="editContest.prize" name="prize" id="prize" class=" min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="prize" />
          </div>
          <div class="flex-auto w-full mb-1 space-y-2 text-xs">
            <label class="py-2 font-semibold text-gray-600">Profile Background</label>
            <label class="cursor-pointer ">
              <span class="block w-40 px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100">
                Browse
              </span>
              <input type="file" @change="updateProfile" name="profile" id="profile" class="hidden">
            </label>
            <div class="flex-none w-full h-48 mr-4 overflow-hidden border rounded-xl">
              <img class="object-cover w-full h-48 mr-4" :src="editContest.profile" alt="profile">
            </div>
          </div>
          <!-- /end form -->
          <div class="flex flex-row self-end">
            <button type="button" @click="clearCustomiz"
              class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
              Cancel
            </button>
            <button type="button" @click="customizeEditModal = false"
              class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
              Save
            </button>
          </div>
        </div>
      </Modal>
      <!-- /contest custom options vueModal -->
    </div>
  </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

export default {
  props: [
    'contests',
    'time'
  ],
  data: function () {
    return {
      /* contests list */
      contestsList: JSON.parse(this.contests),
      /* time now */
      timenow: this.time,
      /* contests list counter */
      countedContests: {
        all: 0,
        live: 0,
        upcoming: 0,
        archived: 0,
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
      /* current contests list filter {default:all} */
      filterType: 'all',
      /* vueModals trigers */
      editModal: false,
      customizeEditModal: false,
      /* temporary data variables */
      tempConditions: '',
      tempPrize: '',
      tempProfile: '',
      /* contest edit vForm */
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
      /* contest status vForm */
      active: new Form({
        status: '',
        id: ''
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
      if (this.currentPage * this.pageSize < this.countedContests.currentList)
        this.currentPage++;
    },
    prevPage: function () {
      if (this.currentPage > 1) this.currentPage--;
    },
    lastPage: function () {
      if (Number.isInteger(this.countedContests.currentList / this.pageSize)) {
        this.currentPage = this.countedContests.currentList / this.pageSize;

      } else {
        this.currentPage = Math.floor(this.countedContests.currentList / this.pageSize) + 1;
      }
    },
    /* update contest logo */
    updateLogo(e){
      let file = e.target.files[0];
      let reader = new FileReader();
      let limit = 1024 * 1024 * 2;

      if (file['size'] > limit) {
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
    /* update contest profile */
    updateProfile(e){
      let file = e.target.files[0];
      let reader = new FileReader();
      let limit = 1024 * 1024 * 2;

      if (file['size'] > limit) {
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
    /* clear contest custom data */
    clearCustomiz(){
      this.editContest.conditions= this.tempConditions;
      this.editContest.prize =  this.tempPrize;
      this.editContest.profile = this.tempProfile ;
      this.customizeEditModal =false;
    },
    /* selected contest */
    chosenContest(contest){
      this.editContest.contest = contest.id
      this.editContest.name = contest.name
      this.editContest.description = contest.description
      this.editContest.startingtime = contest.starting_date.replace(/ /g,"T")
      this.editContest.endingtime = contest.ending_date.replace(/ /g,"T")

      if (contest.type == 'public')
        this.editContest.private = '0'
      else
        this.editContest.private = '1'

      if (contest.participation == 'solo')
        this.editContest.team = '0'
      else
        this.editContest.team = '1'

      this.editContest.conditions = contest.conditions
      this.editContest.prize = contest.prizes
      this.editContest.profile = '/contests/profile/' + contest.profile
      this.editContest.logo = contest.logo
      this.tempConditions = contest.conditions
      this.tempPrize = contest.prizes
      this.tempProfile = '/contests/profile/' + contest.profile
      this.editModal =true;
    },
    /* contest status vueModal vForm POST */
    async showContest(contest , e){
      var messgae;
      var buttontext;
      var buttoncolor;

      if (e == 1) {
        messgae = "Do you want to show " + contest.name + " ?"
        buttontext = 'Show';
        buttoncolor = '#90EE90';
      } else {
        messgae = "Do you want to hide " + contest.name + " ?";
        buttontext = 'Hide';
        buttoncolor = '#EC7063';
      }

      toast.fire({
        title: messgae,
        type: "warning",
        showCancelButton: true,
        confirmButtonText: buttontext,
        confirmButtonColor: buttoncolor,
      }).then((result) => {
        if (result.isConfirmed) {
          var i;
          for(i = 0 ; i < this.contestsList.length ; i++)
          {
            if(contest.id == this.contestsList[i].id)
            this.contestsList[i].status = e
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
    /* contest edit vueModal vForm POST */
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

          for (let i = 0 ; i < this.contestsList.length ; i++) {
            if (this.editContest.contest == this.contestsList[i].id) {
              this.contestsList[i].conditions = this.editContest.conditions
              this.contestsList[i].description = this.editContest.description
              this.contestsList[i].ending_date = this.editContest.endingtime
              this.contestsList[i].logo = this.editContest.logo
              this.contestsList[i].name = this.editContest.name
              this.contestsList[i].prizes = this.editContest.prize
              this.contestsList[i].profile = this.editContest.profile.text().trim('/contests/profile/')
              this.contestsList[i].starting_date = this.editContest.startingtime
              if(this.editContest.private == 1)
                this.contestsList[i].type = 'private'
              else
                this.contestsList[i].type = 'public'
              if(this.editContest.team == 1)
                this.contestsList[i].participation = 'team'
              else
                this.contestsList[i].participation = 'solo'
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
  },
  watch: {
    searchInput() {
      this.currentPage = 1;
    },
  },
  computed: {
    /* users list counter */
    countContests: function () {
      /* all users */
      this.countedContests.all = this.contestsList.length;
      /* only live contests */
      this.countedContests.live = this.contestsList.filter(contest => {
        return ((contest.starting_date <= this.timenow) && (contest.ending_date > this.timenow));
      }).length;
      /* only upcoming contests */
      this.countedContests.upcoming = this.contestsList.filter(contest => {
        return ((contest.starting_date > this.timenow) && (contest.status == 1));
      }).length;
      /* only archived contests */
      this.countedContests.archived = this.contestsList.filter(contest => {
        return (contest.ending_date < this.timenow);
      }).length;
      /* only filtered contests */
      this.countedContests.currentList = this.filteredContests.length;
    },
    /* users list filter */
    filteredContests () {
      return this.contestsList.filter(contest => {
        /* search filter */
        if (this.filterType === 'search') {
          if(this.searchInput == '') {
            return true;
          } else {
            return contest.name.toLowerCase().indexOf(this.searchInput.toLowerCase()) >= 0;
          }
        }
        /* all contests */
        if (this.filterType === 'all') {
          return true;
        }
        /* live contests filter */
        if (this.filterType === 'live') {
            return ((contest.starting_date <= this.timenow) && (contest.ending_date > this.timenow));
        }
        /* upcoming contests filter */
        if (this.filterType === 'upcoming') {
          return ((contest.starting_date > this.timenow) && (contest.status == 1));
        }
        /* sarchived contest filter */
        if (this.filterType === 'archived') {
          return (contest.ending_date < this.timenow);
        }
      })
    },
    /* contests list sorter */
    sortedContests: function () {
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
    },
  },
  /* do after mount */
  mounted() {
    this.countContests
  },
  /* do after update */
  updated() {
    this.countContests
  },
}
</script>
