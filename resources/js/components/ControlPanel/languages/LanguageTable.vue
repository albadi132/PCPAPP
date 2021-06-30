<template>
  <div>
    <div class="flex flex-row w-full">
      <div class="flex flex-col w-full bg-white border-2 rounded-lg shadow-lg border-bluegray-200">
        <div class="flex flex-col w-full p-4 space-y-4 lg:space-y-0 lg:p-6">
          <!-- new laqnguage -->
          <div class="flex flex-row justify-center w-full sm:justify-start">
            <button type="button" @click="newLanguageModalShow" class="px-4 py-2 font-semibold text-green-600 transition duration-200 ease-in transform bg-transparent border border-green-600 rounded hover:bg-green-600 hover:text-white hover:border-transparent hover:-translate-y-1 active:translate-y-0">
              New Language
            </button>
          </div>
          <!-- /new language -->
          <!-- search box -->
          <div class="flex flex-row justify-center w-full">
            <div class="relative flex flex-row">
              <input type="search" v-model="searchInput" placeholder="Language Name" @keypress="filterType = 'search'"
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
        <!-- languages table -->
        <div class="flex flex-row w-full overflow-x-scroll border-t-2 border-bluegray-200 lg:overflow-auto">
          <table class="flex-1 whitespace-nowrap">
            <thead>
              <tr>
                <th class="w-2/5 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('name')">
                  Name
                </th>
                <th class="w-2/5 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 cursor-pointer hover:text-indigo-400 hover:bg-gray-200 md:text-sm lg:text-base"
                  @click="sort('status')">
                  Status
                </th>
                <th class="w-1/5 px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-100 border-b border-gray-200 lg:text-base">
                  Actions
                </th>
              </tr>
            </thead>
            <tbody class="bg-white" v-for="language in sortedLanguages" v-bind:key="language.id">
              <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 w-10 h-10">
                      <img class="w-10 h-10 rounded-full"
                        v-bind:src="language.logo.length < '50' ? '/Programminglanguages/' + language.dir + '/' + language.logo : language.logo"/>
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium leading-5 text-gray-900">{{ language.name }}</div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                  <span v-if="language.status == 1" class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 border border-green-300 rounded-full shadow-md">
                    Active
                  </span>
                  <span v-else class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 border border-red-300 rounded-full shadow-md">
                    Inactive
                  </span>
                </td>
                <td class="px-6 py-4 text-sm font-medium leading-5 text-left border-b border-gray-200">
                  <div class="flex flex-row space-x-2">
                    <!-- edit language -->
                    <div class="has-tooltip">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 cursor-pointer text-bluegray-400 hover:text-cyan-600 has-tooltip"
                        @click="editLanguageModalShow(language)">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                      </svg>
                      <span class="mr-4 tooltip">Edit language</span>
                    </div>
                    <!-- /edit language -->
                    <!-- activate/deactivate language -->
                    <div v-if="language.status == 0" class="has-tooltip">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 cursor-pointer text-bluegray-400 hover:text-green-600 has-tooltip"
                        @click="showLanguage(language , 1)">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                      </svg>
                      <span class="mr-4 tooltip">Activate language</span>
                    </div>
                    <div v-else class="has-tooltip">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-6 h-6 cursor-pointer text-bluegray-400 hover:text-red-600 has-tooltip"
                        @click="showLanguage(language , 0)">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                      <span class="mr-4 tooltip">Deactivate language</span>
                    </div>
                    <!-- /activate/deactivate language -->
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /languages table -->
        <!-- languages table pagination -->
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
          <p v-if="(this.currentPage+1) <= (Math.ceil(this.languagesList.length/ this.pageSize))" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage+1)"> {{this.currentPage+1}}</p>
          <p v-if="(this.currentPage+2) <= (Math.ceil(this.languagesList.length/ this.pageSize))" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage+2)"> {{this.currentPage+2}}</p>
          <svg :class="this.currentPage < (Math.ceil(this.languagesList.length/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="nextPage"  xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
          <svg :class="this.currentPage < (Math.ceil(this.languagesList.length/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="lastPage" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
          </svg>
        </div>
        <!-- /languages table pagination -->
      </div>
      <!-- new language vueModal -->
      <Modal v-model="newLanguageModal" title="New Language" wrapper-class="modal-wrapper" modal-class="modal">
        <div class="flex flex-col">
          <!-- form -->
          <form method="POST" enctype="multipart/form-data"
            @submit.prevent="newLanguageForm"
            @keydown="newLanguageForm.onKeydown($event)">
		        <div class="w-full mb-3 space-y-2 text-xs">
							<label class="py-2 font-semibold text-gray-600 ">Language Name</label>
							<div class="relative flex flex-wrap items-stretch w-full mb-4">
								<div class="flex">
									<span class="flex items-center justify-center w-12 h-10 px-3 text-xl leading-normal text-white whitespace-no-wrap bg-blue-300 border border-r-0 border-blue-300 rounded-lg rounded-r-none bg-grey-lighter border-1 text-grey-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                  </span>
								</div>
								<input type="text" id="name" v-model="newLanguageForm.name"
                  name="name" class="relative flex-auto flex-grow flex-shrink w-px h-10 px-3 leading-normal border border-l-0 rounded-lg rounded-l-none border-grey-light focus:border-blue focus:shadow" placeholder="Name">
                <div v-if="newLanguageForm.errors.has('name')" v-html="newLanguageForm.errors.get('name')"
                  class="my-3 text-xs text-left text-red-500"/>
              </div>
		          <label class="py-2 font-semibold text-gray-600 ">Language Directory ( Without special character )</label>
              <div class="relative flex flex-wrap items-stretch w-full mb-4">
                <input type="text" id="dir" v-model="newLanguageForm.dir"
                  name="dir" class="relative flex-auto flex-grow flex-shrink w-px h-10 px-3 leading-normal border rounded-lg border-grey-light focus:border-blue focus:shadow" placeholder="Directory">
                <div v-if="newLanguageForm.errors.has('dir')" v-html="newLanguageForm.errors.get('dir')"
                  class="my-3 text-xs text-left text-red-500"/>
              </div>
              <div class="mb-3 md:space-y-2">
                <label class="py-2 text-xs font-semibold text-gray-600">Language Logo<abbr class="hidden" title="required">*</abbr></label>
                <div class="flex items-center py-6">
                  <div class="flex-none w-12 h-12 mr-4 overflow-hidden border rounded-xl">
                    <img v-if="newLanguageForm.logo != ''" class="object-cover w-12 h-12 mr-4" :src="newLanguageForm.logo" alt="Avatar Upload">
                  </div>
                  <label class="cursor-pointer ">
                    <span class="block w-40 px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100">
                      Browse
                    </span>
                    <input type="file" @change="newLogo" name="logo" id="logo" class="hidden">
                  </label>
                </div>
                <div v-if="newLanguageForm.errors.has('logo')" v-html="newLanguageForm.errors.get('logo')"
                  class="my-3 text-xs text-left text-red-500"/>
              </div>
            </div>
          </form>
          <!-- end form -->
          <div class="flex flex-row self-end">
            <button type="button" @click="newLanguageModal = false"
              class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
              Close
            </button>
            <button type="button" @click="newLanguage" :disabled="newLanguageForm.busy"
              class="disabled:opacity-50 px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
              Add
            </button>
          </div>
        </div>
      </Modal>
      <!-- /new language vueModal -->
      <!-- edit language vueModal -->
      <Modal v-model="editLanguageModal" title="Edit Language" wrapper-class="modal-wrapper" modal-class="modal">
        <div class="flex flex-col">
          <!-- form -->
          <form method="POST" enctype="multipart/form-data"
            @submit.prevent="editLanguageForm"
            @keydown="editLanguageForm.onKeydown($event)">
		        <div class="w-full mb-3 space-y-2 text-xs">
							<label class="py-2 font-semibold text-gray-600 ">Language Name</label>
							<div class="relative flex flex-wrap items-stretch w-full mb-4">
								<div class="flex">
									<span class="flex items-center justify-center w-12 h-10 px-3 text-xl leading-normal text-white whitespace-no-wrap bg-blue-300 border border-r-0 border-blue-300 rounded-lg rounded-r-none bg-grey-lighter border-1 text-grey-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                  </span>
								</div>
								<input type="text" id="name" v-model="editLanguageForm.name"
                  name="name" class="relative flex-auto flex-grow flex-shrink w-px h-10 px-3 leading-normal border border-l-0 rounded-lg rounded-l-none border-grey-light focus:border-blue focus:shadow" placeholder="Name">
                <div v-if="editLanguageForm.errors.has('name')" v-html="editLanguageForm.errors.get('name')"
                  class="my-3 text-xs text-left text-red-500"/>
              </div>
		          <label class="py-2 font-semibold text-gray-600 ">Language Directory ( Without special character )</label>
							<div class="relative flex flex-wrap items-stretch w-full mb-4">
								<input type="text" id="dir" v-model="editLanguageForm.dir"
                  name="dir" class="relative flex-auto flex-grow flex-shrink w-px h-10 px-3 leading-normal border rounded-lg border-grey-light focus:border-blue focus:shadow" placeholder="Directory">
                <div v-if="editLanguageForm.errors.has('dir')" v-html="editLanguageForm.errors.get('dir')"
                  class="my-3 text-xs text-left text-red-500"/>
              </div>
              <div class="mb-3 md:space-y-2">
						    <label class="py-2 text-xs font-semibold text-gray-600">Language Logo<abbr class="hidden" title="required">*</abbr></label>
						    <div class="flex items-center py-6">
							    <div class="flex-none w-12 h-12 mr-4 overflow-hidden border rounded-xl">
								    <img v-if="editLanguageForm.logo.length < '50'" class="object-cover w-12 h-12 mr-4" v-bind:src="'/Programminglanguages/' + editLanguageForm.dir + '/'+ editLanguageForm.logo"   alt="Avatar Upload">
                    <img v-else class="object-cover w-12 h-12 mr-4" v-bind:src="editLanguageForm.logo" alt="Avatar Upload">
                  </div>
								  <label class="cursor-pointer ">
                    <span class="block w-40 px-5 py-2 mx-auto font-medium text-center text-gray-600 bg-white border rounded-lg shadow-sm focus:outline-none hover:bg-gray-100">
                      Browse
                    </span>
                    <input type="file" @change="updateLogo" name="logo" id="logo" class="hidden">
                  </label>
							  </div>
                <div v-if="editLanguageForm.errors.has('logo')" v-html="editLanguageForm.errors.get('logo')"
                  class="my-3 text-xs text-left text-red-500"/>
						  </div>
            </div>
          </form>
          <!-- end form -->
          <div class="flex flex-row self-end">
            <button type="button" @click="editLanguageModal = false"
              class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
              Close
            </button>
            <button type="button" @click="editLanguage" :disabled="editLanguageForm.busy"
              class="disabled:opacity-50 px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
              Edit
            </button>
          </div>
        </div>
      </Modal>
      <!-- /edit language vueModal -->
    </div>
  </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

