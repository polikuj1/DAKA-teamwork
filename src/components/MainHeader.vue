<template>
  <div class="container">
    <div class="logo">
      <router-link to="/"><img src="@/assets/images/logo.png"></router-link>
    </div>
    <nav>
      <router-link to="/">關於我們</router-link>
      <router-link to="/about">最新消息</router-link>
      <router-link to="/about">餐點介紹</router-link>
      <router-link to="/about">訂位預約</router-link>
      <router-link to="/about">漫畫租借</router-link>
      <router-link to="/about">登入 | 註冊</router-link>
      <router-link to="/about"><i class="fa-solid fa-user"></i></router-link>
    </nav>
  </div>
</template>


<script>
export default {
  name: 'MainHeader',
  data() {
    return {
      header: {
        logoImg: '@/assets/images/logo.png',
      }
    }
  },
}
</script>

<style lang="scss" scoped>
</style>