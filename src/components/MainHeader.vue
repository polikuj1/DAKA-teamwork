<template>
  <div class="container">
    <div class="logo">
      <router-link to="/"></router-link>
    </div>
    <nav>
      <router-link :to="nav.site" v-for="nav in header" :keys="nav">{{ nav.title }}</router-link>
      <router-link to="/member_center"><i class="fa-solid fa-user"></i></router-link>
    </nav>
  </div>
</template>


<script>
export default {
  name: 'MainHeader',
  data() {
    return {
      header: [
        {
          title: '關於我們',
          site: '/about'
        },
        {
          title: '最新消息',
          site: '/news'
        },
        {
          title: '餐點介紹',
          site: '/food'
        },
        {
          title: '訂位預約',
          site: '/reservation'
        },
        {
          title: '漫畫租借',
          site: '/comic'
        },
        {
          title: '登入 | 註冊',
          site: '/login'
        },
      ],
    }
  },
}
</script>

<style lang="scss" scoped>
</style>