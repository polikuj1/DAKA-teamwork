<template>
  <footer class="footer">
    <!-- <div class="circle">
      <svg viewBox="25 -20 50 10">
        <path d="M 50 50 m -50 0 a 80 50 0 1 1 100 0 a 50 50 0 1 1 -100 0 z" id="circle" />
        <text><textPath xlink:href="#circle">早知道是这样&nbsp;像梦一场&nbsp;我又何必把眼泪锁在自己的眼眶&nbsp;</textPath></text>
      </svg>
    </div> -->
    <div class="logo">
      <router-link to="/index">
        <img src="@/assets/images/footerLogo.svg" alt="">
      </router-link>
    </div>
    <div class="btn_group">
      <router-link :to="btn.site" v-for="btn in btns" :key="btn.title">{{ btn.title }}</router-link>
    </div>
    <div class="copyright">
      <span>{{ copyright }}</span>
      <p v-html="text"></p>
    </div>
  </footer>
</template>
<script>
export default {
  name: 'Footer',
  data() {
    return {
      btns: [
        {
          title: '常見問題',
          site: '/Q&A',
        },
        {
          title: '預約訂位',
          site: '/reservation',
        },
        {
          title: '會員相關',
          site: '/Q&A',
        },
      ],
      copyright: '版權所有 © 2023 打咖 DAKA',
      text: '本網站為 緯育 TibaMe 前端設計工程師班第83期學員專題成果作品。本平台僅供學習、展示之用。<br>若有抵觸有關著作權，或有第三人主張侵害智慧財產權等情事，均由學員負法律上責任，緯育公司概不負責。<br>若有侵權疑慮，您可以私訊 緯育 TibaMe，後續會由專人協助處理。',
    }
  },
}
</script>
<style>
/* body {
  background: none;
  font: bold 78% Helvetica, sans-serif;
}

.circle {
  width: 30em;
  height: 30em;
  margin: 4em auto 0;
}

.circle svg {
  display: block;
  overflow: visible;
  transition: 10s;
}
.circle path {
  fill: none;
} */

</style>