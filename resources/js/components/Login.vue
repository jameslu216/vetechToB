<template>
  <!-- Default form login -->
  <div v-if="!hasLogin" class="display_mid">
    <p class="h4 text-center mb-4">登入</p>
    <label for="defaultFormLoginEmailEx" class="grey-text">帳號信箱</label>
    <input type="email" id="defaultFormLoginEmailEx" class="form-control" v-model="email" />
    <br />
    <label for="defaultFormLoginPasswordEx" class="grey-text">密碼</label>
    <input type="password" id="defaultFormLoginPasswordEx" class="form-control" v-model="password" />
    <div class="text-center mt-4">
      <button class="btn btn-primary" style="background-color: #25d366" v-on:click="login()">登入</button>
    </div>
  </div>
  <div v-else>
    <span>登入成功 你可以預約了 但我沒空做</span>
  </div>

  <!-- Default form login -->
</template>
<script>
import httpAPI from '../httpAPI.js';

export default {
  name: 'Login',
  data() {
    return {
      email: '',
      password: '',
    };
  },
  computed: {
    hasLogin() {
      return this.$store.state.login.hasLogin;
    },
  },
  mounted() {
    if (this.hasLogin) {
      alert('您已登入，可切往預約');
      this.$router.push({ path: '/booking' }).catch((err) => {
        err;
      });
    }
  },
  methods: {
    login() {
      const vm = this;
      let loginRequirements = {
        email: this.email,
        password: this.password,
      };
      httpAPI.userLogin(loginRequirements).then(function (response) {
        if (response === 'failed') {
          alert('帳號密碼輸入錯誤');
          return;
        }
        vm.$store.commit('SET_HAS_LOGIN', true);
        vm.$store.commit('SET_USER_INFO', response);
        vm.$router.push({ path: '/booking' });
      });
    },
  },
};
</script>
