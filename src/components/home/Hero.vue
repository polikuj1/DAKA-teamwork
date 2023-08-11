<template>
  <section class="hero_section">
    <div class="circle">
      <img src="@/assets/images/home/circle05.svg" alt="裝飾">
    </div>
    <div class="circle">
      <img src="@/assets/images/home/circle06.svg" alt="裝飾">
    </div>
    <aside>
      <a class="scroll" @click.prevent="this.$emit('emit-go')">
        <img src="@/assets/images/home/scroll.svg" alt="滑鼠下滑">
      </a>
      <div class="pic">
        <img src="@/assets/images/footerLogo.svg" alt="">
      </div>
      <nav>
        <ul>
          <li v-for="item in nav" :key="item.title"><router-link :to="item.site"> {{ item.title }}</router-link></li>
        </ul>
        <button @click.prevent="toggleLogin" v-show="!login">登入 | 註冊</button>
        <button @click.prevent="loginOut" v-show="login">登出</button>
        <button v-for="btn in btns" :key="btn.title" @click="this.$router.push(btn.site)"><i :class="btn.class"></i> {{
          btn.title }}</button>
      </nav>
    </aside>
    <div class="banner">
      <div class="pic">
        <img src="@/assets/images/home/sprite.svg" alt="gif">
      </div>
    </div>
  </section>

</template>
<script>
import { mapMutations, mapActions, mapGetters, mapState } from "vuex";
import login from '@/components/LoginView.vue';
import forgot from '@/components/ForgotPassword.vue';
import register from '@/components/Register.vue';
export default {
  components: {
    login, forgot, register
  },
  data() {
    return {
      nav: [
        {
          title: '關於我們',
          site: '/about_origin'
        },
        {
          title: '環境介紹',
          site: '/about'
        },
        {
          title: '店鋪情報',
          site: '/location'
        },
        {
          title: '最新消息',
          site: '/news'
        },
        {
          title: '餐點介紹',
          site: '/food'
        },
      ],
      btns: [
        {
          title: '訂位預約',
          class: 'fa-solid fa-calendar-days',
          site: '/reservation',
        },
        {
          title: '漫畫租借',
          class: 'fa-solid fa-book-open-reader',
          site: '/comic_search',
        },
      ],
      loginWord: '登入 | 註冊'
    }
  },
  methods: {
    ...mapMutations(['toggleLogin', 'toggleRegister', 'toggleRegister','loginOut']),
    goBottom() {
      this.$emit('emit-go');
    },
  
  },
  computed: {
    ...mapState(['isLoginOpen', 'forgotPsw', 'isRegister', 'login','isRegister','member','keepLoginStatus'])
  }
}
</script>