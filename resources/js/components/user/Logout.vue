<template>
    
</template>
<script>
import { mapActions } from "vuex";
export default {
    name: "logout",
  created() {
    this.destroyToken().then(response => {
      this.$router.push({ name: "home" });
    }).catch(response=>{
         this.$router.push({ name: "home" });
    });
  },
  methods: {
    ...mapActions("auth", {
      destroyToken: "destroyToken"
    })
  }
};
</script>


