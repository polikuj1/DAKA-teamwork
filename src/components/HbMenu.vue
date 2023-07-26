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
          <li v-for="li in nav" :key="li.title" @click.prevent.stop="goPage(li.site)"><span :class="li.class"></span>{{ li.title }}</li>
        <li @click.prevent,stop="loginOpen">登入 | 註冊</li>
        </ul>
      </nav>
    </div>
  </div>
  <Login v-if="this.$store.state.login"></Login>
</template>

<script>
import login from '@/components/LoginView.vue';
export default {
  components:{
    login,
  },
  data() {
    return {
      nav: [
        {
          title: '關於我們',
          class: '',
          site: '/about',
        },
        {
          title: '服務項目',
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
        {
          title: '會員中心',
          class: 'fa-solid fa-user',
          site: '/member_center/member_nav',
        },
     
      ],
      isOpen: false,
    }
  },
  methods: {
    goPage(site) {
      this.$router.push(site);
      this.$refs.nav.classList.add('disappear');
      this.$refs.nav.classList.remove('show');
      this.isOpen = false;
      setTimeout(() => {
        this.$refs.check.checked = false;
      },100)
    },
    openMenu() {
      if(!this.isOpen) {
        this.isOpen = true;
        this.$refs.nav.classList.remove('disappear');
        setTimeout(() => {
          this.$refs.nav.classList.add('show');
        },100)
      } else {
        this.isOpen = false;
        this.$refs.nav.classList.remove('show');
      }
    },
    loginOpen(){
      this.$store.state.login=true;
      this.openMenu()
    }
  },
}
</script>