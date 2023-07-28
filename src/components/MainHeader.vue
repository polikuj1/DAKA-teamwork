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
          <li v-for="item in nav.title_list" :key="item.li" @click.prevent.stop="goPage(item.site, $event)">{{ item.li }}</li>
        </ul>
      </a>
      <a href="" @click.prevent="loginOpen" >登入 | 註冊</a>
      <a href="" @click.prevent="this.$router.push('/member_center/member_nav')"><i class="fa-solid fa-user"></i></a>

    </nav>
  </div>
  <login v-if="$store.state.login" ></login>
</template>


<script>
import login from '@/components/LoginView.vue';
export default {
  props: ['path','show'],
  name: 'MainHeader',
  watch: {
    // 處理header只有在首頁時需要先消失
    path() {
      if(this.path === '/index') {
        this.style = 'disappear';
      } else {
        this.style = '';
      }
    },
    show() {
      if(this.show) {
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
    openModal() {
        this.modalControl = true;
    },
    closeModal() {
      this.modalControl = false;
    },
    goPage(site,e) {
      if(e.target.innerText === '登入 | 註冊') {
        this.openModal();
      }
      // console.log(site);
      // console.log(e);
      this.$router.push(site);
    },
    loginOpen(){
      this.$store.state.login=true;
    }
  },
  components: {
    login,
  },
  mounted() {
    if(this.show) {
      this.style = '';
    } else {
      this.style = 'disappear';
    }
  }
}
</script>

<style lang="scss" scoped>

</style>