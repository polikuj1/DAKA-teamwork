<template>
    <PageTitle>
      {{ title }}
    </PageTitle>
    <div class="location_container">
        <Collapse v-model="value" accordion class="location_collapse">
            <Panel name="1">
                <div class="panel_content">
                    <i class="fa-solid fa-location-dot"></i>&nbsp;
                    <span class="location">中壢總館</span>
                    <span class="address">桃園市中壢區復興路46號9樓</span>
                </div>
                <template #content>
                    <div class="location_content">
                        <div class="location_serve">
                            <p class="serve_computer"><i class="fa-solid fa-computer"></i>&nbsp;電競電腦</p>
                            <p class="serve_comic"><i class="fa-solid fa-book-open-reader"></i>&nbsp;漫畫租借</p>
                            <p class="serve_reservation"><i class="fa-solid fa-calendar-days"></i>&nbsp;訂位預約</p>
                            <p class="serve_food"><i class="fa-solid fa-utensils"></i>&nbsp;美味餐點</p>
                        </div>
                        <div class="location_map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3617.249178846376!2d121.22244777501729!3d24.957635477865935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468223631e2f209%3A0x581275cd0db5d98f!2zMzIw5qGD5Zut5biC5Lit5Z2c5biC5b6p6IiI6LevNDbomZ855qiT!5e0!3m2!1szh-TW!2stw!4v1690125294654!5m2!1szh-TW!2stw" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <hr>
                    <div class="price_container">
                        <div class="price_content">
                            <div class="normal_computer">
                                <p class="price_title">&nbsp;<i class="fa-solid fa-display"></i> 電腦使用_一般區&nbsp;</p>
                                <p class="onehour">一小時 ---------------- $30</p>
                                <p class="fourhour">四小時 ---------------- $120</p>
                                <p class="sixhour">六小時 ---------------- $180</p>
                            </div>
                            <div class="gaming_computer">
                                <p class="price_title">&nbsp;<i class="fa-solid fa-computer"></i> 電腦使用_電競區&nbsp;</p>
                                <p class="onehour">一小時 ---------------- $40</p>
                                <p class="fourhour">四小時 ---------------- $160</p>
                                <p class="sixhour">六小時 ---------------- $240</p>
                            </div>
                        </div>
                        <div class="price_list">
                            <div class="box_space">
                                <p class="price_title">&nbsp;<i class="fa-solid fa-couch"></i> 包廂區&nbsp;</p>
                                <p class="onehour">一小時 ---------------- $50</p>
                                <p class="fourhour">四小時  ---------------- $200</p>
                                <p class="sixhour">六小時  ---------------- $300</p>
                            </div>
                            <div class="comic_price">
                                <p class="price_title">&nbsp;<i class="fa-solid fa-book-open-reader"></i> 漫畫租借&nbsp;</p>
                                <p class="onehour">一本  -------------------- $10</p>
                                <p class="comic_notice"><i class="fa-solid fa-triangle-exclamation"></i>注意：<br>購買打咖時數者可於館內免費借閱漫畫雜誌。</p>
                            </div>
                        </div>
                    </div>
                </template>
            </Panel>
        </Collapse>
        <Collapse v-model="value" accordion class="location_collapse">
            <Panel name="2">
                <div class="panel_content">
                    <i class="fa-solid fa-location-dot"></i>&nbsp;
                    <span class="location">台中分館</span>
                    <span class="address">台中市西區向上路一段333號</span>
                </div>
                <template #content>
                    <div class="location_content">
                        <div class="location_serve">
                            <p class="serve_computer"><i class="fa-solid fa-computer"></i>&nbsp;電競電腦</p>
                            <p class="serve_comic"><i class="fa-solid fa-book-open-reader"></i>&nbsp;漫畫租借</p>
                            <p class="serve_reservation"><i class="fa-solid fa-calendar-days"></i>&nbsp;訂位預約</p>
                            <p class="serve_food"><i class="fa-solid fa-utensils"></i>&nbsp;美味餐點</p>
                        </div>
                        <div class="location_map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3617.249178846376!2d121.22244777501729!3d24.957635477865935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468223631e2f209%3A0x581275cd0db5d98f!2zMzIw5qGD5Zut5biC5Lit5Z2c5biC5b6p6IiI6LevNDbomZ855qiT!5e0!3m2!1szh-TW!2stw!4v1690125294654!5m2!1szh-TW!2stw" width="630" height="310" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </template>
            </Panel>
        </Collapse>
        <Collapse v-model="value" accordion class="location_collapse">
            <Panel name="3">
                <div class="panel_content">
                    <i class="fa-solid fa-location-dot"></i>&nbsp;
                    <span class="location">台南分館</span>
                    <span class="address">臺南市東區崇善十二街7號</span>
                </div>
                <template #content>
                    <div class="location_content">
                        <div class="location_serve">
                            <p class="serve_computer"><i class="fa-solid fa-computer"></i>&nbsp;電競電腦</p>
                            <p class="serve_comic"><i class="fa-solid fa-book-open-reader"></i>&nbsp;漫畫租借</p>
                            <p class="serve_reservation"><i class="fa-solid fa-calendar-days"></i>&nbsp;訂位預約</p>
                            <p class="serve_food"><i class="fa-solid fa-utensils"></i>&nbsp;美味餐點</p>
                        </div>
                        <div class="location_map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3617.249178846376!2d121.22244777501729!3d24.957635477865935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3468223631e2f209%3A0x581275cd0db5d98f!2zMzIw5qGD5Zut5biC5Lit5Z2c5biC5b6p6IiI6LevNDbomZ855qiT!5e0!3m2!1szh-TW!2stw!4v1690125294654!5m2!1szh-TW!2stw" width="630" height="310" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </template>
            </Panel>
        </Collapse>
    </div>

  </template>
  
  <script>
  import PageTitle from '@/components/PageTitle.vue';
  export default {
    components: {
      PageTitle,
    },
    data() {
        return{
            title:'店舖情報',
            value: '1',   //初始版面為第一個
        }   
    },
    methods: {
      
    },
    computed: {
      
    },
  }
  </script>
