<template>
  <div
    style="
      text-align: center;
      height: 200px;
      width: 400px;
      position: absolute;
      top: 50%;
      left: 50%;
      margin-top: -100px;
      margin-left: -200px;
    "
  >
    <img style="height: 120px" src="/leju_404.png" />
    <div style="height: 10px"></div>
    <h1 style="font-size: 30px">很抱歉，頁面不存在</h1>
    <h1 style="font-size: 25px">
      點此回到
      <router-link to>
        <span @click="$router.back(-1)">上一頁</span>
      </router-link>
      。
    </h1>
  </div>
</template>

<script>
export default {};
</script>
>
