<template>
    <section class="home_banner">
        <Carousel v-bind="settings"
        :autoplay="2000"
        :wrap-around="true"
        :breakpoints="breakpoints">
            <Slide v-for="item in bannerSlides" 
            :key="item.id">
                <!-- <div class="carousel__item">{{ slide }}</div> -->
                <img :src="item.imgSrc" alt="ad">
            </Slide>

            <template #addons>
                <Pagination />
                <Navigation />
            </template>
        </Carousel>
    </section>
</template>

<script>
import { defineComponent } from 'vue'
import { Carousel, Pagination, Slide, Navigation } from 'vue3-carousel'

import 'vue3-carousel/dist/carousel.css'

export default defineComponent({
    name: 'Autoplay',
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
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
        settings: {
            itemsToShow: 1,
            snapAlign: 'center',
        },
        breakpoints: {
            // 700px and up
            700: {
                itemsToShow: 1,
                snapAlign: 'center',
            },
            // 1025 and up
            1025: {
                itemsToShow: 1.25,
                snapAlign: 'center',
            },
        },
    }),
})
</script>
