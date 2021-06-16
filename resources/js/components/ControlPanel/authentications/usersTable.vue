<template>
  <div>
    <!-- search box -->
    <div class="flex flex-row justify-center flex-shrink-0 w-full my-4">
      <div class="relative flex flex-row">
        <input type="search" v-model="filter" placeholder="User Email"
          class="block w-full py-1 pl-8 text-sm leading-snug text-gray-600 bg-white rounded-md shadow-md outline-none appearance-none group ring-2 ring-gray-200 lg:text-base lg:rounded-lg focus:ring-gray-400 focus:ring-opacity-60"/>
        <div class="absolute inset-y-0 left-0 flex items-center px-3 text-gray-300 pointer-events-none">
          <svg class="w-3 h-4 text-gray-400 fill-current lg:w-4 lg:h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
            <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
          </svg>
        </div>
      </div>
    </div>
    <!-- users table -->
    <div class="flex flex-col bg-white border-2 border-gray-200 rounded-lg shadow-lg border-opacity-80">
      <div class="flex flex-row w-full overflow-x-scroll rounded-t-md lg:overflow-auto">
        <table class="w-full whitespace-nowrap">
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
                <div v-if="user.role !== 'admin' && user.is_verified == 1" class="flex flex-col">
                  <a class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                    @click="vModals.target = user, roleForm.targetUser = 0, roleForm.userRole = '', vModals.roleVM = true">
                    Change Role
                  </a>
                  <a class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                    @click="vModals.target = user, statusForm.targetUser = 0, statusForm.userStatus = user.status, vModals.statusVM = true">
                    Change Status
                  </a>
                  <a class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                    @click="vModals.target = user, restpassForm.targetUser = 0, restpassForm.userPassword = '', restpassForm.userPassword_confirmation = '', vModals.restpassVM = true">
                    Reset Password
                  </a>
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
        <p v-if="(this.currentPage+1) <= (Math.ceil(this.userslist.length/ this.pageSize))" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage+1)"> {{this.currentPage+1}}</p>
        <p v-if="(this.currentPage+2) <= (Math.ceil(this.userslist.length/ this.pageSize))" class="mx-2 text-sm leading-relaxed cursor-pointer hover:text-blue-600" @click="OpenPage(currentPage+2)"> {{this.currentPage+2}}</p>
        <svg :class="this.currentPage < (Math.ceil(this.userslist.length/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="nextPage"  xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
        <svg :class="this.currentPage < (Math.ceil(this.userslist.length/ this.pageSize)) ? 'leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600' : ''" @click="lastPage" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" />
        </svg>
      </div>
    </div>
    <!-- user role vueModal -->
    <Modal v-model="vModals.roleVM" title="User Role">
      <div class="flex flex-col">
        <div class="flex flex-row">
          This is user role modal. Changing user {{ vModals.target.username }} role
        </div>
        <div class="flex flex-row self-center">
          <div class="flex flex-col my-6">
            <div class="flex items-center justify-center">
              __roles selection here__
              <form method="POST" enctype="multipart/form-data" @submit.prevent="changeRole" @keydown="roleForm.onKeydown($event)">
                <p class="mb-2 font-semibold text-gray-700">Role</p>
                <select id="userRole" name="userRole" v-model="roleForm.userRole" class="w-full h-12 mb-5 border-2 border-gray-300 rounded-md">
                  <option value="user">User</option>
                  <option value="manager">Manager</option>
                  <option value="admin">Admin</option>
                </select>
                <div v-if="roleForm.errors.has('userRole')" v-html="form.errors.get('userRole')" class="text-red-500"/>
              </form>
            </div>
          </div>
        </div>
        <div class="flex flex-row self-end">
          <button type="button" @click="vModals.roleVM = false"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Close</button>
          <button type="button" @click="changeRole" :disabled="roleForm.busy"
                  class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
          Apply</button>
        </div>
      </div>
    </Modal>
    <!-- user status vueModal -->
    <Modal v-model="vModals.statusVM" title="User Status">
      <div class="flex flex-col">
        <div class="flex flex-row">
          This is user status modal
        </div>
        <div class="flex flex-row w-full my-6">
          <div class="flex justify-center w-full">
            <span class="mr-4 text-sm">Suspended</span>
            <div class="relative w-12 h-6 transition duration-200 ease-linear bg-opacity-50 rounded-full shadow-inner ring-1 ring-red-400 ring-opacity-50"
                :class="statusForm.userStatus == 1 ? 'bg-green-400 ring-green-400' : 'bg-red-400'">
              <label for="toggle"
                    class="absolute left-0 w-6 h-6 mb-2 transition duration-100 ease-linear transform bg-white border-2 border-opacity-50 rounded-full cursor-pointer"
                    :class="statusForm.userStatus == 1 ? 'translate-x-full border-green-400' : 'translate-x-0 border-red-400'"></label>
              <input type="checkbox" id="toggle" name="toggle"
                    class="w-full h-full appearance-none active:outline-none focus:outline-none"
                    @click="statusForm.userStatus == 0 ? statusForm.userStatus = 1 : statusForm.userStatus = 0"/>
            </div>
            <span class="ml-4 text-sm">Active</span>
          </div>
        </div>
        <div class="flex flex-row self-end">
          <button type="button" @click="vModals.statusVM = false"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Close</button>
          <button type="button" @click="changeStatus" :disabled="statusForm.busy"
                  class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
          Apply</button>
        </div>
      </div>
    </Modal>
    <!-- user restpass vueModal -->
    <Modal v-model="vModals.restpassVM" title="Reset User Password" wrapper-class="modal-wrapper" modal-class="modal">
      <div class="flex flex-col">
        <div class="flex flex-row">
          This is user reset password modal
        </div>
        <div class="flex flex-row justify-center w-full my-6">
          <form method="POST" enctype="multipart/form-data" @submit.prevent="restPass" @keydown="restpassForm.onKeydown($event)">
            <div class="flex flex-col items-center w-full space-y-4">
              <input id="userPassword" name="userPassword" type="password" autocomplete="new-password" placeholder="new password"
                v-model="restpassForm.userPassword"
                class="block w-3/5 px-4 py-2 leading-5 text-gray-700 placeholder-gray-500 border-2 rounded-md appearance-none bg-bluegray-100 border-bluegray-400 border- focus:outline-none focus:ring-2 focus:ring-bluegray-300 focus:placeholder-opacity-30 focus:shadow-inner"/>
              <input id="userPassword_confirmation" name="userPassword_confirmation" type="password" autocomplete="new-password" placeholder="confirm password"
                v-model="restpassForm.userPassword_confirmation"
                class="block w-3/5 px-4 py-2 leading-5 text-gray-700 placeholder-gray-500 border-2 rounded-md appearance-none bg-bluegray-100 border-bluegray-400 border- focus:outline-none focus:ring-2 focus:ring-bluegray-300 focus:placeholder-opacity-30 focus:shadow-inner"/>
              <div v-if="restpassForm.errors.has('userPassword')" v-html="restpassForm.errors.get('userPassword')" class="text-red-500"/>
            </div>
          </form>
        </div>
        <div class="flex flex-row self-end">
          <button type="button" @click="vModals.restpassVM = false"
                  class="px-2 py-1 mr-4 text-gray-800 bg-gray-200 rounded-lg ring-opacity-50 ring-gray-400 ring-2 focus:outline-none hover:bg-gray-300">
          Close</button>
          <button type="button" @click="restPass" :disabled="restpassForm.busy"
                  class="px-2 py-1 text-green-800 bg-green-200 rounded-lg ring-opacity-50 ring-green-400 ring-2 focus:outline-none hover:bg-green-300">
          Apply</button>
        </div>
      </div>
    </Modal>
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
      /* users list s */
      userslist: JSON.parse(this.users),
      /* sorting */
      currentSort: "name",
      currentSortDir: "asc",
      /* pagination */
      pageSize: 10,
      currentPage: 1,
      countpage: 0,
      /* search */
      filter:'',
      /* vueModals */
      vModals: {
        target: 0,
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
    /* sorting */
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
    /* search */
    filter() {
      this.currentPage = 1;
    }
  },
  computed: {
    filteredUsers() {
      return this.userslist.filter(u => {
        if(this.filter == '') return true;

        return u.email.toLowerCase().indexOf(this.filter.toLowerCase()) >= 0;
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
    },
  },
  mounted() {},
}
</script>
