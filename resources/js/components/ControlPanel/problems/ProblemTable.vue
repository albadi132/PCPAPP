<template>
  <div>
    <div class="flex flex-wrap w-full">
      <div class="flex flex-col w-full 2xl:w-1/2">
        <div class="flex flex-row flex-wrap 2xl:flex-nowrap">
          <div class="flex flex-1 p-2 lg:p-4">
            <!-- total problems card -->
            <div class="flex w-full px-3 py-2 border-b-4 rounded-lg shadow-xl cursor-pointer md:px-5 md:py-4 group border-bluegray-600 hover:border-bluegray-800 bg-gradient-to-b from-bluegray-400 to-bluegray-100"
              @click="filterType = 'all', currentPage = 1">
              <div class="flex flex-row items-center">
                <div class="flex-shrink">
                  <div class="p-1.5 border border-white rounded-full md:p-2 bg-bluegray-500 group-hover:bg-bluegray-700 ring ring-bluegray-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                      <path fill-rule="evenodd" fill="currentColor" d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                    </svg>
                  </div>
                </div>
                <div class="mx-3 md:mx-5">
                  <h4 class="text-lg font-semibold text-gray-900 md:text-2xl">{{ countedProblems.all }}</h4>
                  <h3 class="text-gray-800 capitalize whitespace-nowrap">problems</h3>
                </div>
              </div>
            </div>
            <!-- /total problems card -->
          </div>
          <div class="flex flex-1 p-2 lg:p-4">
            <!-- hot problems card -->
            <div class="flex w-full px-3 py-2 border-b-4 rounded-lg shadow-xl cursor-pointer border-amber-600 md:px-5 md:py-4 group hover:border-amber-800 bg-gradient-to-b from-amber-400 to-amber-100"
              @click="filterType = 'hot', currentPage = 1">
              <div class="flex flex-row items-center">
                <div class="flex-shrink">
                  <div class="p-1.5 md:p-2 bg-amber-500 border border-white rounded-full group-hover:bg-amber-700 ring ring-amber-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                      <path fill-rule="evenodd" fill="currentColor" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </div>
                <div class="mx-3 md:mx-5">
                  <h4 class="text-lg font-semibold text-gray-900 md:text-2xl">{{ countedProblems.hot }}</h4>
                  <h3 class="text-gray-800 capitalize whitespace-nowrap">Hot Problems</h3>
                </div>
              </div>
            </div>
            <!-- /hot problems card -->
          </div>
        </div>
      </div>
      <div class="flex flex-col w-full 2xl:w-1/2">
        <div class="flex flex-row flex-wrap 2xl:flex-nowrap">
          <div class="flex flex-1 p-2 lg:p-4">
            <!-- fresh problems card -->
            <div class="flex w-full px-3 py-2 border-b-4 border-teal-600 rounded-lg shadow-xl cursor-pointer md:px-5 md:py-4 group hover:border-teal-800 bg-gradient-to-b from-teal-400 to-teal-100"
              @click="filterType = 'fresh', currentPage = 1">
              <div class="flex flex-row items-center">
                <div class="flex-shrink">
                  <div class="p-1.5 md:p-2 bg-teal-500 border border-white rounded-full group-hover:bg-teal-700 ring ring-teal-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                      <path fill-rule="evenodd" fill="currentColor" d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </div>
                <div class="mx-3 md:mx-5">
                  <h4 class="text-lg font-semibold text-gray-900 md:text-2xl">{{ countedProblems.fresh }}</h4>
                  <h3 class="text-gray-800 capitalize whitespace-nowrap">Fresh Problems</h3>
                </div>
              </div>
            </div>
            <!-- /fresh problems card -->
          </div>
          <div class="flex flex-1 p-2 lg:p-4">
            <!-- has no testcases card -->
            <div class="flex w-full px-3 py-2 border-b-4 border-red-600 rounded-lg shadow-xl cursor-pointer md:px-5 md:py-4 group hover:border-red-800 bg-gradient-to-b from-red-400 to-red-100"
              @click="filterType = 'noTestcases', currentPage = 1">
              <div class="flex flex-row items-center">
                <div class="flex-shrink">
                  <div class="p-1.5 md:p-2 bg-red-500 border border-white rounded-full group-hover:bg-red-700 ring ring-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white md:w-8 md:h-8" viewBox="0 0 20 20" fill="none">
                      <path fill-rule="evenodd" fill="currentColor" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd" />
                    </svg>
                  </div>
                </div>
                <div class="mx-3 md:mx-5">
                  <h4 class="text-lg font-semibold text-gray-900 md:text-2xl">{{ countedProblems.noTestcases }}</h4>
                  <h3 class="text-gray-800 capitalize whitespace-nowrap">Has No Testcases</h3>
                </div>
              </div>
            </div>
            <!-- /has no testcases card -->
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-row w-full mt-8">
      <div class="flex flex-col w-full bg-white border-2 rounded-lg shadow-lg border-bluegray-200">
        <div class="flex flex-col w-full p-4 space-y-4 lg:space-y-0 lg:p-6">
          <!-- new problem -->
          <div class="flex flex-row justify-center w-full sm:justify-start">
            <pcp-cp-new-problem></pcp-cp-new-problem>
          </div>
          <!-- /new problem -->
          <!-- search box -->
          <div class="flex flex-row justify-center w-full">
            <div class="relative flex flex-row">
              <input type="search" v-model="searchInput" placeholder="Problem Name" @keypress="filterType = 'search'"
                class="block w-full py-1 pl-8 text-sm leading-snug text-gray-600 border rounded-md shadow-md outline-none appearance-none border-bluegray-300 bg-bluegray-200 lg:text-base lg:rounded-lg focus:bg-bluegray-100 focus:border-bluegray-400"/>
              <div class="absolute inset-y-0 left-0 flex items-center px-3 text-gray-300 pointer-events-none">
                <svg class="w-3 h-4 text-gray-400 fill-current lg:w-4 lg:h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                  <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
                </svg>
              </div>
            </div>
          </div>
          <!-- /search box -->
        </div>
        <!-- problems table -->
        <div class="flex flex-row w-full overflow-x-scroll border-t-2 border-bluegray-200 lg:overflow-auto">
          <table class="flex-1 whitespace-nowrap">
            <thead>
              <tr>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('name')">
                  Name
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('points')">
                  Points
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('points')">
                  Difficulty
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('file')">
                  Question
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('testcases.length')">
                  Test Cases
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('status')">
                  Status
                </th>
                <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 lg:text-base">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody class="bg-white" v-for="problem in sortedProblems" v-bind:key="problem.id">
              <tr>
                <!-- problem name -->
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm font-semibold leading-5 text-gray-800">
                    {{ problem.name }}
                  </div>
                </td>
                <!-- /problem name -->
                <!-- problem points -->
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="text-sm italic font-semibold leading-5 text-gray-700 underline">
                    {{ problem.points }}
                  </div>
                </td>
                <!-- /problem points -->
                <!-- problem difficulty -->
                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                  <span v-if="problem.points >= 200" class="inline-flex px-2 text-xs font-semibold leading-5 border rounded-full shadow-md text-amber-800 bg-amber-100 border-amber-300">
                    Difficult
                  </span>
                  <span v-else-if="problem.points < 200 && problem.points >= 100" class="inline-flex px-2 text-xs font-semibold leading-5 text-blue-800 bg-blue-100 border border-blue-300 rounded-full shadow-md">
                    Moderate
                  </span>
                  <span v-else class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 border border-green-300 rounded-full shadow-md">
                    Easy
                  </span>
                </td>
                <!-- /problem difficulty -->
                <!-- problem question file -->
                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                  <div class="flex">
                    <div class="text-sm font-medium leading-5 text-gray-600 cursor-pointer has-tooltip hover:text-gray-800 hover:underline">
                      <a :href="'/../contests/library/'+problem.file">{{problem.file}}</a>
                      <span class="mr-20 tooltip">Question File</span>
                    </div>
                  </div>
                </td>
                <!-- /problem question file -->
                <!-- problem testcases -->
                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                  <span v-if="problem.testcases.length >= 1" class="inline-flex px-2 text-xs font-semibold leading-5 border rounded-full shadow-md text-lime-800 bg-lime-100 border-lime-300">
                    {{ problem.testcases.length }} Testcases
                  </span>
                  <span v-else class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 border border-red-300 rounded-full shadow-md">
                    There is no test cases
                  </span>
                </td>
                <!-- /problem testcases -->
                <!-- problem status -->
                <td class="px-6 py-4 border-b border-gray-200 whitespace-nowrap">
                  <span v-if="problem.status == 1" class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 border border-green-300 rounded-full shadow-md">
                    Active
                  </span>
                  <span v-else class="inline-flex px-2 text-xs font-semibold leading-5 text-orange-800 bg-orange-100 border border-orange-300 rounded-full shadow-md">
                    Inactive
                  </span>
                </td>
                <!-- /problem status -->
                <!-- problem actions -->
                <td class="px-6 py-4 text-sm font-medium leading-5 text-left border-b border-gray-200">
                  <div class="flex flex-row space-x-2">
                    <!-- problem testcases -->
                    <div class="has-tooltip">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 cursor-pointer text-bluegray-400 hover:text-lime-600 has-tooltip"
                        @click="showtestCases(problem)">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                      <span class="mr-4 tooltip">Testcases</span>
                    </div>
                    <!-- /problem testcases -->
                    <!-- edit problem -->
                    <div class="has-tooltip">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 cursor-pointer text-bluegray-400 hover:text-cyan-600 has-tooltip"
                        @click="chosenProblem(problem)">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                      </svg>
                      <span class="mr-4 tooltip">Edit problem</span>
                    </div>
                    <!-- /edit problem -->
                    <!-- problem status -->
                    <div v-if="problem.status == 0" class="has-tooltip">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 cursor-pointer text-bluegray-400 hover:text-green-600 has-tooltip"
                        @click="showProblem(problem , 1)">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                      </svg>
                      <span class="mr-4 tooltip">Show problem</span>
                    </div>
                    <div v-else class="has-tooltip">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 cursor-pointer text-bluegray-400 hover:text-red-600 has-tooltip"
                        @click="showProblem(problem , 0)">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                      <span class="mr-4 tooltip">Hide problem</span>
                    </div>
                    <!-- /problem status -->
                  </div>
                </td>
                <!-- /problem actions -->
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /problems table -->
        <!-- problems table pagination -->
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
          <p v-if="(this.currentPage+1) <= (Math.ceil(this.countedProblems.currentList/ this.pageSize))" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage+1)"> {{this.currentPage+1}}</p>
          <p v-if="(this.currentPage+2) <= (Math.ceil(this.countedProblems.currentList/ this.pageSize))" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage+2)"> {{this.currentPage+2}}</p>
          <svg :class="this.currentPage < (Math.ceil(this.countedProblems.currentList/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="nextPage"  xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
          <svg :class="this.currentPage < (Math.ceil(this.countedProblems.currentList/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="lastPage" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
          </svg>
        </div>
        <!-- /problems table pagination -->
      </div>
      <!-- edit problem vueModal -->
      <Modal v-model="editModal" title="Edit Problem" wrapper-class="modal-wrapper" modal-class="modal">
        <div class="flex flex-col">
          <!-- form -->
          <form method="POST" enctype="multipart/form-data"
            @submit.prevent="creatteam"
            @keydown="editProblem.onKeydown($event)">
            <div class="w-full mb-3 space-y-2 text-xs">
              <label class="py-2 font-semibold text-gray-600 ">Problem Name</label>
              <div class="relative flex flex-wrap items-stretch w-full mb-4">
                <div class="flex">
                  <span class="flex items-center justify-center w-12 h-10 px-3 text-xl leading-normal text-white whitespace-no-wrap bg-blue-300 border border-r-0 border-blue-300 rounded-lg rounded-r-none bg-grey-lighter border-1 text-grey-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                  </span>
                </div>
                <input type="text" id="name" v-model="editProblem.name"
                  name="name" class="relative flex-auto flex-grow flex-shrink w-px h-10 px-3 leading-normal border border-l-0 rounded-lg rounded-l-none border-grey-light focus:border-blue focus:shadow" placeholder="Problem Name">
                <div v-if="editProblem.errors.has('name')" v-html="editProblem.errors.get('name')"
                  class="my-3 text-xs text-left text-red-500"/>
              </div>
              <div class="flex-auto w-full mb-1 space-y-2 text-xs">
                <label class="py-2 font-semibold text-gray-600">Description</label>
                <textarea v-model="editProblem.description" required="" name="description" id="description" class=" min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Problem Desc.." ></textarea>
                <div v-if="editProblem.errors.has('description')" v-html="editProblem.errors.get('description')"
                  class="my-3 text-xs text-left text-red-500"/>
              </div>
              <div class="mb-3 md:space-y-2">
                <label class="py-2 text-xs font-semibold text-gray-600">Problem question (pdf)<abbr class="hidden" title="required">*</abbr></label>
                <div class="flex items-center py-6">
                  <label class="cursor-pointer ">
                    <h2 id="filepdf">{{this.editProblem.question}}</h2>
                    <span class="block w-40 px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none items-left hover:bg-gray-100">
                      Browse
                    </span>
                    <input type="file" @change="updateQuestion" name="question" id="question" class="hidden">
                  </label>
                  <label class="py-2 text-xs font-semibold text-gray-600"/>
                </div>
              </div>
              <div v-if="editProblem.errors.has('question')" v-html="editProblem.errors.get('question')"
                class="my-3 text-xs text-left text-red-500"/>
            </div>
            <label class="py-2 font-semibold text-gray-600 ">Score</label>
              <div class="relative flex flex-wrap items-stretch w-full mb-4">
                <input type="text" id="score" v-model="editProblem.score"
                  name="score" class="relative flex-auto flex-grow flex-shrink w-px h-10 px-3 leading-normal border rounded-lg rounded-l-none border-grey-light focus:border-blue focus:shadow" placeholder="Problem score">
                <div v-if="editProblem.errors.has('score')" v-html="editProblem.errors.get('score')"
                  class="my-3 text-xs text-left text-red-500"/>
              </div>
          </form>
          <!-- end form -->
          <div class="flex flex-row self-end">
            <button type="button" @click="editModal = false"
              class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
              Close
            </button>
            <button type="button" @click="editProblems" :disabled="editProblem.busy"
              class="disabled:opacity-50 px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
              Apply
            </button>
          </div>
        </div>
      </Modal>
      <!-- /edit problem vueModal -->
    </div>
  </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

