<template>
  <!-- Default form register -->
  <form class="display_mid">
    <p class="h4 text-center mb-4">Sign up</p>
    <label for="defaultFormRegisterNameEx" class="grey-text">姓名</label>
    <input type="text" id="defaultFormRegisterNameEx" class="form-control"/>
    <br/>
    <label for="defaultFormRegisterEmailEx" class="grey-text">信箱</label>
    <input type="email" id="defaultFormRegisterEmailEx" class="form-control"/>
    <br/>
    <label for="defaultFormRegisterPasswordEx" class="grey-text">密碼</label>
    <input type="password" id="defaultFormRegisterPasswordEx" class="form-control"/>
    <div class="text-center mt-4">
      <button class="btn btn-primary"  style="background-color: #25d366;" type="submit">Register</button>
    </div>
  </form>
  <!-- Default form register -->
</template>
<script>
import { mdbInput, mdbBtn } from 'mdbvue';
  export default {
    name: 'Basic',
    components: {
      mdbInput,
      mdbBtn
    }
  }
</script>
<style lang="scss">
.format_mid{
    display:block;
    margin:auto;
}
</style>