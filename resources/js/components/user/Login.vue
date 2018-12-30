
    <template>
        <div>
            <h1>Логин</h1>
            <div v-if="error !==null" class="alert alert-danger" role="alert">
              <strong>{{error}}</strong> 
            </div>
            <form @submit.prevent="login">
            <div class="form-group" >
                <label for="email">Электорнная почта</label>
                <input  v-model="username" type="email" name="name" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Пароль</label>
                <input v-model="password" type="password" name="password" class="form-control" id="password" placeholder="Password" >
            </div>
        <button type="submit" class="btn btn-primary btn-block">Войти</button>
        </form>
        </div>
    </template>

<script>
import { mapActions } from "vuex";

export default {
  name: "login",
  data() {
    return {
      username: "",
      password: "",
      error: null
    };
  },
  methods: {
    ...mapActions("auth", {
      retreiveToken: "retreiveToken"
    }),
    login() {
      this.error=null,
      this.retreiveToken({
        username: this.username,
        password: this.password
      })
        .then(response => {
          this.$router.push({ name: "home" });
        })
        .catch(error => {
          this.error=error.response.data;
        });
    }
  }
};
</script>