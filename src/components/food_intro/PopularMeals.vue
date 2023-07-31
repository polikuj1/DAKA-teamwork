<template>
    <section class="popmeals">
        <h3>\ 熱門餐點 /</h3>
        <div class="meals_slides" data-aos="fade-up">
            <Carousel :items-to-show="1"  :wrap-around="true" :autoplay="5000">

                <Slide v-for="item in popmeals" :key="item.title">
                    <div class="meal_intro" data-aos="fade-up">
                        <div class="meal_pic">
                            <img :src="item.img" :alt="item.title">
                        </div>
                        <div class="meal_text">
                            <h4>{{ item.title }}</h4>
                            <p>
                                {{ item.content }}
                            </p>
                        </div>
                    </div>

                </Slide>

                <template #addons>
                    <Pagination />
                </template>

            </Carousel>
        </div>
    </section>
</template>

<script>
import { defineComponent } from 'vue'
import { Carousel, Slide, Pagination } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'

export default defineComponent({

    components: {
        Carousel,
        Slide,
        Pagination,
    },
    data: () => ({
        popmeals: [
            {
                title: '檸檬可樂',
                content: '將經典的可樂與新鮮檸檬的天然風味完美融合，每一口都充滿了濃郁的可樂氣泡和令人愉悅的檸檬酸甜滋味，帶來一種絕妙的口感平衡。',
                img: require('@/assets/images/food/drink.png'),
            },
            {
                title: '章魚燒',
                content: '每一顆小小的章魚燒，都蘊含著帶點韌勁的外皮和香嫩多汁的章魚片。它們在燒烤過程中悄悄地融合出獨特的口感和豐富的海鮮風味。',
                img: require('@/assets/images/food/takoyaki.png'),
            },
            {
                title: '咖哩飯',
                content: '香氣四溢，風味豐富。酥脆的咖哩配上軟糯的飯粒，搭配多種香料和蔬菜，營造出獨特的口感和豐富的層次。一口咖哩飯，帶給您濃郁的美味和滿足的享受。',
                img: require('@/assets/images/food/curry.png'),
            },
            {
                title: '鮮嫩炸雞',
                content: '香嫩多汁的雞腿，是美食中的經典之選。每一口都充滿了肉質的鮮美，外皮酥脆香氣撲鼻。無論是烤、煎、炸或燉，雞腿都是令人食指大動的美味享受。',
                img: require('@/assets/images/food/fried_chicken.png'),
            },
            {
                title: '拉麵',
                content: '來自日本的經典美食。彈牙的麵條搭配濃郁的湯底，每一口都充滿了鮮香和滋味。加入煎蛋、燒豬肉或海鮮，定制出屬於您的獨特風味。',
                img: require('@/assets/images/food/ramen.png'),
            },
            {
                title: '熱狗堡',
                content: '鬆軟的麵包包裹著多汁的熱狗，搭配秘製的調味醬料和配料。每一口都充滿了肉香和口感的融合，傳統的經典口味總能帶給您一份快樂的美食享受。',
                img: require('@/assets/images/food/hotdog.png'),
            },
            {
                title: '海老飯糰',
                content: '日本傳統美食。鬆軟的壽司飯包裹著新鮮的蝦肉，每一口都帶來豐富的海鮮風味和口感，再搭配醬油、芥末或其他調味料，為您帶來一份滿足的美味享受。',
                img: require('@/assets/images/food/onigiri.png'),
            },
        ],
        //carousel settings
        settings: {
            itemsToShow: 1,
            snapAlign: 'center',
        },
    }),
})
</script>