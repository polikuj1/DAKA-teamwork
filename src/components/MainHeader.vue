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
      <a @click.prevent="toggleLogin(true)" v-show="!login">登入 | 註冊</a>
      <a @click.prevent="this.$router.push('/member_center/member_nav')" v-show="login"><i class="fa-solid fa-user"></i>{{
        member.mname }}</a>
      <a @click="loggingOut" v-show="login">登出</a>
    </nav>
  </div>
  <!-- 預約成功彈窗 -->
  <div class="login_modal" v-show="loginModal">
    <div class="modal">
      <div class="pic">
        <img src="@/assets/images/member/modal.svg" alt="" />
      </div>
      <div class="bind_success">
        <span>登入成功！</span>
        <button @click="toggleLoginModal(false)">確定</button>
      </div>
    </div>
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
import { logOut } from '@/assets/js/logout.js';
import axios from "axios";

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
    ...mapMutations(['toggleLogin', 'toggleForgotPsw', 'toggleRegister', 'loginOut', 'toggleLoginModal'])
    ,
    goPage(site, e) {
      this.$router.push(site);
    },
    loggingOut() {
      //待處理
      // axios.post(`${this.$URL}/loginOut.php`,{withCredentials:true})
      //   .then((res) => {
      //     console.log(res);
      //     if (res.data === 'success') {
      //       this.loginOut();
      //       if (this.$route.matched.some(record => record.path.includes('/member_center'))) {
      //         this.$router.push('/index');
      //       }
      //     } else {
      //       console.error('Failed to clear session');
      //     }
      //   })
      //   .catch((err) => {
      //     console.log(err);
      //   })

        // this.loginOut();
        //     if (this.$route.matched.some(record => record.path.includes('/member_center'))) {
        //       this.$router.push('/index');
        //     }
    }
  
  },
  components: {
    login, forgot, register
  },
  mounted() {
    if (this.show) {
      this.style = '';
    } else {
      this.style = 'disappear';
    }
  },
  computed: {
    ...mapState(['isLoginOpen', 'forgotPsw', 'login', 'isRegister', 'member', 'keepLoginStatus', 'loginModal'])
  }
}
</script>


<style lang="scss" scoped>
.login_modal {
  width: 100%;
  height: 100%;
  position: fixed;
  inset: 0 0 0 0;
  z-index: 1200;
  background-color: rgb(255, 255, 255, 0.8);

  .modal {
    width: 30%;
    background-color: #fff;
    border-radius: 10px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    padding: 30px;
    box-shadow: 0 0 2px #aaa;

    .pic {
      width: 50%;
      margin: 0 auto 20px;

      img {
        width: 100%;
        height: 100%;
      }
    }
  }
}

@media screen and (max-width:767px) {
  .login_modal {
    .modal {
      width: 60%;
    }
  }
}
</style>