<template>
  <div class="header">
    <div class="logo">
      <router-link to="/"></router-link>
    </div>
    <nav>
      <a href="#" v-for="nav in header" :keys="nav.title" @click.prevent.stop="goPage(nav.site, $event)">
        {{ nav.title }}
        <ul>
          <li v-for="item in nav.title_list" :keys="item.li" @click.prevent.stop="goPage(item.site)">{{ item.li }}</li>
        </ul>
      </a>
      <a href="#" @click.prevent="openModal">登入 | 註冊</a>
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
          title: '關於我們',
          site: '/about',
          title_list: [
            {
              li: '緣起',
              site: '/about',
            },
            {
              li: '服務項目',
              site: '/about',
            },
            {
              li: '店鋪情報',
              site: '/about',
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
          title: '漫畫租借',
          site: '/comic_demo',
          title_list: [
            {
              li: '漫畫展示',
              site: '/comic_demo',
            },
            {
              li: '漫畫查詢',
              site: '/comic_search',
            },
            {
              li: '租借須知',
              site: '/comic_rent_rules',
            },
          ],
        },
        // {
        //   title: '登入 | 註冊',
        //   site: '',
        //   title_list: [],
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
    goPage(site,e) {
      console.log(site);
      console.log(e);
      this.$router.push(site);
    },
  },
  components: {
    login,
  },
}
</script>

<style lang="scss" scoped>

</style>