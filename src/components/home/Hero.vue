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
        <button @click.prevent="loginOpen">登入 | 註冊</button>
        <button v-for="btn in btns" :key="btn.title" @click="this.$router.push(btn.site)"><i :class="btn.class"></i> {{ btn.title }}</button>
      </nav>
    </aside>
    <div class="banner">
      <div class="pic">
        <img src="@/assets/images/home/sprite.svg" alt="gif">
      </div>
    </div>
  </section>
<login v-if="this.$store.state.login"> </login>
</template>
<script>
  import login from '@/components/LoginView.vue';
export default {
  data() {
    return {
      nav: [
        {
          title: '關於我們',
          site: '/about_origin'
        },
        {
          title: '服務項目',
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
    }
  },
  methods: {
    goBottom() {
      this.$emit('emit-go');
    },
    loginOpen(){
      this.$store.state.login=true;
    }
  }
}
</script>