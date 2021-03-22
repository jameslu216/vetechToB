<template>
  <div id="app">
    <div class="row">
      <div class="col-2">
        <img
          alt="Donorchain"
          src="/donorchain.png"
          class="homepic"
        />
      </div>
      <div class="col-10 hometitle text-right" id="nav">
        <router-link to="/">Home</router-link><span style="font-size:24px">/</span>
        <router-link to="/about">認識DC</router-link> <span style="font-size:24px">/</span>
        <router-link to="/news">最新消息</router-link> <span style="font-size:24px">/</span>
        <router-link to="/organization">機構分類</router-link> <span style="font-size:24px">/</span>
        <router-link to="/blog">DC部落格</router-link> <span style="font-size:24px">/</span>
        <router-link to="/contactus">聯絡我們</router-link> <span style="font-size:24px">/</span>
        <router-link to="/sign">登入/註冊</router-link> 
      </div>
    </div>
  </div>
</template>
<script>
export default {
}
</script>>
<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
#nav {
  padding: 30px;
  margin-top:50px;
  a {
    font-weight: bold;
    color: #2c3e50;
    font-size:24px;
    font-weight: bold;
    padding:15px;  
    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
.homepic{
  height:120px;
  width:120px;
  margin-top:20px;
}
</style>
