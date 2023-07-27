
<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <section>
    <div class="about_container">
      <div class="about_circle_top">
        <div></div>
      </div>
      <div class="about_circle_middle">
        <div></div>
      </div>
      <div class="about_circle_under">
        <div></div>
      </div>
      <div class="about_circle_bottom">
        <div></div>
      </div>


      <div class="about_card_list">
        <div class="about_card_one  about_card">
          <div class="about_card_pic">
            <img :src="require('@/assets/images/about/about_lobby.svg')" alt="DAKA_LOBBY">
          </div>
          <div class="about_card_text">
            <h3>大廳環境</h3>
            <p>電競區都是頂級配備，讓你毫不卡頓的盡情挑戰遊戲極限！而一般區也是相對高規配備，讓你輕鬆上網、聊天和放鬆身心。別忘了我們的精緻點餐區，這裡有各式美味的熱食、飲料和小甜點等你品嚐！</p>
          </div>
        </div>

        <div class="about_card_two about_card">
          <div class="about_card_pic">
            <img :src="require('@/assets/images/about/about_chairs.svg')" alt="DAKA_CHAIR">
          </div>
          <div class="about_card_text">
            <h3>包廂環境</h3>
            <p>我們有單人房和雙人房可供選擇，擁有高規格電腦、舒適床鋪和迷你餐桌。讓你感受到奢華與便利的完美結合！無論是過夜狂歡還是欣賞電影，這裡都是你最佳的選擇。</p>
          </div>
          <Carousel v-bind="settings" :breakpoints="breakpoints" :autoplay="5000" :wrap-around="true"  class="about_slider_up">
            <Slide v-for="item in sliderTop" :key="item.index">


              <img class="about_carousel_item" :src="item.src" alt="">

            </Slide>

            <template #addons>
              <Navigation />
            </template>
          </Carousel>
        </div>

        <div class="about_card_three about_card">
          <div class="about_card_pic">
            <img :src="require('@/assets/images/about/about_comic.svg')" alt="DAKA_COMIC">
          </div>
          <div class="about_card_text">
            <h3>漫畫區域</h3>
            <p>館藏豐富，明亮舒適的漫畫區！這個區域包含了各種精彩的漫畫作品為你帶來無限樂趣。溫馨的氛圍、舒適的沙發、書桌和絢麗的燈光，讓你能夠盡情沉浸在角色的冒險世界中。</p>
          </div>
        </div>

        <div class="about_card_four about_card">
          <div class="about_card_pic">
            <img :src="require('@/assets/images/about/about_bathroom.svg')" alt="DAKA_BATHROOM">
          </div>
          <div class="about_card_text">
            <h3>衛浴設施</h3>
            <p>我們還提供設施齊全的廁所和清爽的淋浴間，給你完美的休憩體驗。而且，別擔心停車問題，我們還提供免費停車場，讓你輕鬆享受遊戲時光。快來這個完美的環境，感受舒適和便利的雙重享受！</p>
          </div>
          <Carousel v-bind="settings" :breakpoints="breakpoints" :autoplay="5000" :wrap-around="true" class="about_slider_down">
            <Slide v-for="slide in sliderDown" :key="slide.index">


              <img class="about_carousel_item" :src="slide.src" alt="">

            </Slide>

            <template #addons>
              <Navigation />
            </template>
          </Carousel>
        </div>


      </div>


    </div>
  </section>
</template>



<script>
import { defineComponent } from 'vue'
import { Carousel, Navigation, Slide } from 'vue3-carousel'
import 'vue3-carousel/dist/carousel.css';
import PageTitle from '@/components/PageTitle.vue';

export default defineComponent({

  components: {
    Carousel,
    Slide,
    Navigation,
    PageTitle
  },
  data: () => ({
    title: '服務項目',
    sliderTop: [
      {
        name: '鍵盤',
        src: require('@/assets/images/about/slider/slider_top/keyboard.svg'),
      },
      {
        name: '耳機',
        src: require('@/assets/images/about/slider/slider_top/earphone.svg'),
      },
      {
        name: '滑鼠',
        src: require('@/assets/images/about/slider/slider_top/razer.svg'),
      },
      {
        name: '電競椅',
        src: require('@/assets/images/about/slider/slider_top/fancychair.svg'),
      },
    ],
    sliderDown: [
      {
        name: '標誌',
        src: require('@/assets/images/about/slider/slider_down/sign.svg'),
      },
      {
        name: '鏡子',
        src: require('@/assets/images/about/slider/slider_down/mirror.svg'),
      },
      {
        name: '馬桶',
        src: require('@/assets/images/about/slider/slider_down/toilet.svg'),
      },
      {
        name: '停車場',
        src: require('@/assets/images/about/slider/slider_down/parking.svg'),
      },
    ],
    // carousel settings
    settings: {
      itemsToShow: 1,
      snapAlign: 'center',

    },
    // breakpoints are mobile first
    // any settings not specified will fallback to the carousel settings
    breakpoints: {
      // 768px and up
      768: {
        itemsToShow: 4,
        snapAlign: 'center',

      },
      // 1024 and up
      1024: {
        itemsToShow: 4,
        snapAlign: 'start',

      },
    },
  }),
})
</script>