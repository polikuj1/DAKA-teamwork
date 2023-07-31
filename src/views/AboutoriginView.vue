
<template>
  <PageTitle>
    {{ title }}
  </PageTitle>
  <section>
    <div class="aboutorigin_container">
      <div class="aboutorigin_circle_one">
        <svg xmlns="http://www.w3.org/2000/svg" width="651" height="864" viewBox="0 0 651 864" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M188.886 4.44967C340.246 8.67216 513.971 1.40269 604.014 123.139C692.161 242.31 636.428 405.068 589.111 545.541C549.17 664.114 480.024 770.38 367.539 825.168C254.419 880.266 126.52 872.555 8.76923 828.209C-126.936 777.103 -263.664 705.074 -313.219 568.794C-369.916 412.871 -366.621 223.09 -256.338 99.1373C-150.23 -20.124 29.3169 -0.00185633 188.886 4.44967Z"
            fill="#FBDFB7" fill-opacity="0.5" />
        </svg>
      </div>
      <div class="aboutorigin_circle_two">
        <svg xmlns="http://www.w3.org/2000/svg" width="1200" height="1078" viewBox="0 0 1001 898" fill="none">
          <path fill-rule="evenodd" clip-rule="evenodd"
            d="M538.422 4.20858C689.781 8.59507 863.506 1.04325 953.55 127.507C1041.7 251.307 985.964 420.387 938.646 566.316C898.705 689.494 829.56 799.887 717.074 856.804C603.954 914.041 476.055 906.03 358.304 859.963C222.599 806.871 85.8709 732.045 36.3164 590.472C-20.3809 428.493 -17.0859 231.341 93.1968 102.574C199.305 -21.3195 378.852 -0.415841 538.422 4.20858Z"
            fill="#D5F0F0" fill-opacity="0.5" />
        </svg>
      </div>

      <div class="aboutorigin_card_area">
        <div class="aboutorigin_card" data-aos="fade-up" data-aos-duration="3000">
          <div class="aboutorigin_pic">
            <div class="pic01">
              <img :src="require('@/assets/images/about/sprite01.svg')" alt="DAKA_computer">
            </div>
          </div>
          <div class="about_card_text">
            <h3 class="about_xl_text"><span class="about_orange_text">打</span><span class="about_green_text">咖</span></h3>
            <p class="about_l_text">一家充滿歡樂和活力的網咖品牌</p>
            <p class="about_m_text">踏進 <span class="about_orange_text">打</span><span
                class="about_green_text">咖</span>，你將感受到充滿活力的氛圍、先進的電腦設備、富有情節的漫畫租借、舒適的單雙人包廂，以及美味多樣的餐點服務，讓您在享受遊戲的同時，感受到無與倫比的愉悅。
            </p>
          </div>
        </div>

        <div class="aboutorigin_card" data-aos="fade-up" data-aos-duration="3000">
          <div class="aboutorigin_pic">
            <div class="pic">
              <img :src="require('@/assets/images/about/sprite02.svg')" alt="DAKA_gaming">
            </div>
          </div>
          <div class="about_card_text">
            <p class="about_m_text">踏進 <span class="about_orange_text">打</span><span
                class="about_green_text">咖</span>，你將感受到充滿活力的氛圍、先進的電腦設備、富有情節的漫畫租借、舒適的單雙人包廂，以及美味多樣的餐點服務，讓您在享受遊戲的同時，感受到無與倫比的愉悅。
            </p>
          </div>
        </div>

        <div class="aboutorigin_card" data-aos="fade-up" data-aos-duration="3000">
          <div class="aboutorigin_pic">
            <div class="pic02">
              <img :src="require('@/assets/images/about/sprite03.svg')" alt="DAKA_comic">
            </div>
          </div>
          <div class="about_card_text">
            <p class="about_m_text">無論您是專業選手還是初學者，我們都將以最熱情的服務，陪伴您度過每一個遊戲瞬間。</p>
            <p class="about_m_text">我們的使命是為您帶來歡樂，成就遊戲中的夢想。</p>
          </div>
        </div>

        <div class="about_card" data-aos="fade-up" data-aos-duration="1000">
          <div class="about_card_centertext">
            <p class="about_s_text">在 <span class="about_orange_text">打</span><span
                class="about_green_text ">咖</span>，我們用激情和活力為客人燃點遊戲的火花， 讓每一次光臨都成為一段難忘的體驗。</p>
            <p class="about_s_text">我們期待著與您共同分享這份歡樂和熱情！</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style >
@import "@/assets/scss/page/about_origin.scss";
</style>
<script>
import PageTitle from '@/components/PageTitle.vue';
export default {
  components: {
    PageTitle,
  },
  data() {
    return {
      title: '關於我們',
    }
  },
}
</script>