export default {
  props: [
    'languages',
    'time'
  ],
  data: function () {
    return {
      /* users list */
      languagesList: JSON.parse(this.languages),
      /* current datetime */
      timenow: this.time,
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
      /* vueModals trigers */
      newLanguageModal: false,
      editLanguageModal: false,
      /* new language vForm */
      newLanguageForm: new Form({
        name: "",
        dir: "",
        logo: '',
      }),
      /* edit language vForm */
      editLanguageForm: new Form({
        name: "",
        dir: "",
        logo: '',
        id:'',
      }),
      /* language activation vForm */
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
      if (this.currentPage * this.pageSize < this.languagesList.length)
        this.currentPage++;
    },
    prevPage: function () {
      if (this.currentPage > 1) this.currentPage--;
    },
    lastPage: function () {
      if (Number.isInteger(this.languagesList.length / this.pageSize)) {
        this.currentPage = this.languagesList.length / this.pageSize;

      } else {
        this.currentPage = Math.floor(this.languagesList.length / this.pageSize) + 1;
      }
    },
    /* language activation POST */
    async showLanguage (language , e) {
      var messgae;
      var buttontext;
      var buttoncolor;

      if (e == 1) {
        messgae = "Do you want to activat " + language.name + " ?"
        buttontext = 'Activat';
        buttoncolor = '#90EE90';
      } else {
        messgae = "Do you want to deactivate " + language.name + " ?";
        buttontext = 'Deactivate';
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
          for (i = 0 ; i < this.languagesList.length ; i++) {
            if(language.id == this.languagesList[i].id)
            this.languagesList[i].status = e
          }

          this.active.status = e;
          this.active.id = language.id;

          const response = this.active
          .post("/controlpanel/languages/activat")
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
    /* /language activation POST */
    /* new language data */
    newLanguageModalShow () {
      this.newLanguageForm.dir = []
      this.newLanguageForm.logo = []
      this.newLanguageForm.name = []
      this.newLanguageModal = true
    },
    /* /new language data */
    /* edit language data */
    editLanguageModalShow (language) {
      this.editLanguageForm.dir = language.dir
      this.editLanguageForm.logo = language.logo
      this.editLanguageForm.name = language.name
      this.editLanguageForm.id = language.id
      this.editLanguageModal = true
    },
    /* /edit language data */
    /* new language POST */
    async  newLanguage () {
      const response = await this.newLanguageForm
      .post("/controlpanel/languages/new" )
      .then(({ data }) => {
        if (data.status == 200) {
          this.editModal = false;
          toast.fire({
            icon: "success",
            title: data.description,
            showConfirmButton: false,
            timer: 3000,
          });

          this.newLanguageModal = false

          const addtojson = {
            dir: this.newLanguageForm.dir,
            id: data.id,
            logo: this.newLanguageForm.logo,
            name: this.newLanguageForm.name,
            status: 0
          };

          this.languagesList.push(addtojson);
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
    /* /new language POST */
    /* edit language POST */
    async  editLanguage(){
      const response = await this.editLanguageForm
      .post("/controlpanel/languages/edit" )
      .then(({ data }) => {
        if (data.status == 200) {
          this.editModal = false;
          toast.fire({
            icon: "success",
            title: data.description,
            showConfirmButton: false,
            timer: 3000,
          });

          this.editLanguageModal = false

          for ( let i = 0 ; i < this.languagesList.length ; i++) {
            if (this.editLanguageForm.id == this.languagesList[i].id) {
              this.languagesList[i].logo = this.editLanguageForm.logo
              this.languagesList[i].dir = this.editLanguageForm.dir
              this.languagesList[i].name = this.editLanguageForm.name
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
    /* /edit language POST */
    /* new logo */
    newLogo (e) {
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
        this.newLanguageForm.logo = reader.result;
      }

      reader.readAsDataURL(file);
    },
    /* /new logo */
    /* update logo */
    updateLogo (e) {
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
        this.editLanguageForm.logo = reader.result;
      }

      reader.readAsDataURL(file);
    },
    /* /update logo */
  },
  watch: {
    searchInput() {
      this.currentPage = 1;
    },
  },
  computed: {
    /* languages list filter */
    filteredLanguages () {
      return this.languagesList.filter(language => {
        /* search filter */
        if (this.filterType === 'search') {
          if(this.searchInput == '') {
            return true;
          } else {
            return language.name.toLowerCase().indexOf(this.searchInput.toLowerCase()) >= 0;
          }
        }
        /* all users */
        if (this.filterType === 'all') {
          return true;
        }
      })
    },
    /* languages list sorter */
    sortedLanguages: function () {
      return this.filteredLanguages.sort((a,b) => {
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
    //...
  },
  /* do after update */
  updated() {
    //...
  },
}
</script>
