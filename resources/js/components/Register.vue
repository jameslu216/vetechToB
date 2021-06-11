<template>
  <!-- Default form register -->
  <div class="display_mid">
    <p class="h4 text-center mb-4">註冊會員</p>

    <label for="email" class="grey-text">信箱</label>
    <input type="email" id="email" class="form-control" v-model="email" />
    <br />
    <label for="password" class="grey-text">密碼</label>
    <input
      type="password"
      id="password"
      class="form-control"
      v-model="password"
    />
    <br />
    <label for="name" class="grey-text">姓名</label>
    <input type="text" id="name" class="form-control" v-model="name" />
    <br />
    <label for="phone" class="grey-text">電話</label>
    <input type="text" id="phone" class="form-control" v-model="phone" />
    <br />
    <label for="pet_name" class="grey-text">寵物名稱</label>
    <input type="text" id="pet_name" class="form-control" v-model="pet_name" />
    <label for="pet_variety" class="grey-text">寵物種類</label>
    <input
      type="text"
      id="pet_variety"
      class="form-control"
      v-model="pet_variety"
    />
    <label for="pet_gender" class="grey-text">寵物性別</label>
    <input
      type="text"
      id="pet_gender"
      class="form-control"
      v-model="pet_gender"
    />
    <div class="text-center mt-4">
      <button
        class="btn btn-primary"
        style="background-color: #25d366"
        v-on:click="register"
      >
        註冊
      </button>
    </div>
  </div>
  <!-- Default form register -->
</template>
<script>
import httpAPI from "../httpAPI.js";
export default {
  name: "Basic",
  data() {
    return {
      name: "",
      email: "",
      password: "",
      phone: "",
      pet_name: "",
      pet_variety: "",
      pet_gender: "",
    };
  },
  methods: {
    register() {
      const vm=this;
      let registerRequirements = {
        name: this.name,
        email: this.email,
        password: this.password,
        phone: this.phone,
        pet: [{
          name: this.pet_name,
          variety: this.pet_variety,
          gender: this.pet_gender,
        }],
      };
      httpAPI.userRegister(registerRequirements).then(function (response) {
        if(reponse==='failed')
        {
            alert('帳號密碼輸入錯誤')
        }
            vm.$store.commit("SET_HAS_LOGIN", true);

    });
    },
  },
};
</script>
<style lang="scss">
</style>