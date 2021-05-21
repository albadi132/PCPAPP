<template>
  <div
    class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8"
  >
    <div class="bg-white shadow-md rounded my-6">
      <table class="min-w-max w-full table-auto">
        <thead>
          <tr
            class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal"
          >
            <th class="py-3 px-6 text-left" @click="sort('name')">TEAM NAME</th>
            <th class="py-3 px-6 text-left">MEMBERS</th>
            <th class="py-3 px-6 text-center" v-if="imin">Actions</th>
          </tr>
        </thead>
        <tbody
          class="text-gray-600 text-sm font-light"
          v-for="team in sortedteams"
          v-bind:key="team.id"
        >
          <tr class="border-b border-gray-200 hover:bg-gray-100">
            <td class="py-3 px-6 text-left whitespace-nowrap">
              <a>
                <div class="flex items-center">
                  <span class="font-medium">{{ team.name }}</span>
                </div>
              </a>
            </td>
            <td class="py-3 px-6 text-center">
              <div class="flex text-center items-center">
                <div v-for="user in team.users" v-bind:key="user.username">
                  <div v-if="team.leader == user.username">
                    <p class="font-bold">
                      {{ "[ " + user.first_name + " " + user.last_name + " ]" }}
                      &nbsp;
                    </p>
                  </div>
                  <div class="flex text-center items-center" v-else>
                    <div
                      class="flex items-center"
                      v-if="team.leader == me || allow"
                    >
                      <p>
                        {{
                          "[ " + user.first_name + " " + user.last_name + " ]"
                        }}
                      </p>
                      <svg
                        @click="leftteam(team.id, user.username)"
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 hover:text-red-500 hover:scale-110 transform"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                        />
                      </svg>
                    </div>
                    <p v-else>
                      {{ "[ " + user.first_name + " " + user.last_name + " ]" }}
                    </p>
                    &nbsp;
                  </div>
                </div>
              </div>
            </td>
            <td v-if="imin" class="py-3 px-6 text-center">
              <div class="flex item-center justify-center">
                <div
                  v-if="team.leader == me || allow"
                  class="w-4 mr-2 transform hover:text-red-500 hover:scale-110"
                >
                  <svg
                    @click="deletetheteam(team.id, team.name)"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                    />
                  </svg>
                </div>
                <div v-else>
                  <div
                    v-if="isExist(me, team.users)"
                    class="w-4 mr-2 transform hover:text-red-500 hover:scale-110"
                  >
                    <svg
                      @click="leftteam(team.id)"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                      />
                    </svg>
                  </div>
                  <div
                    v-else-if="team.users.length < 4 && !onteam"
                    class="w-4 mr-2 transform hover:text-green-500 hover:scale-110"
                  >
                    <svg
                      @click="joiningtteam(team.id)"
                      xmlns="http://www.w3.org/2000/svg"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                      />
                    </svg>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>

      <div
        class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans"
      >
        <div>
          <p class="text-sm leading-5 text-blue-700">
            Teams:
            <span class="font-medium">{{ this.teams.length }}</span>
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- ///////////////// -->
</template>

<script>
export default {
  props: [
    "teamwithuser",
    "urlname",
    "contest",
    "admin",
    "myuser",
    "actuion",
    "ihaveteam",
  ],
  data() {
    return {
      teams: JSON.parse(this.teamwithuser),
      url: this.urlname,
      contestid: this.contest,
      onteam: this.ihaveteam,
      allow: this.admin,
      me: this.myuser,
      imin: this.actuion,
      currentSort: "name",
      currentSortDir: "asc",
      pageSize: 100,
      currentPage: 1,
      countpage: 0,
      filter: "",
    };
  },
  methods: {
    deletetheteam: function (teamid, teamname) {
      toast
        .fire({
          title: "Do you want to delete " + teamname + " team?",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: `Delete`,
          confirmButtonColor: "#EC7063",
        })
        .then((result) => {
          if (result.isConfirmed) {
            window.location =
              "/competition/" + this.url + "/deleteteam/" + teamid;
          }
        });
    },
    joiningtteam: function (teamid) {
      window.location = "/competition/" + this.url + "/joiningtteam/" + teamid;
    },
    leftteam: function (teamid, username) {
      if (typeof username !== "undefined") {
        window.location =
          "/competition/" + this.url + "/leftteam/" + teamid + "/" + username;
      } else {
        window.location = "/competition/" + this.url + "/leftteam/" + teamid;
      }
    },
    isExist: function (m, t) {
      for (var i = 0; i < t.length; i++) {
        if (t[i].username == m) {
          return true;
        }
      }
      return false;
    },
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
      if (this.currentPage * this.pageSize < this.teams.length)
        this.currentPage++;
    },
    prevPage: function () {
      if (this.currentPage > 1) this.currentPage--;
    },
    lastPage: function () {
      if (Number.isInteger(this.teams.length / this.pageSize)) {
        this.currentPage = this.teams.length / this.pageSize;
      } else {
        this.currentPage = Math.floor(this.teams.length / this.pageSize) + 1;
      }
    },
  },

  computed: {
    sortedteams: function () {
      return this.teams
        .sort((a, b) => {
          let modifier = 1;
          if (this.currentSortDir === "desc") modifier = -1;
          if (a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
          if (a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
          return 0;
        })
        .filter((row, index) => {
          let start = (this.currentPage - 1) * this.pageSize;
          let end = this.currentPage * this.pageSize;
          if (index >= start && index < end) return true;
        });
    },
  },
  mounted() {},
};
</script>