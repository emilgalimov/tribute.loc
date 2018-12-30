<template>
<div>
    <h1>Регистрация</h1>
     <div v-if="errors !==null" class="alert alert-danger" role="alert">
             <div v-for="(error, key) in errors" :key="key"> 
               
               <strong>{{key}} : {{error[0]}}</strong>

             </div>
      </div>
    <form @submit.prevent="register">
    <div class="form-group">
    <label for="name">Логин</label>
    <input autocomplete="off" type="text" name="name" class="form-control" id="name" placeholder="введите логин" v-model="username">
  </div>
  <div class="form-group">
    <label for="email">Электронная почта</label>
    <input autocomplete="off" type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="введите почта" v-model="email">
  </div>
  <div class="form-group">
    <label for="password">Пароль</label>
    <input  autocomplete="off" type="password" name="password" class="form-control" id="password" placeholder="введите пароль" v-model="password">
  </div>
  <button type="submit" class="btn btn-primary btn-block">Регистрация</button>
</form>
</div>
</template>
<script>
import { mapActions } from "vuex";
export default {
  name: "register",

  data() {
    return {
      username: "",
      email: "",
      password: "",
      errors: null
    };
  },
  methods: {
    ...mapActions("auth", {
      authRegister: "register"
    }),
    register() {
      this.authRegister({
        name: this.username,
        password: this.password,
        email: this.email
      })
        .then(response => {
          this.$router.push({ name: "login" });
        })
        .catch(error => {
          this.errors = error.response.data.errors;
        });
    }
  }
};
</script>


