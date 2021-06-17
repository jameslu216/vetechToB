<template>
  <div id="app" class="row m-0" style="z-index: -1; padding-bottom: 50px; border-radius: 10px">
    <div class="col-12" style="background-color: #575757">
      <div class="row">
        <div class="col-5 col-md-2 p-0">
          <img alt="vetech" src="/vetech.png" class="homepic" />
        </div>
        <div v-if="hasLogin" class="col-7 col-md-4 p-0 pt_90px" id="nav">
          <div class="row">
            <router-link class="col-5 p-0" to="/booking">顧客預約</router-link>
            <router-link class="col-7 p-0" to="/dashboard">醫院儀表板</router-link>
          </div>
        </div>
        <div class="p-0 col-12 col-md-6 col-md-pt_90px" id="nav">
          <div class="row">
            <router-link class="col-4 col-md-2 p-0" to="/">Home</router-link>
            <router-link class="col-4 col-md-2 p-0" to="/login">登入</router-link>
            <router-link class="col-4 col-md-2 p-0" to="/register">註冊</router-link>
          </div>
        </div>
      </div>
    </div>
    <Hometext v-if="$route.path == '/'" />
    <router-view></router-view>
  </div>
</template>
<script>
import Hometext from './Hometext';
export default {
  name: 'Home',
  data() {
    return {};
  },
  components: {
    Hometext,
  },
  computed: {
    hasLogin() {
      return this.$store.state.login.hasLogin;
    },
  },
  methods: {},
};
</script>
>
<style lang="scss">
.pt_90px {
  padding-top: 90px !important;
}
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
#nav {
  padding: 30px;
  a {
    font-weight: bold;
    color: #2c3e50;
    font-size: 22px;
    font-weight: bold;
    padding: 15px;
    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
.homepic {
  height: 100px;
  width: 120px;
  margin-top: 20px;
  margin-bottom: 20px;
}
</style>