export default {
  props: [
    'problems',
    'time',
  ],
  data: function () {
    return {
      /* users list */
      problemsList: JSON.parse(this.problems),
      /* current datetime */
      timenow: this.time,
      /* users list counter */
      countedProblems: {
        all: 0,
        hot: 0,
        fresh: 0,
        noTestcases: 0,
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
      /* vueModals trigers */
      editModal: false,
      showTestCaseModal: false,
      newTestCaseModal: false,
      /* edit problem vForm */
      editProblem: new Form({
        problem: '',
        name: "",
        description: "",
        question: '',
        score: '',
      }),
      /* problem activation vForm */
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
      if (this.currentPage * this.pageSize < this.countedProblems.currentList)
        this.currentPage++;
    },
    prevPage: function () {
      if (this.currentPage > 1) this.currentPage--;
    },
    lastPage: function () {
      if (Number.isInteger(this.countedProblems.currentList / this.pageSize)) {
        this.currentPage = this.countedProblems.currentList / this.pageSize;

      } else {
        this.currentPage = Math.floor(this.countedProblems.currentList / this.pageSize) + 1;
      }
    },
    /*  */
    async showProblem(problem , e){
      var messgae;
      var buttontext;
      var buttoncolor;

      if(e == 1) {
        messgae = "Do you want to show " + problem.name + " ?"
        buttontext = 'Show';
        buttoncolor = '#90EE90';
      } else {
        messgae = "Do you want to hide " + problem.name + " ?";
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
          for (i = 0 ; i < this.problemsList.length ; i++) {
            if(problem.id == this.problemsList[i].id)
              this.problemsList[i].status = e
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
    /* / */
    /*  */
    showtestCases(problem){
      window.location.href = '/controlpanel/problems/testcase/'+problem.id;
    },
    /* / */
    /*  */
    updateQuestion(e){
      let file = e.target.files[0];
      let reader = new FileReader();
      let limit = 4194304;
      var sFileName = file['name'];
      var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();

      console.log(sFileExtension)

      if (!(sFileExtension === "pdf") || (file['size'] > limit)) {
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
    /* / */
    /*  */
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

          for ( let i = 0 ; i < this.problemsList.length ; i++) {
            if (this.editProblem.problem == this.problemsList[i].id) {
              this.problemsList[i].name = this.editProblem.name
              this.problemsList[i].description = this.editProblem.description
              this.problemsList[i].file =  data.file
              this.problemsList[i].points =  this.editProblem.score
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
    /* / */
    /*  */
    chosenProblem(problem){
      this.editProblem.problem = problem.id
      this.editProblem.name = problem.name
      this.editProblem.description = problem.description
      this.editProblem.question = problem.file
      this.editProblem.score = problem.points
      this.editModal = true;
    },
    /* / */
  },
  watch: {
    searchInput() {
      this.currentPage = 1;
    },
  },
  computed: {
    /* problems list counter */
    countProblems: function () {
      /* all problems */
      this.countedProblems.all = this.problemsList.length;
      /* only difficult/hot problems */
      this.countedProblems.hot = this.problemsList.filter(problem => {
        return (problem.points >= 200);
      }).length;
      /* only fresh/todays problems */
      this.countedProblems.fresh = this.problemsList.filter(problem => {
        return ((new Date(problem.created_at).getDate()) == (new Date(this.timenow).getDate()));
      }).length;
      /* only has no testcases problems */
      this.countedProblems.noTestcases = this.problemsList.filter(problem => {
        return (problem.testcases.length == 0);
      }).length;
      /* only filtered problems */
      this.countedProblems.currentList = this.filteredProblems.length;
    },
    /* problems list filter */
    filteredProblems () {
      return this.problemsList.filter(problem => {
        /* search filter */
        if (this.filterType === 'search') {
          if(this.searchInput == '') {
            return true;
          } else {
            return problem.name.toLowerCase().indexOf(this.searchInput.toLowerCase()) >= 0;
          }
        }
        /* all problems */
        if (this.filterType === 'all') {
          return true;
        }
        /* hot/difficult problems filter */
        if (this.filterType === 'hot') {
            return (problem.points >= 200);
        }
        /* fresh/todays problems filter */
        if (this.filterType === 'fresh') {
          return ((new Date(problem.created_at).getDate()) == (new Date(this.timenow).getDate()));
        }
        /* has no testcases filter */
        if (this.filterType === 'noTestcases') {
          return (problem.testcases.length == 0);
        }
      })
    },
    /* problems list sorter */
    sortedProblems: function () {
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
    },
  },
  /* do after mount */
  mounted() {
    this.countProblems
  },
  /* do after update */
  updated() {
    this.countProblems
  },
}
</script>
