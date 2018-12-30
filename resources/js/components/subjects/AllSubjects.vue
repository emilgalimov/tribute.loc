<template>
    <div>
        <h1>Список предметов</h1>
        <div>
            <alert :errors="errors"> </alert>
        </div>

        <div v-for="(subject,key) in subjects" :key="key">
          <subject :subject="subject"> </subject>
        </div>
    </div>
</template>
<script>
import { mapGetters } from "vuex";
import { mapActions } from "vuex";

import Alert from "../Alert";
import Subject from './Subject'

export default {
  name: "SubjectsList",


  data() {
    return {
      errors: null
    };
  },
  created() {
    this.getSubjects(this.$store.getters["auth/token"]).catch(error => {
      this.errors = error.response.data;
    });
  },
  computed: {
    ...mapGetters("subjects", {
      subjects: "subjects"
    })
  },
  methods:{
    ...mapActions("subjects", {
      getSubjects: "getSubjects"
    })
  },
  components:{
    Alert,
    Subject
  }
};
</script>

