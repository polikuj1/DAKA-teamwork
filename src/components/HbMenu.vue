<template>
  <div class="main_menu">
    <div class="bottom_header">
      <div class="social_media">
        <i class="fa-brands fa-instagram"></i>
        <span>follow us</span>
      </div>
      <input type="checkbox" id="hb_menu" ref="check">
      <label class="hb_menu" for="hb_menu" @click="openMenu">
        <span></span>
        <span></span>
        <span></span>
      </label>
      <nav ref="nav">
        <ul>
          <li v-for="li in nav" :key="li.title" @click.prevent.stop="goPage(li.site)"><span :class="li.class"></span>{{
            li.title }}</li>
          <li @click.prevent="goMemberCenter" v-show="login"><span class="fa-solid fa-user"></span>{{member.mname}}</li>
          <li @click.prevent="loginOpen" v-show="!login">登入 | 註冊</li>
          <li @click.prevent="loginClose" v-show="login">登出</li>
        </ul>
      </nav>
    </div>
  </div>
 
  
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
          class: '',
          site: '/about_origin',
        },
        {
          title: '環境介紹',
          class: '',
          site: '/about',
        },
        {
          title: '店鋪情報',
          class: '',
          site: '/location',
        },
        {
          title: '最新消息',
          class: '',
          site: '/news',
        },
        {
          title: '餐點介紹',
          class: '',
          site: '/food',
        },
        {
          title: '漫畫預約',
          class: 'fa-solid fa-book-open-reader',
          site: '/comic_search',
        },
        {
          title: '訂位預約',
          class: 'fa-solid fa-calendar-days',
          site: '/reservation',
        },
      ],
      isOpen: false,
      loginWord: '登入 | 註冊',
      memberWord: '會員中心'
    }
  },
  methods: {
    ...mapMutations(['toggleLogin', 'toggleForgotPsw', 'toggleRegister', 'loginOk', 'loginOut']),
    goPage(site) {
      this.$router.push(site);
      this.$refs.nav.classList.add('disappear');
      this.$refs.nav.classList.remove('show');
      this.isOpen = false;
      setTimeout(() => {
        this.$refs.check.checked = false;
      }, 100)
    },
    openMenu() {
      if (!this.isOpen) {
        this.isOpen = true;
        this.$refs.nav.classList.remove('disappear');
        setTimeout(() => {
          this.$refs.nav.classList.add('show');
        }, 100)
      } else {
        this.isOpen = false;
        this.$refs.nav.classList.remove('show');
      }
    },
    loginOpen() {
      this.toggleLogin(true);
      this.openMenu();
      this.$refs.nav.classList.add('disappear');
      this.$refs.nav.classList.remove('show');
      this.isOpen = false;
      setTimeout(() => {
        this.$refs.check.checked = false;
      }, 100)
    },
    loginClose() {
      this.$refs.nav.classList.add('disappear');
      this.$refs.nav.classList.remove('show');
      setTimeout(() => {
        this.$refs.check.checked = false;
      }, 100)
     
      this.loginOut();
    },
    goMemberCenter(){
      this.$refs.nav.classList.add('disappear');
      this.$refs.nav.classList.remove('show');
      setTimeout(() => {
        this.$refs.check.checked = false;
      }, 100)
      this.$router.push('/member_center/member_nav')
    }

  },
  computed: {
    ...mapState(['isLoginOpen","forgotPsw', 'member', 'isRegister', 'login', 'member','keepLoginStatus']),
  },

}
</script>