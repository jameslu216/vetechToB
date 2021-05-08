<template>
    <div
        id="app"
        class="row"
        style="
      background-color: #c4e1e1;
      z-index: -1;
      padding-bottom: 50px;
      border-radius: 10px;
    "
    >
        <div class="col-12" style="background-color: #575757">
            <div class="row">
                <div class="col-2">
                    <img alt="vetech" src="/vetech.png" class="homepic" />
                </div>

                <div class="col-10 hometitle text-right" id="nav">
                    <router-link to="/">Home</router-link>
                    <router-link to="/booking">顧客預約</router-link>
                    <router-link to="/dashboard">醫院儀表板</router-link>
                    <router-link to="/sign">登入/註冊</router-link>
                </div>
            </div>
        </div>
        <router-view></router-view>
    </div>
</template>
<script>
import CustomerBooking from "./CustomerBooking.vue";

export default {
    components: {
        CustomerBooking
    }
};
</script>
>
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
    margin-top: 50px;
    a {
        font-weight: bold;
        color: #2c3e50;
        font-size: 24px;
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
}
</style>
