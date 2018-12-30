<template>
<div>
    <h1>Расписание</h1>
  <div>
     <alert :errors="errors"> </alert>
  </div>
  <div class="card mb-4" v-for="(day, index) in shedule" :key="index">
      <shedule-day-item :day="day"></shedule-day-item>
  </div>
</div>
</template>

<script>
import { mapGetters } from "vuex";
import { mapActions } from "vuex";
import SheduleDayItem from "./SheduleDayItem";
import Alert from "../Alert";

export default {
  name: "shedule",
  data() {
    return {
      errors: null
    };
  },
  created() {
  
    this.getShedule(this.$store.getters["auth/token"]).catch(error => {
      this.errors = error.response.data;
    });

  },
  computed: {
    ...mapGetters("shedule", {
      shedule: "shedule"
    })
  },
  methods: {
    ...mapActions("shedule", {
      getShedule: "getShedule"
    })
  },
  components: {
    SheduleDayItem,
    Alert
  }
};
</script>

<style>
</style>
