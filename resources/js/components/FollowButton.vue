<template>
  <div>
    <button
      @click="followUser"
      class="btn btn-primary ml-4"
      v-text="followText"
    ></button>
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],
  mounted() {
    console.log("Component mounted.");
  },
  data: function () {
    return {
      status: this.follows,
    };
  },
  methods: {
    followUser() {
      axios
        .post("/follow/" + this.userId)
        .then((response) => {
          this.status = !this.status;
          console.log(response.data);
        })
        .catch((err) => {
          if (err.response.status == 401) {
            window.location = "/login";
          }
        });
    },
  },
  computed: {
    followText() {
      return this.status ? "Unfollow" : "Follow";
    },
  },
};
</script>
