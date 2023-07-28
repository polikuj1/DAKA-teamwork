<template>
    <section class="home_banner">
        <Carousel :autoplay="2000" :wrap-around="true">
            <Slide v-for="item in bannerSlides" :key="item.id">
                <!-- <div class="carousel__item">{{ slide }}</div> -->
                <img :src="item.imgSrc" alt="ad">
            </Slide>
    
            <template #addons>
                <Pagination />
            </template>
        </Carousel>
    </section>
</template>

<script>
import { defineComponent } from 'vue'
import { Carousel, Pagination, Slide } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'

export default defineComponent({
    name: 'Autoplay',
    components: {
        Carousel,
        Slide,
        Pagination,
    },
    data: () => ({
        title: 'BannerSlide',
        bannerSlides: [
            {
                id: 'banner01',
                imgSrc: require('@/assets/images/home/banner01.svg'),
            },
            {
                id: 'banner02',
                imgSrc: require('@/assets/images/home/banner02.svg'),
            },
            {
                id: 'banner03',
                imgSrc: require('@/assets/images/home/banner03.svg'),
            },
        ],
    }),
})
</script>
