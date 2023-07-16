<template>
  <div class="main_menu">
    <div class="bottom_header">
      <div class="social_media">
        <i class="fa-brands fa-instagram"></i>
        <span>follow us</span>
      </div>
      <input type="checkbox" id="hb_menu">
      <label class="hb_menu" for="hb_menu">
        <span></span>
        <span></span>
        <span></span>
      </label>
      <nav>
        <ul>
          <li v-for="li in nav" :key="li.title"><span :class="li.class"></span>{{ li.title }}</li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      nav: [
        {
          title: '關於我們',
          class: '',
        },
        {
          title: '服務項目',
          class: '',
        },
        {
          title: '店鋪情報',
          class: '',
        },
        {
          title: '最新消息',
          class: '',
        },
        {
          title: '餐點介紹',
          class: '',
        },
        {
          title: '漫畫租借',
          class: 'fa-solid fa-book-open-reader',
        },
        {
          title: '訂位預約',
          class: 'fa-solid fa-calendar-days',
        },
        {
          title: '會員中心',
          class: 'fa-solid fa-user',
        },
        {
          title: '登入註冊',
          class: '',
        },
      ],
    }
  },
}
</script>