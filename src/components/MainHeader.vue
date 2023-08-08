<template>
  <div class="header" :class="style">
    <h1 class="logo">
      <router-link to="/index"><img :src="logoImg" alt="DAKA網咖"></router-link>
      <span>打</span>
      <span>咖</span>
    </h1>
    <nav>
      <a href="" v-for="nav in header" :key="nav.title" @click.prevent.stop="goPage(nav.site, $event)">
        {{ nav.title }}
        <ul>
          <li v-for="item in nav.title_list" :key="item.li" @click.prevent.stop="goPage(item.site, $event)">{{ item.li }}
          </li>
        </ul>
      </a>
      <a  @click.prevent="toggleLogin" v-show="!login">登入 | 註冊</a>
      <a  @click.prevent="this.$router.push('/member_center/member_nav')" v-show="login"><i class="fa-solid fa-user"></i>{{ member.mname }}</a>
      <a  @click.prevent="loggingOut" v-show="login">登出</a>
    </nav>
  </div> 
  <login v-show="isLoginOpen"></login>
  <forgot v-show="forgotPsw"></forgot>
  <register v-show="isRegister"></register>
</template>

<script>
import { mapMutations, mapActions, mapGetters, mapState } from "vuex";
import login from '@/components/LoginView.vue';
import forgot from '@/components/ForgotPassword.vue';
import register from '@/components/Register.vue';

export default {
  props: ['path', 'show'],
  name: 'MainHeader',
  watch: {
    // 處理header只有在首頁時需要先消失
    path() {
      if (this.path === '/index') {
        this.style = 'disappear';
      } else {
        this.style = '';
      }
    },
    show() {
      if (this.show) {
        this.style = '';
      } else {
        this.style = 'disappear';
      }
    },
  },
  data() {
    return {
      style: '',
      logoImg: require('@/assets/images/logo.png'),
      header: [
        {
          title: '關於我們',
          site: '/about_origin',
          title_list: [
            {
              li: '環境介紹',
              site: '/about',
            },
            {
              li: '店鋪情報',
              site: '/location',
            },
          ],
        },
        {
          title: '最新消息',
          site: '/news',
          title_list: [],
        },
        {
          title: '餐點介紹',
          site: '/food',
          title_list: [],
        },
        {
          title: '訂位預約',
          site: '/reservation',
          title_list: [],
        },
        {
          title: '漫畫預約',
          site: '/comic_search',
          title_list: [
            {
              li: '漫畫推薦',
              site: '/comic_demo',
            },
            // {
            //   li: '漫畫查詢',
            //   site: '/comic_search',
            // },
          ],
        },

      ],
    }
  },
  methods: {
    ...mapMutations(['toggleLogin', 'toggleForgotPsw','toggleRegister','loginOut',])
    ,
     goPage(site,e) {
    this.$router.push(site);
     },
loggingOut(){

  this.loginOut();
if(this.$route.path=='/member_center'){
  this.$router.push('/index')
}

}
  },
  components: {
    login, forgot,register
  },
  mounted() {
    if (this.show) {
      this.style = '';
    } else {
      this.style = 'disappear';
    }
  },
  computed: {
    ...mapState(['isLoginOpen', 'forgotPsw', 'login','isRegister','member','keepLoginStatus'])
  }
}
</script>

<style lang="scss" scoped></style>