<template>
  <div class="container">
    <div class="logo">
      <router-link to="/"></router-link>
    </div>
    <nav>
      <a href="" @click.prevent="this.$router.push('/about')" >
        關於我們
        <ul>
          <li></li>
          <li></li>
          <li></li>
        </ul>
      </a>
      <router-link :to="nav.site" v-for="nav in header" :keys="nav">{{ nav.title }}</router-link>
      <a href="" @click.prevent="openModal">登入 | 註冊</a>
      <router-link to="/member_center"><i class="fa-solid fa-user"></i></router-link>
    </nav>
  </div>
  <login v-if="modalControl" @emit-status="closeModal"></login>
</template>


<script>
import login from '@/components/LoginView.vue';
export default {
  name: 'MainHeader',
  data() {
    return {
      header: [
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
        // {
        //   title: '登入 | 註冊',
        //   site: '/login'
        // },
      ],
      modalControl: false,
    }
  },
  methods: {
    openModal() {
        this.modalControl = true;
    },
    closeModal() {
      this.modalControl = false;
    },
  },
  components: {
    login,
  },
}
</script>

<style lang="scss" scoped>

</style>