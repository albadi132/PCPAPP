<template>
  <div class="w-4 mr-2 transform hover:text-red-500 hover:scale-110">
    <svg
    v-on:click="deletelang()"
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
</template>

<script>

export default {
  props: ["contest", "urlname", "language"],
  data() {
    return {
      
        contestid : this.contest,
        languageid : this.language,
        url : this.urlname,
      
    };
  },
  methods: {
      deletelang: function () {
        console.log(this.languageid)
      toast.fire({
          title: "Do you want to remove this language?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: `Delete`,
          confirmButtonColor: "#EC7063",
        })
        .then((result) => {
          if (result.isConfirmed) {
            window.location = "/competition/" + this.url + "/mange/languages/remove/" + this.languageid;
          }
        });
    },
  },
};
</script>