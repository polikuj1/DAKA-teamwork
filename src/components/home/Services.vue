<template>
  <section class="home_service">
    <!-- <div :class="item" v-for="item in circle" :key="item">
      <span></span>
    </div> -->
    <h3>服務項目</h3>
    <div class="service_list">
      <div v-for="item in service" :key="item.title" :class="item.class" @click="gaComic(item.title)">
        <div class="pic">
          <img :src="item.img">
          <h4>
            <span>{{ item.title}}</span>
            <span>{{ item.title_one }}</span>
          </h4>
          <div class="side_txt">
            <span class="decoration"></span>
            {{ item.sideTxt }}
          </div>
        </div>
        <div class="txt">
          {{ item.content }}
        </div>
      </div>
      <!-- <div class="service_item reverse">
        <div class="pic">
          <img src="https://picsum.photos/300/200/?random=10">
          <h4>
            <span>漫畫</span>
            <span>租借</span>
          </h4>
          <div class="side_txt">
            <span class="decoration"></span>
            comic renting
          </div>
        </div>
        <div class="txt">
          讓你的遊戲體驗達到極致！我們提供先進的電腦設備，高速連線和最新遊戲軟體，讓你盡情享受順暢的遊戲過程和震撼的視覺效果。
        </div>
      </div> -->
    </div>
  </section>
  <Marquee></Marquee>
</template>

<script>
import Marquee from '@/components/home/Marquee.vue'
export default {
  components: {
    Marquee,
  },
  data() {
    return {
      service: [
        {
          title: '漫畫',
          title_one: '租借',
          sideTxt: 'COMICS RENTING',
          content: '無論你是漫畫愛好者還是想一嚐漫畫的魅力，我們提供豐富多樣的漫畫租借服務。從經典作品到最新連載，讓你隨時隨地沉浸在精彩的漫畫故事中。',
          class: 'service_item normal',
          img: require('@/assets/images/home/comic.svg'),
        },
        {
          title: '打咖',
          sideTxt: 'INTERNET SURFING',
          content: '讓你的遊戲體驗達到極致！我們提供先進的電腦設備，高速連線和最新遊戲軟體，讓你盡情享受順暢的遊戲過程和震撼的視覺效果。',
          class: 'service_item reverse',
          img: require('@/assets/images/home/computer.svg'),
        },
        {
          title: '餐飲',
          sideTxt: 'FOOD & DRINKS',
          content: '品味美食的同時，讓你的遊戲體驗更加完整。我們提供豐富的餐飲選擇，從小吃到正餐，讓你在享受遊戲的同時，能夠享受美味的口福。',
          class: 'service_item normal',
          img: require('@/assets/images/home/food.svg'),
        },
        {
          title: '休息',
          title_one: '住宿',
          sideTxt: 'REST & STAY',
          content: '在我們溫馨舒適的休息住宿區域，你可以放鬆身心，休息片刻。提供乾淨舒適的床位和便利的設施，讓你在長時間遊戲後能夠得到完整的休息，重新充滿精力。',
          class: 'service_item reverse',
          img: require('@/assets/images/home/hotel.svg'),
        },
      ],
      circle: ['circle circle_one','circle circle_two', 'circle circle_three', 'circle circle_four', 'circle circle_five', 'circle circle_six'
      ],
    }
  },
  methods: {
    gaComic(title) {
      if(title === '漫畫') {
        this.$router.push('/comic_search');
      } else {
        return;
      }
    }
  },
  computed: {

  },
}
</script>