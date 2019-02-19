  <template>
      <div class="container">
    <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top pr-4 pl-4">
    <router-link :to="{name:'home'}" tag="a" class="navbar-brand" exact-active-class="active"> 
                    <a>Tribute</a>
    </router-link>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
          <li v-for="(item,index) in menuList" :key="index">
                  <router-link
                              :to="{name:item.name}" 
                              tag="a"
                              class="nav-link"
                              exact-active-class="active"
                              > 
                    <a>{{item.text}}</a>
                </router-link>
          </li>
          <template v-if="!loggedIn">
          <li> 
            <router-link :to="{name:'register'}" tag="a" class="nav-link" exact-active-class="active"> 
                    <a>Регистрация</a>
            </router-link>
          </li>
          <li> 
            <router-link :to="{name:'login'}" tag="a" class="nav-link" exact-active-class="active"> 
                    <a>Войти</a>
              </router-link>
          </li>
          </template>
          <template v-else>
          <li> 
            <router-link :to="{name:'logout'}" tag="a" class="nav-link" exact-active-class="active"> 
                    <a>Выход</a>
              </router-link>
          </li>
          </template>

      </ul>
    </div>
  </nav>
    <main role="main" class="main">
                <router-view>
                </router-view>
    </main>
  </div>
  </template>


 <script>
import { mapGetters } from "vuex";

export default {
  computed: {
    ...mapGetters("nav", {
      menuList: "items"
    }),
    ...mapGetters("auth", {
      loggedIn: "loggedIn"
    }),

  }
};
</script>